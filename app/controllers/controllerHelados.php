<?php
require_once './app/model/modelHelados.php';
require_once './app/view/viewHelados.php';
require_once './app/controllers/controllerHeladerias.php';
require_once './app/controllers/ErrorController.php';

class ControllerHelados {
    private $model;
    private $view;
    private $error;
    
    public function __construct() {
        $this->model = new modelHelados();  
        $this->view = new viewHelados(); 
        $this->error = new ErrorController();
    }
    //muestra el formulario para añadir un helado 
    public function showAddIceCream(){
        $heladeriaController = new controllerHeladerias();
        $iceCreamParlor = $heladeriaController->returnIceCreamParlors();
        return $this->view->showAddIceCream($iceCreamParlor);
    }
    //agrega un nuevo helado
    public function addIceCream() {
        if(!isset($_POST["name_helado"]) || empty($_POST["name_helado"])) {
            return $this->error->showEspecificError('Please complete the name');
        }
        if(!isset($_POST["Subcategory"]) || empty($_POST["Subcategory"])) {
            return $this->error->showEspecificError('Please complete the subcategory');
        }
        if(!isset($_POST["weight"]) || empty($_POST["weight"])) {
            return $this->error->showEspecificError('Please complete the weight');
        }
        if(!isset($_POST["price_cost"]) || empty($_POST["price_cost"])) {
            return $this->error->showEspecificError('Please complete the price cost');
        }
        if(!isset($_POST["price_sale"]) || empty($_POST["price_sale"])) {
            return $this->error->showEspecificError('Please complete the price sale');
        }
        if(!isset($_POST["id_heladeria"]) || empty($_POST["id_heladeria"])) {
            return $this->error->showEspecificError('Please complete the id');
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
            return $this->error->showEspecificError("The ice cream with id=$id does not exist");
        }
        $this->model->remove($id);
        header('Location: ' . BASE_URL . 'showIceCream');
    }
    public function deleteIceCreams($id_heladeria) {
        $iceCreams = $this->model->getIceCreams($id_heladeria);
        if (!$iceCreams){
            return $this->error->showEspecificError("The ice creams with id=$id_heladeria does not exist");
        }
        $this->model->removes($id_heladeria);
        header('Location: ' . BASE_URL . 'showIceCream'); 
    }
    //permite editar un helado (excepto la imagen y la id propia)
    public function editIceCream($id){
        $name_helado = $_POST["name_helado"];
        $subcategory = $_POST["subcategory"];
        $weight = $_POST["weight"];
        $price_cost = $_POST["price_cost"];
        $price_sale = $_POST["price_sale"];
        $id_heladeria = $_POST["id_heladeria"];
        $foto_Helado = $_POST["Foto_Helado"];
        if (empty($name_helado) || empty($subcategory) || empty($weight) || empty($price_cost) || empty($price_cost) || empty($foto_Helado) || empty($id_heladeria)) {
            return $this->error->showError();
        }else{
            $this-> model->updateIceCreams($id,$name_helado,$subcategory,$weight,$price_cost, $price_sale, $id_heladeria, $foto_Helado);
        }    
        header('Location: ' . BASE_URL . 'showIceCream');
    }
    //solicita un helado y su heladeria vinculada
    public function detailsIceCream($id){
        $heladeriaController = new controllerHeladerias(); 
        $IceCream = $this->model->getIceCream($id);
        $IceCreamParlor = $heladeriaController->returnIceCreamParlor($IceCream->ID_Heladerias);
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
    //solicita el helado a editar y su respectiva heladeria correspondiente
    public function showEditIceCream ($id) {
        $heladeriaController = new controllerHeladerias();
        $iceCreamParlors = $heladeriaController->returnIceCreamParlors();
        $iceCream = $this->model->getIceCream($id);
        return $this->view->showEditIceCream($iceCream, $iceCreamParlors);
    }
}
?>