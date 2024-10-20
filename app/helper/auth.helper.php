<?php
class AuthHelper {
    //esta funcion inicia la sesion
    public static function init() {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }
    //esta funcion se utiliza para loguear el usuario
    public static function login($user) {
        AuthHelper::init();
        $_SESSION['Usuario'] = $user-> nombre;
    }
    //esta funcion cierra la sesion
    public static function logout() {
        AuthHelper::init();
        session_destroy();
    }
}