<?php
namespace Model\Page;

class LinkModel{

    public static function LinkModel($Link){
        
        $GeLink = match($Link){
            "inicio" => "View/user/homeU.php",
            "login" => "View/login.php",
            default => "View/pages/error.php"

        };
        return $GeLink;
    }
}
