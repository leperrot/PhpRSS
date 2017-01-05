<?php

/**
 * Created by PhpStorm.
 * User: bagandboeu
 * Date: 04/01/17
 * Time: 15:09
 */

include_once ('Config.php');
include_once ('Autoloader.php');
include_once ('Connexion.php');

class ParseModel
{

    public static function newsExist($url){
        global $dsn,$name,$mdp;
        $ng = new NewsGateway(new Connexion($dsn,$name,$mdp));
        return $data=$ng->exist($url);
    }

}