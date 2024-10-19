<?php
use Controller\ProductController\ProductC;
use Model\PaymentModel\Payment;
$controllerProd = new ProductC();
$controllerpay = new Payment();
$factura = new Payment;
$produ = $controllerProd;


?>

<div id="MainAdminC">
    <div id="productsLs" class="container mt-5">
        <div>
            <table id="example" class="display" width="90%"></table>
        </div>
    </div>

    <div id="detallesAd" class="container mt-5">
        <div id="cart">
            <div class="container" style="width:100%; height:100%;">
                <!-- Tabla del carrito de compras -->
                <div class="row">
                    <div class="tab">
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
        <div class="buttonArea row justify-content-center align-items-center">
            <div class="row align-items-center m-4">
                <form method="post" id="checkout-form">
                    <input type='hidden' class='form-control' id='nombreTarjeta' name='nombreTarjeta' value="admin">
                    <input type='hidden' class='form-control' id='numeroTarjeta' name='numeroTarjeta'
                        value="4111111111111111">
                    <input type='hidden' class='form-control' id='vencimiento' name='vencimiento' value="12/25">
                    <input type='hidden' class='form-control' id='cvv' name='cvv' value="123">


                    <button type="submit">Finalizar compra</button>
                </form>
            </div>

        </div>
    </div>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $factura->payment();
}

?>


<script type="text/javascript">
    let dataProduct = <?php echo json_encode($produ->ShowAllProduct()); ?>;
    let data = [];

    for (let i = 0; i < dataProduct.length; i++) {
        data.push([
            dataProduct[i].idProducto,
            dataProduct[i].NombreProd,
            dataProduct[i].precio,
            dataProduct[i].Existencias,
            dataProduct[i].acciones = '<button class="add-to-cart" style="height:30px;" data-id="' + dataProduct[i].idProducto + '" onclick="agregarAlCarrito({\'id\':' + dataProduct[i].idProducto + ',\'precio\':' + dataProduct[i].precio + ',\'nombre\':\'' + dataProduct[i].NombreProd + '\',\'cantidad\': 1});">Agregar al carrito</button>'

        ]);
    }

    let table = new DataTable('#example', {
        columns: [
            { title: 'ID' },
            { title: 'Producto' },
            { title: 'Precio' },
            { title: 'Existencias' },
            { title: 'Acciones' }
        ],
        data: data,
        pageLength: 7
    });
</script>