<?php
namespace App\Controllers;

use App\Models\user;
use App\Models\Session;
use App\Models\PostGlobal;
use App\db\DatabaseConnection;

class AddUser extends Controller
{

    /**
     * Method to do the checks and to secure the entrances
     * and to add a new user.
     *
     * @return void
     */


    public function execute()
    {
        if (PostGlobal::get('submit')) {
            if (null !==PostGlobal::get('username') && null !==PostGlobal::get('password')
                && !empty(PostGlobal::get('username')) && !empty(PostGlobal::get('password'))
            ) {
                $username = strip_tags(trim(PostGlobal::get('username')));
                if (strlen($username) <5) {
                    throw new \Exception('pseudo trop court!');
                }

                if (!filter_var(PostGlobal::get('email'), FILTER_VALIDATE_EMAIL)) {
                    throw new \Exception('adresse mail incorrecte !');
                }
                    $email = PostGlobal::get('email');

                    // We check that the nickname is unique.
                    $usernameCheck = new User();
                    $usernameCheck->connection = new DatabaseConnection();
                    $result1 = $usernameCheck->checkUserUsername($username);
                if ($result1) {
                    throw new \Exception('pseudo déjà existant !');
                }
                    // We check that the email is unique.
                    $userMailCheck = new User();
                    $userMailCheck->connection = new DatabaseConnection();
                    $result2 = $userMailCheck->checkUserEmail($email);
                if ($result2) {
                    throw new \Exception('email déjà existant !');
                }

                    $pass = password_hash(PostGlobal::get('password'), PASSWORD_DEFAULT);

                    // We add the new user.
                    $userRepository = new User();
                    $userRepository->connection = new DatabaseConnection();
                    $success = $userRepository->addUser($username, $pass, $email);
                if (!$success) {
                    throw new \Exception('Impossible d\'ajouter l\'utilisateur !');
                }
                        $usersession = new User();
                        $usersession->connection = new DatabaseConnection();
                        $sessionResult = $usersession->checkUserUsername($username);
                        Session::put('user_id', $sessionResult->getUser_id);
                        Session::put('username', $sessionResult->getUsername);
                        Session::put('role', $sessionResult->getRole);
                        header('location: index.php');
            } else {
                ?>
                <script language="javascript"> 
                alert("Toutes les informations doivent être complétées");
                document.location.href = 'index.php?action=register';</script>
                <?php
            }
        }
        $this->twig->display('register.twig');
    }


}
