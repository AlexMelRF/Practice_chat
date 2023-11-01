<?php

session_start();

require_once "../App/Services/LibServ.php"; 

use App\Services\LibServ;

$db_connect = LibServ::get_db();

function warn($msg, $url) {
    $_SESSION['message'] = $msg;
    header('Location: ../index.php?url='.$url);
}

$pswd = $_POST['password'];
$pswd_conf  = $_POST['password_confirm'];
$email = $_POST['email'];
$nick = $_POST['nick'];
$ava = 'images/default_ava.jpg';
if ($pswd === $pswd_conf) {
    $check_user = mysqli_query($db_connect, "SELECT * FROM `users` WHERE `nick` = '$nick'");
    if (mysqli_num_rows($check_user) == 0) {
        //$path = 'images/'.time().$_FILES['ava']['name'];
        //if (!move_uploaded_file($_FILES['ava']['tmp_name'], '../'.$path)) {
            //warn('Loading file error!', 'signup');
        //} else {
            $password = password_hash($psw, PASSWORD_BCRYPT);
            mysqli_query($db_connect, "INSERT INTO `users` (`id`, `nick`, `email`, `pswd`, `ava`) VALUES (NULL, '$nick', '$email', '$pswd', '$ava')");
            warn('Successfull registration!', 'signin');
        //}
    } else 
        warn('Please, try another nickname!', 'signup');
} else 
    warn('Passwords mismatch!', 'signup');

