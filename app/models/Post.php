<?php

namespace App\Models;

use Config\Database;

class Post
{
    private $db;

    public function __construct()
    {
        $database= new Database();
        $this->db = $database->connect();
    }
    public function getAll(): array
    {
        $sql = "SELECT * FROM posts";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function getByID($id)
    {
        $sql = "SELECT * FROM posts WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'id' => $id
        ]);
        $result = $stmt->fetchAll();

        return $result;
    }

    public function getByCategory()
    {

    }

    public function create($title, $content, $category)
    {
        $sql = "INSERT INTO posts (title, content, category, created_at) VALUES (:title, :content, :category, now())";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':title' => $title,
            ':content' => $content,
            ':category' => $category
        ]);
    }

    public function edit($id, $title, $content, $category)
    {
        $sql = "UPDATE posts SET title = :title, content = :content, category= :category WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':title' => $title,
            ':content' => $content,
            ':category' => $category,
            ':id' => $id
        ]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM posts WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);
    }
}