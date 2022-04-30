function validar() {
    const name = document.getElementById('name').value;
    const surname = document.getElementById('surname').value;
    const user = document.getElementById("user").value;
    const pass = document.getElementById("pass").value; 
    const dni = document.getElementById("dni").value;
    const repeatPass = document.getElementById("pass2").value;
    const regex = "^[A-Za-z0-9]*$";
    //"^(?=.[A-Za-z])(?=.\d)(?=.[@$!%#?&])[A-Za-z\d@$!%*#?&]+$"
    const passRegex = "^[A-Za-z0-9@$!%*#?&]+$"; //Preguntar que regex usar.
    const dniRegex = "^[0-9]*$";
    const nameRegex = "^[A-Za-z]+$";

    if(name.length == 0 || surname.length == 0) {
        alert("El nombre y apellido son obligatorios");
        return false;
    } else {
        
        if (!name.match(nameRegex) || !surname.match(nameRegex)) {

            alert("El nombre y apellido solo pueden contener letras");
            return false;

        } else {

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
            }         
        }
    return true;
}