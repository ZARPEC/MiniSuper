<script src="assets/Js/SideBar.js"></script>
<div class="MainSideBar">
    <div class="toggle-btn" onclick="toggleSidebar(this)">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div id="sidebar">
        <div class="elemenBar">
            <ul>
            <li class=''><a href='?action=home'><i class='fa-solid fa-star'></i>Inicio</a></li>
                <?php
                if (!empty($_SESSION['user'])) {
                    echo "
                <li><a href='?action=homeUser'><i class='fa-solid fa-star'></i> Pedidos</a></li>
                ";
                }else{
                    echo "
                    <li class=''><a href='?action=login'><i class='fa-solid fa-star'></i> iniciar Sesión</a></li>
                    ";
                }
                ?>
                <li><a href='#'><i class='fa-solid fa-star'></i> Carrito</a></li>
                <?php
                if (!empty($_SESSION['user'])) {
                    echo "
                <li><a href='?action=logout'><i class='fa-solid fa-star'></i> Cerrar Sesión</a></li>";
                }
                ?>

            </ul>
        </div>
    </div>
</div>