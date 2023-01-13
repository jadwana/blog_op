<?php
namespace App\Controllers;

use App\Models\Post;
use App\services\Session;
use App\db\DatabaseConnection;

/**
 * AdminPostlist class
 * To manage posts in admin part
 */
class AdminPostList extends Controller
{
    /**
     * Method in charge of displaying the list of posts
     *
     * @return void
     */


    public function execute()
    {
        $role = Session::get('role');
        if ($role !='admin') {
            throw new \Exception('Page résevée à l\'administration !');
        }
        $repository = new Post();
        $repository->connection = new DatabaseConnection();
        $posts = $repository->getPosts();
        $this->twig->display(
            'adminpostlist.twig',
            ['posts' => $posts]
        );
        
    }


}
