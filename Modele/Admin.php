<?php

/**
 * Created by PhpStorm.
 * User: BASTIEN
 * Date: 13/12/2016
 * Time: 17:11
 */
class Admin
{
    private $login;
    private $mdp;

    public function __construct($log,$psw)
    {
        $login = $log;
        $mdp = $psw;
    }
}