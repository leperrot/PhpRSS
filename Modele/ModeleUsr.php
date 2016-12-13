<?php

require_once('__DIR__./Config/Config.php');

class ModeleUsr{

    public function get_AllNews()
    {
        $ng = new NewsGateway(new Connexion());
        $Tab_News = $ng->findAll();
    }

    public function getNews_titre($titre){
        $ng= new NewsGateway(new Connexion(********));
			$Tab_News=$ng->findTitre($titre);
		}

    public function getNews_Categorie($cate){
        $ng= new NewsGateway(new Connexion(********));
			$Tab_News=$ng->findCategorie($cate);
		}

    public function getNews_Date($date){
        $ng= new NewsGateway(new Connexion(********));
			$Tab_News=$ng->findDate($date);
		}
}

?>
