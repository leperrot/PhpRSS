<?php

require_once ('Config/Config.php');
require_once ('Config/Autoloader.php');
Autoloader::charger();

session_start();
if(strcmp($_SESSION['role'],'admin')==0)
    $adm=true;
else {
    $_SESSION['role']='user';
    $adm=false;
}

$usr=new FrontController();

?>