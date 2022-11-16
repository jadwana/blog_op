<?php


//autoload
require '../vendor/autoload.php';


//router
if(isset($_GET['action']) && $_GET['action'] !==''){
    
    switch ($_GET['action']){
        case "post":
            require '../app/views/postList.php';
            break;
        case "onepost":
            require '../app/views/onepost.php';
            break;
        case "logon":
            require '../app/views/connexion.php';
            break;
        case "register":
            require '../app/views/register.php';
            break;
        case "admin":
            require '../app/views/administration.php';
            break;  
        default:
            require '../app/views/404.php';
    }
    


}else{
    require '../app/views/homepage.php';
}