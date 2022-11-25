<?php
namespace App\Controllers;

use App\Models\Comment;
use App\db\DatabaseConnection;
require 'vendor/autoload.php';


class AddComment extends Controller
{
    /**
     * function in charge of doing security checks and adding a new comment
     *
     * @param string $post
     * @return void
     */
    public function execute(string $post)
    {
        $user_id =$_SESSION['user_id'];
        $comment = null;
        $_SESSION['message']=null;
        //we do the checks
        if(!empty($_POST['comment'])) {
            $comment = htmlspecialchars($_POST['comment']);
        }else {
            throw new \Exception('les données du formulaire sont invalides');
        }
        //we create a new comment
        $commentRepository = new Comment();
        $commentRepository->connection = new DatabaseConnection();
        $success = $commentRepository->createComment($post, $user_id, $comment);
        if(!$success) {
            throw new \Exception('Impossible d\'ajouter le commentaire !');
        }else{
            ?>
            <script language="javascript"> 
            var numpost = <?php echo $post?>;
            alert("commentaire envoyé");
            document.location.href = 'index.php?action=onepost&id='+numpost;</script>
            <?php 
        }
    }
}
