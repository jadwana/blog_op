<?php
namespace App\Controllers;

// require 'vendor/autoload.php';
use App\Models\Comment;
use App\db\DatabaseConnection;


class AdminCommentsList extends Controller
{
    /**
     * Method in charge of displaying the list of unvalidaded comments
     * for the admin
     *
     * @return void
     */
    public function execute()
    {
        $repository = new Comment();
        $repository->connection = new DatabaseConnection();
        $comments = $repository->getUnvalidatedComments();
        echo $this->twig->render(
            'admincommentslist.twig',
            ['comments'=> $comments, 'session'=> $_SESSION]
        );
    }

}
