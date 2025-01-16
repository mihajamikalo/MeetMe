

<?php 


 defined("SECURE_ACCESS") or header("Location: /error");
        
        error_reporting(-1);
		ini_set('display_errors', 0); 


    $notification = $_SESSION['flashdata'];

   

require './view/header.php';

?>


<body>
    <header>
        <h1>GossipLove</h1>
    </header>
    <div class="information">
        <form action="verify" method = 'post'>
            <div class="title">
                <h2>connexion</h2>
            </div>
            <br>
           
            <?php flashData::show()?>
         
            <div class="log">
                <div class="log_enter">
                    <input type="email" name="email" placeholder="entrez votre email"><br>
                </div>
                <div class="log_enter">
                    <input type="password" name="password" placeholder="Vôtre mot de passe"><br>
                </div>

            </div>
            <div class="cookie">
                <input type="checkbox" id="approve" name="hacktype" checked>
                <label for="approve">se souvenir de moi</label><br>
            </div>
            <button type="submit">connexion</button>
            <div class="note">
                <p>vous n'avez pas encore de compte ? <a href="./">S'inscrire</a></p>
            </div>
        </form>
    </div>
</body>

</html>
<?php 

?>