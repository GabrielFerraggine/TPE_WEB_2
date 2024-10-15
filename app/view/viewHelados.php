<?php
class ViewHelados {
        public function showIceCream($iceCreams){
            require 'template/readHelados.phtml';
        }

        public function showError($error) {
            require 'template/error.phtml';
        }

        public function showIceCreamDetails($iceCreams, $iceCreamParlor){
            require 'template/readHelados.phtml';
        }
}
?>