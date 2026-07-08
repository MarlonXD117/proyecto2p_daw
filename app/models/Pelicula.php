<?php
require_once __DIR__ . "/../../config/conexion.php";

class Pelicula
{
    public static function obtenerTodas()
    {
        $conn = Conexion::conectar();
        $sql = "SELECT p.*, g.nombre AS genero_nombre 
                FROM peliculas p 
                LEFT JOIN generos g ON p.genero_id = g.id 
                ORDER BY p.id DESC";
        $resultado = $conn->query($sql);

        $peliculas = [];
        while ($fila = $resultado->fetch_assoc()) {
            $peliculas[] = $fila;
        }
        return $peliculas;
    }

    public static function obtenerPorId($id)
    {
        $conn = Conexion::conectar();
        $sql = "SELECT p.*, g.nombre AS genero_nombre 
                FROM peliculas p 
                LEFT JOIN generos g ON p.genero_id = g.id 
                WHERE p.id=$id";
        $resultado = $conn->query($sql);
        return $resultado->fetch_assoc();
    }

    public static function crear($titulo, $descripcion, $anio, $genero_id, $imagen)
    {
        $conn = Conexion::conectar();
        $titulo = $conn->real_escape_string($titulo);
        $descripcion = $conn->real_escape_string($descripcion);
        $imagen = $conn->real_escape_string($imagen);

        $sql = "INSERT INTO peliculas (titulo, descripcion, anio_lanzamiento, genero_id, imagen) 
                VALUES ('$titulo', '$descripcion', $anio, $genero_id, '$imagen')";
        return $conn->query($sql);
    }

    public static function actualizar($id, $titulo, $descripcion, $anio, $genero_id, $imagen)
    {
        $conn = Conexion::conectar();
        $titulo = $conn->real_escape_string($titulo);
        $descripcion = $conn->real_escape_string($descripcion);

        if ($imagen != "") {
            $imagen = $conn->real_escape_string($imagen);
            $sql = "UPDATE peliculas SET titulo='$titulo', descripcion='$descripcion', anio_lanzamiento=$anio, genero_id=$genero_id, imagen='$imagen' WHERE id=$id";
        } else {
            $sql = "UPDATE peliculas SET titulo='$titulo', descripcion='$descripcion', anio_lanzamiento=$anio, genero_id=$genero_id WHERE id=$id";
        }
        return $conn->query($sql);
    }

    public static function eliminar($id)
    {
        $conn = Conexion::conectar();
        $sql = "DELETE FROM peliculas WHERE id=$id";
        return $conn->query($sql);
    }
}
