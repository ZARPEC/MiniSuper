<?php
namespace Controller\CategoryController;

class Category
{

    public function showCategoryC()
    {

        $Cat = Category::ShowCategory();
        return $Cat;
    }

}

?>