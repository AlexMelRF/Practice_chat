<?php

$msg = $_SESSION['message'] ?? null;
$auth = $_SESSION['auth'] ?? null;

if ($auth)
    header('Location: index.php?url=profile');

?>

<div class="signup-form">
    <form action="libraries/signup.php" method="post">
        <div class="form-header">
            <h2>Sign up</h2>
            <p>Please, fill in the form</p>
        </div>
        <div class="form-group">
            <label>Nickname</label><br>
            <input type="text" name="nick" placeholder="nickname" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label>Email</label><br>
            <input type="email" name="email" placeholder="email@email.com" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label>Password</label><br>
            <input type="password" name="password" placeholder="password" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label>Confirm your password</label><br>
            <input type="password" name="password_confirm" placeholder="password" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label class="checkbox-inline"><input type="checkbox" required> I accept the <a href="#">Terms of use</a> &amp; <a href="#">Privacy Policy</a></label>   
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block btn-lg" name="signup">Sign up</button>
        </div>
            <!--//<//?php //include("signup_user.php"); ?>-->
    </form>
    <div class="text-center small" style="color: #67428B;">Already have an account?<a href="index.php?url=signin"> Sign in</a></div>
</div>

<?php
                
if ($msg)
    echo '<p class="msg">'.$msg.'</p>';
unset($_SESSION['message']);
                
?>