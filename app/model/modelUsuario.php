<?php

require_once 'app/models/model.php';

class ModelUsuario extends Model {

    public function getByUser($nombre) {
        $query = $this->db->prepare('SELECT * FROM nombre WHERE user = ?');
        $query->execute([$nombre]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}
?>