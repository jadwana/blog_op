<?php
namespace App\Controllers;

use App\Models\Post;
use App\db\DatabaseConnection;

class UpdatePost extends Controller
{
    /**
     * Method to modify a post
     *
     * @param int $identifier
     * @param array|null $input
     *
     * @return void
     */


    public function execute(int $identifier, ?array $input)
    {
        // Submission management if there is an entry.
        if ($input !== null) {
            $title = null;
            $content = null;
            $chapo = null;

            if (!empty($input['title']) &&!empty($input['chapo'])
                &&!empty($input['content'])
            ) {

                $title = strip_tags($input['title']);
                $chapo = strip_tags($input["chapo"]);
                $content = strip_tags($input['content']);
            } else {
                throw new \Exception('les données du formulaire sont invalides');
            }
                $postRepository = new Post();
                $postRepository->connection = new DatabaseConnection();
                $success = $postRepository->updatePost($identifier, $content, $title, $chapo);
            if (!$success) {
                throw new \Exception('Impossible de modifier l\'article !');
            } else {
                
                $postRepository = new Post();
                $postRepository->connection = new DatabaseConnection();
                $post = $postRepository->getPost($identifier);
                ?>
                    <script language="javascript"> 
                    alert("article modifié!");
                    document.location.href = 'index.php?action=adminpostlist';
                    </script>
                    <?php
            }

        }
        // Displays the form if there is no entry and at the beginning.
        $postRepository = new Post();
        $postRepository->connection = new DatabaseConnection();
        $post = $postRepository->getPost($identifier);
        
        if ($post === null) {
            throw new \Exception("L'article $identifier n'existe pas.");
        }
        $this->twig->display(
            'updatepost.twig',
            ['post'=> $post,'session'=> $_SESSION]
        );
    }


}
