<?php
namespace App\Controllers;

use App\Models\User;
use App\db\DatabaseConnection;

/**
 * Class logon
 * To logon the user
 */
class Logon extends Controller
{
    /**
     * Method which verifies the username and password of the user
     * and retrieves the session data
     *
     * @return void
     */
    public function execute()
    {
        if (!empty($_POST)) {
             $username =null;

            if (isset($_POST['username'], $_POST['password']) 
                && !empty(trim($_POST['username'])) && !empty($_POST['password'])
            ) {
                $username=htmlspecialchars(trim($_POST['username']));

                $userRepository = new User();
                $userRepository->connection= new DatabaseConnection();
                $connectedUser = $userRepository->checkUserUsername($username);
                if (!$connectedUser) {
                    ?>
                    <script language="javascript"> 
                    alert("Mauvais pseudo");
                    </script>
                    <?php
                } else {
                    if (password_verify(
                        trim($_POST['password']), 
                        $connectedUser->getPassword
                    )
                    ) {
                        $_SESSION['user_id']= $connectedUser->getUser_id;
                        $_SESSION['username']= $connectedUser->getUsername;
                        $_SESSION['role'] = $connectedUser->getRole;

                        ?>
                        <script language="javascript"> 
                        alert("Connexion réussie!");
                        document.location.href = 'index.php';
                        </script>
                        <?php
                    } else {
                        ?>
                        <script language="javascript"> 
                        alert("Mauvais mot de passe");
                        </script>
                        <?php
                    }
                }
            } else {?>
                <script language="javascript"> 
                alert("Vous devez remplir tous les champs");
                </script>
                <?php 
            }
        } else {
        }
        $this->twig->display('connection.twig');
    }
}
