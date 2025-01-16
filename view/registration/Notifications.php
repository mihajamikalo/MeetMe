<?php 



require_once './models/get_notifications.php';



$currentUser = $_SESSION['userName'];

try{
  $conn = Database::connection();

  $fetch = mysqli_query($conn, "SELECT *  FROM `notifications` WHERE email = '$currentUser'" );
  
  $notifications = $fetch->fetch_all(MYSQLI_ASSOC);
}catch(Exception $err){
      Redirection::redirect('/profile','<center> <div class="alert alert-danger">Please login first</div> </center>');
}





?>


<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="Tiavina Liantsoa">

    <title>Fly party</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" href="/envelope.svg" type="image/x-icon">

    <link type="text/css" rel="stylesheet" href="./ressources/css/bootstrap.min.css" />
	<link type="text/css" rel="stylesheet" href="./ressources/css/bootstrap.css" />
	<link rel="stylesheet" href="../ressources/css/remixicon.css">
	<link type="text/css" rel="stylesheet" href="./ressources/css/slick.css" />
	<link type="text/css" rel="stylesheet" href="./ressources/css/slick-theme.css" />
	<link type="text/css" rel="stylesheet" href="./ressources/css/nouislider.min.css" />
	<link rel="stylesheet" href="./ressources/css/font-awesome.min.css">
	<link type="text/css" rel="stylesheet" href="./ressources/css/style.css" />


    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link href="css/templatemo-festava-live.css" rel="stylesheet">
  

</head>
<style>
  
  .table-dark{
    border-radius: 10px;
  }
  h5{
    border: 2px dashed;
    margin: 3px;
  box-sizing:inherit;
  margin-right: 25%;
  margin-left: 25%;
  border-color: chocolate;
  color: aliceblue;
  
  }
  .table{
    margin-top: 5%;
  }
  h1.header{
    color: rgb(237, 214, 40);
    margin: 3px;
  }
  .message{
    margin-right: 50%; 
    margin-left: 30%;
    border: solid;
    border-color: orange;
    border-radius: 3px;
    align-items: center;
    width: 10cm;
    align-content: center;
  }
  
  body{
    background-color: rgba(9, 9, 9, 0.815);
  }
  .card.text-center{
    background-color: rgba(33, 30, 30, 0.975);
  }
  h3{
    color: white;
  }
  h3.footer{
    color: rgb(30, 124, 196);
    font-size: 19px;
  }
 
 .card{
        background-color: rgb(214, 183, 28);
        margin: 5px;
        margin-left: 35%;
        width: 50rem;
        height: auto;
        display: flex;
 }
 .btn{
  width: 90px;
  height: 35px;
  margin: 5px;
 }
 .card-title{
  border: solid 1px;
 }
 

</style>

<body>
  <br>
  <br>
  
    <main>
      <?php foreach ($notifications as $notification) {
        ?>
        
<div class="card text-center">
    <div class="card-header">
      <h3><?php echo $notification['date'] ?></h3>
    </div>
    <div class="card-body">
      
      <h5 class="card-title" style="color: rgb(30, 133, 181)" ><?php echo $notification['Titre'] ?></h5><br>
      <p class="card-text" style="color: rgb(241, 248, 249)" ><?php echo $notification['value'] ?></p>
    <br>

    <form action="getInfo" method="POST">

    <input name="notificationId" type="text" hidden  value="<?php echo $notification['id'] ?>"> 
  
       <button type="submit" class="btn btn-info btn-sm" style="width:auto">Get full report</button>
       
    </form>
   
    
    </div>
    </div>
  
  </div>
  <br>

  <br>

    </main>
    <?php } ?>
</body>

<?php require('./view/footer.php'); ?>