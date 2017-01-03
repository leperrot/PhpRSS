<?php

/**
 * Created by PhpStorm.
 * User: bagandboeu
 * Date: 30/11/16
 * Time: 13:56
 */
class Connexion extends PDO{
    private $stmt;

    public function __construct($dsn,$user,$psw){
        parent::__construct($dsn,$user,$psw);
        $this->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }

    public function executeQuery($query,array $param=[]){
        $this->stmt=parent::prepare($query);
        foreach ($param as $name=>$value){
            $this->stmt->bindValue($name,$value[0],$value[1]);
        }
        try {
            return $this->stmt->execute();
        } catch(Exception $e){
            throw new Exception();
        }
    }

    public function getResults()
    {
        return $this->stmt->fetchall();
    }

}

?>