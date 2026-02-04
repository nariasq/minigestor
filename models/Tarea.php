<?php
require_once __DIR__ . "/../config/database.php";

class Tarea {

    public static function obtenerTareas() {
        $db = Database::conectar();
        $sql = "SELECT * FROM tarea";
        $resultado = $db->query($sql);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public static function obtenerTareaPorId($id) {
        $db = Database::conectar();
        $sql = "SELECT * FROM tarea WHERE id_tarea = $id";
        $resultado = $db->query($sql);
        return $resultado->fetch_assoc();
    }

    public static function crearTarea($nombre, $fecha, $id_usuario, $id_categoria) {
        $db = Database::conectar();
        $sql = "INSERT INTO tarea (nombre, fecha_limite, id_usuario, id_categoria) VALUES ('$nombre', '$fecha', $id_usuario, $id_categoria)";
        return $db->query($sql) ? true : $db->error;
    }
}


