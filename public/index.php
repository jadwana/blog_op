<?php


//autoload
require '../vendor/autoload.php';


$loader = new Twig\Loader\FilesystemLoader('../app/views');
$twig = new \Twig\Environment($loader, [
    'cache'=> false, //'tmp'
]);

//router
if(isset($_GET['action']) && $_GET['action'] !==''){
    
    switch ($_GET['action']){
        case "post":
            echo $twig->render ('postList.twig', ['title'=>'liste de post']);
            break;
        case "onepost":
            echo $twig->render ('onepost.twig', ['title'=>'un post']);
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
    // require '../app/views/homepage.php';
}