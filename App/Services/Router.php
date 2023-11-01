<?php

namespace App\Services;

session_start();

$auth = $_SESSION['auth'] ?? null;

class Router {
    // list of available pages
    private static $list = [];        
    public static function set_page($uri, $page) {
        self::$list[] = [
            "uri" => $uri,
            "page" => $page
        ];
    }
    
    public static function enable() {
        $query = $_GET['url'] ?? 'signin';
        foreach (self::$list as $route) {
            if ($route['uri'] === '/'.$query) {        
                require_once "views/pages/".$route['page']."_frame.php";
                die();
            }
        }
        self::error_page();
    }
    
    private static function error_page() {
        require_once "views/pages/error.php";
    }
}

