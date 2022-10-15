alert("As it is the first time you log in, you must create a password");

function validar() {
    const pass = document.getElementById("pass").value; 
    const pass2 = document.getElementById("pass2").value;

    if((pass.length < 6) && (pass2.length < 6)) {
        alert("Password must have at least 6 characters");
        return false;
    } else {
        if(pass != pass2) {
            alert("Passwords don't match");
            return false;
        }
    }

    return true;
}