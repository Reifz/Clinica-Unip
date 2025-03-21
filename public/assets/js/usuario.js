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
    // Remove caracteres não numéricos
    const valor = cpf.value.replace(/\D/g, '');

    // Aplica a máscara
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