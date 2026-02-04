<?php
require_once __DIR__ . "/../models/Categoria.php";

class CategoriaController {

    public static function handleRequest() {
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === "GET") {
            self::listarCategorias();
        }

        if ($method === "POST") {
            self::crearCategoria();
        }
    }

    public static function listarCategorias() {
        $categorias = Categoria::obtenerCategorias();
        echo json_encode($categorias);
    }

    public static function crearCategoria() {
        $data = json_decode(file_get_contents("php://input"), true);

        if (!$data) {
            echo json_encode(["error" => "No llegaron datos"]);
            return;
        }

        $nombre = $data["nombre"];
        $descripcion = $data["descripcion"];
        $id_usuario = $data["id_usuario"];

        $resultado = Categoria::crearCategoria($nombre, $descripcion, $id_usuario);

        if ($resultado === true) {
            echo json_encode(["mensaje" => "Categoría creada ✅"]);
        } else {
            echo json_encode(["error" => $resultado]);
        }
    }
}

