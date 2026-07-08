<?php
require_once __DIR__ . "/../../config/conexion.php";

class Genero
{
    public static function obtenerTodos()
    {
        $conn = Conexion::conectar();
        $sql = "SELECT * FROM generos ORDER BY nombre ASC";
        $resultado = $conn->query($sql);

        $generos = [];
        while ($fila = $resultado->fetch_assoc()) {
            $generos[] = $fila;
        }
        return $generos;
    }

    public static function obtenerPorId($id)
    {
        $conn = Conexion::conectar();
        $sql = "SELECT * FROM generos WHERE id=$id";
        $resultado = $conn->query($sql);
        return $resultado->fetch_assoc();
    }

    public static function crear($nombre)
    {
        $conn = Conexion::conectar();
        $nombre = $conn->real_escape_string($nombre);
        $sql = "INSERT INTO generos (nombre) VALUES ('$nombre')";
        return $conn->query($sql);
    }

    public static function actualizar($id, $nombre)
    {
        $conn = Conexion::conectar();
        $nombre = $conn->real_escape_string($nombre);
        $sql = "UPDATE generos SET nombre='$nombre' WHERE id=$id";
        return $conn->query($sql);
    }

    public static function eliminar($id)
    {
        $conn = Conexion::conectar();
        $sql = "DELETE FROM generos WHERE id=$id";
        return $conn->query($sql);
    }
}
