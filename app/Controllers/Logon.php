<?php
namespace App\Controllers;

use App\Models\User;
use App\services\Session;
use App\services\PostGlobal;
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
        if (!empty(PostGlobal::getAllPostVars())) {
             $username = null;

            if (PostGlobal::isParamSet('username') &&  PostGlobal::isParamSet('password')
            && !empty(trim(PostGlobal::get('username'))) && !empty(PostGlobal::get('password')))
             {
                $username = htmlspecialchars(trim(PostGlobal::get('username')));
               
                $userRepository = new User();
                $userRepository->connection = new DatabaseConnection();
                $connectedUser = $userRepository->checkUserUsername($username);
                if (!$connectedUser) {
                    ?>
                    <script language="javascript"> 
                    alert("Mauvais pseudo");
                    </script>
                    <?php
                } else {
                    if (password_verify(
                        trim(PostGlobal::get('password')),
                        $connectedUser->getPassword
                    )
                    ) {
                        Session::put('user_id', $connectedUser->getUser_id);
                        Session::put('username', $connectedUser->getUsername);
                        Session::put('role', $connectedUser->getRole);

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
