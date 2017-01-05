<?php

require_once ('Config/Config.php');
require_once ('Config/Autoloader.php');
Autoloader::charger();

session_start();

$usr=new FrontController();

?>