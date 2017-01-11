<?php

class Admin
{
    private $role;
    private $login;

    public function __construct($role, $login)
    {
        $this->login = $login;
        $this->role = $role;
    }

    public function getLogin()
    {
        return $this->login;
    }
}