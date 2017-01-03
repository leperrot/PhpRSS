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
        $query='SELECT COUNT (*) FROM tadmin WHERE login=:log AND mdp=:mdp';
        var_dump($query);
        var_dump($this->con->executeQuery($query,array(
            ':log'=>array($login,PDO::PARAM_STR),
            ':mdp'=>array($mdp,PDO::PARAM_STR),
        )));
        $this->con->executeQuery($query,array(
            ':log'=>array($login,PDO::PARAM_STR),
            ':mdp'=>array($mdp,PDO::PARAM_STR),
        ));
        var_dump($this->con->getResults());
        if($this->con->getResults()!=1){
            return FALSE;
        }
        return TRUE;
    }




}