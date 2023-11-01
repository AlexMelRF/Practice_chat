<?php

namespace App\Services;

class View {
    public static function set_content($content) {
        require_once "views/content/".$content."_content.php";
    }
}

