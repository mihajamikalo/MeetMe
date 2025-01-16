<?php

session_start();

$_SESSION['Secure'] = true;

error_reporting(-1);
ini_set('display_errors', 0); 

ini_set('log_errors',1);

ini_set('error_log','./SERVER/log.txt');

try{
    define('SECURE_ACCESS', true);
}catch(Exception $notAllowed){
    error_log("Tentative de piratage".$notAllowed,3,'./SERVER/log.txt');
    require './view/registration/error.php';
    exit();
};





require_once './controllers/route.php';


require_once './controllers/login.php';


require_once './https/settings.php';

require_once './controllers/click.php';

require_once './controllers/secure.php';

require_once './controllers/flashData.php';

require_once './https/web.php';

//require_once './https/web.php';


