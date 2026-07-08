<?php
require_once __DIR__ . "/../models/Usuario.php";

class UsuarioController
{
    public function __construct()
    {
        session_start();

        // Solo el admin puede entrar aqui
        if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_rol'] != 'admin') {
            header("Location: ?url=peliculas/listar");
            exit();
        }
    }

    public function listar()
    {
        $usuarios = Usuario::obtenerTodos();
        require_once __DIR__ . "/../views/usuarios/index.php";
    }

    public function crearForm()
    {
        require_once __DIR__ . "/../views/usuarios/crear.php";
    }

    public function crear()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $rol = $_POST['rol'];

            if ($username == "" || $email == "" || $password == "") {
                $error = "Todos los campos son obligatorios.";
                require_once __DIR__ . "/../views/usuarios/crear.php";
                return;
            }

            $resultado = Usuario::crear($username, $email, $password, $rol);

            if ($resultado) {
                header("Location: ?url=usuarios/listar");
                exit();
            } else {
                $error = "No se pudo crear el usuario.";
                require_once __DIR__ . "/../views/usuarios/crear.php";
            }
        }
    }

    public function editarForm()
    {
        $id = $_GET['id'];
        $usuario = Usuario::obtenerPorId($id);
        require_once __DIR__ . "/../views/usuarios/editar.php";
    }

    public function actualizar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $rol = $_POST['rol'];
            $password = trim($_POST['password']);

            // Si escribio una nueva contraseña, actualizarla tambien
            if ($password != "") {
                Usuario::actualizarConPassword($id, $username, $email, $rol, $password);
            } else {
                Usuario::actualizar($id, $username, $email, $rol);
            }

            header("Location: ?url=usuarios/listar");
            exit();
        }
    }

    public function eliminar()
    {
        $id = $_GET['id'];

        // El admin no puede eliminarse a si mismo
        if ($id != $_SESSION['usuario_id']) {
            Usuario::eliminar($id);
        }

        header("Location: ?url=usuarios/listar");
        exit();
    }
}
