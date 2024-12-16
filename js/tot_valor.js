var inscricao = 0;
var inscricao_meia = 0;
const valor_total = 30.00;
const valor_meia = 0;
const valor = document.getElementById("valor_tot");

var total = 0;



var inscricao_adulto = document.getElementById('quantidade_adultos');


function apenasNumeros(event) {
    const charCode = event.which ? event.which : event.keyCode;
    if (charCode < 48 || charCode > 57) {
        event.preventDefault();
    }
}
function preencherSelect(selectId) {
    const select = document.getElementById(selectId);
    for (let i = 0; i <= 7; i++) {
        const option = document.createElement("option");
        option.value = i;
        option.textContent = i;
        select.appendChild(option);
    }
}

document.getElementById("quantidade_adultos").addEventListener("change", function () {
    const quantidadeAdultos = parseInt(this.value, 10); 
    const container = document.getElementById("inscricoes-container"); 


    const camposExtras = document.querySelectorAll(".campos-extras");
    camposExtras.forEach(campo => campo.remove());


    if (quantidadeAdultos >= 1) {
        for (let i = 1; i <= quantidadeAdultos; i++) {
            const divExtra = document.createElement("div");
            divExtra.classList.add("campos-extras");

            divExtra.innerHTML = `
                <br>
                <div class="div">
                    <label for="nome${i}">Nome ${i}:</label>
                    <input type="text" class="nome" required name="nome[]" placeholder="Nome completo do Adulto ${i}">
                </div>
                <br>
                <div class="div">
                    <label for="cpf${i}">CPF ${i}:</label>
                    <input type="text" id="cpf" class="cpf" required name="cpf[]" onkeypress="apenasNumeros(event)" maxlength="11" placeholder="CPF (apenas números) do Adulto ${i}">
                </div>
                <br>
                <div class="div">
                    <label for="telefone${i}">Telefone ${i}:</label>
                    <input type="text" id="telefone" required name="telefone[]" class="telefone" onkeypress="apenasNumeros(event)" placeholder="Telefone do Adulto ${i} (11999999999)">
                </div>
            `;
            container.insertBefore(divExtra, container.lastElementChild);
        }
    }
});
preencherSelect("quantidade_criancas");
preencherSelect("quantidade_adultos");

function atualizarValor() {
    var quantidadeCriancas = parseInt(document.getElementById("quantidade_criancas").value, 10);
    var quantidadeAdultos = parseInt(document.getElementById("quantidade_adultos").value, 10);

    total = (quantidadeCriancas * valor_meia) + (quantidadeAdultos * valor_total);

    valor.innerHTML = `R$${total.toFixed(2)}`;
   
}

document.getElementById("quantidade_criancas").addEventListener("change", atualizarValor);
document.getElementById("quantidade_adultos").addEventListener("change", atualizarValor);



atualizarValor();

