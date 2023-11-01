<?php
//attach all libraries and connect to the database
namespace App\Services;
require_once "../libraries/DBConnect.php";
use libraries\DBConnect as DB;

class LibServ {
    public static $db;

    public static function get_db() {
        return self::$db;
    }

    public static function start() {
        self::libs_connect();
        self::db_connect();
    }

    private static function libs_connect() {
        $config = require_once "libraries/config/lbs_list.php";
        //read line by line array from lbs_list.php and attach the libraries
        foreach ($config["libs"] as $lib) {
            require_once "libraries/" . $lib . ".php";
        }
    }

    private static function db_connect() {
        $config = require_once "libraries/config/db.php";
        self::$db = DB::start($config["host"], $config["username"], $config["password"], $config["db_name"], $config["port"]);
        // if (!\R::testConnection()) 
        //     exit('No DB connection');
    }
}