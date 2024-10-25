<?php
// Configurar las cabeceras para que el navegador reconozca la respuesta como JSON
header('Content-Type: application/json');
require_once 'autoload.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');



// Incluir el controlador y modelo necesario

use Controller\ProductController\ProductC;

// Crear una instancia del controlador
$productController = new ProductC();

// Verificar el tipo de solicitud
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Verificar si se pasó una categoría por parámetros
    if (isset($_GET['category'])) {
        // Obtener los productos filtrados por categoría y, opcionalmente, subcategoría
        $category = $_GET['category'];
        $subCategory = $_GET['SubCat'] ?? null; // Si no se pasa subcategoría, será null
        $products = $productController->ShowProduct();
    } else {
        header('Content-Type: application/json');
        // Obtener todos los productos
        $products = $productController->ShowAllProduct();
    }

    // Devolver los productos en formato JSON
    echo json_encode($products);
} else {
    header('Content-Type: application/json');
    // En caso de que el método no sea GET, devolver un mensaje de error
    echo json_encode([
        'error' => 'Método no permitido. Solo se permiten solicitudes GET.'
    ]);
}
?>