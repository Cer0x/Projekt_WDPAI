<?php

class User
{
    private $email;
    private $password;
    private $name;
    private $surname;
    private $phone;
    private $isadmin;

    private $userID;

    public function __construct(string $email, string $password, string $name, string $surname, string $phone, string $isadmin, string $userID)
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->phone = $phone;
        $this->isadmin = $isadmin;
        $this->userID = $userID;
    }

    public function getPhone()
    {
        return $this->phone;
    }


    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getisadmin()
    {
        return $this->isadmin;
    }

    public function setIsadmin($isadmin)
    {
        $this->isadmin = $isadmin;
    }



    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }


    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }


    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname)
    {
        $this->surname = $surname;
    }

    public function getUserID(): string
    {
        return $this->userID;
    }

    public function setUserID(string $userID)
    {
        $this->userID = $userID;
    }



}