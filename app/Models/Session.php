<?php
namespace App\Models;

class Session{

    public static function put($key, $value){
        $_SESSION[$key] = $value;
    }

    public static function get($key){
        return (isset($_SESSION[$key]) ? $_SESSION[$key] : null);
    }

   
}