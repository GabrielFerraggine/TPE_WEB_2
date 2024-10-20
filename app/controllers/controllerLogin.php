<?php
require_once './app/view/loginView.php';
require_once './app/model/modelUsuario.php';
require_once './app/helper/auth.helper.php';

class LoginController {
    private $view;
    private $model;

    function __construct(){
        $this->model = new ModelUsuario();
        $this->view = new LoginView();
    }
    //llama a la view para mostrar el login

    public function showLogin(){
        $this->view->showLogin();
    }
    //autentica que exista el Usuario en la base y si es correcto,
    //loguea al usuario 
    public function auth(){
        $us = $_POST['us'];
        $password = $_POST['password'];
        if (empty($us) || empty($password)) {
            $this->view->showLogin('Please complete the form');
            return;
        }
        $user = $this->model->getByUser($us);
        if ($user && password_verify($password, $user->contraseña)) {

            AuthHelper::login($user);
            header('Location: ' . BASE_URL . 'showIceCream');
        } else {
            $this->view->showLogin('Invalid user');
        }
    }
    //desloguea
    public function logout()
    {
        AuthHelper::logout();
        header('Location: ' . BASE_URL . 'showIceCream');
    }
}
