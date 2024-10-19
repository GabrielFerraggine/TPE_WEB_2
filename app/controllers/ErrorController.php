<?php
require_once './app/view/ErrorView.php';

class ErrorController {
    private $view;

    function __construct() {
        $this->view = new ErrorView();
    }
    
    function showError(){
        $this->view->showError();
    }
    function showEspecificError($error){
        $this->view->showEspecificError($error);
    }
    
}
?>