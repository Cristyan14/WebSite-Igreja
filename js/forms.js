let currentTab = 0; // Índice da aba ativa
const tabs = document.querySelectorAll(".tab");
const steps = document.querySelectorAll(".step");

function updateTabs() {
    tabs.forEach((tab, index) => {
        tab.classList.toggle("active", index === currentTab);
    });
    steps.forEach((step, index) => {
        step.classList.toggle("active", index === currentTab);
    });
}

function validateCurrentTab() {
    const currentFields = tabs[currentTab].querySelectorAll("input, select");
    for (let field of currentFields) {
        if (!field.checkValidity()) {
            field.reportValidity();
            return false; 
        }
    }
    return true; 
}

function nextTab() {
    if (validateCurrentTab() && currentTab < tabs.length - 1) {
        currentTab++;
        updateTabs();
    }
}

function prevTab() {
    if (currentTab > 0) {
        currentTab--;
        updateTabs();
    }
}

let senha = document.getElementById('senha');
let confirmar_senha = document.getElementById('confirmar_senha');
let cpf = document.getElementById('cpf');

function validarSenha(){

    if (senha.value != confirmar_senha.value){
        confirmar_senha.setCustomValidity("Senhas diferentes!")
        confirmar_senha.reportValidity();
        return false;
    }else{
        confirmar_senha.setCustomValidity("");
        nextTab();
        return true;
    }
}

confirmar_senha.addEventListener('input', validarSenha)


function apenasNumeros(event) {
    const charCode = event.which ? event.which : event.keyCode;
    if (charCode < 48 || charCode > 57) {
        event.preventDefault();
    }
}

function validaCPF(event) {
    let Soma = 0;
    let Resto;
    const strCPF = String(event).replace(/[^\d]/g, '');

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

