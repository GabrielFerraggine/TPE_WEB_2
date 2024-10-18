<?php
require_once './app/model/model.php';

class ModelUsuario extends Model {

    public function getByUser($admins) {
        $query = $this->db->prepare('SELECT * FROM `admins` WHERE `nombre` = ?');
        $query->execute([$admins]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
}
?>