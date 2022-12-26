<?php
namespace App\Controllers;

use App\services\Session;

/**
 * Logout class
 * To logout the user
 */
class Logout
{
    /**
     * Method to user logout
     *
     * @return void
     */


    public function execute()
    {
        // session_start();
        // // Check that the user is logged in
        // // otherwise he is sent to the homepage
        // if (null !==Session::get('user_id')) {
        //     header("location: index.php");
        //     exit;
        // }

        // session_unset();
        // session_destroy();
        $session = new Session;
        $session->destroySession();
        header("location: index.php");
    }


}
