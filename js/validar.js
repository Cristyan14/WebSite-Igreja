document.getElementById('inscricao').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevenir submissão padrão do formulário

    const telefone = document.getElementById('telefone').value;
    const regexTelefone = /^\d{11}$/;

    if (!regexTelefone.test(telefone)) {
        alert('Número de telefone inválido. Certifique-se de inserir um número com 11 dígitos. (Ex: 11999999999). Sem os ()!');
        return;
    }

    const cpf = document.getElementById('cpf').value;
    if (!validaCPF(cpf)) {
        alert('CPF Inválido! (Ex: 00000000000)');
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "verificar_cpf.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
        if (xhr.status === 200) {
            const response = xhr.responseText.trim();

            if (response.startsWith("redirect_lote")) {
                const loteNumber = response.replace("redirect_lote", "");
                const linkPagamento = `https://mpago.la/${getLinkPagamento(loteNumber)}`;
                alert('CPF já cadastrado! Redirecionando para o pagamento...');
                window.location.href = linkPagamento;
            } else if (response === "CPF disponível") {
                console.log(response)
                alert('Inscrição confirmada! Você tem um prazo de até 5 dias úteis para realizar o pagamento!');
                document.getElementById("inscricao").submit();
            } else {
                alert(response);
            }
        } else {
            console.error("Erro na requisição:", xhr.status, xhr.statusText);
        }
    };
    xhr.send("cpf=" + encodeURIComponent(cpf));
});

function validaCPF(cpf) {
    let Soma = 0;
    let Resto;
    const strCPF = String(cpf).replace(/[^\d]/g, '');

    if (strCPF.length !== 11 || /^(\d)\1{10}$/.test(strCPF)) return false;

    for (let i = 1; i <= 9; i++) {
        Soma += parseInt(strCPF.substring(i - 1, i)) * (11 - i);
    }

    Resto = (Soma * 10) % 11;
    if (Resto === 10 || Resto === 11) Resto = 0;
    if (Resto !== parseInt(strCPF.substring(9, 10))) return false;

    Soma = 0;
    for (let i = 1; i <= 10; i++) {
        Soma += parseInt(strCPF.substring(i - 1, i)) * (12 - i);
    }

    Resto = (Soma * 10) % 11;
    if (Resto === 10 || Resto === 11) Resto = 0;
    return Resto === parseInt(strCPF.substring(10, 11));
}

function getLinkPagamento(loteNumber) {
    const links = {
        "1": "1ccTF1J",
        "2": "2VkMUco",
        "3": "1RKYFe1",
        "4": "2xKPnNa",
        "5": "2sav1u9",
        "6": "2ke7DPg",
        "7": "2MCGTQF"
    };
    return links[loteNumber] || "";
}
