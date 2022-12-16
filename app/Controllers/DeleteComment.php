<?php
namespace App\Controllers;

use App\Models\Comment;
use App\db\DatabaseConnection;

class DeleteComment
{
    /**
     * Method to delete a comment
     *
     * @param int $identifier
     *
     * @return void
     */
    public function execute(int $identifier)
    {
        $postRepository = new Comment();
        $postRepository->connection = new DatabaseConnection();
        $success = $postRepository->deleteComment($identifier);
        if (!$success) {
            throw new \Exception('Impossible de supprimer le commentaire !');
        } else {
            ?>
            <script language="javascript"> 
            alert("Commentaire supprimé");
            document.location.href = 'index.php?action=admincommentslist';</script>
            <?php
        }
    }
}
