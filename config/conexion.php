<?php
class Conexion
{
    public static function conectar()
    {

        $host = "gateway01.us-east-1.prod.aws.tidbcloud.com";
        $bd = "peliculas_db";
        $usuario = "9afEaY1VN9Pm9Zt.root";
        $clave = "";
        $puerto = "4000";

        $conn = new mysqli($host, $usuario, $clave, $bd, $puerto);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }
        return $conn;
    }
}
