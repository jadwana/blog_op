<?php
namespace App\Controllers;

use App\Models\Post;
use App\db\DatabaseConnection;

require 'vendor/autoload.php';

class AddPost extends Controller
{

   
    /**
     * Method to add a new post
     *
     * @return void
     */
    public function execute()
    {
        $user_id =$_SESSION['user_id'];
        $content = null;
        $title = null;
        $chapo = null;

        if (!empty($_POST)) {
            // we do the checks
            if (!empty($_POST['content']) && !empty($_POST['title']) 
                && !empty($_POST['chapo'])
            ) {
                $content = strip_tags($_POST['content']);
                $title = strip_tags($_POST['title']);
                $chapo = strip_tags($_POST['chapo']);
            } else {
                ?>
                <script language="javascript"> 
                alert("les données du formulaire sont invalides");
                document.location.href = 'index.php?action=addPost';</script>
                <?php 
            }
            // we create the new article
            $postRepository = new Post();
            $postRepository->connection = new DatabaseConnection();
            $success = $postRepository->addPost($title, $content, $chapo, $user_id);
            if (!$success) {
                throw new \Exception('Impossible d\'ajouter l\'article !');
            } else {
                ?>
                <script language="javascript"> 
                alert("article ajouté");
                document.location.href = 'index.php?action=admin';</script>
                <?php 
            }
        }
        $this->twig->display('addPost.twig', array('session'=>$_SESSION));
    }
}
