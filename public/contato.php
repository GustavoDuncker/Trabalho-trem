<?php?>
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
    <div class="pesquisa">
      <input type="text" placeholder="Pesquisar" class="pesquisaInput"/>
    </div>
    <div class="linhasLink">
      <img src="../assets/images/iconTrem.png" alt="linhas" class="imgLinha"/>
    </div>
  </section>
  <section class="cabecalho3">
    <h3 class="txtCabecalho3">CONTATOS</h3>
  </section>
  <main>
      <div class="voltar">
    <a href="inicioAdm.php">◀ Voltar</a>
</div>
<div id="formulario">
  <form id="meuFormulario">
    <fieldset>
      <legend>Qual o motivo do meu contato?</legend>
      <div class="opcoes">
        <div class="opcao">
          <input type="radio" id="comentario" name="contact" value="comentario" />
          <label for="comentario">Comentário</label>
        </div>
        <div class="opcao">
          <input type="radio" id="pergunta" name="contact" value="pergunta" />
          <label for="pergunta">Pergunta</label>
        </div>
        <div class="opcao">
          <input type="radio" id="sugestao" name="contact" value="sugestao" />
          <label for="sugestao">Sugestão</label>
        </div>
        <div class="opcao">
          <input type="radio" id="reclamacao" name="contact" value="reclamacao" />
          <label for="reclamacao">Reclamação</label>
        </div>
      </div>
    </fieldset>
    <div class="grid-formulario">
      <div class="coluna-esquerda">
        <label for="nome">NOME COMPLETO</label>
        <input id="nome" type="text" placeholder="Digite seu nome" />
        <label for="email">EMAIL</label>
        <input id="email" type="email" placeholder="Digite seu e-mail" />
        <label for="telefone">TELEFONE</label>
        <input id="telefone" type="tel" placeholder="Digite seu telefone" />
      </div>
      <div class="coluna-direita">
        <label for="mensagem">MENSAGEM</label>
        <textarea id="mensagem" placeholder="Digite sua mensagem"></textarea>
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
