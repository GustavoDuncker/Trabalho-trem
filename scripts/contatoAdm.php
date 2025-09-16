<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pegando os dados do formulário
    $nome     = trim($_POST["nome"] ?? "");
    $email    = trim($_POST["email"] ?? "");
    $telefone = trim($_POST["telefone"] ?? "");
    $mensagem = trim($_POST["mensagem"] ?? "");
    $contato  = $_POST["contact"] ?? "";

    // Verifica se todos os campos foram preenchidos
    if (empty($nome) || empty($email) || empty($telefone) || empty($mensagem) || empty($contato)) {
        echo "<script>alert('Por favor, preencha todos os campos e selecione um motivo de contato.'); window.history.back();</script>";
        exit;
    }

    // Aqui você poderia salvar no banco ou enviar por email
    // Exemplo de resposta ao usuário
    echo "<script>alert('Informações enviadas com sucesso!'); window.location.href='inicioAdm.html';</script>";
    exit;
}
?>