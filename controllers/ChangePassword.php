<?php



try{
    error_reporting(-1);
    ini_set('display_errors', 0);


require_once './controllers/route.php';


//Collecting data from input 

        $password = $_POST['CurrentPassword'];

        $NewPassword = $_POST['newpassword'];

        $renew = $_POST['renewpassword'];

 //verify the email of current logged user by checking with the recorded user in the session

        $currentUser = $_SESSION['userName'];

//Query to been executed to the database

        $fetch = Database::execute("SELECT password FROM user Where email = '$currentUser'");

//execute Query and get the result and return result as array

$data = mysqli_fetch_array($fetch);

    //get the user current password returned from the database instead of the array

$currentPassword = $data['password'];

    //verification if the current user known the current password

if($currentPassword == $password){

         //code to be executed if the user know the current password recorded to the database
        //checking if the new password typed is match with the confirmation password

        
    if($NewPassword == $renew ){

        //code executed if all necessary safety check is true

        if($currentPassword == $NewPassword){

            Redirection::redirect('profile', '<center> <div class="alert alert-warning" role="alert"> Your new password can not be same as the old password </div> </center>');
            die();

        };

            Database::execute( "UPDATE user SET password = '$NewPassword' WHERE email = '$currentUser' " );

            $date = getdate();

            $today = $date['mday']."/".$date["mon"]."/".$date['year'];

            $source = $_SERVER['HTTP_USER_AGENT'];

            Database::execute("INSERT INTO notifications (Email,value,source,Titre) VALUES ('$currentUser','Your password have been updated in $today , Thank you','$source','Password changed')");

        //redirection to dashboard with message success or error

            Redirection::redirect('profile', '<center> <div class="alert alert-success" role="alert"> Password changed succesffully</div> </center>');

    }else{

        //redirected to the dashboard with fail if reconfirmation password has error

        Redirection::redirect('profile', '<center> <div class="alert alert-danger" role="alert"> Please match 2 password</div> </center>');

    };

}else{

    //redirection to the dashboard with fail "WRONG PASSWORD" if the current password inputted by user is not equal as the recorded in the database

    Redirection::redirect('profile', '<center> <div class="alert alert-danger" role="alert"> Wrong password</div> </center>');

}
}
catch(Error $err){

    require '../view/registration/error.php';
    exit();
}