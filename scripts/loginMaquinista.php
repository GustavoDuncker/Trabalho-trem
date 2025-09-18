<?php
$email = $senha = "";
$errorEmail = $errorSenha = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $caracteresInvalidos = [' ', '!', '#', '$', '%', '^', '&', '*', '(', ')', '=', '+', ',', ';', '<', '>', '/', '\\', '|', '`', '~'];
    $emailTemInvalido = false;
    foreach ($caracteresInvalidos as $c) {
        if (strpos($email, $c) !== false) {
            $emailTemInvalido = true;
            break;
        }
    }

    $emailValido = filter_var($email, FILTER_VALIDATE_EMAIL) && !$emailTemInvalido;

    $senhaOk = strlen($senha) >= 8 && preg_match('/[0-9]/', $senha) && preg_match('/[A-Z]/', $senha) && strpos($senha, ';') === false;

    if (!$emailValido) {
        $errorEmail = "Email inválido. Digite um email válido.";
    } elseif (!$senhaOk) {
        $errorSenha = 'Senha inválida. Ela precisa ter pelo menos 8 caracteres, um número, uma letra maiúscula e não pode ter ";".';
    } else {
        header("Location: ../public/inicioFuncionario.html");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login Maquinista</title>
    <link rel="stylesheet" href="../styles/loginMaquinista_style.css">
</head>
<body>
    <form method="POST" action="loginMaquinista.php">
        <label for="input1">Email:</label>
        <input type="text" id="input1" name="email" value="<?php echo htmlspecialchars($email); ?>">
        <span id="errorEmail" style="color:red;"><?php echo $errorEmail; ?></span><br>

        <label for="input2">Senha:</label>
        <input type="password" id="input2" name="senha">
        <span id="errorSenha" style="color:red;"><?php echo $errorSenha; ?></span><br>

        <button type="submit">Entrar</button>
    </form>
</body>
</html>
