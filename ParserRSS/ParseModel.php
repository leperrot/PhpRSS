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
    private $ng;

    public function __construct()
    {
        global $dsn,$name,$mdp;
        $this->ng = new NewsGateway(new Connexion($dsn, $name, $mdp));
    }

    public function getFlux(){

        return $data=$this->ng->findFlux();
    }

    public function newsExist($url){
        return $data=$this->ng->exist($url);
    }

    public function insert_News($lien,$titre,$date,$description,$categorie)
    {
        if(strlen($description)>250){
            $description=mb_strimwidth($description, 0, 100, "...");
        }
        $data = $this->ng->insert($lien, $titre, $date, $description, $categorie);
        if($data!=null) echo'Insertion réussi <br/>';
        else echo'Insertion échouée';
    }

}