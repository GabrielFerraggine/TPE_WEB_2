<?php 
    require_once './controllerHelados.php';
    require_once './controllerHeladerias.php';
    require_once './controllerLogin.php';
    
    //Inicia la session
    class AdminController {
        private $iceCreamController;
        private $IceCreamParlorController;
        private $loginController;
        public function __construct() {
            $this->iceCreamController = new ControllerHelados();
            $this->IceCreamParlorController = new ControllerHeladerias();
            $this->loginController = new LoginController();
        }
        public function adminAccess(){
            if(!isset([session_status() === PHP_SESSION_ACTIVE])){
                $this -> loginController -> showLogin(); 
            }
        }
    }