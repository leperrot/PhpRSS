<?php

/**
 * Created by PhpStorm.
 * User: bagandboeu
 * Date: 09/01/17
 * Time: 12:41
 */
class Flux
{
    private $lien;

    public function __construct($lien){
        $this->lien=$lien;
    }

    public function getLien(){
        return $this->lien;
    }


}

?>