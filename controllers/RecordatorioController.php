<?php
require_once __DIR__ . "/../models/Recordatorio.php";

class RecordatorioController {

    public static function handleRequest() {
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === "GET") {
            self::listarRecordatorios();
        }

        if ($method === "POST") {
            self::crearRecordatorio();
        }
    }

    public static function listarRecordatorios() {
        $recordatorios = Recordatorio::obtenerRecordatorios();
        echo json_encode($recordatorios);
    }

    public static function crearRecordatorio() {
        $data = json_decode(file_get_contents("php://input"), true);

        if (!$data) {
            echo json_encode(["error" => "No llegaron datos"]);
            return;
        }

        $mensaje = $data["mensaje"];
        $id_tarea = $data["id_tarea"];

        $resultado = Recordatorio::crearRecordatorio($mensaje, $id_tarea);

        if ($resultado === true) {
            echo json_encode(["mensaje" => "Recordatorio creado ✅"]);
        } else {
            echo json_encode(["error" => $resultado]);
        }
    }
}
