function valida(){
    let email = document.getElementById("input1").attributeStyleMap();
    let senha = document.getElementById("input2").value;
    const invalido = [' ', '!', '#', '$', '%', '^', '&', '*', '(', ')', '=', '+', ',', ';', '<', '>', '/', '\\', '|', '`', '~'];
    const possuiInvalidoEmail = invalido.some(char => email.includes(char));
    if (possuiInvalidoEmail) {
        alert('Email inválido. Por favor, insira um email válido.');
      } else {
        if(){

        }else{
            window.location.href = "inicio.html";
        }
      }

}