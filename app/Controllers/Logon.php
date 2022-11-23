<?php
namespace App\Controllers;



use App\Models\User;
use App\db\DatabaseConnection;
require 'vendor/autoload.php';



class Logon extends Controller

{
    //method which verifies the username and password of the user and retrieves the session data
    public function execute()
    {
        if(!empty($_POST)){
             $username =null;

            if(isset($_POST['username'], $_POST['password']) && !empty(trim($_POST['username'])) && !empty($_POST['password'])){
                $username=htmlspecialchars(trim($_POST['username']));

                $userRepository = new User();
                $userRepository->connection= new DatabaseConnection();
                $connectedUser = $userRepository->checkUserUsername($username);
                if(!$connectedUser){
                    throw new \Exception('mauvais pseudo  !');
                }else{
                    if(password_verify(trim($_POST['password']), $connectedUser->getPassword)){
                        $_SESSION['user_id']= $connectedUser->getUser_id;
                        $_SESSION['username']= $connectedUser->getUsername;
                        $_SESSION['role'] = $connectedUser->getRole;

                        header("location: index.php");
                    }else{
                        echo 'mauvais mot de passe'; exit;
                    }
                }
            }else{
                echo 'vous devez remplir tous les champs';
            }
            
        }else{
        }
        $this->twig->display('connection.twig');  
    }
}
