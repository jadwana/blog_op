<?php
namespace App\Controllers;

use App\Models\Comment;
use App\db\DatabaseConnection;

/**
 * AdminCommentList class
 * To manage comments in admin part
 */
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
        $this->twig->display(
            'admincommentslist.twig',
            ['comments'=> $comments]
        );
    }


}
