<?php
namespace App\Controllers;

use App\Models\Comment;
use App\Models\Session;
use App\db\DatabaseConnection;
use App\Models\PostGlobal;

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
        $user_id = Session::get('user_id');
        $comment = null;
        // We do the checks.
        if (!empty(PostGlobal::get('comment'))) {
            $comment = strip_tags(PostGlobal::get('comment'));
        } else {
            ?>
            <script language="javascript"> 
            var numpost = <?php echo $post?>;
            alert("les données du commentaires sont invalides");
            document.location.href = 'index.php?action=onepost&id='+numpost;</script>
            <?php
        }

        // We create a new comment.
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
