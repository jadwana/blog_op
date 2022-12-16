<?php
namespace App\Controllers;

use App\Models\Comment;
use App\db\DatabaseConnection;

class AddComment extends Controller
{
    /**
     * Function in charge of doing security checks and adding a new comment
     *
     * @param string $post
     *
     * @return void
     */


    public function execute(string $post)
    {
        $user_id = $_SESSION['user_id'];
        $comment = null;
        $_SESSION['message']=null;
        // We do the checks
        if (!empty($_POST['comment'])) {
            $comment = strip_tags($_POST['comment']);
        } else {
            ?>
            <script language="javascript"> 
            var numpost = <?php echo $post?>;
            alert("les données du commentaires sont invalides");
            document.location.href = 'index.php?action=onepost&id='+numpost;</script>
            <?php
        }
        // We create a new comment
        $commentRepository = new Comment();
        $commentRepository->connection = new DatabaseConnection();
        $success = $commentRepository->createComment($post, $user_id, $comment);
        if (!$success) {
            throw new \Exception('Impossible d\'ajouter le commentaire !');
        } else {
            ?>
            <script language="javascript"> 
            var numpost = <?php echo $post?>;
            alert("Commentaire envoyé, celui-ci sera visible après validation.");
            document.location.href = 'index.php?action=onepost&id='+numpost;</script>
            <?php
        }
    }


}
