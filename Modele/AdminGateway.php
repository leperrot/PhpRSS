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
        $query='SELECT COUNT(*) FROM tadmin WHERE login= :log AND mdp= :mdp';
        $this->con->executeQuery($query,array(
            ':log'=>array($login,PDO::PARAM_STR),
            ':mdp'=>array($mdp,PDO::PARAM_STR),
        ));
        $res=$this->con->getResults();
        if($res[0]['COUNT(*)'] == 1){
            return TRUE;
        }
        return FALSE;
    }




}