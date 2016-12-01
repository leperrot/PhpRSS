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

    public function __construct(Connection $con)
    {
        $this->con=$con;
    }

    public function insert($lien,$titre,$date,$description,$categorie){
        //TEST VARIABLES !!!
        $query='INSERT INTO TNews VALUES(:titre,:lien,:d,:des,:categorie)';
        return $this->con->executeQuery($query,array(
            ':titre'=>array($titre,PDO::PARAM_STR),
            ':lien'=>array($lien,PDO::PARAM_STR),
            ':d'=>array($date,PDO::PARAM_STR),
            ':des'=>array($description,PDO::PARAM_STR),
            ':categorie'=>array($categorie,PDO::PARAM_STR)));
    }

    public function deleteDate($date){

    }

    public function deleteCategorie($categorie){

    }

    public function deleteTitre($titre){

    }
    /*
    public function deleteCateDate($categorie,$date){

    }
    */

    public function delete($lien){

    }

    public function findAll(){

    }

    public function findTitre($titre){

    }

    public function findCategorie($categorie){

    }

    public function findDate($date){

    }


}