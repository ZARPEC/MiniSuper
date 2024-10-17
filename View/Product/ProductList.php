<?php
use Controller\CategoryController\Category;
use Controller\ProductController\ProductC;
$controllerProd = new ProductC();
$categoryController = new Category;
$categories = $categoryController->showCategoryC();
$SubCategories = $categoryController->showSubCategoryC();
$totalSubC = count($SubCategories);
$CategoryGet = $_GET['category'];
$first = true;

$blockSize = 5;

$blockSizeProd = 3;
$produ = $controllerProd->ShowProduct();
$totalProd = count($produ);

?>

<style>
    .category-circle {
        width: 100px;
        height: 100px;
        background-color: #17A2B8;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 auto;
    }

    .category-circle img {
        width: 60px;
        height: auto;
    }

    .category-text {
        text-align: center;
        font-size: 14px;
    }

    .custom-prev,
    .custom-next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 50px;
        height: 50px;
        background-color: rgba(0, 0, 0, 0.5);
        /* Fondo semitransparente */
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .custom-prev {
        left: -60px;
        /* Ajusta esta distancia para separar la flecha del primer elemento */
    }

    .custom-next {
        right: -60px;
        /* Ajusta esta distancia para separar la flecha del último elemento */
    }

    .custom-prev:hover,
    .custom-next:hover {
        background-color: rgba(0, 0, 0, 0.8);
        /* Color más oscuro al pasar el mouse */
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        width: 20px;
        height: 20px;
    }

    .hover-effect {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hover-effect:hover {
        transform: translateY(-10px);
        /* Eleva la tarjeta hacia arriba */
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        /* Añade una sombra */
        cursor: pointer;
        /* Cambia el cursor a pointer para indicar que es clickeable */
    }
</style>
<div id="MainProducL">
    <div class="container containerCat mt-5">
        <div class="row listCat">
            <!-- Sidebar de categorías -->
            <div class="">
                <h5>Categorías</h5>
                <ul class="list-group">
                    <?php
                    if (!empty($categories)) {
                        foreach ($categories as $category) {
                            echo "<li class='list-group-item'>
                                    <a href='?action=products&category={$category['Categoria']}'>{$category['Categoria']}</a></li>";
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <div id="containerSubC">
        <div class="container mt-5" style="width:90%; height:85%;">
            <h2 class="mb-4"><?php echo "{$CategoryGet}"; ?></h2>
            <div id="categoryCarousel" class="carousel slide" data-bs-ride="carouse">
                <div class="carousel-inner">
                    <?php
                    for ($i = 0; $i < $totalSubC; $i += $blockSize) {
                        if ($first == true) {
                            echo "<div class='carousel-item active' style='background-color: #ffffff00';>";
                            $first = false;
                        } else {
                            echo "<div class='carousel-item' style='background-color: #ffffff00';>";
                        }
                        echo "<div class='row'>";
                        for ($j = $i; $j < $i + $blockSize && $j < $totalSubC; $j++) {
                            echo "
                                
                                <div class='col text-center'>
                                    <div class='col rounded'>
                                        <a href='?action=products&category={$CategoryGet}&SubCat={$SubCategories[$j]['Nsubcategoria']}' >
                                        <div class='category-circle'>
                                            <img src='Assets/Img/Category/SubCategory/{$CategoryGet}/{$SubCategories[$j]['Nsubcategoria']}.png' alt='Subcategoría'>
                                        </div>
                                        </a>
                                        <p class='category-text'>{$SubCategories[$j]['Nsubcategoria']}</p>
                                    </div>
                                </div>
                                ";
                        }
                        echo "</div>"; // Cierra el row
                        echo "</div>"; // Cierra el carousel-item
                    }
                    ?>
                </div>
                <!-- Controles de carrusel -->
                <button class="carousel-control-prev custom-prev" type="button" data-bs-target="#categoryCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next custom-next" type="button" data-bs-target="#categoryCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        </div>
    </div>

    <div id="containerProd">
        <div class="Product">
            <?php
            for ($i = 0; $i < $totalProd; $i += $blockSizeProd) {
                echo "<div class='row justify-content-center p-2'>";
                for ($j = $i; $j < $i + $blockSizeProd && $j < $totalProd; $j++) {
                    echo "
                                    <div class='col-md-4 mb-4'>
                                    <a href='?action=ProductView&idProduct={$produ[$j]['idProducto']}' class='card-link' style='text-decoration: none; color: inherit;'>
                                        <div class='card hover-effect'>
                                            <img src='Assets/Img/Category/SubCategory/{$CategoryGet}/Products/{$produ[$j]['Nsubcategoria']}.png' class='card-img-top' alt='Producto 1'>
                                            <div class='card-body text-center'>
                                                <h5 class='card-title'>{$produ[$j]['NombreProd']}</h5>
                                                <p class='card-text'>{$produ[$j]['CantMedida']} {$produ[$j]['UNIDADMEDIDA']}</p>
                                                <p class='card-text'>Q{$produ[$j]['precio']}</p>
                                                <a href='#' class='btn btn-primary'onclick='agregarAlCarrito({\"id\": {$produ[$j]['idProducto']},precio: {$produ[$j]['precio']},\"nombre\": \"{$produ[$j]['NombreProd']}\", \"cantidad\": 1});'>añadir al carrito</a>
                                            </div>
                                        </div>
                                    </a>
                                    </div>
                                   ";
                }
                echo "</div>";
            }
            $SubCategoryGet = null;
            ?>


        </div>
    </div>
</div>