<?php
use Controller\UserController\User;
use Controller\FacturaController\Factura;
use Model\PaymentModel\Payment;

$factura = new Payment;

?>
<div id="mainCart" class="mt-5">
    <div id="cart">
        <div class="container" style="width:100%; height:100%;">
            <!-- Tabla del carrito de compras -->
            <div class="row">
                <div class="">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario</th>
                                <th>Subtotal</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="cart-items">
                            <!-- Aquí se mostrarán los productos del carrito -->
                        </tbody>
                    </table>
                </div>

                <!-- Resumen del pedido -->
                <div class="">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Resumen del Pedido</h4>
                            <hr>
                            <p><strong>Subtotal:</strong> <span id="subtotal">Q0.00</span></p>
                            <h5><strong>Total:</strong> <span id="total">Q0.00</span></h5>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="datosCl">
        <div class="container" style="width:90%; height:95%;">
            <?php
            if (!empty($_SESSION['user'])) {
                echo "

            <form method='post'>
                <div class='mb-3' style='display: flex; align-items:center;'>
                    <label for='nombreCl' class='form-label'>Nombre</label>
                    <input type='text' class='form-control' id='nombreCl' name='nombreCl' value='{$_SESSION['nombre']}' required>
                </div>
                <div class='mb-3' style='display: flex; align-items:center;'>
                    <label for='apellido' class='form-label'>Apellido</label>
                    <input type='text' class='form-control' id='apellido' name='apellido' value='{$_SESSION['apellido']}' required>
                </div>
                <div class='mb-3' style='display: flex; align-items:center;'>
                    <label for='telefono' class='form-label'>Telefono</label>
                    <input type='number' class='form-control' id='telefono' name='telefono' maxlength='8' required>
                </div>
            </form>

            ";
            } ?>

        </div>
    </div>

    <div id="datosEnvio">
        <div class="container" style="width:90%; height:95%;">
            <?php
            if (!empty($_SESSION['user'])) {
                echo "
            <form method='post'>
                <div class='mb-3' style='display: flex; align-items:center;>
                    <label for=' departamento' class='form-label'>Departamento</label>
                    <select class='form-select' id='departamento' name='departamento' required>
                        <option value='' disabled selected>Seleccione un departamento</option>
                    </select>
                </div>
                <div class='mb-3' style='display: flex; align-items:center;>
                    <label for=' municipio' class='form-label'>Municipio</label>
                    <select class='form-select' id='municipio' name='municipio' required>
                        <option value='' disabled selected>Seleccione un municipio</option>
                    </select>
                </div>
                <div class='mb-3' style='display: flex; align-items:center;>
                    <label for=' direccion' class='form-label'>Dirección de Envío</label>
                    <input type='text' class='form-control' id='direccion' name='direccion' required>
                </div>
            </form>

            ";
            } else {
                echo "
                <div class='' style='display: flex;align-items:center;height:1rem;justify-content: flex-start;flex-direction: column;'>
                        <div class='row' >
                            <h4>para continuar con el pago por favor inicie sesión</h4>
                        </div>
                        <div class='row'>
                            <a href='?action=login' ><button type='button' class='btn btn-primary btn-lg' style='width:auto;'>Iniciar Sesión</button></a>
                        </div>
                </div>
                    ";
            }

            ?>

        </div>
    </div>

    <div id="detaPagos">
        <div class="container" style="width:90%; height:95%;">

            <?php
            if (!empty($_SESSION['user'])) {
                echo "
            <form method='post' id='checkout-form'>
                <div id='payment-details' class='DetallePago'>
                    <div class='' style='display: flex; align-items:center;'>
                        <label for='nombreTarjeta' class='form-label'>Nombre en la Tarjeta</label>
                        <input type='text' class='form-control' id='nombreTarjeta' name='nombreTarjeta'>
                    </div>

                    <div class='' style='display: flex; align-items:center;'>
                        <label for='numeroTarjeta' class='form-label'>Número de Tarjeta</label>
                        <input type='text' class='form-control' id='numeroTarjeta' name='numeroTarjeta'>
                    </div>

                    <div class='' style='display: flex;'>
                        <div style='display: flex; align-items:center;'>
                            <label for='vencimiento' class='form-label'>Fecha de Vencimiento (MM/AA)</label>
                            <input type='text' class='form-control' id='vencimiento' name='vencimiento'>
                        </div>
                        <div style='display: flex; align-items:center;'>
                            <label for='cvv' class='form-label'>CVV</label>
                            <input type='text' class='form-control' id='cvv' name='cvv'>
                        </div>
                    </div>
                    <div class='' style='display: flex; align-items:center; height:1rem; justify-content: center;'>
                        <div class=''>
                            <button type='submit' class='btn btn-primary btn-lg' style='width:auto;'>Finalizar
                                Compra</button>
                        </div>
                    </div>
                </div>
            </form>
            ";
            } ?>

            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $factura->payment();
            }

            ?>
        </div>
    </div>