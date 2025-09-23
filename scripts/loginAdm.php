<?php
$errorEmail = "";
$errorSenha = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['input1']) ? trim($_POST['input1']) : '';
    $senha = isset($_POST['input2']) ? $_POST['input2'] : '';

    $invalido = array(' ', '!', '#', '$', '%', '^', '&', '*', '(', ')', '=', '+', ',', ';', '<', '>', '/', '\\', '|', '`', '~');
    $possuiInvalidoEmail = false;
    foreach ($invalido as $char) {
        if (strpos($email, $char) !== false) {
            $possuiInvalidoEmail = true;
            break;
        }
    }

    $emailValido = filter_var($email, FILTER_VALIDATE_EMAIL) && !$possuiInvalidoEmail;

    $temComprimentoMinimo = strlen($senha) >= 8;
    $temNumero = preg_match('/[0-9]/', $senha);
    $temLetraMaiuscula = preg_match('/[A-Z]/', $senha);
    $contemCaractereProibido = strpos($senha, ';') !== false;

    if (!$emailValido) {
        $errorEmail = "Email inválido. Por favor, insira um email válido.";
    } elseif (!$temComprimentoMinimo || !$temNumero || !$temLetraMaiuscula || $contemCaractereProibido) {
        $errorSenha = 'Senha inválida. A senha deve ter pelo menos 8 caracteres, um número, uma letra maiúscula e não conter o caractere ";".';
    } else {
    
        header("Location: inicioAdm.php");
        exit;
    }
}
?>