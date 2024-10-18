<?php
namespace Model\PaymentModel;
use Model\ConexionModel\Conexion;
use Controller\FacturaController\Factura;

class Payment
{

    public function payment()
    {
        if (!empty($_POST['numeroTarjeta']) && !empty($_POST['vencimiento']) && !empty($_POST['cvv'])) {
            // instancia a factura
            $addfactura = new Factura;
            // datos del formulario de tarjeta
            $nombre = $_POST['nombreTarjeta'];
            $numeroTarjeta = $_POST['numeroTarjeta'];
            $vencimiento = $_POST['vencimiento'];
            $cvv = $_POST['cvv'];
            // datos del formulario del cliente 
            $idCliente = $_SESSION['idCliente'];
            // forma de pago para la factura
            $MetodoPago = "1";
            // datos de los productos dentro del carrito para los detalles de la factura 
            if (isset($_POST['productos'])) {
                $productos = $_POST['productos'];
                // Recorrer todos los productos
            }

            // URL del Servlet
            $url = 'http://localhost:8090/Proyecto/procesarPago';

            // Datos del pago a enviar al Servlet
            $data = array(
                'nombre' => $nombre,
                'numeroTarjeta' => $numeroTarjeta,
                'vencimiento' => $vencimiento,
                'cvv' => $cvv
            );

            // Iniciar cURL
            $ch = curl_init($url);

            // Configuración de la solicitud cURL
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            // Ejecutar la solicitud y obtener la respuesta
            $response = curl_exec($ch);

            // Cerrar cURL
            curl_close($ch);

            // Decodificar la respuesta JSON
            $jsonResponse = json_decode($response, true);

            // Verificar el estado del pago
            if ($jsonResponse['paymentStatus'] == 'true') {

                $addfactura->inFactura($MetodoPago, $idCliente);
                if ($addfactura == true) {
                    $addfactura->indetalles($productos);
                }

                if ($addfactura == false) {
                    $tarjetaEnmascarada = '**** **** **** ' . substr($numeroTarjeta, -4);

                    header("Location: ?action=paymentsuces&tarjeta=' . $tarjetaEnmascarada");
                } else {
                    echo "<h3>Aaaaaalgoo malo paso</h3>";

                }
            } else {
                echo "Pago fallido. " . (isset($jsonResponse['error']) ? $jsonResponse['error'] : "Verifica la información.");
            }
        }
        echo "<h1>hay algo malo muuuy malo</h1>";
    }

}
?>