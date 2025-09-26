<?php

include "../banco/db.php";

session_start();

$msg = "";
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $email = $_POST["email"] ?? "";
    $pass = $_POST["senha"] ?? "";

    $stmt =$conn->prepare("SELECT idUsuario, email, senha, funcao FROM usuario WHERE email=? AND senha=?");
    $stmt-> bind_param("ss", $email, $pass);
    $stmt->execute();

    $result = $stmt->get_result();
    $dados = $result -> fetch_assoc();
    $stmt->close();

    if($dados){
        $_SESSION["id"] = $dados["idUsuario"];
        $_SESSION["email"] = $dados["email"];
        $_SESSION["funcao"] = $dados["funcao"];


        if($_SESSION["funcao"] == 'administrador'){
             header("Location: inicioAdm.php");
            exit;
        }else{
            header("Location: inicioFuncionario.php");
            session_destroy();
        }

        exit;

    }else{
        $msg = "Usuário ou senha incorretos!";
    }


};


?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JATOTREM - Login</title>
    <link rel="stylesheet" href="../styles/loginAdm_style.css">
    <script src="../scripts/loginAdm.php"></script>
</head>

<body id="body_login">

    <header id="cabecalho_login">
        <h1 id="tituloJato">JATOTREM</h1>
        <img src="../assets/images/treminicio.png" alt="" id="img_header">
    </header>

    <main>
        <h1 id="loginTxt">LOGIN</h1>

        <div id="box">
            <form method="POST">

                <?php if($msg): ?> 
                    <p> <?= $msg ?> </p> 
                <?php endif; ?>

                <div class="inputs">
                    <h3 class="input_elements">E-MAIL</h3>
                    <input type="email" id="input1" class="input_elements" class="emailSenha" name="email" placeholder="Digite seu email">
                    <div class="error" id="errorEmail"></div>
                </div>

                <div class="inputs">
                    <h3 class="input_elements">SENHA</h3>
                    <input type="password" id="input2" class="input_elements" class="emailSenha" name="senha" placeholder="Digite sua senha">
                    <div class="error" id="errorSenha"></div>
                </div>

                <div class="inputs">
                    <button type="submit">Entrar</button>
                </div>


            </form>
        </div>
        <p><a href="RecuperarSenha.php" id="esqueci">Esqueci minha senha</a></p>
    </main>



</body>

</html>