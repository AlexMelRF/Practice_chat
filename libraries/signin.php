<?php

session_start();

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

require_once "../vendor/autoload.php";
//require_once 'db_connect.php';

function warn($msg) {
    $_SESSION['message'] = $msg;
    header('Location: ../index.php?url=signin');
}

$logger = new Logger('auth');
$logger -> pushHandler(new StreamHandler('../logs/auth_success.log', Logger::INFO));
$logger -> pushHandler(new StreamHandler('../logs/auth_fault.log', Logger::NOTICE));

if ($_POST['token'] == $_SESSION['CSRF']) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $remember = $_POST['remember'] ?? null;
    //$check_user = mysqli_query($db_connect, "SELECT * FROM `users` WHERE `login` = '$login'");
    $check_user = \R::find('users', 'login = ?', [$login]);
    // var $user contents array with data from sql query                 
    //$user = mysqli_fetch_assoc($check_user);
    //if (mysqli_num_rows($check_user) > 0) {
        if ($check_user) {
        $pass = password_verify($password, $user['password']);
        if ($pass) {
            if ($remember) {
                //set cookie with token to remember user for 24 hours
                $token = random_bytes(16);
                mysqli_query($db_connect, "UPDATE `users` SET `token` = '$token' WHERE `users`.`login` = '$login'");
                setcookie("remember", $token, time() + 60 * 60 * 24);
                setcookie("id", $user['id'], time() + 60 * 60 * 24);
            }
            //logging if successful authorization
            $logger -> info($user['name'].' => logged successfully');
            //next string to define wether it is admin or user
            $_SESSION['position'] = $user['position'];
            $_SESSION['auth'] = true;
            $_SESSION['user'] = [
                "id" => $user['id'],
                "login" => $user['login'],
                "ava" => $user['ava']
            ];
            header('Location: ../index.php?url=profile');
        } else {
            $logger -> notice($login.' => unsuccessful logging');
            warn('Login or/and password is/are wrong!');
        }
    } else {
        $logger -> notice($login.' => unsuccessful logging');
        warn('Login or/and password is/are wrong!');
    }
} else 
    warn('Suspicious activity detected on the page!');

