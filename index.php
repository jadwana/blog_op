<?php
session_start();

use App\Controllers\Logon;
use App\Controllers\Logout;
use App\Controllers\AddUser;
use App\Controllers\OnePost;
use App\Controllers\PostList;
use App\Controllers\AddComment;
use App\Controllers\UpdateComment;

//autoload
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
                 (new Logon())->execute();
                break;
            case "logout":
                (new Logout())->execute();
                break;  
            case "register":
                if(isset($_SESSION['user_id'])){
                    throw new Exception('Vous êtes déjà connecté, vous ne pouvez pas vous inscrire à nouveau');
                }
                (new AddUser())->execute();
                break;
            case "addComment":
                if(isset($_GET['id']) && $_GET['id'] > 0){
                    $identifier = $_GET['id'];
                    (new AddComment())->execute($identifier);
                 }else{
                    throw new Exception('aucun identifiant envoyé') ;
                 }
                break;
            case "updateComment":
                if(isset($_GET['id']) && $_GET['id'] > 0){
                    $identifier = $_GET['id'];
                    $input = null;
                    if($_SERVER['REQUEST_METHOD'] === 'POST'){
                       $input = $_POST;
                    }
                    (new UpdateComment())->execute($identifier, $input);
                 }else{
                    throw new Exception('aucun identifiant envoyé') ;
                 }
                break;
            case "admin":
                echo $twig->render ('administration.twig', ['title'=>'admin']);
                break;  
            default:
                echo $twig->render ('404.twig', ['title'=>'404']);
        }
        
    
    
    }else{
        echo $twig->render ('homepage.twig', array('session'=> $_SESSION));
    }

}catch (Exception $e) {
    $errorMessage = $e->getMessage();

    echo $twig->render ('error.twig', ['error'=> $errorMessage]);
}



