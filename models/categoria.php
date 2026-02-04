<?php
require_once __DIR__ . "/../config/database.php";

class Categoria {

    public static function obtenerCategorias() {
        $db = Database::conectar();
        $sql = "SELECT * FROM categoria";
        $resultado = $db->query($sql);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public static function crearCategoria($nombre, $descripcion, $id_usuario) {
        $db = Database::conectar();
        $sql = "INSERT INTO categoria (nombre, descripcion, id_usuario) VALUES ('$nombre', '$descripcion', $id_usuario)";
        return $db->query($sql) ? true : $db->error;
    }
}
