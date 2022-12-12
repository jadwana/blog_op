<?php

namespace App\Controllers;


use App\Models\Post;
use App\Models\Comment;
use App\db\DatabaseConnection;
require 'vendor/autoload.php';


class OnePost extends Controller
{
     /**
      * Method in charge of displaying one post and its comments
      *
      * @param string $identifier
      *
      * @return void
      */
    public function execute(string $identifier)
    {
        $connection = new DatabaseConnection();

        $postRepository = new Post();
        $commentRepository = new Comment();
        $postRepository->connection = $connection;
        $commentRepository->connection = $connection;
        $post = $postRepository->getPost($identifier);
        $comments = $commentRepository->getComments($identifier);

        $this->twig->display(
            'onepost.twig', 
            ['post'=> $post, 'comments'=>$comments,'session'=> $_SESSION]
        );
    }
}
