<?php
include "../banco/db.php";
session_start();
$mensagem = "";
// Busca dados do usuário logado
$user_id = $_SESSION['id'] ?? null;
$usuario = null;
if ($user_id) {
    $stmt = $conn->prepare("SELECT nome, email, funcao FROM Usuario WHERE idUsuario = ?");
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc();
    $stmt->close();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $funcao = $usuario['funcao'] ?? '';
    $msg = $_POST['mensagem'] ?? '';
    if ($funcao && $msg) {
        $stmt = $conn->prepare("INSERT INTO ContatoMensagem (funcao, mensagem) VALUES (?, ?)");
        $stmt->bind_param('ss', $funcao, $msg);
        if ($stmt->execute()) {
            $mensagem = "Mensagem enviada com sucesso!";
        } else {
            $mensagem = "Erro ao enviar mensagem.";
        }
        $stmt->close();
    } else {
        $mensagem = "Preencha a mensagem.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="../styles/contato.css" />
  <link rel="icon" href="../assets/images/iconTrem.png" />
  <title>Contato - JATOTREM</title>
  <script src="../scripts/contatoAdm.js"></script>
</head>
<body>
<header class="cabecalho">
    <div class="logo-container">
      <h1 class="txtFerroviaria">F e r r o v i á r i a</h1>
      <h2 class="txtJato">JATOTREM</h2>
    </div>
  </header>
  <section class="cabecalho2">
    <div class="linhasLink">
      <img src="../assets/images/iconTrem.png" alt="linhas" class="imgLinha"/>
    </div>
  </section>
  <section class="cabecalho3">
    <h3 class="txtCabecalho3">CONTATOS</h3>
  </section>
  <main>
      <div class="voltar">
    <a href="inicioFuncionario.php">◀ Voltar</a>
</div>
<div id="formulario">
  <?php if ($mensagem): ?>
    <div style="color: red; margin-bottom: 10px; text-align:center; font-weight:bold;"> <?= $mensagem ?> </div>
  <?php endif; ?>
  <form id="meuFormulario" method="post">
    <div class="grid-formulario">
      <div class="coluna-esquerda">
        <label for="nome">NOME COMPLETO</label>
        <input id="nome" name="nome" type="text" value="<?= htmlspecialchars($usuario['nome'] ?? '') ?>" readonly />
        <label for="email">EMAIL</label>
        <input id="email" name="email" type="email" value="<?= htmlspecialchars($usuario['email'] ?? '') ?>" readonly />
        <label for="funcao">FUNÇÃO</label>
        <input id="funcao" name="funcao" type="text" value="<?= htmlspecialchars($usuario['funcao'] ?? '') ?>" readonly />
      </div>
      <div class="coluna-direita">
        <label for="mensagem">MENSAGEM</label>
        <textarea id="mensagem" name="mensagem" placeholder="Digite sua mensagem"></textarea>
      </div>
    </div>
    <div id="botaozinho">
      <button id="botao_enviar" type="submit">Enviar</button>
    </div>
  </form>
</div>
  </section>
  </main>
  <div id="font">
<H1>ATENDIMENTO</H1>
<h2>SAC
  0800 123 4567
</h2>
<h2>GERAL
+55 (00) 3412-3456</h2>
</div>
  <footer>
    <div class="logoContainer2">
      <img src="../assets/images/treminicio.png" alt="Ferroviária Jatotrem" class="footer-logo" />
      <h1 class="txtFerroviaria2">F e r r o v i á r i a</h1>
      <h2 class="txtJato2">JATOTREM</h2>
    </div>
  </footer>
</body>
</html>
