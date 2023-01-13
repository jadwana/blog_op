<?php
namespace App\Controllers;

use App\Models\Post;
use App\services\Session;
use App\db\DatabaseConnection;

/**
 * DeletePost class
 * To delete post in the admin part
 */
class DeletePost
{
    /**
     * Method to delete a post
     *
     * @param int $identifier post id
     *
     * @return void
     */


    public function execute(string $identifier)
    {
        $role = Session::get('role');
        if ($role !='admin') {
            throw new \Exception('Page résevée à l\'administration !');
        }
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
