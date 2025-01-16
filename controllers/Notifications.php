<?php

defined("SECURE_ACCESS") or require '../view/registration/error.php';

error_reporting(-1);
ini_set('display_errors', 0); 


require_once './controllers/route.php';
require_once './models/get_notifications.php';



$currentUser = $_SESSION['userName'];

    try{
        if(!isset($currentUser)){

            Redirection::redirect('/login','<center> <div class="alert alert-danger">Please login first</div> </center>');

        }else{
                
                Redirection::root('registration/Notifications');
        }
    }catch(Exception $e){
        echo $e;
    }
