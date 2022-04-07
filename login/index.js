function validar() {
    const user = document.getElementById("user").value;
    const pass = document.getElementById("pass").value;
    const regex = "^(?=.*[a-zA-Z])(?=.*[0-9])[A-Za-z0-9_ ]*$";

    if ((user.length < 6) || (pass.length < 6)) {
        alert("El nombre y la contraseña deben tener al menos 6 caracteres");
    } else {
        if(!user.match(regex)) {
                alert("El nombre de usuario debe contener al menos una letra y un numero");
            } else {
                 alert("Es alfanumerico")
            }

        }
    }
