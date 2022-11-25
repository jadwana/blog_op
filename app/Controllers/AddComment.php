<?php
namespace App\Controllers;

use App\Models\Comment;
use App\db\DatabaseConnection;
require 'vendor/autoload.php';


class AddComment extends Controller
{
    //fonction en charge de faire les vérifications de securité
    //et d'ajouter un nouveau commentaire
    public function execute(string $post)
    {
    $user_id =$_SESSION['user_id'];
    $comment = null;
    $_SESSION['message']=null;
        //on fait les vérifications
        if(!empty($_POST['comment'])){
            $comment = htmlspecialchars($_POST['comment']) ;
        }else {
            throw new \Exception('les données du formulaire sont invalides');
        }
        //on crée le nouveau commentaire
        $commentRepository = new Comment();
        $commentRepository->connection = new DatabaseConnection();
        $success = $commentRepository->createComment($post, $user_id, $comment);
        if(!$success){
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