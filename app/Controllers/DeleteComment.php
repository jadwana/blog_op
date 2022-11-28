<?php
namespace App\Controllers;

use App\Models\Comment;
use App\db\DatabaseConnection;
require 'vendor/autoload.php';

class DeleteComment
{
    //method to delete a post
    public function execute(string $identifier)
    {
        $postRepository = new Comment();
        $postRepository->connection = new DatabaseConnection();
        $success = $postRepository->deleteComment($identifier);
        if(!$success){
            throw new \Exception('Impossible de supprimer le commentaire !');
        }else{
            ?>
            <script language="javascript"> 
            alert("commentaire supprimé");
            document.location.href = 'index.php?action=admincommentslist';</script>
            <?php 
        }
    }
}
