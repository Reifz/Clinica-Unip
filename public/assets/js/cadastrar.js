
const setarCepMascara = (event) => {
    let input = event.target
    input.value = cepMascara(input.value)
  }
  
  const cepMascara = (value) => {
    if (!value) return ""
    value = value.replace(/\D/g,'')
    value = value.replace(/(\d{5})(\d)/,'$1-$2')
    return value
  }    
  function mascaraCPF(cpf) {

    const valor = cpf.value.replace(/\D/g, '');

    if (valor.length <= 11) {
        cpf.value = valor
            .replace(/(\d{3})(\d)/, '$1.$2')
            .replace(/(\d{3})(\d)/, '$1.$2')
            .replace(/(\d{3})(\d{1,2})$/, '$1-$2');
    } else {
        cpf.value = valor.substring(0, 11)
            .replace(/(\d{3})(\d)/, '$1.$2')
            .replace(/(\d{3})(\d)/, '$1.$2')
            .replace(/(\d{3})(\d{1,2})$/, '$1-$2');
    }
}

let senha = document.getElementById('senha');
let senhaC = document.getElementById('confirmed_senha');

function validarSenha() {
if (senha.value != senhaC.value) {
    senhaC.setCustomValidity("Senhas diferentes!");
    senhaC.reportValidity();
    return false;
} else {
    senhaC.setCustomValidity("");
    return true;
}
}

// verificar também quando o campo for modificado, para que a mensagem suma quando as senhas forem iguais
senhaC.addEventListener('input', validarSenha);

