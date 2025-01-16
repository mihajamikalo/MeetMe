<?php 

require_once './models/database_connect.php';


class Notification {

        public static function fetch($info){

            $conn = Database::connection();
    
            $fetch = mysqli_query($conn, "SELECT Email,value,Titre,Date  FROM `notifications` WHERE email = '$info'" );

            if($fetch->num_rows > 1){
                
                mysqli_fetch_assoc($fetch);

            }
    
          
    
        }

}