
function validarRegistro() {
    const user = document.getElementById("usuario").value;
    const pass = document.getElementById("pass").value;
    const repeat_pass = document.getElementById("repeat_pass").value;
    message.className = "message";
    if (user.length < 6 && pass.length < 6) {
        alert("El nombre y la contraseña deben tener al menos 6 caracteres");
    } else {
        if (pass != repeat_pass) {
            alert("Las contraseñas no coinciden");
        } 
    }
    
}