<?php
require_once __DIR__ . "/../models/Genero.php";

class GeneroController
{
    public function __construct()
    {
        session_start();

        // Solo el admin puede gestionar generos
        if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_rol'] != 'admin') {
            header("Location: ?url=peliculas/listar");
            exit();
        }
    }

    public function listar()
    {
        $generos = Genero::obtenerTodos();
        require_once __DIR__ . "/../views/generos/index.php";
    }

    public function crearForm()
    {
        require_once __DIR__ . "/../views/generos/crear.php";
    }

    public function crear()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = trim($_POST['nombre']);

            if ($nombre == "") {
                $error = "El nombre es obligatorio.";
                require_once __DIR__ . "/../views/generos/crear.php";
                return;
            }

            Genero::crear($nombre);
            header("Location: ?url=generos/listar");
            exit();
        }
    }

    public function editarForm()
    {
        $id = $_GET['id'];
        $genero = Genero::obtenerPorId($id);
        require_once __DIR__ . "/../views/generos/editar.php";
    }

    public function actualizar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $nombre = trim($_POST['nombre']);

            Genero::actualizar($id, $nombre);
            header("Location: ?url=generos/listar");
            exit();
        }
    }

    public function eliminar()
    {
        $id = $_GET['id'];
        Genero::eliminar($id);
        header("Location: ?url=generos/listar");
        exit();
    }
}
