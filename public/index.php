<?php
// Punto de entrada de la aplicacion
require_once __DIR__ . "/../app/controllers/AuthController.php";
require_once __DIR__ . "/../app/controllers/UsuarioController.php";
require_once __DIR__ . "/../app/controllers/GeneroController.php";
require_once __DIR__ . "/../app/controllers/PeliculaController.php";

// Obtener la url que viene por GET
$url = $_GET["url"] ?? "";

if ($url == "") {
    $url = "auth/login";
}

// Separar controlador y metodo
$partes = explode("/", $url);
$controlador = $partes[0];
$metodo = $partes[1];

// Caso especial del login
if ($url == "auth/login") {
    $metodo = "loginForm";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $metodo = "login";
    }
}

// Crear el controlador segun la url
if ($controlador == "auth") {
    $controller = new AuthController();
} elseif ($controlador == "usuarios") {
    $controller = new UsuarioController();
} elseif ($controlador == "generos") {
    $controller = new GeneroController();
} elseif ($controlador == "peliculas") {
    $controller = new PeliculaController();
} else {
    echo "Pagina no encontrada";
    exit();
}

// Ejecutar el metodo
$controller->$metodo();
