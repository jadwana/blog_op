<?php
namespace App\Controllers;

use App\Models\Comment;
use App\services\Session;
use App\db\DatabaseConnection;

/**
 * ValidatedComment class
 * To validate comment in the admin part
 */
class ValidatedComment extends Controller
{
    /**
     * Method to validated a comment
     *
     * @param int $identifier
     *
     * @return void
     */


    public function execute(int $identifier)
    {
        $role = Session::get('role');
        if ($role !='admin') {
            throw new \Exception('Page résevée à l\'administration !');
        }
        $repository = new Comment();
        $repository->connection = new DatabaseConnection();
        $success = $repository->validatedComment($identifier);
        if (!$success) {
            throw new \Exception('Impossible de valider le commentaire !');
        } else {
            header('location: index.php?action=admincommentslist');
        }

        $this->twig->display(
            'admincommentslist.twig',
        );
    }


}
