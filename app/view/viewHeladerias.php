<?php
class ViewHeladerias {
    public function showError($error){
        require 'app/view/ErrorView.php';
    }
    public function showIceCreamParlor($iceCreamParlor){
        require 'template/readHeladerias.phtml';
    }
    public function showIceCreamParlorDetails($iceCreamParlor, $iceCreams) {
        require 'template/readHeladeriasDetails.phtml';
    }
}
?>