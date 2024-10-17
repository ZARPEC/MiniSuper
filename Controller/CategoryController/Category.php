<?php
namespace Controller\CategoryController;
use Model\CategoryModel\CategoryM;

class Category
{

    public function showCategoryC()
    {

        $Cat = CategoryM::ShowCategory(); 
        return $Cat;
    }

    public function showSubCategoryC()
    {
        $CategoryGet = $_GET['category'];
        if (isset($_GET['SubCat'])) {
            $SubCategoryGet = $_GET['SubCat'];
        } else {
            $SubCategoryGet = null;

        }
        $Sub = CategoryM::ShowSubCategory($CategoryGet, $SubCategoryGet);
        return $Sub;
    }

}

?>