let senha = document.getElementById('senha');
let confirmar_senha = document.getElementById('confirmar_senha');


function validarSenha(){
    if (senha.value != confirmar_senha.value){
        confirmar_senha.setCustomValidity("Senhas diferentes!")
        confirmar_senha.reportValidity();
        return false;
    }else{
        confirmar_senha.setCustomValidity("");
        return true;
    }
}

confirmar_senha.addEventListener('input', validarSenha)