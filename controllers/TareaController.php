<?php
require_once __DIR__ . "/../models/Tarea.php";

class TareaController {

    public static function handleRequest() {
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === "GET") {
            if (isset($_GET["id"])) {
                self::obtenerTarea($_GET["id"]);
            } else {
                self::listarTareas();
            }
        }

        if ($method === "POST") {
            self::crearTarea();
        }
    }

    public static function listarTareas() {
        $tareas = Tarea::obtenerTareas();
        echo json_encode($tareas);
    }

    public static function obtenerTarea($id) {
        $tarea = Tarea::obtenerTareaPorId($id);
        echo json_encode($tarea);
    }

    public static function crearTarea() {
        $data = json_decode(file_get_contents("php://input"), true);
        if (!$data) {
            echo json_encode(["error" => "No llegaron datos"]);
            return;
        }

        $nombre = $data["nombre"];
        $fecha = $data["fecha_limite"];
        $id_usuario = $data["id_usuario"];
        $id_categoria = $data["id_categoria"];

        $resultado = Tarea::crearTarea($nombre, $fecha, $id_usuario, $id_categoria);

        if ($resultado === true) {
            echo json_encode(["mensaje" => "Tarea creada ✅"]);
        } else {
            echo json_encode(["error" => $resultado]);
        }
    }
}

