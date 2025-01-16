<?php 

defined("SECURE_ACCESS") or require '../view/registration/error.php';

error_reporting(-1);
ini_set('display_errors', 0); 


$userInfo = $_SESSION['userName'];

$notificationId = $_POST['notificationId'];

if(!isset($userInfo)){

    Redirection::redirect('login','<center> <div class="alert alert-danger" role="alert">Please login first ! </center>');

};

if($_SERVER['REQUEST_METHOD'] != "POST" ){

    Redirection::redirect('error');

}

try{

    Database::connection();

}catch(ErrorException ){

        Redirection::redirect('','<center> <div class="alert alert-danger" role="alert">Several error has encoured</center>');

}

$fetch = Database::execute("SELECT Titre,value,source FROM `notifications` WHERE id = $notificationId ");

$data = mysqli_fetch_array($fetch);

require './testView/index.php';


