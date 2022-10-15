<?php

class login_exception extends Exception {

    public function _construct() {
        throw new MyException('there is no user with that username & that password', 911);
    }

    public function errorMessage() {
        $errorMsg = 'there is no user with that username & that password';
        return $errorMsg;
    }

} 

?>