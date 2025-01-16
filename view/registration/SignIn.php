<?php 
error_reporting(-1);
ini_set('display_errors', 0); 

try{
    $notification = $_SESSION['flashdata'];

if (!isset($mess)){
    $mess = "";
};
if(!isset($info)){
    $info = "";
}
if (!isset($_SESSION['registred'])){
    $_SESSION['registred'] = false;
}
require_once './view/header.php';

}catch(Exception $error){
    require './registration/error.php';
    exit();
}


?>






<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./view/registration/style.css">
    <title>Inscription</title>
</head>
<style>
    span.error{
        background-color: #dd5353a1;
        margin: 2px,2px,2px,2px;
    }
</style>
<body>
    <center>
    <header >
        <h1 style="margin-top: 1cm;" >GossipLove</h1>
    </header>
    </center>
    <div class="information" style="margin-top: 1cm;">
        
        <form action= "validate" method="post" enctype="multipart/form-data">
            <center>
        <span class="error"><?php echo $mess ?></span> <br>
        <span class="error"><?php echo $info ?></span>
        <?php echo $notification ; $_SESSION['flashdata'] = null ?>
        </center>
            <div class="gender">
                <h4>votre sex:</h4>
                <select name="gender" id="gender">
                    <option value="female">une femme</option>
                    <option value="male">un homme</option>
                </select>
            </div>
            <div class="searchGender"><br>
                <h4>vous cherchez ? :</h4>
                <select name="searchGender" id="searchGender">
                    <option value="male">un homme</option>
                    <option value="female">une femme</option>
                    <option value="all">pas de preference</option>
                </select>
            </div>

            <div class="log">
                <div class="log_enter">
                    <input type="text" required="required" name="pseudo" placeholder="quel est votre nom ?"><br>
                </div>
                <div class="log_enter">
                    <label for="birth">votre date de naissance</label>
                    <input type="date" name="birth" id="birth"><br>
                </div>
                <div class="log_enter">
                    <input type="email" required name="email" placeholder="entrez votre email"><br>
                </div>
                
                <div class="log_enter">
                    <textarea required name="about" placeholder = "A propos de vous..."></textarea><br>
                </div>
                <div class="log_enter">
                    <input type="text" required name="company" placeholder = "Vôtre company "><br>
                </div>

                <div class="log_enter">
                    <input type="text" required name="job" placeholder = "Vôtre travail "><br>
                </div>

                <div class="log_enter">
                    <input type="text" required name="state" placeholder = "Où habité vous? "><br>
                </div>

                <div class="log_enter">
                    <input type="text" required name="adress" placeholder = "Vôtre adresse "><br>
                </div>

                <div class="log_enter">
                    <input type="text" required name="phone" placeholder = "Vôtre numéro "><br>
                </div>

                
                <div class="log_enter">
                    <input type="password" required name="code" placeholder="mot de passe"><br>
                </div>
                <div class="log_enter">
                    <input type="password" required name="Rcode" placeholder="Confirmer le mot de passe"><br>
                </div>
            </div>
            <div class="log_enter">
                    <label for="profileImage">Choisissez votre photo de profil</label>
                    <input type="file" required name="profileImage" placeholder="Confirmer le mot de passe"><br>
                </div>

            <div class="note">
                <p>vous avez deja un compte? <a href="login">connexion</a></p>
            </div>
            <button type="submit">Inscription</button>

        </form>
    </div>
</body>
<script>
    let session = <?php echo $_SESSION['registred'] ?>;
    setTimeout(() => {
        if (session !== true){
            window.location.href = "profile";
        }
    },3000
    )
</script>

</html>

