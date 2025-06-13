document.addEventListener("DOMContentLoaded", function () {
  const formulario = document.getElementById("meuFormulario");

  formulario.addEventListener("submit", function (event) {
    event.preventDefault();

    const nome = document.getElementById("nome").value.trim();
    const email = document.getElementById("email").value.trim();
    const telefone = document.getElementById("telefone").value.trim();
    const mensagem = document.getElementById("mensagem").value.trim();
    const contatoSelecionado = document.querySelector('input[name="contact"]:checked');

    if (!nome || !email || !telefone || !mensagem || !contatoSelecionado) {
      alert("Por favor, preencha todos os campos e selecione um motivo de contato.");
      return;
    }

    alert("Informações enviadas com sucesso!");
    window.location.href = "inicioAdm.html"; // redireciona para sua página inicial
  });
});
