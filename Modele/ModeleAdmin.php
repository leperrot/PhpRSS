<?php

/**
 * Created by PhpStorm.
 * User: bagandboeu
 * Date: 13/12/16
 * Time: 14:45
 */


include_once ('Config/Config.php');


class ModeleAdmin
{

    public function insert_News($lien,$titre,$date,$description,$categorie)
    {
        global $dsn,$name,$mdp;
        $ng= new NewsGateway(new Connexion($dsn,$name,$mdp));
        $ng->insert($lien,$titre,$date,$description,$categorie);
        if($ng!=null) return $data='Insertion réussi';
        return $data='Insertion échouée';
    }

    public function ajouterFlux($lien)
    {
        global $dsn,$name,$mdp;
        $ng= new NewsGateway(new Connexion($dsn,$name,$mdp));
        $ng->insertFlux($lien);
        if($ng!=null) return $data='Insertion réussi';
        return $data='Insertion échouée';
    }

    public function delete_lien($lien)
    {
        global $dsn,$name,$mdp;
        $ng= new NewsGateway(new Connexion($dsn,$name,$mdp));
        if($ng->deleteLien($lien)) return $data='Suppression réussi';
        return $data='Suppression échouée';
    }


    public function connexion($login, $mdpa){
        global $dsn,$name,$mdp;
        //nettoyage
        $ag=new AdminGateway(new Connexion($dsn,$name,$mdp));
        if($ag->connexion($login,$mdpa)){
            $_SESSION['role']='admin';
            $_SESSION['login']=$login;
            return TRUE;
        }
        else return FALSE;
    }


    public static function deconnexion(){
        session_unset();
    }

    public static function isAdmin()
    {
        if (isset ($_SESSION['login']) && isset ($_SESSION['role'])) {
            //Nettoyage
            return new Admin($_SESSION['login'],$_SESSION['role']);
        }
        else return NULL;
    }
}