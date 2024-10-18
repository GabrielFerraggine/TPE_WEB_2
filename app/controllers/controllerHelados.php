<?php
require_once './app/model/modelHelados.php';
require_once './app/view/viewHelados.php';
require_once './app/controllers/controllerHeladerias.php';

class ControllerHelados {
    private $model;
    private $view;
    
    public function __construct() {
        $this->model = new modelHelados();  
        $this->view = new viewHelados(); 
    }
    //muestra el formulario para añadir un helado 
    public function showAddIceCream(){
        return $this->view->showAddIceCream();
    }
    //agrega un nuevo helado
    public function addIceCream() {
        if(!isset($_POST["name_helado"]) || empty($_POST["name_helado"])) {
            return $this->view->showError('Please complete the name');
        }
        if(!isset($_POST["Subcategory"]) || empty($_POST["Subcategory"])) {
            return $this->view->showError('Please complete the subcategory');
        }
        if(!isset($_POST["weight"]) || empty($_POST["weight"])) {
            return $this->view->showError('Please complete the weight');
        }
        if(!isset($_POST["price_cost"]) || empty($_POST["price_cost"])) {
            return $this->view->showError('Please complete the price cost');
        }
        if(!isset($_POST["price_sale"]) || empty($_POST["price_sale"])) {
            return $this->view->showError('Please complete the price sale');
        }
        if(!isset($_POST["id_heladeria"]) || empty($_POST["id_heladeria"])) {
            return $this->view->showError('Please complete the id');
        }
        if(empty($_POST["illustrative_image"])) {
            //se agrega una imagen generica
            $illustrative_image = 'https://media.cdn.puntobiz.com.ar/102016/1617293962194.jpg?cw=1200&ch=740';
        } else {
            $illustrative_image = $_POST['illustrative_image'];
        }
        $name_helado = $_POST['name_helado'];
        $Subcategory = $_POST['Subcategory'];
        $weight = $_POST['weight'];
        $price_cost = $_POST['price_cost'];
        $price_sale = $_POST['price_sale'];
        $id_heladeria = $_POST['id_heladeria'];
        //llamado al modelHelados
        $this->model->insertIceCream($name_helado, $Subcategory, $weight,  $price_cost, $price_sale, $id_heladeria, $illustrative_image);
        header('Location: ' . BASE_URL . 'showIceCream');
    }
    //permite borrar un helado
    public function deleteIceCream($id) {
        $iceCream = $this->model->getIceCream($id);
        if (!$iceCream) {
            return $this->view->showError("The ice cream with id=$id does not exist");
        }
        $this->model->remove($id);
        header('Location: ' . BASE_URL . 'showIceCream');
    }
    public function deleteIceCreams($id_heladeria) {
        $iceCreams = $this->model->getIceCreams($id_heladeria);
        if (!$iceCreams){
            return $this->view->showError("The ice creams with id=$id_heladeria does not exist");
        }
        $this->model->removes($id_heladeria);
        header('Location: ' . BASE_URL . 'showIceCream'); 
    }
    //permite editar un helado (excepto la imagen)
    public function editIceCream($id){
        $iceCream = $this->model->getIceCream($id);

        if (!$iceCream){
            return $this->view->showError("the ice creams with id=$id does not exist");
        }
        header('Location: ' . BASE_URL . 'showIceCream');
    }
    //solicita un helado y su heladeria vinculada
    public function detailsIceCream($id){
        $controllerParlor=null;
        $this->$controllerParlor = new controllerHeladerias();  
        $IceCream = $this->model->getIceCream($id);
        $IceCreamParlor = $this->$controllerParlor->returnIceCreamParlor($IceCream->ID_Heladeria);
        return $this->view->showIceCreamDetails($IceCream, $IceCreamParlor);
    }
    //solicita todos los helados
    public function showIceCream(){
        $iceCream = $this->model->getIceCreams();
        return $this->view->showIceCream($iceCream);
    }
    //solicita un helado en particular
    public function returnIceCream($id_iceCreamParlor){
        $iceCream = $this->model->detailsIceCreams($id_iceCreamParlor);
        return $iceCream;
    }

    public function showEditIceCream ($id) {
        return $this->view->showEditIceCream($id);
    }
}
?>