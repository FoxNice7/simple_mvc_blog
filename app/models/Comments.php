<?php

namespace App\Models;
use Config\Database;
class Comments
{
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function getAll(){
        $sql = "SELECT content, post_id FROM comments";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function create($id,$content){
        $sql = "INSERT INTO comments (content, post_id) VALUES ( :content, :post_id)";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':content' => $content,
            ':post_id' => $id
        ]);
    }

    

}