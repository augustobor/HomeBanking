function validar() {
    const user = document.getElementById("user").value;
    const pass = document.getElementById("pass").value; 
    const regex = "^[A-Za-z0-9]*$";

    if ((user.length < 6) || (pass.length < 6)) {
        alert("El nombre y la contraseña deben tener al menos 6 caracteres");
        return false;
    } else {
        if(!user.match(regex)) {
                alert("El nombre de usuario solo debe contener caracteres alfanuméricos");
                return false;
        } 
    }

    return true;
}