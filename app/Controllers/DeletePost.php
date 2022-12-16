<?php
namespace App\Controllers;

use App\Models\Post;
use App\db\DatabaseConnection;

class DeletePost
{
    /**
     * Method to delete a post
     *
     * @param int $identifier
     * 
     * @return void
     */
    public function execute(string $identifier)
    {
        $postRepository = new Post();
        $postRepository->connection = new DatabaseConnection();
        $success = $postRepository->deletePost($identifier);
        if (!$success) {
            throw new \Exception('Impossible de supprimer l\'article !');
        } else {
            ?>
            <script language="javascript"> 
            alert("article supprimé");
            document.location.href = 'index.php?action=adminpostlist';</script>
            <?php 
        }
    }
}
