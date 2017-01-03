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
        $query='INSERT INTO TNews VALUES(:titre,:lien,:d,:des,:categorie)';
        return $this->con->executeQuery($query,array(
            ':titre'=>array($titre,PDO::PARAM_STR),
            ':lien'=>array($lien,PDO::PARAM_STR),
            ':d'=>array($date,PDO::PARAM_STR),
            ':des'=>array($description,PDO::PARAM_STR),
            ':categorie'=>array($categorie,PDO::PARAM_STR)));
    }

    public function deleteDate($date){
        $query='DELETE * FROM TNews Where :date=date';
        return $this->con->executeQuery($query,array(
            ':date'=>array($date,PDO::PARAM_STR)));
    }

    public function deleteCategorie($categorie){
        $query='DELETE * FROM TNews Where :cate=categorie';
        return $this->con->executeQuery($query,array(
            ':cate'=>array($categorie,PDO::PARAM_STR)));
    }

    public function deleteTitre($titre){
        $query='DELETE * FROM TNews Where :titre=titre';
        return $this->con->executeQuery($query,array(
            ':titre'=>array($titre,PDO::PARAM_STR)));
    }
    /*
    public function deleteCateDate($categorie,$date){

    }
    */

    public function deleteLien($lien){
        $query='DELETE * FROM TNews Where :lien=lien';
        return $this->con->executeQuery($query,array(
            ':lien'=>array($lien,PDO::PARAM_STR)));
    }

    public function findAll(){
        $query='SELECT * FROM TNews';
        $this->con->executeQuery($query);
        $results=$this->con->getResults();
        foreach ($results as $r){
            $Tab_News[] = new News($r['Lien'], $r['Titre'], $r['Date'], $r['Description'], $r['Categorie']);
        }
        return $Tab_News;
    }

    public function findTitre($titre){
        $query='SELECT * FROM TNews WHERE :titre=titre';
        $this->con->executeQuery($query, array(
            ':titre'=>array($titre,PDO::PARAM_STR)));
        $results=$this->con->getResults();
        foreach ($results as $r)
            $Tab_News[]=new News($r['titre'],$r['lien'],$r['date'],$r['description'],$r['categorie']);
        return $Tab_News;
    }

    public function findCategorie($categorie){
        $query='SELECT * FROM TNews WHERE :cate=categorie';
        $this->con->executeQuery($query, array(
            ':cate'=>array($categorie,PDO::PARAM_STR)));
        $results=$this->con->getResults();
        foreach ($results as $r)
            $Tab_News[]=new News($r['titre'],$r['lien'],$r['date'],$r['description'],$r['categorie']);
        return $Tab_News;
    }

    public function findDate($date){
        $query='SELECT * FROM TNews WHERE :date=date';
        $this->con->executeQuery($query, array(
            ':date'=>array($date,PDO::PARAM_STR)));
        $results=$this->con->getResults();
        foreach ($results as $r)
            $Tab_News[]=new News($r['titre'],$r['lien'],$r['date'],$r['description'],$r['categorie']);
        return $Tab_News;
    }


}
