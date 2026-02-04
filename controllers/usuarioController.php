<?php
require_once __DIR__ . "/../models/Usuario.php";

class UsuarioController {

    public static function handleRequest() {
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === "GET") {
            self::listarUsuarios();
        }

        if ($method === "POST") {
            self::crearUsuario();
        }
    }

    public static function listarUsuarios() {
        $usuarios = Usuario::obtenerUsuarios();
        echo json_encode($usuarios);
    }

    public static function crearUsuario() {
        $data = json_decode(file_get_contents("php://input"), true);

        if (!$data) {
            echo json_encode(["error" => "No llegaron datos"]);
            return;
        }

        $nombre = $data["nombre"];
        $correo = $data["correo"];
        $contrasena = $data["contrasena"];

        $resultado = Usuario::crearUsuario($nombre, $correo, $contrasena);

        if ($resultado === true) {
            echo json_encode(["mensaje" => "Usuario creado ✅"]);
        } else {
            echo json_encode(["error" => $resultado]);
        }
    }
}
