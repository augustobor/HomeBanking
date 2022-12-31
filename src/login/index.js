function validate() {
    const user = document.getElementById("user").value;
    const pass = document.getElementById("pass").value; 
    const regex = "^[A-Za-z0-9]*$";

    if ((user.length < 6) || (pass.length < 6)) {
        alert("username and password must be have at least 6 characters")
        return false;
    } else {
        if(!user.match(regex)) {
            alert("username only must have alphanumeric characters");
            return false;
        } 
    }

    return true;
}