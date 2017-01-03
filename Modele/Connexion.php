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
        var_dump($this->stmt);
        foreach ($param as $name=>$value){
            $this->stmt->bindValue($name,$value[0],$value[1]);
            var_dump($name,$value[0],$value[1]);
            var_dump($this->stmt->bindValue($name,$value[0],$value[1]));
        }
        var_dump($this->stmt);
        var_dump($this->stmt->execute());
        return $this->stmt->execute();
    }

    public function getResults()
    {
        return $this->stmt->fetchall();
    }

}

?>