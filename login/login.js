// Banco de dados de usuários (simulado)
const usuariosCadastrados = [
    { email: "admin@jatotrem.com", senha: "admin123" },
    { email: "usuario@jatotrem.com", senha: "senha123" }
];

// Função principal de validação
function validarLogin() {
    // Obter valores dos campos
    const email = document.getElementById('input1').value.trim();
    const senha = document.getElementById('input2').value;
    
    // Validar email
    if (!email) {
        alert('Por favor, insira seu email.');
        return;
    }
    
    // Validar formato de email
    if (!validarEmail(email)) {
        alert('Por favor, insira um email válido.');
        return;
    }
    
    // Validar senha
    if (!senha) {
        alert('Por favor, insira sua senha.');
        return;
    }
    
    // Procurar usuário
    const usuario = usuariosCadastrados.find(user => user.email === email);
    
    if (!usuario) {
        alert('Email não cadastrado. Por favor, verifique o email digitado.');
        return;
    }
    
    // Verificar senha
    if (usuario.senha !== senha) {
        alert('Senha incorreta. Por favor, tente novamente.');
        return;
    }
    
    // Login bem-sucedido
    alert('Login realizado com sucesso! Redirecionando...');
    // window.location.href = 'painel.html'; // Descomente quando tiver a página de destino
}

// Função para validar formato de email
function validarEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

// Event Listeners
document.addEventListener('DOMContentLoaded', function() {
    // Login pelo botão
    document.getElementById('button_access').addEventListener('click', validarLogin);
    
    // Login pelo Enter
    document.getElementById('input2').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            validarLogin();
        }
    });
});