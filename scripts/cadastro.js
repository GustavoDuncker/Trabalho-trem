function validaCadastro() {
    let email = document.getElementById("inputEmail").value;
    let senha = document.getElementById("inputSenha").value;
    let nome = document.getElementById("inputNome").value;
    let funcao = document.getElementById("inputFuncao").value;
    let numero = document.getElementById("inputNumero").value;
    let cpf = document.getElementById("inputCpf").value;
    let endereco = document.getElementById("inputEndereco").value;
    let contato = document.getElementById("inputCtt").value;

    const invalido = [' ', '!', '#', '$', '%', '^', '&', '*', '(', ')', '=', '+', ',', ';', '<', '>', '/', '\\', '|', '`', '~'];
    
    const possuiInvalidoEmail = invalido.some(char => email.includes(char));
    const possuiInvalidoNome = invalido.some(char => nome.includes(char));
    const possuiInvalidoFuncao = invalido.some(char => funcao.includes(char));
    const possuiInvalidoNumero = invalido.some(char => numero.includes(char));
    const possuiInvalidoCpf = invalido.some(char => cpf.includes(char));
    const possuiInvalidoEndereco = invalido.some(char => endereco.includes(char));
    const possuiInvalidoContato = invalido.some(char => contato.includes(char));


    
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; 
    const emailValido = emailRegex.test(email) && !possuiInvalidoEmail;


    const temComprimentoMinimoSenha = senha.length >= 8;
    const temNumeroSenha = /[0-9]/.test(senha);
    const temLetraMaiusculaSenha = /[A-Z]/.test(senha);
    const contemCaractereProibidoSenha = senha.includes(';');

    const temNumeroNome = /[0-9]/.test(nome);

    const temNumeroFuncao = /[0-9]/.test(funcao);

    const temNumeroNumero = /[0-9]/.test(numero);
    const temLetraMaiusculaNumero = /[A-Z]/.test(numero);
    const temLetraMinusculaNumero = /[a-z]/.test(numero);

    const temComprimentoMinimoCpf = cpf.length = 11;
    const temNumeroCpf = /[0-9]/.test(cpf);
    const temLetraMaiusculaCpf = /[A-Z]/.test(cpf);
    const temLetraMinusculaCpf = /[a-z]/.test(cpf);

    const temNumeroContato = /[0-9]/.test(contato);
    const temComprimentoMinimoContato = contato.length = 9;
    const temLetraMaiusculaContato = /[A-Z]/.test(contato);
    const temLetraMinusculaContato = /[a-z]/.test(contato);


    if (!emailValido) {
        window.alert("Email inválido. Por favor, insira um email válido.");
        
    } 
    else if (!temComprimentoMinimoSenha || !temNumeroSenha || !temLetraMaiusculaSenha || contemCaractereProibidoSenha) {
        window.alert('Senha inválida. A senha deve ter pelo menos 8 caracteres, um número, uma letra maiúscula e não conter o caractere ";".');
    } 
    else if(temNumeroNome || possuiInvalidoNome){
        window.alert('Nome inválido.');
    }
    else if (temNumeroFuncao || possuiInvalidoFuncao) {
        window.alert('Função inválida.');
    }
    else if (!temNumeroNumero || possuiInvalidoNumero || temLetraMaiusculaNumero || temLetraMinusculaNumero) {
        window.alert('Função inválida.');
    }
    else if (!temNumeroCpf || !temComprimentoMinimoCpf || possuiInvalidoCpf || temLetraMaiusculaCpf || temLetraMinusculaCpf) {
        window.alert('CPF inválido, insira apenas os números.');
    }
    else if (possuiInvalidoEndereco) {
        window.alert('Endereço inválido.');
    }
    else if (!temNumeroContato || !temComprimentoMinimoContato || temLetraMinusculaContato || temLetraMaiusculaContato) {
        window.alert('Contato inválido, insira apenas os números e sem o DDD.');
    }
    
    else {
        window.alert("Cadastro bem-sucedido.");
        window.location.href = "inicioAdm.html";
    }
}