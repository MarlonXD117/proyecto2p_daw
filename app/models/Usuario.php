<?php
require_once __DIR__ . "/../../config/conexion.php";

class Usuario
{
    public static function obtenerTodos()
    {
        $conn = Conexion::conectar();
        $sql = "SELECT id, username, email, rol, created_at FROM usuarios";
        $resultado = $conn->query($sql);

        $usuarios = [];
        while ($fila = $resultado->fetch_assoc()) {
            $usuarios[] = $fila;
        }
        return $usuarios;
    }

    public static function obtenerPorId($id)
    {
        $conn = Conexion::conectar();
        $sql = "SELECT id, username, email, rol FROM usuarios WHERE id=$id";
        $resultado = $conn->query($sql);
        return $resultado->fetch_assoc();
    }

    public static function obtenerPorUsername($username)
    {
        $conn = Conexion::conectar();
        $username = $conn->real_escape_string($username);
        $sql = "SELECT * FROM usuarios WHERE username='$username'";
        $resultado = $conn->query($sql);
        return $resultado->fetch_assoc();
    }

    public static function crear($username, $email, $password, $rol)
    {
        $conn = Conexion::conectar();
        $username = $conn->real_escape_string($username);
        $email = $conn->real_escape_string($email);
        $rol = $conn->real_escape_string($rol);
        $password = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO usuarios (username, email, password, rol) VALUES ('$username', '$email', '$password', '$rol')";
        return $conn->query($sql);
    }

    public static function actualizar($id, $username, $email, $rol)
    {
        $conn = Conexion::conectar();
        $username = $conn->real_escape_string($username);
        $email = $conn->real_escape_string($email);
        $rol = $conn->real_escape_string($rol);

        $sql = "UPDATE usuarios SET username='$username', email='$email', rol='$rol' WHERE id=$id";
        return $conn->query($sql);
    }

    public static function actualizarConPassword($id, $username, $email, $rol, $password)
    {
        $conn = Conexion::conectar();
        $username = $conn->real_escape_string($username);
        $email = $conn->real_escape_string($email);
        $rol = $conn->real_escape_string($rol);
        $password = password_hash($password, PASSWORD_BCRYPT);

        $sql = "UPDATE usuarios SET username='$username', email='$email', rol='$rol', password='$password' WHERE id=$id";
        return $conn->query($sql);
    }

    public static function eliminar($id)
    {
        $conn = Conexion::conectar();
        $sql = "DELETE FROM usuarios WHERE id=$id";
        return $conn->query($sql);
    }
}
