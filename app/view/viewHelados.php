<?php
class ViewHelados {
        public function showIceCream($iceCreams){
            require './templates/readHelados.phtml';
        }
        public function showIceCreamDetails($iceCreams, $iceCreamParlor){
            require './templates/readHeladosDetails.phtml';
        }
        public function showAddIceCream($IceCreamParlors) {
            require './templates/addHelados.phtml';
        }

        public function showEditIceCream($iceCream, $IceCreamParlors){
            require './templates/editHelados.phtml';
        }
}
?>