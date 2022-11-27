<?php
namespace App\Controllers;

use App\Models\user;
use App\db\DatabaseConnection;
require 'vendor/autoload.php';


class AddUser extends Controller
{
    //method to do the checks and to secure the entrances
    public function execute()
    {
        if(!empty($_POST)) {
            if(isset($_POST["username"], $_POST["password"]) && !empty($_POST["username"]) && !empty($_POST["password"])) {

                $username= strip_tags(trim($_POST['username']));
                if(strlen($username)<5) {
                    throw new \Exception('votre pseudo est trop court!');
                }
                if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    echo 'adresse mail incorrecte';
                }
                    $email=$_POST['email'];

                    //we check that the nickname is unique
                    $usernameCheck = new User();
                    $usernameCheck->connection= new DatabaseConnection();
                    $result1 = $usernameCheck->checkUserUsername($username);
                if($result1) {
                    throw new \Exception('pseudo déjà existant !');
                }

                    //we check that the email is unique
                    $userMailCheck = new User();
                    $userMailCheck->connection= new DatabaseConnection();
                    $result2 = $userMailCheck->checkUserEmail($email);
                if($result2) {
                    throw new \Exception('email déjà existant !');
                }

                    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

                    //we add the new user
                    $userRepository = new User();
                    $userRepository->connection = new DatabaseConnection();
                    $success = $userRepository->addUser($username, $pass, $email);
                if(!$success) {
                    throw new \Exception('Impossible d\'ajouter l\'utilisateur !');
                }
                        $usersession = new User();
                        $usersession->connection= new DatabaseConnection();
                        $sessionResult = $usersession->checkUserUsername($username);
                        $_SESSION['user_id']= $sessionResult->getUser_id;
                        $_SESSION['username']= $sessionResult->getUsername;
                        $_SESSION['role'] = $sessionResult->getRole;
                        header('location: index.php');
            }
            else{
                echo 'toutes les informations doivent être complétées';
            }
        }

        $this->twig->display('register.twig');
        
    }
}
