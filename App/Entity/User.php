<?php

namespace App\Entity;

class User 
{
    protected int $id;
    protected string $email = "";
    protected string $password;
    protected array $roles;

    public function __construct()
    {
        $this->email = '';
        $this->password = '';
        $this->roles = ['admin'];
    }


    public function getPassword()
    {
        return $this->password;
    }



    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

 
    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    public function getRoles()
    {
        return $this->roles;
    }


    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }
}