<?php
namespace Model\ConexionModel;

class Conexion
{


    public static function conectar()
    {
        $conn = new \PDO("mysql:host=127.0.0.1:3307;dbname=minisuper", "root", "");

        return $conn;
    }
}



?>