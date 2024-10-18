<?php
class ViewHelados {
        public function showIceCream($iceCreams){
            require './templates/readHelados.phtml';
        }

        public function showError($error) {
            require 'templates/error.phtml';
        }

        public function showIceCreamDetails($iceCreams, $iceCreamParlor){
            require 'templates/readHeladosDetails.phtml';
        }
        public function showAddIceCream() {
            require 'templates/addHelados.phtml';
        }
        public function showEditIceCream($iceCream){
            require './templates/editHelados.phtml';
        }
}
?>