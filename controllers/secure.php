<?php

defined("SECURE_ACCESS") or require '../view/registration/error.php';

error_reporting(-1);
ini_set('display_errors', 0); 

class Controlle{
    public static function Allowed($target){
        $notAllowed = '/<>{_#=]}/';
        if(preg_match($notAllowed,$target)){

            return true;

        }else{
            return false;
        };
    }

    public static function makeSecure(array $targets) {
        $sanitized = [];
        
        foreach ($targets as $target) {
            if (isset($_POST[$target])) {
                // Récupère et nettoie la valeur
                $value = $_POST[$target];
                $sanitized[$target] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
            }
        }
        
        return $sanitized; // Retourne un tableau des valeurs sécurisées
    }
        
    }
