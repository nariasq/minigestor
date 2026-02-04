<?php
class Database {
    private static $host = "localhost";
    private static $user = "root";  // tu usuario MySQL
    private static $pass = "";      // tu contraseña MySQL
    private static $db_name = "minigestor";
    private static $conexion = null;

    public static function conectar() {
        if (self::$conexion === null) {
            self::$conexion = new mysqli(self::$host, self::$user, self::$pass, self::$db_name);
            if (self::$conexion->connect_error) {
                die("Error de conexión: " . self::$conexion->connect_error);
            }
        }
        return self::$conexion;
    }
}
