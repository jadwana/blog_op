<?php

session_start();

use App\services\Get;
use App\services\Session;
use App\Controllers\Logon;
use App\Controllers\Logout;
use App\Controllers\AddPost;
use App\Controllers\AddUser;
use App\Controllers\OnePost;
use App\Controllers\PostList;
use App\Controllers\AddComment;
use App\Controllers\DeletePost;
use App\Controllers\UpdatePost;
use App\Controllers\AdminPostList;
use App\Controllers\DeleteComment;
use App\Controllers\UpdateComment;
use App\Controllers\ValidatedComment;
use App\Controllers\AdminCommentsList;

// Autoload
require 'vendor/autoload.php';


$loader = new Twig\Loader\FilesystemLoader('app/views');
$twig = new \Twig\Environment(
    $loader, [
    'cache' => false, //'tmp'
    ]
);
$twig->addGlobal('session', $_SESSION);



// Router
try{

    if (null !==Get::get('action') && Get::get('action') !== '') {
        switch (Get::get('action')) {
        case "postlist":
            (new PostList())->execute();
            break;
        case "onepost":
            if (null !== Get::get('id') && get::get('id') > 0) {
                $identifier = Get::get('id');
                (new OnePost())->execute($identifier);
            } else {
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
            if (null !==Session::get('user_id')) {
                throw new Exception(
                    'Vous êtes déjà connecté, 
                vous ne pouvez pas vous inscrire à nouveau'
                );
            }
            (new AddUser())->execute();
            break;
        case "addComment":
            if (null !== Get::get('id') && Get::get('id') > 0) {
                $identifier = Get::get('id');
                (new AddComment())->execute($identifier);
            } else {
                  throw new Exception('aucun identifiant envoyé');
            }
            break;
        case "updateComment":
            if (null !== Get::get('id') && Get::get('id') > 0) {
                $identifier = Get::get('id');
                $input = null;
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $input = $_POST;
                }
                (new UpdateComment())->execute($identifier, $input);
            } else {
                  throw new Exception('aucun identifiant envoyé');
            }
            break;
        case "admin":
            if (null !== Session::get('user_id') && Session::get('role') == 'admin') {
                echo $twig->render(
                    'administration.twig',
                );
            } else {
                  throw new Exception('Seul l\'administrateur à accès à cette page');
            }
            break;
        case "addPost":
            (new AddPost())->execute();
            break;
        case "adminpostlist":
            (new AdminPostList())->execute();
            break;
        case "updatepost":
            if (null !== Get::get('id') && Get::get('id') > 0) {
                $identifier = Get::get('id');
                $input = null;
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $input = $_POST;
                }
                (new UpdatePost())->execute($identifier, $input);
            } else {
                  throw new Exception('aucun identifiant envoyé');
            }
            break;
        case "deletepost":
            if (null !== Get::get('id') && Get::get('id') > 0) {
                $identifier = Get::get('id');
                (new DeletePost())->execute($identifier);
            } else {
                  throw new Exception('aucun identifiant envoyé');
            }
            break;
        case "admincommentslist":
            (new AdminCommentsList())->execute();
            break;
        case "validationComment":
            if (null !==Get::get('id') && Get::get('id') > 0) {
                $identifier = Get::get('id');
                (new ValidatedComment())->execute($identifier);
            } else {
                  throw new Exception('aucun identifiant envoyé');
            }
            break;
        case "deleteComment":
            if (null !== Get::get('id') && Get::get('id') > 0) {
                $identifier = Get::get('id');
                (new DeleteComment())->execute($identifier);
            } else {
                  throw new Exception('aucun identifiant envoyé');
            }
            break;
        case "notice":
            echo $twig->render('legalnotice.twig');
            break;
        case "policy":
            echo $twig->render('privacypolicy.twig');
            break;
        default:
            echo $twig->render('404.twig');
        }
    
    
    } else {
        echo $twig->render('homepage.twig');
    }

}catch (Exception $e) {
    $errorMessage = $e->getMessage();

    echo $twig->render(
        'error.twig',
        ['error' => $errorMessage]
    );
}



