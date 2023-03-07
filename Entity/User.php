<?php

class User
{
    private $id;
    private $firstName;
    private $lastName;
    private $username;
    private $email;
    private $password;


    //Méthode
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    //Hydration générique
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = "set" . ucfirst($key); // L'attribution parcouru
            if (method_exists($this, $method)) {//Condition si le setter existe 
                $this->$method($value);
            }
        }
    }

    //Les getters et setters

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }



    public function getFirstName()
    {
        return $this->firstName;
    }
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }




    public function getLastName()
    {
        return $this->lastName;
    }
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }




    public function getUsername()
    {
        return $this->username;
    }
    public function setUsername($username)
    {
        $this->username = $username;
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


    
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }
    
}
