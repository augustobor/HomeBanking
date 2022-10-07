alert("Como es la primera vez que inicias sesión debes crearte una contraseña");

function validar() {
    const pass = document.getElementById("pass").value; 
    const pass2 = document.getElementById("pass2").value;

    if((pass.length < 6) && (pass2.length < 6)) {
        alert("La contraseña debe tener al menos 6 caracteres");
        return false;
    } else {
        if(pass != pass2) {
            alert("Las contraseñas no coinciden");
            return false;
        }
    }

    return true;
}