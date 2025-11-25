const cepInput = document.getElementById('cep');
if (cepInput) {
  cepInput.addEventListener('blur', viacepBuscarCEP);
}

function limparCampos() {
  const ids = ['logradouro', 'bairro', 'localidade', 'uf', 'complemento'];
  ids.forEach(id => {
    const el = document.getElementById(id);
    if (el) el.value = '';
  });
}

function viacepBuscarCEP() {
  const cep = (document.getElementById('cep')?.value || '').replace(/\D/g, '');
  let form = document.getElementById('viacep-form');
  if (!form && cepInput) form = cepInput.closest('form');

    const errorDiv = document.getElementById('errorCEP');
  if (errorDiv) errorDiv.textContent = '';

  