<?php
namespace App\Controllers;

require 'vendor/autoload.php';
use App\Models\Post;
use App\db\DatabaseConnection;


        

class AdminPostList extends Controller
{
    //method in charge of displaying the list of posts
    public function execute()
    {   
       

        $repository = new Post();
        $repository->connection = new DatabaseConnection();
        $posts = $repository->getPosts();

        

        echo $this->twig->render('adminpostlist.twig', ['posts'=> $posts, 'session'=> $_SESSION]);
    }

    
}