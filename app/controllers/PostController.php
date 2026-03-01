<?php

namespace App\Controllers;

use App\Models\Post;
use App\Models\Comments;

class PostController
{

    private $postModel;
    private $commentsModel;

    public function __construct()
    {
        $this->postModel = new Post();
        $this->commentsModel = new Comments();
    }

    public function index()
    {
        $postData = $this->postModel->getAll();
        $commentsData = $this->commentsModel->getAll();

        require __DIR__ . '/../views/posts/index.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category = $_POST['category'];

            $this->postModel->create($title, $content, $category);
            header('Location: index');
            exit;
        } else {
            require __DIR__ . '/../views/posts/form.php';
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category = $_POST['category'];

            $this->postModel->edit($id, $title, $content, $category);
            header('Location: ../index');
            exit;
        } else {
            $data = $this->postModel->getByID($id);
            require __DIR__ . '/../views/posts/edit.php';
        }
    }

    public function delete($id)
    {
        $this->postModel->delete($id);
        header('Location: ../index');
        exit;

    }
}