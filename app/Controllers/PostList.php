<?php
namespace App\Controllers;

require 'vendor/autoload.php';
use App\Models\Post;
use App\db\DatabaseConnection;

$loader = new \Twig\Loader\FilesystemLoader('app/views');
$twig = new \Twig\Environment(
    $loader, [
    'cache'=> false, //'tmp'
    ]
);
        

class PostList extends Controller
{
    //method in charge of displaying the list of posts
    public function execute()
    {   
       

        $repository = new Post();
        $repository->connection = new DatabaseConnection();
        $posts = $repository->getPosts();

        //$this->twig->display('postList.twig', ['posts'=> $posts], array('session'=> $_SESSION));

        echo $this->twig->render('postlist.twig', ['posts'=> $posts, 'session'=> $_SESSION]);
    }

    
}
