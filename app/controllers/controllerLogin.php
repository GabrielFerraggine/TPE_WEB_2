<?php
require_once './app/view/loginView.php';
require_once './app/model/modelUsuario.php';
require_once './app/helper/auth.helper.php';

class LoginController
{
    private $view;
    private $model;

    function __construct()
    {
        $this->model = new ModelUsuario();
        $this->view = new LoginView();
    }

    public function showLogin()
    {
        $this->view->showLogin();
    }
    public function auth()
    {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        if (empty($usuario) || empty($password)) {
            $this->view->showLogin('Please complete the form');
            return;
        }
        $user = $this->model->getByUser($usuario);
        if ($user && password_verify($password, $user->contraseña)) {

            AuthHelper::login($user);
            header('Location: ' . BASE_URL . 'showIceCream');
        } else {
            $this->view->showLogin('Invalid user');
        }
    }

    public function logout()
    {
        AuthHelper::logout();
        header('Location: ' . BASE_URL . 'showIceCream');
    }
}
