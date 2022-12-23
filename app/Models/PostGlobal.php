<?php

namespace App\Models;

class PostGlobal{

    public static function put($key, $value){
        $_POST[$key] = $value;
    }

    public static function get($key){
        return (isset($_POST[$key]) ? $_POST[$key] : null);
    }

    
}