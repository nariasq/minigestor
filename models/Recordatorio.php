<?php
require_once __DIR__ . "/../config/database.php";

class Recordatorio {

    public static function obtenerRecordatorios() {
        $db = Database::conectar();
        $sql = "SELECT r.id_recordatorio, r.mensaje, t.nombre AS tarea 
                FROM recordatorio r
                JOIN tarea t ON r.id_tarea = t.id_tarea";
        $resultado = $db->query($sql);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public static function crearRecordatorio($mensaje, $id_tarea) {
        $db = Database::conectar();
        $sql = "INSERT INTO recordatorio (mensaje, id_tarea) VALUES ('$mensaje', $id_tarea)";
        return $db->query($sql) ? true : $db->error;
    }
}
