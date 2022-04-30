function validar() {

    const name = document.getElementById('name').value;
    const alias = document.getElementById('alias').value;
    const id_user = document.getElementById('id_user').value;
    const regexName = "^[A-Za-z]{5,}*$";
    const regexAlias = "^[A-Za-z]{8,}*$";

    if(!name.match(regexName)) { 
        alert("El nombre debe contener almenos 5 caracteres alfabéticos");
        return false; 
    } else {
            if(!alias.match(regexAlias)) {
                alert("El alias debe contener almenos 8 caracteres alfabéticos");
                return false;
            } else {
                if(id_user.length == 0) {
                    alert("El id de usuario no puede estar vacio");
                    return false;
                }
            }
    }

    return true;
}