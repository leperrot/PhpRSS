<?php

/**
 * Created by PhpStorm.
 * User: bagandboeu
 * Date: 30/11/16
 * Time: 14:57
 */
include_once ('Flux.php');

class NewsGateway
{
    private $con;

    public function __construct(Connexion $con)
    {
        $this->con=$con;
    }

    public function insert($lien,$titre,$date,$description,$categorie){
        $query='INSERT INTO TNews VALUES(:lien,:titre,:d,:des,:categorie)';
        return $this->con->executeQuery($query,array(
            ':lien'=>array($lien,PDO::PARAM_STR),
            ':titre'=>array($titre,PDO::PARAM_STR),
            ':d'=>array($date,PDO::PARAM_STR),
            ':des'=>array($description,PDO::PARAM_STR),
            ':categorie'=>array($categorie,PDO::PARAM_STR)));
    }

    public function exist($url){
        $query='SELECT COUNT(*) FROM TNews WHERE lien = :url ';
        $this->con->executeQuery($query,array(
            ':url'=>array($url,PDO::PARAM_STR)));
        $res=$this->con->getResults();
        if($res[0]['COUNT(*)'] == 1){
            return TRUE;
        }
        return FALSE;
    }

    public function findFlux(){
        $query='SELECT * FROM TRSS';
        $this->con->executeQuery($query);
        return $results=$this->con->getResults();
        /*foreach ($results as $r){
            $TFlux[] = new Flux($r['lienFlux']);
        }
        return $TFlux;*/
    }


}
