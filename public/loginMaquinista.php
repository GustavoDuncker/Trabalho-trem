<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JATOTREM - Login</title>
    <link rel="stylesheet" href="../styles/loginMaquinista_style.css">
    <script src="../scripts/loginMaquinista.js"></script>
</head>

<body id="body_login">
    <header id="cabecalho_login">
        <h1 id="tituloJato">JATOTREM</h1>
        <img src="../assets/images/treminicio.png" alt="" id="img_header">
    </header>

    <main>
        <h1 id="loginTxt">LOGIN MAQUINISTA</h1>

        <div id="box">
            <form >

                <div class="inputs">
                    <h3 class="input_elements">E-MAIL</h3>
                    <input type="email" id="input1" class="input_elements" class="emailSenha" placeholder="Digite seu email">
                    <div class="error" id="errorEmail"></div>
                </div>

                <div class="inputs">
                    <h3 class="input_elements">SENHA</h3>
                    <input type="password" id="input2" class="input_elements" class="emailSenha" placeholder="Digite sua senha">
                    <div class="error" id="errorSenha"></div>
                </div>

                <div class="inputs">
                    <input type="button" value="Acessar conta" onclick="valida()" class="input_elements" id="button_access">
                </div>


            </form>
        </div>
        <p><a href="RecuperarSenha.php" id="esqueci">Esqueci minha senha</a></p>
    </main>



</body>

</html>