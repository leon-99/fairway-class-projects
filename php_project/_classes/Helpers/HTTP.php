<?php

namespace Helpers;

class HTTP
{
    static $url = "http://localhost/php_project";

    static function redirect($path, $q="") 
    {
        $go = static::$url . $path;


        if ($q) $go .= "?$q";
        header("location: $go");
        exit();
    }

    static function session_start()
    {
        session_start();
    }
}
