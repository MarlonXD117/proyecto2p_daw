<?php
require_once __DIR__ . "/../models/Usuario.php";

class AuthController
{
    public function __construct()
    {
        session_start();
    }

    public function loginForm()
    {
        // Si ya inicio sesion, ir a peliculas
        if (isset($_SESSION['usuario_id'])) {
            header("Location: ?url=peliculas/listar");
            exit();
        }

        require_once __DIR__ . "/../views/auth/login.php";
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            if ($username == "" || $password == "") {
                $error = "Usuario y contraseña son requeridos.";
                require_once __DIR__ . "/../views/auth/login.php";
                return;
            }

            $usuario = Usuario::obtenerPorUsername($username);

            if ($usuario && password_verify($password, $usuario['password'])) {
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nombre'] = $usuario['username'];
                $_SESSION['usuario_rol'] = $usuario['rol'];

                header("Location: ?url=peliculas/listar");
                exit();
            } else {
                $error = "Credenciales incorrectas.";
                require_once __DIR__ . "/../views/auth/login.php";
            }
        }
    }

    public function logout()
    {
        session_destroy();
        header("Location: ?url=auth/login");
        exit();
    }
}
