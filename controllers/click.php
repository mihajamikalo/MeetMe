<?php
require './models/database_connect.php';

class Click{
    public static function clicked(){

        try{
            $connected = Database::connection();
        }catch(Exception $database){
            Redirection::redirect('/','<div class="alert alert-danger">Une erreur de database a ete encontre</div>');
            exit();
        };
        

        $now = mysqli_query($connected, "SELECT click FROM clicknombre");

        $data = mysqli_fetch_assoc($now);

        $renew = $data['click'];

        $renew++;

        mysqli_query($connected,"UPDATE clicknombre SET click = '$renew'");

    }
}

