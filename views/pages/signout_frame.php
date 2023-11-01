<?php

$auth = $_SESSION['auth'] ?? null;

if (!$auth)
    header('Location: index.php?url=signin');
else
    require_once 'libraries/signout.php';