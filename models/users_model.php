<?php


class Insert{
    public static function CreateUser($sex,$target,$name,$birthday,$email,$password){
        $conn = Database::connection();
        $create = mysqli_query($conn,"Insert into User (sex,target,name,birthday,email,password) Values('$sex','$target','$name','$birthday','$email','$password')");

    }
} 