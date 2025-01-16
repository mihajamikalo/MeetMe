<?php

defined("SECURE_ACCESS") or require '../view/registration/error.php';

error_reporting(-1);
ini_set('display_errors', 0); 

require_once './controllers/route.php';


class Route {

        public static function error(){
           
            Redirection::root("registration/error");
        }

            public static function index(): void
            {
                $isLoged = $_SESSION['registred'];

                if($isLoged){
                    Redirection::redirect('profile');
                }else{
                    //Click::clicked();
                    Redirection::root('registration/SignIn');
                }
            }

           public static function login(){

           error_reporting(-1);

            ini_set('display_errors', 0);
            
           
                $isLoged = $_SESSION['registred'];

                if($isLoged){

                    Redirection::redirect('profile','<center> <div class="alert alert-primary" role="alert"> You are already loged in !</div> </center> ');

                }else{
                    Redirection::root("/registration/login");
                }
                
            }
        public static function profile(){
      
                    $connected = $_SESSION['registred'];
       
                if($connected){

                    Redirection::root('profile');
                    
                }else{

                     Redirection::redirect('login','<center> <div class="alert alert-danger">Please login first</div> </center>');
                     
                    // http_response_code(400);
                }
                
            }


            public static function verification(){
                require './controllers/login.php';
             }
}