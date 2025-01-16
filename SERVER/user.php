<?php

try{

    $conn = Database::connection();

}catch(Exception $error){

    $err = array("status" => 500, "message" => "Can't connect to the database right now.","debug" => "Please verify the database connection, maybe the credential was wrong");
    $data = json_encode($err,JSON_PRETTY_PRINT);
    header("Content-Type:JSON");
    header("X-Powered-By:MeetMe");
    http_response_code(500);
    echo $data;
    exit();

}


$fetch = Database::execute("SELECT *  FROM `user`");


$notifications = $fetch->fetch_all(MYSQLI_ASSOC);

 

header("Content-Type:JSON");
header("Access-Control-Allow-Origin: *");
header("X-Powered-By:MeetMe");



$message = array("Status" => 200, "message" => "Acces authorized" , "data" => $notifications);
$retur =  json_encode($message,JSON_PRETTY_PRINT);
//$responsee = json_encode($notifications,JSON_PRETTY_PRINT);

echo $retur;

///var_dump($notifications);