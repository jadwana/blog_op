<?php

namespace App\Controllers;


use App\Models\Post;
use App\db\DatabaseConnection;
require 'vendor/autoload.php';


class OnePost extends Controller
{
     //method in charge of displaying one post and its comments
    public function execute(string $identifier)
    {
        $connection = new DatabaseConnection();

        $postRepository = new Post();
        
        $postRepository->connection = $connection;
    
        $post = $postRepository->getPost($identifier);
        

        $this->twig->display('onepost.twig', ['post'=> $post]);
    }
}