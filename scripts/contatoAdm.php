<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $nome     = trim($_POST["nome"] ?? "");
    $email    = trim($_POST["email"] ?? "");
    $telefone = trim($_POST["telefone"] ?? "");
    $mensagem = trim($_POST["mensagem"] ?? "");
    $contato  = $_POST["contact"] ?? "";

    if (empty($nome) || empty($email) || empty($telefone) || empty($mensagem) || empty($contato)) {
        echo "<script>alert('Por favor, preencha todos os campos e selecione um motivo de contato.'); window.history.back();</script>";
        exit;
    }


    echo "<script>alert('Informações enviadas com sucesso!'); window.location.href='inicioAdm.html';</script>";
    exit;
}
?>