function esAlphanumerico(cadena) {
    const permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_";
    const array = cadena.split("")
    const value = 1;
    console.log(array);
    array.forEach(element => {
        if (permitidos.includes(element) == false) {
            value = 0;
        } 
    });
    return value;
}


function validar() {
    const user = document.getElementById("user").value;
    const pass = document.getElementById("pass").value;

    if ((user.length < 6) && (pass.length < 6)) {
        alert("El nombre y la contraseña deben tener al menos 6 caracteres");
    } else {
        
        if (pass.length < 6) {
            alert("El nombre y la contraseña deben tener al menos 6 caracteres");
        }
        // if (esAlphanumerico(user) == 0) {
        //     alert("El usuario debe contener caracteres alphanumericos");
        // }
    }
}