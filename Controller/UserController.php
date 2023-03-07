<?php

class UserController
{
    private PDO $db;

    public function __construct()
    {
        $dbName = "social";
        $port = 3306;
        $userName = "root";
        $password = "root";
        try {
            $this->setDb(new PDO("mysql:host=localhost;dbname=$dbName;port=$port;charset=utf8mb4", $userName, $password));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function setDb(PDO $db)
    {
        $this->db = $db;
        return $this;
    }

    //Créer un utilisateur
    public function create(User $user)
    {
        $req = $this->db->prepare("INSERT INTO `user` (firstName, lastName, username, email, password) VALUES (:firstName, :lastName, :username, :email, :password)");
        //$req->bindValue(":profil", $user->getProfil(), PDO::PARAM_STR);
        $req->bindValue(":firstName", $user->getFirstName(), PDO::PARAM_STR);
        $req->bindValue(":lastName", $user->getLastName(), PDO::PARAM_STR);
        $req->bindValue(":username", $user->getUsername(), PDO::PARAM_STR);
        $req->bindValue(":email", $user->getEmail(), PDO::PARAM_STR);
        $req->bindValue(":password", $user->getPassword(), PDO::PARAM_STR);
        $req->execute();
    }

    //Modifier un utilisateur (pas fait)
    public function update(User $user)
    {
        $req = $this->db->prepare("UPDATE `user` SET firstName = :firstName, lastName = :lastName, username = :username, email = :email, password = :password WHERE id = :id");
        $req->bindValue(":id", $user->getId(), PDO::PARAM_INT);
        //$req->bindValue(":profil", $user->getProfil(), PDO::PARAM_STR);
        $req->bindValue(":firstName", $user->getFirstName(), PDO::PARAM_STR);
        $req->bindValue(":lastName", $user->getLastName(), PDO::PARAM_STR);
        $req->bindValue(":username", $user->getUsername(), PDO::PARAM_STR);
        $req->bindValue(":email", $user->getEmail(), PDO::PARAM_STR);
        $req->bindValue(":password", $user->getPassword(), PDO::PARAM_STR);

        $req->execute();
    }

    //Supprimer un utilisateur (pas fait)
    public function delete(user $user)
    {
        $req = $this->db->prepare("DELETE FROM `user` WHERE id = :id");
        $req->bindValue(":id", $user->getId(), PDO::PARAM_INT);
        $req->execute();
    }


    //Prendre l'id d'un utilisateur
    public function get(int $id): User{
        $req = $this->db->prepare("SELECT * FROM `user` WHERE id = :id" );
        $req->bindValue(":id", $id,PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $user = new User($data);
        return $user;
    }

    //Lire/Voir un utilisateur
    public function read(int $id)
    {
        $req = $this->db->prepare("SELECT * FROM `user` WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $user = new User($data);
        return $user;
    }


    //Lire/Voir tous les utilisateurs
    public function readAll()
    {
        $users = [];
        $req = $this->db->query("SELECT * FROM `user`");
        $req->execute();
        $datas = $req->fetchAll();
        foreach ($datas as $data) {
            $user = new User($data);
            //array_push($users, $user);
            $users[] = $user;
        }
        return $users;
    }

}