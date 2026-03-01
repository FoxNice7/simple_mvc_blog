<?php

namespace App\Controllers;

use App\Models\Comments;
use App\Models\Post;

class CommentsController
{
    private $commentsModel;
    private $postModel;

    public function __construct()
    {
        $this->commentsModel = new Comments();
        $this->postModel = new Post();
    }

    public function create($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $content = $_POST['comment'];

            $this->commentsModel->create($id, $content);

            header('Location: /post/index');
            exit;
        } else {
            require __DIR__ . '/../views/comments/form.php';
        }
    }
}