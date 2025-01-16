<?php 

require_once 'index.php';

require_once './controllers/route.php';


require_once './controllers/login.php';


require_once './https/settings.php';

require_once './controllers/click.php';

require_once './controllers/secure.php';

require_once './https/web.php';

$value = new Route();
new Redirection;


$main = urldecode($_SERVER['REQUEST_URI']) ;

$ret = explode("/",$main);

$route = $ret[2];


/*
pagination::get('/login','./view/registration/login.php');
pagination::post('/verify','./controllers/validation.php');
*/

setcookie("secure",true,time()+60*60*24*30,"/");

$lenght = count($ret);



  switch($route){

    
   /* case($lenght == 4);
    $value->error();
    break;
    */
    
    case($route == '/');
        
        Route::index();
        break;

    case($route == 'login');
        Route::login();
        break; 
    
    case($route == 'profile');
        Route::profile();
        break;

    case ( $route == 'validate' && $_SERVER['REQUEST_METHOD'] == "POST" );
        require './controllers/SignIn.php';
        break;

    case($route == 'verify' && $_SERVER['REQUEST_METHOD'] == "POST");
        require './controllers/validation.php';
        break; 

    case($route == 'destroy');
        
        $isLoged = $_SESSION['registred'];

        if($isLoged == false){

            $value->error();
            
        }else{

            Redirection::redirect('login',' <center> <div class="alert alert-success" role="alert"> LogOut succesffully</div> </center>');
            $_SESSION['registred'] = false;

            $_SESSION['userName'] = null;
            
        }

        
        break;

        case($route == 'getInfo');

        require './controllers/aboutNotification.php';
        
        break;

        case($route == 'edit' && $_SERVER['REQUEST_METHOD'] == "POST" );
        require './controllers/EditProfil.php';
        break;

        case($route == 'notification' );
        require './controllers/Notifications.php';
        break;


        case($route == 'UpdatePassword' && $_SERVER['REQUEST_METHOD'] == "POST");
        require './controllers/ChangePassword.php';
        break;

        case($route == "package.json" );
        $value->error();
        break;

        
        case($route == "api" );
        header("Content-Type:JSON");
        require './SERVER/user.php';
        break;

        case($route == "SERVER/log.txt");

            $value->error();
            break;

        case ($route == "test");
        require "./testView/index.php";
        break;


          
        


    default:

       /* $data = "meetMeIsUnique";
       $uniqueId = md5($data);
        echo uniqid($uniqueId,true);
        */
    //$value->error();

   /* $str = "Hello";
    echo md5($str);*/
      /* $tt = password_hash($route,PASSWORD_DEFAULT);

       echo $tt;

       $data = '$2y$10$C5CUPXxl3LqR7txeQ6maguz.28noYvNvcMwUyZkmhU.eaeAWYRiQm';

      var_dump(password_verify($data,$tt)) ;
     $name = getenv("APP_KEY");
     var_dump($name);*/

    // var_dump($ret);

    $value->error();

  }


 

    