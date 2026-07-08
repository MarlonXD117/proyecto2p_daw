<?php
require_once __DIR__ . "/../models/Pelicula.php";
require_once __DIR__ . "/../models/Genero.php";

class PeliculaController
{
    public function __construct()
    {
        session_start();

        // Si no hay sesion, mandar al login
        if (!isset($_SESSION['usuario_id'])) {
            header("Location: ?url=auth/login");
            exit();
        }
    }

    public function listar()
    {
        $peliculas = Pelicula::obtenerTodas();
        require_once __DIR__ . "/../views/peliculas/index.php";
    }

    public function crearForm()
    {
        // Solo el admin puede crear peliculas
        if ($_SESSION['usuario_rol'] != 'admin') {
            header("Location: ?url=peliculas/listar");
            exit();
        }

        $generos = Genero::obtenerTodos();
        require_once __DIR__ . "/../views/peliculas/crear.php";
    }

    public function crear()
    {
        // Solo el admin puede crear peliculas
        if ($_SESSION['usuario_rol'] != 'admin') {
            header("Location: ?url=peliculas/listar");
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $titulo = trim($_POST['titulo']);
            $descripcion = trim($_POST['descripcion']);
            $anio = $_POST['anio_lanzamiento'];
            $genero_id = $_POST['genero_id'];

            if ($titulo == "" || $descripcion == "" || $anio == "" || $genero_id == "") {
                $error = "Todos los campos son obligatorios.";
                $generos = Genero::obtenerTodos();
                require_once __DIR__ . "/../views/peliculas/crear.php";
                return;
            }

            // Subir imagen si el usuario eligio una
            $imagen = "";
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
                $nombreArchivo = time() . "_" . $_FILES['imagen']['name'];
                $carpeta = __DIR__ . "/../../public/imagenes/";

                if (!is_dir($carpeta)) {
                    mkdir($carpeta, 0777, true);
                }

                move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta . $nombreArchivo);
                $imagen = "imagenes/" . $nombreArchivo;
            }

            Pelicula::crear($titulo, $descripcion, $anio, $genero_id, $imagen);
            header("Location: ?url=peliculas/listar");
            exit();
        }
    }

    public function editarForm()
    {
        if ($_SESSION['usuario_rol'] != 'admin') {
            header("Location: ?url=peliculas/listar");
            exit();
        }

        $id = $_GET['id'];
        $pelicula = Pelicula::obtenerPorId($id);
        $generos = Genero::obtenerTodos();
        require_once __DIR__ . "/../views/peliculas/editar.php";
    }

    public function actualizar()
    {
        if ($_SESSION['usuario_rol'] != 'admin') {
            header("Location: ?url=peliculas/listar");
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $titulo = trim($_POST['titulo']);
            $descripcion = trim($_POST['descripcion']);
            $anio = $_POST['anio_lanzamiento'];
            $genero_id = $_POST['genero_id'];

            $imagen = "";
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
                $nombreArchivo = time() . "_" . $_FILES['imagen']['name'];
                $carpeta = __DIR__ . "/../../public/imagenes/";

                if (!is_dir($carpeta)) {
                    mkdir($carpeta, 0777, true);
                }

                move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta . $nombreArchivo);
                $imagen = "imagenes/" . $nombreArchivo;
            }

            Pelicula::actualizar($id, $titulo, $descripcion, $anio, $genero_id, $imagen);
            header("Location: ?url=peliculas/listar");
            exit();
        }
    }

    public function eliminar()
    {
        if ($_SESSION['usuario_rol'] != 'admin') {
            header("Location: ?url=peliculas/listar");
            exit();
        }

        $id = $_GET['id'];
        Pelicula::eliminar($id);
        header("Location: ?url=peliculas/listar");
        exit();
    }
}
