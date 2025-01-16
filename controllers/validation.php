<?php

defined("SECURE_ACCESS") or require '../view/registration/error.php';




//Calling the models to connect to the database

error_reporting(-1);
ini_set('display_errors', 0);
require_once './controllers/route.php';

$connect = new database;

$attempt = $_SESSION['attempt'] = 0;

$account = $_SESSION['acount'] = $nameUser;

//end calling;


//Verification of the credential entered by user

if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
    
    //Block of code to executed when the connexion method is post 

    $nameUser = $_POST['email'];
    $pass = $_POST['password'];

    if($attempt == 3){

        Database::execute("UPDATE user SET Acces = 'false' WHERE email=$account");

        Redirection::redirect('login','<center> <div class="alert alert-danger">Your account have been locked , please verify.</div> </center>');
        
}

    if($nameUser == null || $pass == null){
        Redirection::redirect('login','<center> <div class="alert alert-danger">All field are required !</div> </center>');
        exit();
    };


    try{

         $conn = Database::connection();

    }catch(Exception $error){

        Redirection::redirect('login','<center> <div class="alert alert-danger">An error occured, please try again later.</div> </center>');
        exit();
    }
   
       
    // checking if the user existed in the database

    $sql = "SELECT * FROM user WHERE email = '$nameUser'  AND password = '$pass'";
    $result = $conn->query($sql);

    //code executed if the user account exist in the database

    if($result->num_rows == 1){

        //insering data session so the user acced to the dashboard

     
        $_SESSION['registred'] = true;
        $_SESSION['userName'] = $nameUser;
        
        //redirection the user to the dashboard

        header('Location: profile');
        
        //code to be executed if  the login has an error

    }else{

        // Error message to return to the user

        $attempt++;

        $_SESSION['acount'] = $nameUser;

        Redirection::redirect('login','<center> <div class="alert alert-danger">Wrong credential</div> </center>');
       
    }

}
    
else{
    
    header("Location: login");
    http_response_code(404);
    //require 'view/registration/login.php';
}
    