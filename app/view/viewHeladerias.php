<?php
class ViewHeladerias {
    public function showIceCreamParlor($iceCreamParlor){
        require './templates/readHeladerias.phtml';
    }
    public function showIceCreamParlorDetails($iceCreamParlor, $iceCreams) {
        require './templates/readHeladeriasDetails.phtml';
    }
    public function showAddIceCreamParlor() {
        require './templates/addheladerias.phtml';
    }
    public function showEditIceCreamParlor($iceCreamParlor) {
        require './templates/editHeladerias.phtml';
    }
}
?>