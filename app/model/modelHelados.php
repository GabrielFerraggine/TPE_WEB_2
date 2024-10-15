<?php
class ModelHelados extends model{
    //inserta un helado en la db
    public function insertIceCream($name_helado, $name_subcategory, $weight,  $price_cost, $price_sale, $id_heladerias, $illustrative_image) {
        $query = $this->db->prepare('INSERT INTO `helados` (`Nombre`, `Subcategorias`, `Peso`, `Precio_Costo`, `Precio_Venta`, `ID_Heladerias`,`Foto_Helados`) VALUES
        (?, ? , ? , ? , ?, ?, ?)');
        $query->execute();
    } 
    //elimina un helado de la db
    public function remove($id) {
        $query = $this->db->prepare('DELETE FROM helados WHERE id = ?');
        $query->execute([$id]);
    }
    //elimina todos los helados de una heladeria
    public function removes($id_heladerias) {
        $query = $this->db->prepare('DELETE FROM `helados` WHERE `ID_Heladerias` = $id_heladerias');
        $query->execute([$id_heladerias]);
    }
    //actualiza un helado en la db
    public function UpdateIceCreams ($id, $name_helado, $name_subcategory, $weight,  $price_cost, $price_sale, $id_heladerias){
        $query = $this->db->prepare("UPDATE `helados` SET name_helado = ?, name_subcategory = ?, weight = ?, price_cost = ?, price_sale = ?, id_heladerias = ? WHERE id = ?");
        $query->execute([$name_helado, $name_subcategory, $weight, $price_cost, $price_sale, $id_heladerias]);
    }

    //devuelve todos los helados de la db
    public function getIceCreams() {
        $query = $this->db->prepare('SELECT * FROM helados');
        $query->execute();
        $IceCreams = $query->fetchAll(PDO::FETCH_OBJ); 
        return $IceCreams;
    }

    //devuelve un helado de la db por id
    public function getIceCream($id) {
        $query = $this->db->prepare('SELECT * FROM helados WHERE id = ?');
        $query->execute([$id]);   
        $IceCream = $query->fetch(PDO::FETCH_OBJ);    
        return $IceCream;
    }
    
    //devuelve helados basado en la heladeria pasada por id
    public function detailsIceCreams($id_iceCreamParlor){
        $query = $this->db->prepare('SELECT * FROM `heladerias` WHERE id_iceCreamParlor = ?');
        $query->execute([$id_iceCreamParlor]);
        $IceCreams = $query->fetchAll(PDO::FETCH_OBJ);  
        return $IceCreams;
    }
}
?>
