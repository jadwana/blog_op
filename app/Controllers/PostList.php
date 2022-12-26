<?php
namespace App\Controllers;

use App\Models\Post;
use App\db\DatabaseConnection;

/**
 * PostList class
 * To display all posts on the blog page
 */
class PostList extends Controller
{
    /**
     * Method in charge of displaying the list of posts
     *
     * @return void
     */


    public function execute()
    {
        $repository = new Post();
        $repository->connection = new DatabaseConnection();
        $posts = $repository->getPosts();
        $this->twig->display(
            'postlist.twig', [
            'posts' => $posts,
            ]
        );
    }


}
