<?php
class ViewHeladerias {
    //muestra un formulario de varias heladerias
    public function showIceCreamParlor($iceCreamParlor){
        require './templates/readHeladerias.phtml';
    }
    //muestra un formulario de una heladeria en detalle y muestra los helados vinculados a esa heladeria
    public function showIceCreamParlorDetails($iceCreamParlor, $iceCreams) {
        require './templates/readHeladeriasDetails.phtml';
    }//muestra un formulario para agregar heladerias
    public function showAddIceCreamParlor() {
        require './templates/addheladerias.phtml';
    }//muestra el formulario para editar una heladeria
    public function showEditIceCreamParlor($iceCreamParlor) {
        require './templates/editHeladerias.phtml';
    }
}
?>