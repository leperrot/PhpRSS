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
        $querry='SELECT COUNT * FROM tadmin WHERE login=:log AND mdp=:mdp';
        $this->con->executeQuery($querry,array(
            'log'=>array($login,PDO::PARAM_STR),
            'mdp'=>array($mdp,PDO::PARAM_STR),
        ));
        if($this->con->getResults()!=1){
            return FALSE;
        }
        return TRUE;
    }





}
