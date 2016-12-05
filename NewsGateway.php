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
		$query='DELETE TNews Where :date=date';
		return $this->con->executeQuery($query,array(
			':date'=>array($date,PDO::PARAM_STR)));
    }

    public function deleteCategorie($categorie){
		$query='DELETE TNews Where :cate=categorie';
		return $this->con->executeQuery($query,array(
			':cate'=>array($categorie,PDO::PARAM_STR)));
    }

    public function deleteTitre($titre){
		$query='DELETE TNews Where :titre=titre';
		return $this->con->executeQuery($query,array(
			':titre'=>array($titre,PDO::PARAM_STR)));
    }
    /*
    public function deleteCateDate($categorie,$date){

    }
    */

    public function delete($lien){
		$query='DELETE TNews Where :lien=lien';
		return $this->con->executeQuery($query,array(
			':lien'=>array($lien,PDO::PARAM_STR)));
    }

    public function findAll(){
		$query='SELECT * FROM TNEWS';
		return $this->con->executeQuery($query);
    }

    public function findTitre($titre){
		$query='SELECT * FROM TNews WHERE :titre=titre'
		return this->con->executeQuery($query, array(
			':titre'=>array($titre,PDO::PARAM_STR)));
    }

    public function findCategorie($categorie){
		$query='SELECT * FROM TNews WHERE :cate=categorie'
		return this->con->executeQuery($query, array(
			':cate'=>array($categorie,PDO::PARAM_STR)));
    }

    public function findDate($date){
		$query='SELECT * FROM TNews WHERE :date=date'
		return this->con->executeQuery($query, array(
			':date'=>array($date,PDO::PARAM_STR)));
    }


}
