<?php

$auth = $_SESSION['auth'] ?? null;

if (!$auth)
    header('Location: index.php?url=signin');

?>

<div>
    <img src="<?= $_SESSION['user']['ava'] ?>" alt="">
    <a href="libraries/index.php?url=signout">Sign out</a>
</div>


