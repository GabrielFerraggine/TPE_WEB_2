<?php
class ViewHeladerias {
    public function showError($error){
        require 'app/view/ErrorView.php';
    }
    public function showIceCreamParlor($iceCreamParlor){
        require 'templates/readHeladerias.phtml';
    }
    public function showIceCreamParlorDetails($iceCreamParlor, $iceCreams) {
        require 'templates/readHeladeriasDetails.phtml';
    }
    public function showAddIceCreamParlor() {
        require 'templates/addheladerias.phtml';
    }
}
?>