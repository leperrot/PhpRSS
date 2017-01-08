<?php

require_once('Config/Config.php');

class ModeleUsr{

    public function get_AllNews()
    {
        global $dsn,$name,$mdp;
        $ng = new NewsGateway(new Connexion($dsn,$name,$mdp));
        return $data=$ng->findAll();
    }

    public function getNews_titre($titre)
    {
        global $dsn,$name,$mdp;
        $ng= new NewsGateway(new Connexion($dsn,$name,$mdp));
        return $data=$ng->findTitre($titre);
    }

    public function getNews_Categorie($cate)
    {
        global $dsn,$name,$mdp;
        $ng= new NewsGateway(new Connexion($dsn,$name,$mdp));
        return $data=$ng->findCategorie($cate);
    }

    public function getNews_Date($date){
        $ng= new NewsGateway(new Connexion($dsn,$name,$mdp));
        $Tab_News=$ng->findDate($date);
		}
}

?>
