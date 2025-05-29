function valida() {
    let email = document.getElementById("input1").value;
    let senha = document.getElementById("input2").value;

    const invalido = [' ', '!', '#', '$', '%', '^', '&', '*', '(', ')', '=', '+', ',', ';', '<', '>', '/', '\\', '|', '`', '~'];
    const possuiInvalidoEmail = invalido.some(char => email.includes(char));

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; 
    const emailValido = emailRegex.test(email) && !possuiInvalidoEmail;

    console.log("Email válido?", emailValido);

    const temComprimentoMinimo = senha.length >= 8;
    const temNumero = /[0-9]/.test(senha);
    const temLetraMaiuscula = /[A-Z]/.test(senha);
    const contemCaractereProibido = senha.includes(';');

    if (!emailValido) {
        alert('Email inválido. Por favor, insira um email válido.');
    } else if (!temComprimentoMinimo || !temNumero || !temLetraMaiuscula || contemCaractereProibido) {
        alert('Senha inválida. A senha deve ter pelo menos 8 caracteres, um número, uma letra maiúscula e não conter o caractere ";".');
    } else {
        console.log("Login bem-sucedido.");
        window.location.href = "inicio.html";
    }
}