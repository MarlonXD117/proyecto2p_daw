<?php
class Conexion
{
    public static function conectar()
    {

        $host = "sql103.infinityfree.com";
        $bd = "if0_42365461_peliculas_db";
        $usuario = "if0_42365461";
        $clave = "8x9ZfWcQNKwz05r";

        $conn = new mysqli($host, $usuario, $clave, $bd);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }
        return $conn;
    }
}
