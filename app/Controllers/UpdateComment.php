<?php
namespace App\Controllers;

use App\Models\Comment;
use App\db\DatabaseConnection;

class UpdateComment extends Controller
{
    /**
     * Method to modify a comment
     *
     * @param int $identifier
     * @param array|null $input
     *
     * @return void
     */
    public function execute(int $identifier, ?array $input)
    {
        //submission management if there is an entry
        if ($input !== null) {
            $comment = null;

            if (!empty($input['comment'])) {

                $comment = strip_tags($input['comment']);
            } else {
                throw new \Exception('les données du formulaire sont invalides');
            }
                $commentRepository = new Comment();
                $commentRepository->connection = new DatabaseConnection();
                $success = $commentRepository->updateComment($identifier, $comment);
            if (!$success) {
                throw new \Exception('Impossible de modifier le commentaire !');
            } else {
                $commentRepository = new Comment();
                $commentRepository->connection = new DatabaseConnection();
                $comment = $commentRepository->getOneComment($identifier);
                header('location: index.php?action=onepost&id='.$comment->getPost);
            }

        }
        // displays the form if there is no entry and at the beginning
        $commentRepository = new Comment();
        $commentRepository->connection = new DatabaseConnection();
        $comment = $commentRepository->getOneComment($identifier);
        
        if ($comment === null) {
            throw new \Exception("Le commentaire $identifier n'existe pas.");
        } 
    
        $this->twig->display(
            'updateComment.twig',
            ['comment' => $comment,
            'session' => $_SESSION]
        );
   
    }
}
