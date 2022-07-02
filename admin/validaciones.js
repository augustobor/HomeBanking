function isPass(pass) {

    var isPass = false;
    var isPassNum = false;
    var isPassAlphaUpper = false;
    var isPassAlphaLower = false;
    var isPassSpecial = false;

    let passArray = pass.split("");
    passArray.forEach(character => {

        if(character.match(/[0-9]/)) {
            isPassNum = true;
        }

        if(character.match(/[A-Z]/)) {
            isPassAlphaUpper = true;
        }

        if(character.match(/[a-z]/)) {
            isPassAlphaLower = true;
        }

        if(character.match(/["!@#$%&*()_+-=?¿¡]/)) {
            isPassSpecial = true;
        }
        
    });

    if(isPassAlphaUpper && isPassAlphaLower && (isPassNum || isPassSpecial)) {
        isPass = true;
    }

    return isPass;
}


function validar_cliente() {

    const name = document.getElementById('name').value;
    const surname = document.getElementById('surname').value;
    const user = document.getElementById("user").value;
    const pass = document.getElementById("pass").value; 
    const dni = document.getElementById("dni").value;
    const repeatPass = document.getElementById("pass2").value;

    const dniRegex = "^[0-9]*$";
    const nameRegex = "^[A-Za-z]+$";
    const userRegex = "^[A-Za-z0-9]*$";

    if(name.length == 0 || surname.length == 0) {
        alert("El nombre y apellido son obligatorios");
        return false;
        
    } else {
        
        if (!name.match(nameRegex) || !surname.match(nameRegex)) {

            alert("El nombre y apellido solo pueden contener letras");
            return false;

        } else {

            if ((user.length < 6) || (pass.length < 6)) {

                alert("El nombre de usuario y la contraseña deben tener al menos 6 caracteres");
                return false;

            } else {

                if(!user.match(userRegex)) {

                        alert("El nombre de usuario debe contener caracteres alfanuméricos");
                        return false;

                    } else {

                        if(!isPass(pass)) {
                            
                            alert("La contraseña debe contener mayúsculas, minúsculas y numeros o caracteres especiales");
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


function validar_cuenta() {

    const name = document.getElementById('name').value;
    const alias = document.getElementById('alias').value;
    const id_user = document.getElementById('id_user').value;
    const regex = "^[A-Za-z]*$";

    if(name.length < 5) { 

        alert("El nombre debe contener almenos 5 caracteres alfabéticos");
        return false; 

    } else {

        if(alias.length < 8) {
            alert("El alias debe contener almenos 8 caracteres alfabéticos");
            return false;

        } else {

            if(id_user.length == 0) {
                alert("El id de usuario no puede estar vacio");
                return false;
            }
                
            else {
                if(!name.match(regex) || !alias.match(regex)) {
                    alert("El nombre y el alias deben ser alfabéticos");
                    return false;
                }
            }
        }
    }
    return true;
}

function validar_deposito() {
    const amount = document.getElementById("amount").value;

    if (amount <= 0) {
        alert("El monto debe ser mayor a 0");
        return false;
    } 
    return true;
}