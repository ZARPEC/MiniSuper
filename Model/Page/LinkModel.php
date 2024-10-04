<?php
namespace Model\Page;

class LinkModel{

    public static function LinkModel($Link){
        
        $GeLink = match($Link){
            "home" => "View/pages/home.php",
            "homeUser" => "view/user/homeU.php",
            "login" => "View/user/login.php",
            "signUp" => "View/user/SignUp.php",
            default => "View/pages/error.php"

        };
        return $GeLink;
    }
}
