<?php
require_once './app/model/modelHeladerias.php';
require_once './app/view/viewHeladerias.php';
require_once './app/controllers/controllerHelados.php'; 

class ControllerHeladerias {
    private $model;
    private $view;
    private $controllerIce;

    public function __construct() {
        $this->model = new modelHeladerias();  
        $this->view = new viewHeladerias();
        $this->controllerIce = new controllerHelados();
    }
    public function showAddIceCreamParlor(){
        return $this->view->showAddIceCreamParlor();
    }
    //Añade una nueva heladeria
    public function addIceCreamParlor() {
        if(!isset($_POST["name_heladeria"]) || empty($_POST["name_heladeria"])) {
            return $this->view->showError('Please complete the name');
        }
        if(!isset($_POST["address"]) || empty($_POST["address"])) {
            return $this->view->showError('Please complete the subcategory');
        }
        if(!isset($_POST["association_date"]) || empty($_POST["association_date"])) {
            return $this->view->showError('Please complete the weight');
        }
        if(empty($_POST["illustrative_image"])) {
            //imagen de heladeria generica
            $illustrative_image = 'https://resizer.iproimg.com/unsafe/1280x/filters:format(webp):quality(70)/assets.iprofesional.com/assets/jpg/2023/12/564939.jpg';
        } else {
            $illustrative_image = $_POST['illustrative_image'];
        }
        $name_heladeria = $_POST['name_heladeria'];
        $address = $_POST['address'];
        $association_date = $_POST['association_date'];

        $this->model->insertIceCreamParlor($name_heladeria, $address, $association_date, $illustrative_image);
        
        header('Location: ' . BASE_URL . 'showIceCreamParlor');
    }
    //Borra una heladeria
    public function deleteIceCreamParlor($id){
        $iceCreamParlor = $this->model->getIceCreamParlor($id);
        if (!$iceCreamParlor) {
            return $this->view->showError("The ice cream parlor with id=$id does not exist");
        }
        $this->controllerIce->deleteIceCreams($id);
        $this->model->RemoveParlor($id);
        header('Location: ' . BASE_URL . 'showIceCreamParlor');
    }
    //permite editar una heladeria (excepto la imagen)
    public function editIceCreamParlor($id){
        $iceCreamParlor = $this->model->getIceCreamParlor($id);
        if (!$iceCreamParlor){
            return $this->view->showError("The ice cream parlor with id=$id does not exist");
        }
        header('Location: ' . BASE_URL . 'showIceCreamParlor');
    }
    //devuelve una heladeria por su id
    public function returnIceCreamParlor($id) {
        $iceCreamParlor = $this->model->getIceCreamParlor($id);
        return $iceCreamParlor;
    }
    //solicita toda la tabla de Heladerias
    public function showIceCreamParlor(){
        $iceCreamParlor = $this->model->getIceCreamParlors();
        return $this->view->showIceCreamParlor($iceCreamParlor);
    }
    //solicita un heladeria por id y todos sus helados asociados
    public function detailsIceCreamParlor($id_iceCreamParlor) {
        $iceCreamParlor = $this->returnIceCreamParlor($id_iceCreamParlor);
        $iceCreams = $this->controllerIce->returnIceCream($id_iceCreamParlor);
        return $this->view->showIceCreamParlorDetails($iceCreamParlor, $iceCreams);
    }
}
?>