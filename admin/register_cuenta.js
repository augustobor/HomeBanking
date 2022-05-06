

function validar() {

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