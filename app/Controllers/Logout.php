<?php
namespace App\Controllers;

class Logout
{
    //method to user logout
    public function execute()
    {
        session_start();
        // check that the user is logged in
        // otherwise it is sent to the homepage
        if(!isset($_SESSION["user_id"])) {
            header("location: index.php");
            exit;
        }
        session_unset();
        session_destroy();
        ;

        header("location: index.php");
    }
}
