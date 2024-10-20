<?php
class LoginView {
    //vista del login si el error es nulo
    public function showLogin($error = null) {
        require './templates/login.phtml';
    }
}
?>