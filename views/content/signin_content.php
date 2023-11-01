<?php

$msg = $_SESSION['message'] ?? null;
$auth = $_SESSION['auth'] ?? null;
$token = hash('gost-crypto', random_int(0,999999));
$_SESSION["CSRF"] = $token;

if ($auth)
    header('Location: index.php?url=profile');

?>

<div class="signin-form">
    <form action="libraries/signin.php" method="post">
        <div class="form-header">
            <h2>Sign in</h2>
        </div>
        <div class="form-group">
            <label>Email/Nickname</label><br>
            <input type="text" name="email" placeholder="Enter your email/nickname here" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label>Password</label><br>
            <input type="password" name="pass" placeholder="Enter your password here" autocomplete="off" required>
        </div>
        <div class="small">Forgot your password?<a href="recovery_pswd.php"> Restore</a></div><br>
            <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block btn-lg" name="signin">Sign in</button>
        </div>
        <input type="hidden" name="token" value="<?= $token ?>">
        <!--//<//?php //include("signin_user.php"); ?>-->

        <?php    

        if ($msg)
            echo '<p class="msg">'.$msg.'</p>';
        unset($_SESSION['message']); 

        ?>

    </form>
    <div class="text-center small" style="color: #67428B;">Don't have an account?<a href="index.php?url=signup"> Create now</a></div>
</div>


