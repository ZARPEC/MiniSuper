<?php
namespace Controller\UserController;

use Model\UserModel\UserM;
use Model\ConexionModel\Conexion;

class User
{
    public function Signup()
    {
        if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['usuario']) && !empty($_POST['password'])) {
            if (isset($_POST['rol'])) {

                $rol = $_POST['rol'];
            } else {
                $rol = 2;
            }
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $usuario = $_POST['usuario'];
            $correo = $_POST['correo'];
            $password = $_POST['password'];


            $password = password_hash($password, PASSWORD_DEFAULT);



            $datos = array(
                'usuario' => $usuario,
                'password' => $password,
                'rol' => $rol
            );


            $user = UserM::signup($datos);
            if (!empty($user['idUsuario'])) {
                $datosC = array(
                    'id' => $user['idUsuario'],
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'correo' => $correo,
                );
                $respuesta = UserM::dataC($datosC);

            } else {
                echo "<h1>Error al ingresar al cliente</h1>";
            }


            return $respuesta;
        }

    }

    public function login()
    {
        if (!empty($_POST['user']) && !empty($_POST['password'])) {
            $usuario = ($_POST['user']);
            $password = ($_POST['password']);

            $datos = array(
                'usuario' => $usuario,
            );
            $respuesta = UserM::login($datos);
            //comparar contraseña cifrada con la de la bd
            if (!empty($respuesta['user'])) {
                $resultado = password_verify($password, $respuesta['password']);
                if ($resultado) { //Hubo coincidencia
                    $_SESSION['user'] = $respuesta['user'];
                    $_SESSION['nombre'] = $respuesta['nombre'];
                    $_SESSION['apellido'] = $respuesta['apellido'];
                    $_SESSION['idUsuario'] = $respuesta['idUsuario'];
                    $_SESSION['rol'] = $respuesta['rol'];
                    $_SESSION['idCliente'] = $respuesta['idCliente'];
                    return true;
                } else {
                    echo "<h1>error en los credenciales</h1>";
                }
            } else {
                echo "<h1>No existe usuario</h1>";
                return false;
            }
        }
    }

    public function logout()
    {
        session_destroy();
        header("location:?action=home");
    }

}

?>