<?php
namespace Controller\ProductController;
use Model\ProductModel\ProductM;

class ProductC
{

    public function ShowProduct()
    {

        $CategoryGet = $_GET['category']; //se captura el nombre de la categoria
        if (isset($_GET['SubCat'])) {// se verica si ya se selleciono una subcategoria para asignar valor de lo contrario es nulo
            $SubCategoryGet = $_GET['SubCat'];
        } else {
            $SubCategoryGet = null;

        }
        $Sub = ProductM::ShowProduct($CategoryGet, $SubCategoryGet, );
        return $Sub;
    }
}


?>