<?php
class ViewHelados {
        //muestra un formulario con varios helados
        public function showIceCream($iceCreams){
            require './templates/readHelados.phtml';
        }
        //muestra un helado en detalle
        public function showIceCreamDetails($iceCreams, $iceCreamParlor){
            require './templates/readHeladosDetails.phtml';
        }
        //muestra un formulario para agregar helados
        public function showAddIceCream($IceCreamParlors) {
            require './templates/addHelados.phtml';
        }
        //muestra el formulario para editar un helado 
        public function showEditIceCream($iceCream, $IceCreamParlors){
            require './templates/editHelados.phtml';
        }
}
?>