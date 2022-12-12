<?php
namespace App\Controllers;

class Logout
{
    /**
     * Method to user logout
     *
     * @return void
     */
    public function execute()
    {
        session_start();
        // check that the user is logged in
        // otherwise he is sent to the homepage
        if (!isset($_SESSION["user_id"])) {
            header("location: index.php");
            exit;
        }
        session_unset();
        session_destroy();
        header("location: index.php");
    }
}
