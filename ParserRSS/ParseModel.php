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

    public static function getFlux(){
        global $dsn,$name,$mdp;
        $ng = new NewsGateway(new Connexion($dsn,$name,$mdp));
        return $data=$ng->findFlux();
    }

    public static function newsExist($url){
        global $dsn,$name,$mdp;
        $ng = new NewsGateway(new Connexion($dsn,$name,$mdp));
        return $data=$ng->exist($url);
    }

    public static function insert_News($lien,$titre,$date,$description,$categorie)
    {
        global $dsn,$name,$mdp;
        $ng= new NewsGateway(new Connexion($dsn,$name,$mdp));
        $data=$ng->insert($lien,$titre,$date,$description,$categorie);
        if($data!=null) echo'Insertion réussi';
        else echo'Insertion échouée';
    }

}