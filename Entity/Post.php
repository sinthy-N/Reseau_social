<?php

class Post
{
    private $id;
    private $content;
    private $publishedAt;
    private $category;
    private $userId;


    //Méthode
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    //Hydration générique
    public function hydrate(array $data)
    {
        foreach ($data as $cle => $valeur) {
            $methode = 'set'.ucfirst($cle); // L'attribution parcouru
            if (method_exists($this, $methode)) { //Condition si le setter existe 
                $this->$methode($valeur);
            }
        }
    }

    //Les getters et setters

    public function getId(){
        return $this->id;
    }

    public function setId($id){
            $this->id = $id;
            return $this;
    }


    public function getContent(){
        return $this->content;
    }

    public function setContent($content){
        $this -> content = $content;  
        return $this;
    }




    public function getPublishedAt(){
        return $this->publishedAt;
    }

    public function setPublishedAt($publishedAt){
        $this -> publishedAt = $publishedAt;  
        return $this;
    }




    public function getCategory(){
        if  ($this->category = 'Netflix' or $this->category = 'Hbo' or $this->category = 'Prime Video' or $this->category = 'Disney'){
            return $this->category;
        }
    }
    public function setCategory($category){
        $this -> category = $category;
    }

    public function getUserId(){
        return $this->userId;
    }

    public function setUserId($userId){
        $this->userId = $userId;
        return $this;
    }

    

    
}