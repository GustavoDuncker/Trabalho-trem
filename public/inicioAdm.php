<?php
include "../banco/db.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/inicioAdm.css">
    <link rel="icon" href="../assets/images/iconTrem.png">
    <script src="../scripts/sair.js"></script>
    
    <title>JATOTREM</title>
</head>
<body>
    <body>
        <header class="cabecalho">
          <div class="logo-container">
            
            <img src="../assets/images/treminicio.png" alt="Ferroviária Jatotrem" class="logo">
            <h1 class="txtFerroviaria">F e r r o v i á r i a</h1>
            <h2 class="txtJato">JATOTREM</h2>
          </div>
          <div class="pesquisa">
            <input type="text" placeholder="Pesquisar">
            <a href="logout.php?logout=1"><button id="buttonSair">SAIR</button></a>
          </div>
        </header>
      
        <main>
          <h1>Início</h1>
          <section class="maquinista-secao">
            <h2>ADMINISTRADOR</h2>
            <div class="grid-menu">
              <a href="MapaDeRede.php" class="menu-item">
                <img class="imgMenu" src="../assets/images/mapaTrem.png" alt="Mapa da rede">
                <span>Mapa da rede</span>
              </a>
              <a href="../public/linhas.php" class="menu-item">
                <img class="imgMenu" src="../assets/images/iconTrem.png" alt="Linhas">
                <span>Linhas</span>
              </a>
              <a href="../public/informacao1.php" class="menu-item">
                <img class="imgMenu" src="../assets/images/iconInfo2.png" alt="Informações">
                <span>Informações</span>
              </a>
              <a href="../public/contato.php" class="menu-item">
                <img src="../assets/images/iconTelefone.png" alt="Contatos"> 
                <span>Contatos</span>
              </a>
              

            </div>
            <a href="cadastroFuncionarios.php">
                <div id="divCadastro">
                    <h2 id="txtCadastro">CADASTRAR FUNCIONÁRIOS</h2>
                </div>
            </a>
          </section>
        </main>
      
        <footer>
          <div class="logoContainer2">
            
            <img src="../assets/images/treminicio.png" alt="Ferroviária Jatotrem" class="footer-logo">
            <h1 class="txtFerroviaria2">F e r r o v i á r i a</h1>
            <h2 class="txtJato2">JATOTREM</h2>
          </div>
        </footer>
      </body>
</html>