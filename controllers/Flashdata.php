<?php 

class flashData{

    public static function show(){

        $notifications = $_SESSION['flashdata'];

        echo $notifications;

        $_SESSION['flashdata'] = null;
        
    }
}