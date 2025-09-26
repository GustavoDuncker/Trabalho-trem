<?php

include "banco/db.php";
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="formulario.js"></script>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="icon" href="assets/images/treminicio.png">
    <title>Aplicativo trem</title>
</head>
<body>
    <main class="main-content">
        <img src="assets/images/treminicio.png" alt="Locomotiva">
        <div id="titulo">
            <h2 id="titulo1">Ferrovária</h2>
            <h1 id="titulo2">JATOTREM</h1>
        </div>

        <div class="button-container">
            <button class="login">
                <a href="public/loginAdm.php" id="link_loginAdm"><b>ENTRAR</b></a>
            </button>
        </div>
    </main>

    <footer>
        </footer>
</body>
</html>