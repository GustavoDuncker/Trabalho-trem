<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $telefone = isset($_POST['telefone']) ? trim($_POST['telefone']) : '';
    $mensagem = isset($_POST['mensagem']) ? trim($_POST['mensagem']) : '';
    $contatoSelecionado = isset($_POST['contact']) ? $_POST['contact'] : '';

    if (empty($nome) || empty($email) || empty($telefone) || empty($mensagem) || empty($contatoSelecionado)) {
        echo "<script>alert('Por favor, preencha todos os campos e selecione um motivo de contato.'); window.history.back();</script>";
        exit;
    }

    

    echo "<script>alert('Informações enviadas com sucesso!'); window.location.href = '../public/inicioFuncionario.html';</script>";
    exit;
}
?>