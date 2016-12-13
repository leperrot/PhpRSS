<?php

/**
 * Created by PhpStorm.
 * User: bagandboeu
 * Date: 13/12/16
 * Time: 14:45
 */


include_once ('../Config/Config.php');


class ModeleAdmin
{

    public function insert_News($lien,$titre,$date,$description,$categorie){
        $ng= new NewsGateway(new Connexion($dsn,$name,$mdp));
        $Tab_News=$ng->insert($lien,$titre,$date,$description,$categorie);
    }

    public function delete_date($date){
        $ng= new NewsGateway(new Connexion($dsn,$name,$mdp));
			/*regarder ce que retourne execute*/
			$re=$ng->deleteDate($date);
		}

    public function delete_lien($lien){
        $ng= new NewsGateway(new Connexion($dsn,$name,$mdp));
			/*regarder ce que retourne execute*/
			$re=$ng->deleteLien($lien);
		}

    public function delete_Categorie($cate){
        $ng= new NewsGateway(new Connexion($dsn,$name,$mdp));
			/*regarder ce que retourne execute*/
			$re=$ng->deleteCategorie($cate);
		}

    public function delete_titre($titre){
        $ng= new NewsGateway(new Connexion($dsn,$name,$mdp));
			/*regarder ce que retourne execute*/
        $re=$ng->deleteTitre($titre);
		}

    public function connexion($login, $mdp){
        $ag=new AdminGateway(new Connexion($dsn,$name,$mdp));
        $re=$ag->Connexion;
    }
}