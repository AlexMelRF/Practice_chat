<?php

namespace libraries;

class DBConnect {
    public static function start($host = '127.0.0.1', $user = 'root', $psw = '', $db = 'practicechat', $port = '3306') {
        $db_connect = mysqli_connect($host, $user, $psw, $db, $port);
        if (!$db_connect) 
            die ('DataBase connection error!');
        return $db_connect;
    }
}
// $db_connect = mysqli_connect('localhost', 'root', '', 'practicechat');
// if (!$db_connect) 
//     die ('DataBase connection error!');

