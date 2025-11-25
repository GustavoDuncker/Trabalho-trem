const cepInput = document.getElementById('inputCEP');

if (cepInput) {
  cepInput.addEventListener('blur', buscarCEP);
}

function limparCampos() {
  document.getElementById('inputRua').value = "";
  document.getElementById('inputCidade').value = "";
  document.getElementById('inputEstado').value = "";
}

function buscarCEP() {
  const cep = cepInput.value.replace(/\D/g, '');
  const errorDiv = document.getElementById('errorCEP');

  if (errorDiv) errorDiv.textContent = "";

  if (cep.length !== 8) {
    errorDiv.textContent = "CEP inválido! Digite 8 números.";
    limparCampos();
    return;
  }

  fetch(`https://viacep.com.br/ws/${cep}/json/`)
    .then(res => res.json())
    .then(data => {
      if (data.erro) {
        errorDiv.textContent = "CEP não encontrado!";
        limparCampos();
        return;
      }

      document.getElementById('inputRua').value = data.logradouro || "";
      document.getElementById('inputCidade').value = data.localidade || "";
      document.getElementById('inputEstado').value = data.uf || "";
    })
    .catch(() => {
      errorDiv.textContent = "Erro ao buscar CEP.";
      limparCampos();
    });
}
