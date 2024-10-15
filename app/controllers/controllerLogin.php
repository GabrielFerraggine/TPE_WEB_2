<?php
require_once './app/views/loginView.php';
require_once './app/models/modelUsuario.php';
require_once './app/helpers/auth.helper.php';

class LoginController {
    private $view;
    private $model;

    function __construct() {
        $this->model = new ModelUsuario();
        $this->view = new LoginView();
    }

    public function showLogin() {
        $this->view->showLogin();
    }
    public function auth() {
        $nombre = $_POST['nombre'];
        $password = $_POST['password'];

        if (empty($nombre) || empty($password)) {
            $this->view->showLogin('Faltan completar datos');
            return;
        }

        $user = $this->model->getByUser($nombre);
        if ($user && password_verify($password, $user-> Password)) {
            AuthHelper::login($user);
            
            header('Location: ' . BASE_URL);
        } else {
            $this->view->showLogin('Usuario inválido');
        }
    }

    public function logout() {
        AuthHelper::logout();
        header('Location: ' . BASE_URL);    
    }
}
?>