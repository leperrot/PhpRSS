<?php

require_once (__DIR__.'/Config/Config.php');
require_once (__DIR__.'/Config/Autoloader.php');
Autoloader::charger();

session_start();

$usr=new FrontController();

?>