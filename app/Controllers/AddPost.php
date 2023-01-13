<?php
namespace App\Controllers;

use App\Models\Post;
use App\services\Session;
use App\services\PostGlobal;
use App\db\DatabaseConnection;

/**
 * AddPost class
 * To add a new post in the admin part
 */
class AddPost extends Controller
{
    /**
     * Method to add a new post
     *
     * @return void
     */


    public function execute()
    {
        $role = Session::get('role');
        $user_id = Session::get('user_id');
        $content = null;
        $title = null;
        $chapo = null;

        if ($role !='admin') {
            throw new \Exception('Page résevée à l\'administration !');
        }
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
