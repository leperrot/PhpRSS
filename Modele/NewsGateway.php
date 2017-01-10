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
        $query='INSERT INTO TNews VALUES(:lien,:titre,:d,:des,:categorie)';
        return $this->con->executeQuery($query,array(
            ':lien'=>array($lien,PDO::PARAM_STR),
            ':titre'=>array($titre,PDO::PARAM_STR),
            ':d'=>array($date,PDO::PARAM_STR),
            ':des'=>array($description,PDO::PARAM_STR),
            ':categorie'=>array($categorie,PDO::PARAM_STR)));
    }

    public function insertFlux($lien)
    {
        $query='INSERT INTO tflux VALUES(:lien)';
        return $this->con->executeQuery($query,array(
            ':lien'=>array($lien,PDO::PARAM_STR)));
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
        $query='DELETE FROM TNews Where :li=lien';
        return $this->con->executeQuery($query,array(
            ':li'=>array($lien,PDO::PARAM_STR)));
    }

    public function count(){
        $query='SELECT COUNT(*) FROM TNews';
        $this->con->executeQuery($query);
        return $this->con->getResults();
    }

    public function findAll(){
        global $pageA,$newsParPage;
        $premiereEntree=($pageA-1)*$newsParPage;
        $query='SELECT * FROM TNews ORDER BY Date DESC LIMIT '.$premiereEntree.','.$newsParPage.'';
        $this->con->executeQuery($query);
        $results=$this->con->getResults();
        foreach ($results as $r){
            $Tab_News[] = new News($r['Lien'], $r['Titre'], $r['Date'], $r['Description'], $r['Categorie']);
        }
        return $Tab_News;
    }

    public function findTitre($titre){
        $query='SELECT * FROM TNews WHERE :titre=titre ORDER BY Date DESC';
        $this->con->executeQuery($query, array(
            ':titre'=>array($titre,PDO::PARAM_STR)));
        $results=$this->con->getResults();
        foreach ($results as $r)
            $Tab_News[] = new News($r['Lien'], $r['Titre'], $r['Date'], $r['Description'], $r['Categorie']);
        return $Tab_News;
    }

    public function findCategorie($categorie){
        $query='SELECT * FROM TNews WHERE :cate=categorie ORDER BY Date DESC';
        $this->con->executeQuery($query, array(
            ':cate'=>array($categorie,PDO::PARAM_STR)));
        $results=$this->con->getResults();
        foreach ($results as $r)
            $Tab_News[] = new News($r['Lien'], $r['Titre'], $r['Date'], $r['Description'], $r['Categorie']);
        return $Tab_News;
    }

    public function findDate($date)
    {
        $query = 'SELECT * FROM TNews WHERE :d=date ORDER BY Date DESC';
        $this->con->executeQuery($query, array(
            ':d' => array($date, PDO::PARAM_STR)));
        $results = $this->con->getResults();
        foreach ($results as $r)
            $Tab_News[] = new News($r['Lien'], $r['Titre'], $r['Date'], $r['Description'], $r['Categorie']);
        return $Tab_News;
    }


}
