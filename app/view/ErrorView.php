<?php
class ErrorView {
    public function showError () {
        require './templates/error.phtml';
    }
    public function showEspecificError($error) {
        require './templates/error.phtml';
    }
}
?>