<?php
class modelheladerias extends model{
    //inserta los datos de un nuevo helado en la db
    public function insertIceCreamParlor($name_heladeria, $address, $association_date, $illustrative_image) {
        $query = $this->db->prepare('INSERT INTO `helados` (`Nombre`, `Direccion`, `Fecha_Asociacion`, `illustrative_image`) VALUES
        (?, ? , ? , ?)');
        $query->execute();
    }
    //solicita una heladeria a la db por id
    public function getIceCreamParlor($id) {
        $query = $this->db->prepare('SELECT * FROM heladerias WHERE id = ?');
        $query->execute([$id]);   
        $IceCream = $query->fetch(PDO::FETCH_OBJ);    
        return $IceCream;
    }
    //solicita toda la tabla de Heladeria
    public function getIceCreamParlors() {
        $query = $this->db->prepare('SELECT * FROM heladerias');
        $query->execute();
        $IceCreams = $query->fetchAll(PDO::FETCH_OBJ); 
        return $IceCreams;
    }
    //Actualiza una heladeria
    public function UpdateIceCreamParlor ($id,$name_heladeria, $address, $association_date){
        $query = $this->db->prepare("UPDATE `heladerias` SET name_headeria = ?, address = ?, association_date = ? WHERE id = ?");
        $query->execute([$name_heladeria, $address, $association_date, $id]);
    }
    //elimina una heladeria de la db
    public function RemoveParlor($id) {
        $query = $this->db->prepare('DELETE FROM heladerias WHERE id = ?');
        $query->execute([$id]);
    }
}
?>