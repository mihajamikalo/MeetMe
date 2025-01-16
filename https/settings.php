<?php

    class pagination{
   

        public static function get($route,$action){
            $route = $_SERVER['REQUEST_URI'];
            if($_SERVER['REQUEST_METHOD'] == 'GET' ){
                if($route){
                    require $action;
                    exit();
                }else{
                    require 'view/registration/error.php';
                };
            };
        }

        public static function post($route,$action)
{
    if($_SERVER['REQUEST_METHOD'] == 'POST' ){
        $route = $_SERVER['REQUEST_URI'];
            require $action;
            exit();
       
            
    }else{
        require 'view/registration/error.php';
    }

        }

    };
