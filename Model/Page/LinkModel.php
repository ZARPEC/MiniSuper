<?php
namespace Model\Page;

class LinkModel{

    public static function LinkModel($Link){
        
        $GeLink = match($Link){
            "home" => "View/pages/home.php",
            "homeUser" => "view/user/homeU.php",
            "login" => "View/user/login.php",
            "signUp" => "View/user/SignUp.php",
            "logout" => "View/user/logout.php",
            "products" => "View/Product/ProductList.php",
            "shopCart" => "View/Product/ShopCart.php",
            "paymentsuces" => "View/pages/paymentSuccess.php",
            default => "View/pages/error.php"
        };
        return $GeLink;
    }
}
