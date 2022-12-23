<?php
namespace App\Controllers;

use App\Models\Post;
use App\Models\Session;
use App\Models\PostGlobal;
use App\db\DatabaseConnection;

class AddPost extends Controller
{
    /**
     * Method to add a new post
     *
     * @return void
     */


    public function execute()
    {
        $user_id = Session::get('user_id');
        $content = null;
        $title = null;
        $chapo = null;

        if (PostGlobal::get('submit')) {
            // We do the checks.
            if (!empty(PostGlobal::get('content')) && !empty(PostGlobal::get('title'))
                && !empty(PostGlobal::get('chapo'))
            ) {
                $content = strip_tags(PostGlobal::get('content'));
                $title = strip_tags(PostGlobal::get('title'));
                $chapo = strip_tags(PostGlobal::get('chapo'));
            } else {
                ?>
                <script language="javascript"> 
                alert("les données du formulaire sont invalides");
                document.location.href = 'index.php?action=addPost';</script>
                <?php
            }

            // We create the new article.
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
        $this->twig->display('addPost.twig');

    }


}
