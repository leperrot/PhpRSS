<?php

/**
 * Created by PhpStorm.
 * User: BASTIEN
 * Date: 13/12/2016
 * Time: 17:04
 */
class AdminGateway
{

    private $con;

    public function __construct(Connexion $con)
    {
        $this->con=$con;
    }


    public function connexion($login,$mdp){
        $querry='SELECT COUNT * FROM TAdmin WHERE login=:log AND mdp=:mdp';
        $this->con->executeQuery($querry,array(
            'log'=>array($login,PDO::PARAM_STR),
            'mdp'=>arrat($mdp,PDO::PARAM_STR),
        ));
        if($this->con->getResults()!=1){
            return FALSE;
        }
        return TRUE;
    }
    public function deconnexion(){
        session_unset();
    }

    public function isAdmin()
    {
        if (isset ($_SESSION['login']) && isset ($_SESSION['role'])) {
            //Nettoyage
            return new Admin();
        } else return NULL;
    }


}