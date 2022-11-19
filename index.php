<?php


//autoload

use App\Controllers\OnePost;
use App\Controllers\PostList;

require 'vendor/autoload.php';


$loader = new Twig\Loader\FilesystemLoader('app/views');
$twig = new \Twig\Environment($loader, [
    'cache'=> false, //'tmp'
]);

//router
try{

    if(isset($_GET['action']) && $_GET['action'] !==''){
    
        switch ($_GET['action']){
            case "postlist":
                (new PostList())->execute();
                break;
            case "onepost":
                if(isset($_GET['id']) && $_GET['id'] > 0){
                    $identifier = $_GET['id'];
        
                    (new OnePost())->execute($identifier);
                 }else{
                    throw new Exception('aucun identifiant envoyé');
                 }
                break;
            case "logon":
                echo $twig->render ('connexion.twig', ['title'=>'logon']);
                break;
            case "register":
                echo $twig->render ('register.twig', ['title'=>'inscription']);
                break;
            case "admin":
                echo $twig->render ('administration.twig', ['title'=>'admin']);
                break;  
            default:
                echo $twig->render ('404.twig', ['title'=>'404']);
        }
        
    
    
    }else{
        echo $twig->render ('homepage.twig', ['title'=>'accueil']);
    }

}catch (Exception $e) {
    $errorMessage = $e->getMessage();

    echo $twig->render ('error.twig', ['error'=> $errorMessage]);
}



