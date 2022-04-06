
function validar() {
    const user = document.getElementById("user").value;
    const pass = document.getElementById("pass").value;
    if (user.length < 6 && pass.length < 6) {
        alert("El nombre y la contraseña deben tener al menos 6 caracteres");
    } else {
        if (!user.match(/^[0-9a-zA-Z]+$/)) {
         alert("El nombre debe contener letras y números");
        } 
    }
}