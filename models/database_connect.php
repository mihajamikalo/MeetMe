<?php

Class Database{
    
    public static function connection(){
        try{
            $db_server = "localhost";
            $db_user = "root";
            $db_pass = "";
            $db_name = "meetMe";
             $data = new mysqli($db_server,$db_user,$db_pass,$db_name);
             return $data;
            
        }catch(Exception $databaseError){

           /* $date = getdate();

            $now = $date['mday']."/".$date["mon"]."/".$date['year'];

            error_log("[$now] : .''.Tentative de piratage".$databaseError,3,'./SERVER/log.txt');
            */
            throw new ErrorException("Error during cnnection to the database");
            
            
            //Route::index();
        }
    
    }

    public static function execute($query){

        /** 
        *@param string $query  Query to been executed to the database 
        *
        *
        *
        */

        $connect = Database::connection();

        $execute = mysqli_query($connect,$query);

        return $execute;
    }

};