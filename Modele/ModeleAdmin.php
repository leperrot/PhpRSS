<?php

/**
 * Created by PhpStorm.
 * User: bagandboeu
 * Date: 13/12/16
 * Time: 14:45
 */


include_once ('__DIR__./Config/Config.php');


class ModeleAdmin
{

    public function insert_News($lien,$titre,$date,$description,$categorie){
        $ng= new NewsGateway(new Connexion());
        $Tab_News=$ng->insert($lien,$titre,$date,$description,$categorie);
    }

    public function delete_date($date){
        $ng= new NewsGateway(new Connexion(********));
			/*regarder ce que retourne execute*/
			$re=$ng->deleteDate($date);
		}

    public function delete_lien($lien){
        $ng= new NewsGateway(new Connexion(********));
			/*regarder ce que retourne execute*/
			$re=$ng->deleteLien($lien);
		}

    public function delete_Categorie($cate){
        $ng= new NewsGateway(new Connexion(********));
			/*regarder ce que retourne execute*/
			$re=$ng->deleteCategorie($cate);
		}

    public function delete_titre($titre){
        $ng= new NewsGateway(new Connexion(********));
			/*regarder ce que retourne execute*/
        $re=$ng->deleteTitre($titre);
		}

    public function connexion($login, $mdp){
        $ag=new AdminGateway(new Connexion(*********));
        $re=$ag->Connexion
    }
}