var pass1, pass2;
pass1 = document.getElementById('Clave1');
pass2= document.getElementById('Clave2');

pass1.onchange=pass2.onkeyup=passwordMatch;
// cuando cambie de control pasa a confirmar
// empiece a chekear tecla arriba
//cada caracter de cada uno de los controles (clave1 y clave 2)
function passwordMatch(){
  if (pass1.value !== pass2.value) {
    pass2.setCustomValidity("las contraseñas no coinciden");
  }else {
    pass2.setCustomValidity("");
  }
}
