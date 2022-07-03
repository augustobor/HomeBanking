<?php

class login_exception extends Exception {

    public function _construct() {
        throw new MyException('no existe un usuario con ese nombre de usuario y esa contraseña', 911);
    }

    public function errorMessage() {
        $errorMsg = 'no existe un usuario con ese nombre de usuario y esa contraseña';
        return $errorMsg;
    }

} 

?>