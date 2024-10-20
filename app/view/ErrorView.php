<?php
class ErrorView {
    //vista del error generico
    public function showError () {
        require './templates/error.phtml';
    }
    //vista de los errores 
    public function showEspecificError($error) {
        require './templates/error.phtml';
    }
}
?>