<?php
use Controller\UserController\User;
$user = new User;

?>

<div class="MainSignUp">
    <div class="user">
        <i class="fa-regular fa-user"></i>
    </div>
    <form method="POST">
        <div class="SignUpInput">
            <div class="InputArea">

                <div>
                    <label for="Name" id="Name">Nombre</label>
                    <input type="text" name="nombre" id="Name" placeholder="Ingrese su nombre" required>
                </div>
                <div>
                    <label for="User" id="UserLabel">Usuario</label>
                    <input type="text" name="usuario" id="User" required>
                </div>
                <div>
                    <label for="passWord">Crear contraseña</label>
                    <input type="password" name="password" id="Password" required>
                </div>
            </div>
            <div class="InputArea">
                <div>
                    <label for="LaName" id="LaName">Apellido</label>
                    <input type="text" name="apellido" id="LaName" required>
                </div>

                <div>
                    <label for="Email" id="labelEmail">Correo</label>
                    <input type="email" name="correo" id="Email" required>
                </div>
                <div>
                    <label for="Rpassword" id="labelRPassword">Repetir contraseña</label>
                    <input type="password" name="RPasword" id="RPassword">
                </div>
            </div>


        </div>
        <div style="display: flex; flex-direction: row; align-content: center; justify-content: center;">
            <button type="submit">Registrarse</button>
        </div>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $resultado = $user->Signup();
            if (!$resultado) {

                echo "<div class='alert alert-danger mt-5' role='alert' style='display: flex; flex-direction: row; align-content: center; justify-content: center;' >
        Error en los datos
        </div>";
            } else if ($resultado) {
                echo "<div class='alert alert-dismissible alert-success mt-5' role='alert' style='display: flex; flex-direction: row; align-content: center; justify-content: center;'>
                        Usuario creado correctamente

                         </div>";


                ?>
                    <script>redirigir('?action=login')</script>
                <?php
            }
        }
        ?>
    </form>



</div>