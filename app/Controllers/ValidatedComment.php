<?php
namespace App\Controllers;

require 'vendor/autoload.php';
use App\Models\Comment;
use App\db\DatabaseConnection;


        

class ValidatedComment extends Controller
{
    //method in charge of displaying the list of posts
    public function execute($identifier)
    {   
       

        $repository = new Comment();
        $repository->connection = new DatabaseConnection();
        $success = $repository->validatedComment($identifier);
        if(!$success) {
            throw new \Exception('Impossible de valider le commentaire !');
        }else{
            header('location: index.php?action=admincommentslist');
        }

        echo $this->twig->render('admincommentslist.twig', ['session'=> $_SESSION]);
    }

    
}