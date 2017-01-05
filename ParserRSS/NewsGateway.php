<?php

/**
 * Created by PhpStorm.
 * User: bagandboeu
 * Date: 30/11/16
 * Time: 14:57
 */
class NewsGateway
{
    private $con;

    public function __construct(Connexion $con)
    {
        $this->con=$con;
    }

    public function insert($lien,$titre,$date,$description,$categorie){
        $query='INSERT INTO tnews VALUES(:titre,:lien,:d,:des,:categorie)';
        return $this->con->executeQuery($query,array(
            ':titre'=>array($titre,PDO::PARAM_STR),
            ':lien'=>array($lien,PDO::PARAM_STR),
            ':d'=>array($date,PDO::PARAM_STR),
            ':des'=>array($description,PDO::PARAM_STR),
            ':categorie'=>array($categorie,PDO::PARAM_STR)));
    }

    public function exist($url){
        $query='SELECT COUNT(*) FROM tnews WHERE lien = :url ';
        return $this->con->executeQuery($query,array(
            ':url'=>array($url,PDO::PARAM_STR)));
    }



}
