<?php
header("Content-Type: application/json");

// rutas
$uri = $_SERVER['REQUEST_URI'];
$uri = parse_url($uri, PHP_URL_PATH);
$uri = str_replace("/minigestor/backend", "", $uri); // ajusta según tu carpeta

require_once __DIR__ . "/controllers/UsuarioController.php";
require_once __DIR__ . "/controllers/TareaController.php";
require_once __DIR__ . "/controllers/CategoriaController.php";  // <-- esto es clave
require_once __DIR__ . "/controllers/RecordatorioController.php";


switch ($uri) {
    case "/tareas":
        TareaController::handleRequest();
        break;
    case "/usuarios":
        UsuarioController::handleRequest();
        break;
    case "/categorias":
        CategoriaController::handleRequest();
        break;
    case "/recordatorios":
        RecordatorioController::handleRequest();
        break;
    default:
        echo json_encode(["mensaje" => "API MiniGestor funcionando 🚀"]);
        break;
}


