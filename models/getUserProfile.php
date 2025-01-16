<?php


class Profile {

    

    public function image (){
        
        $userInfo = $_SESSION['userName'];

        $fetch = Database::execute( "SELECT profileImage  FROM user WHERE email = '$userInfo'" );

        $data = mysqli_fetch_assoc($fetch);

        echo $data['profileImage'];

    }
    public static function name (){

        $userInfo = $_SESSION['userName'];

        $fetch = Database::execute("SELECT name  FROM user WHERE email =  '$userInfo'");

        $data = mysqli_fetch_assoc($fetch);

        echo htmlspecialchars($data['name']);
    }

    public static function About (){

        $userInfo = $_SESSION['userName'];

        $fetch = Database::execute("SELECT About  FROM user WHERE email = '$userInfo'");

        $data = mysqli_fetch_assoc($fetch);

        echo htmlspecialchars($data['About']);


    }

    public static function Company (){

        $userInfo = $_SESSION['userName'];

        $fetch = Database::execute("SELECT Company  FROM user WHERE email = '$userInfo'");

        $data = mysqli_fetch_assoc($fetch);

        echo htmlspecialchars($data['Company']) ;
    }

    public static function Job (){

        $userInfo = $_SESSION['userName'];

        $fetch = Database::execute("SELECT Job  FROM user WHERE email = '$userInfo'" );

        $data = mysqli_fetch_assoc($fetch);

        echo htmlspecialchars($data['Job']);
    }

    public static function Country (){

        $userInfo = $_SESSION['userName'];

        $fetch = Database::execute("SELECT Country  FROM user WHERE email = '$userInfo'" );

        $data = mysqli_fetch_assoc($fetch);

        echo htmlspecialchars($data['Country']);
    }

    public static function Adress (){

        $userInfo = $_SESSION['userName'];

        $fetch = Database::execute( "SELECT Adress  FROM user WHERE email = '$userInfo'" );

        $data = mysqli_fetch_assoc($fetch);

        echo  htmlspecialchars($data['Adress']);
    }

    public static function Phone (){

        $userInfo = $_SESSION['userName'];

        $fetch = Database::execute("SELECT Phone  FROM user WHERE email = '$userInfo'");

        $data = mysqli_fetch_assoc($fetch);

        echo htmlspecialchars($data['Phone']) ;
    }

}