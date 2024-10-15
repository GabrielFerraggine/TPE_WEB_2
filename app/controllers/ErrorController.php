<?php
require_once './app/views/errorView.php';

class ErrorController {
    private $view;

    function __construct() {
        $this->view = new ErrorView();
    }
    
    function showError(){
        $this->view->showError();
    }
}
?>