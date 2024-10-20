<?php
namespace Model\UserModel;
use Model\ConexionModel\Conexion;

class UserM
{

    public static function signup($datos)
    {
        try {
            // Preparar e insertar el nuevo usuario
            $stmt = Conexion::conectar()->prepare("INSERT INTO usuario(user, password, fkrol) VALUES(:user, :pass, :rol)");
            $stmt->bindParam(":user", $datos['usuario'], \PDO::PARAM_STR);
            $stmt->bindParam(":pass", $datos['password'], \PDO::PARAM_STR);
            $stmt->bindParam(":rol", $datos['rol'], \PDO::PARAM_INT);

            // Ejecutar la inserción
            if ($stmt->execute()) {
                // Si la inserción fue exitosa, recuperar el idUsuario del nuevo usuario
                $stmt = Conexion::conectar()->prepare("SELECT idUsuario FROM usuario WHERE user = :user AND password = :pass");
                $stmt->bindParam(":user", $datos['usuario'], \PDO::PARAM_STR);
                $stmt->bindParam(":pass", $datos['password'], \PDO::PARAM_STR);

                // Ejecutar la consulta para recuperar el ID del usuario
                $stmt->execute();

                // Retornar el resultado de la consulta (el idUsuario)
                $user = $stmt->fetch(\PDO::FETCH_ASSOC);
                return $user;
            }
            return false;
        } catch (\Throwable $th) {
            // Retornar el error en caso de una excepción
            return $th;
        }
    }


    public static function dataC($datosC)
    {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO Cliente(Nombre,Apellido,Correo,FkUsuario) values(:nombre,:apellido,:correo,:fkUsuario)");
            $stmt->bindParam(":nombre", $datosC['nombre'], \PDO::PARAM_STR);
            $stmt->bindParam(":apellido", $datosC['apellido'], \PDO::PARAM_STR);
            $stmt->bindParam(":correo", $datosC['correo'], \PDO::PARAM_STR);
            $stmt->bindParam(":fkUsuario", $datosC['id'], \PDO::PARAM_STR);

            return $stmt->execute() ? true : false;
        } catch (\Throwable $th) {
            echo $th;
            return false;
        }
    }

    public static function login($datos)
    {
        $stmt = Conexion::conectar()->prepare("SELECT idUsuario, user, password,Cliente.idCliente, Cliente.nombre, cliente.apellido, rol.rol
                                                FROM usuario INNER JOIN cliente ON cliente.fkusuario = usuario.idUsuario
                                                INNER JOIN rol ON usuario.fkRol = rol.idRol
                                                WHERE user=:usuario");
        $stmt->bindParam(":usuario", $datos['usuario'], \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(); //devolviendo la respuesta
    }   
}

?>