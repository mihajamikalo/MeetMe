<?php

defined("SECURE_ACCESS") or require '../view/registration/error.php';

error_reporting(-1);
ini_set('display_errors', 0); 



class Redirection{

    
    public static function redirect($cible ,$flashData = null){
       
        $_SESSION["flashdata"] = $flashData;
        header(header: "Location: $cible");
      
        
        
    }
    public static function root($path){
        
        require "./view/$path.php";
    }
}