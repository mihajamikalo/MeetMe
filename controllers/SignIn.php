<?php

defined("SECURE_ACCESS") or require '../view/registration/error.php';

error_reporting(-1);
ini_set('display_errors', 0); 

//calling all necessary utility


require_once './controllers/route.php';

//starting session to add the credential instead session



//getting all input by user with post

    $sex = $_POST['gender'];

    $targetSex = $_POST['searchGender'];

    $userName = $_POST['pseudo'];

    $birth = $_POST['birth'];

    $email = $_POST['email'];

    $about = $_POST['about'];

    $company = $_POST['company'];

    $job = $_POST['job'];

    $state = $_POST['state'];

    $adress = $_POST['adress'];

    $phone = $_POST['phone'];

    $password = $_POST['code'];

    $reconPassword = $_POST['Rcode'];


    //get image submitted info

    $file_name = $_FILES['profileImage'] ['name'];
     
    $temp_name = $_FILES['profileImage'] ['tmp_name'];

    //folder to store the image

    $folder = 'ressources/users_picture/'.$file_name;

  

try{

    //checking if the server request method == post

        if($_SERVER['REQUEST_METHOD'] == "POST"){

            //code executed if server request == post

        try{

        $conn = Database::connection();

        }catch(Exception $error){

            Redirection::redirect('/','<div class="alert alert-danger">Une erreur de database a ete encontre</div>');
            
            exit();
        };

            //checking if the email inputted by user is not already taken

            $isUnique = mysqli_query($conn,"SELECT * FROM user WHERE email = '$email'") ;

            //code to be executed if email is already used

                if($isUnique->num_rows == 1){

            $info = '<center> <div class="alert alert-danger">Email already used</div> </center>';
            

        }
      
        //code executed if email is not already used

    else{

            //checking if the password typed is same ase the confirmation password

            if($password == $reconPassword){

            //code to been executed if password is well typed
                    
            //recording data to the database

            password_hash($password, PASSWORD_BCRYPT);

    
                    $add = mysqli_query($conn, "INSERT INTO user (sex,target,name,birthday,email,About,Company,Job,Country,Adress,Phone,password,profileImage) VALUES ('$sex', '$targetSex', '$userName', '$birth', '$email', '$about' , '$company' , '$job' , '$state' , '$adress' , '$phone' ,'$password', '$file_name' ) ");
                    
                    $date = getdate() ;

                    $today = $date['mday']."/".$date["mon"]."/".$date['year'];

                    mysqli_query($conn,"INSERT INTO notifications (Email,value,Titre) VALUES ('$email','Your account has created in $today','Account creation' )");
                //moving the uploaded picture to specified folder

                    move_uploaded_file($temp_name,$folder);

                //insertion of data into session
                    
                    $_SESSION['registred'] = true ;
        
                    $_SESSION['userName'] = $email;
                    

                //checking if there is an error with the database and data is not inserted
                     
                    if(!$add){
        
                        $info = '<center> <div class="alert alert-danger">An internal error occured, please try again later</div> </center>';

                    //code executed if the data is successfully inserted
         
                    }else{
                            $info = '<center> <div class="alert alert-success">SignIn with succes, you will be redirected shortly</div> </center>';
                    }

                

            //checkin if 2 password is mismatched

            }else{

                $info = '<center> <div class="alert alert-danger">Please match 2 password</div> </center>';

            };

        }

            //code executed if the server request methode is != post

    }else{

        require 'view/registration/error.php';
        exit();
    }

    //return error if there is any error not handled

}catch(Error $e){

    header('Location: /error');
//require './view/registration/error.php';
    exit();
   
  
    //and the code to be executed anyway

}finally{

    require './view/registration/SignIn.php';

}

