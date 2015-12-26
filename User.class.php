<?php

class User
{
    public $login = 'Test';
    public $password;

    public function getLogin()
    {
        return $this->login;
    }

}