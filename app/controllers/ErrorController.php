<?php
require_once './app/view/ErrorView.php';

class ErrorController {
    private $view;

    function __construct() {
        $this->view = new ErrorView();
    }
    

    //funcion del error generico
    function showError(){
        $this->view->showError();
    }

    //funcion de varios errores
    function showEspecificError($error){
        $this->view->showEspecificError($error);
    }
    
}
?>