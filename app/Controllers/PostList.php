<?php
namespace App\Controllers;

require 'vendor/autoload.php';
use App\Models\Post;
use App\db\DatabaseConnection;


        

class PostList extends Controller
{
    //method in charge of displaying the list of posts
    public function execute()
    {   
       

        $repository = new Post();
        $repository->connection = new DatabaseConnection();
        $posts = $repository->getPosts();

        $this->twig->display('postList.twig', ['posts'=> $posts]);

        
    }

    
}
