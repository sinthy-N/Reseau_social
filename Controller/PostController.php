<?php

class PostController
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

    //Crée une publication
    public function create(Post $post)
    {
        $req = $this->db->prepare("INSERT INTO `post` (content, publishedAt, category, userId) VALUES (:content, :publishedAt, :category, :userId)");
        //$req->bindValue(":category", $post->getCategory(), PDO::PARAM_STR);
        $req->bindValue(":content", $post->getContent(), PDO::PARAM_STR);
        $req->bindValue(":publishedAt", date("Y-m-d H:i:s"));
        $req->bindValue(":category", $post->getCategory(), PDO::PARAM_STR);
        $req->bindValue(":userId", $post->getUserId(), PDO::PARAM_INT);
        $req->execute();
    }

    //Prendre l'id d'une publication
    public function get(int $id): Post{
        $req = $this->db->prepare("SELECT * FROM `post` WHERE id = :id" );
        $req->bindValue(":id", $id,PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $post = new Post($data);
        return $post;
    }

    //Prendre l'id de toutes les publication
    public function getAll():array{
        $articles = [];
        $req = $this->db->query("SELECT * FROM `post` ORDER BY id DESC");
        $req->execute();
        $datas = $req->fetchAll();
        foreach ($datas as $data){
            $articles[] = new Post($data);
        }
        return $articles;
    }

    //Prendre l'id de toutes les publication de Netflix
    public function getAllNetflix():array{
        $articles = [];
        $req = $this->db->query("SELECT * FROM post WHERE category = 'Netflix'");
        $req->execute();
        $datas = $req->fetchAll();
        foreach ($datas as $data){
            $articles[] = new Post($data);
        }
        return $articles;
    }

    //Prendre l'id de toutes les publication de HBO
    public function getAllHbo():array{
        $articles = [];
        $req = $this->db->query("SELECT * FROM post WHERE category = 'Hbo'");
        $req->execute();
        $datas = $req->fetchAll();
        foreach ($datas as $data){
            $articles[] = new Post($data);
        }
        return $articles;
    }

    //Prendre l'id de toutes les publication de Prime Video
    public function getAllPrimeVideo():array{
        $articles = [];
        $req = $this->db->query("SELECT * FROM post WHERE category = 'Prime Video'");
        $req->execute();
        $datas = $req->fetchAll();
        foreach ($datas as $data){
            $articles[] = new Post($data);
        }
        return $articles;
    }

    //Prendre l'id de toutes les publication de Disney
    public function getAllDisney():array{
        $articles = [];
        $req = $this->db->query("SELECT * FROM post WHERE category = 'Disney'");
        $req->execute();
        $datas = $req->fetchAll();
        foreach ($datas as $data){
            $articles[] = new Post($data);
        }
        return $articles;
    }
    

    //Modifier une publication
    public function update(Post $post)
    {
        $req = $this->db->prepare("UPDATE `post` SET content = :content, publishedAt = :publishedAt, userId = :userId WHERE id = :id");
        $req->bindValue(":id", $post->getId(), PDO::PARAM_INT);
        //$req->bindValue(":category", $post->getCategory(), PDO::PARAM_STR);
        $req->bindValue(":content", $post->getContent(), PDO::PARAM_STR);
        $req->bindValue(":publishedAt", date("Y-m-d H:i:s"), PDO::PARAM_STR);
        $req->bindValue(":userId", $post->getUserId(), PDO::PARAM_INT);

        $req->execute();
    }

    //Supprimer une publication
    public function delete(int $id)
    {
        $req = $this->db->prepare("DELETE FROM post WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }

    //Lire une publication
    public function read(int $id)
    {
        $req = $this->db->prepare("SELECT * FROM `publication` WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $post = new Post($data);
        return $post;
    }

    //Lire toutes les publications
    public function readAll()
    {
        $posts = [];
        $req = $this->db->query("SELECT * FROM `post`");
        $req->execute();
        $datas = $req->fetchAll();
        foreach ($datas as $data) {
            $post = new Post($data);
            //array_push($posts, $post);
            $posts[] = $post;
        }
        return $posts;
    }


}

    