<?php 

require_once './controllers/route.php';

require_once './controllers/secure.php';

$User = $_POST['fullName'];

$about = $_POST['about'];

$company = $_POST['company'];

$job = $_POST['job'];

$country = $_POST['country'];

$adress = $_POST['address'];

$phone = $_POST['phone'];

$email = $_POST['email'];

$currentUser = $_SESSION['userName'];


try{ 

       /* if(!Controlle::Allowed($about)){
            Redirection::redirect('/profile', '<center> <div class="alert alert-danger" role="alert">Special Char not allowed</div> </center>');
            exit();
        }
            */

    $executed = Database::execute("UPDATE user SET name='$User',About='$about',Company='$company',Job='$job',Country='$country',Adress='$adress',Phone='$phone',email='$email'  WHERE email = '$currentUser' ");

    if($executed){

        Redirection::redirect('profile', '<center> <div class="alert alert-success" role="alert"> Profil info updated with success</div> </center>');

    }else{

        Redirection::redirect('profile', '<center> <div class="alert alert-danger" role="alert">A Error has encoured</div> </center>');
    }

}catch(Exception $e){
    error_log($e,3,'./SERVER/log.txt');
    Redirection::redirect('profile', '<center> <div class="alert alert-danger" role="alert">A Error has encoured</div> </center>');
    
};