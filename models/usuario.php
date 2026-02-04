<?php
require_once __DIR__ . "/../config/database.php";

class Usuario {

    public static function obtenerUsuarios() {
        $db = Database::conectar(); // Esto NO debe ser null
        $sql = "SELECT * FROM usuario";
        $resultado = $db->query($sql);

        if (!$resultado) {
            return ["error" => $db->error]; // esto te ayuda a debuggear
        }

        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public static function crearUsuario($nombre, $correo, $contrasena) {
        $db = Database::conectar();
        $sql = "INSERT INTO usuario (nombre, correo, contrasena) VALUES ('$nombre', '$correo', '$contrasena')";
        return $db->query($sql) ? true : $db->error;
    }
}

