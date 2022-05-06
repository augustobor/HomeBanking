function isPass(pass) {

    const isPass = false;
    let isPassNum = false;
    let isPassAlpha = false;
    let isPassSpecial = false;

    let passArray = pass.split("");
    passArray.forEach(character => {

        if(character.match(/[0-9]/)) {
            isPassNum = true;
        }

        if(character.match(/[A-Za-z]/)) {
            isPassAlpha = true;
        }

        if(character.match(/["!@#$%&*()_+-=?¿¡]/)) {
            isPassSpecial = true;
        }
        
    });

    if(isPassNum && (isPassAlpha || isPassSpecial)) {
        isPass = true;
    }

    return isPass;
}


function isUser(user) {

    const isUser = false;
    let isUserNum = false;
    let isUserAlpha = false;

    let userArray = user.split("");
    userArray.forEach(character => {

        if(character.match(/[0-9]/)) {
            isUserNum = true;
        }

        if(character.match(/[A-Za-z]/)) {
            isUserAlpha = true;
        }

    });

    if(isUserNum && isUserAlpha) {
        isUser = true;
    }

    return isUser;
}

function validar() {

    const name = document.getElementById('name').value;
    const surname = document.getElementById('surname').value;
    const user = document.getElementById("user").value;
    const pass = document.getElementById("pass").value; 
    const dni = document.getElementById("dni").value;
    const repeatPass = document.getElementById("pass2").value;

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

                if(!isUser(user)) {

                        alert("El nombre de usuario debe contener letras y/o un numeros");
                        return false;

                    } else {

                        if(!isPass(pass)) {
                            
                            alert("La contraseña debe contener letras y un numeros o caracteres especiales");
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