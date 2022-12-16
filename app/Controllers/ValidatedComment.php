<?php
namespace App\Controllers;

use App\Models\Comment;
use App\db\DatabaseConnection;
        
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
        $repository = new Comment();
        $repository->connection = new DatabaseConnection();
        $success = $repository->validatedComment($identifier);
        if (!$success) {
            throw new \Exception('Impossible de valider le commentaire !');
        } else {
            header('location: index.php?action=admincommentslist');
        }

        echo $this->twig->render(
            'admincommentslist.twig', 
            ['session'=> $_SESSION]
        );
    }
}
