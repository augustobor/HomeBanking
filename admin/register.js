function validar() {
    const user = document.getElementById("user").value;
    const pass = document.getElementById("pass").value; 
    const dni = document.getElementById("dni").value;
    const repeatPass = document.getElementById("pass2").value;
    const regex = "^[A-Za-z0-9]*$";
    const passRegex = "^[A-Za-z0-9]+$";
    const dniRegex = "^[0-9]*$";
    if ((user.length < 6) || (pass.length < 6)) {
        alert("El nombre y la contraseña deben tener al menos 6 caracteres");
        return false;
    } else {
        if(!user.match(regex)) {
                alert("El nombre de usuario debe contener letras y/o un numeros");
                return false;
            } else {
            if(!user.match(passRegex)) {
                alert("La contraseña debe contener letras y/o un numeros");
                return false;
            } else {
                if(!dni.match(dniRegex)) {
                    alert("El dni debe contener solo numeros");
                    return false;
                } else {

                    if(pass != repeatPass) {
                        alert("Las contraseñas no coinciden");
                        return false;
                    }
                }
            }
        }
    }
    return true;
}