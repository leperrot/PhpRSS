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
    private $role;

    public function __construct($log,$role)
    {
        $this->login = $log;
        $this->role = $role;
    }
}