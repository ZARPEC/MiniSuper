<?php
use Controller\UserController\User;
$user = new User;

?>
<div class="back">
  <div class="user">
    <i class="fa-regular fa-user"></i>
  </div>
  <div class="container">
    <div class="flez">
      <form method="post">
        <div class="texd">
          <input id="email" type="text" name="user" placeholder="Correo"  required>
          <input type="password" name="password" placeholder="Contraseña" required>
        </div>
        <div class="bo">
          <div>
            <button type="submit" id="is" class="bs">Iniciar Sesión</button>
          </div>
      </form>
      <div>
        <a href="?action=signUp"><button type="button" id="rg" href="" class="bs">Registrarse</button></a>
      </div>
    </div>
    <div class="lpass">
      <a href="#" class="forgot">Recuperar Contraseña</a>
    </div>
  </div>
  <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $resultado = $user->login();
            if (!$resultado) {

                echo "<div class='alert alert-danger mt-5' role='alert' style='display: flex; flex-direction: row; align-content: center; justify-content: center;' >
        Error en los datos
        </div>";
            } else if ($resultado) {
                echo "<div class='alert alert-dismissible alert-success mt-5' role='alert' style='display: flex; flex-direction: row; align-content: center; justify-content: center;'>
                        Se ha iniciado sesión correctamente. Se te redirigirá en unos segundos.

                         </div>";


                ?>
                    <script>redirigir('?action=home')</script>
                <?php
            }
        }
        ?>
</div>
</div>