<?php 

require_once BASEURL . "/components/header.php";
$error = $_GET['error'] ?? false;

?>

<link rel="stylesheet" href="<?php echo SITEURL ?>/public/css/login.css">
<div class="main">
    <h1>Log In</h1>
    <?php if ($error) { ?> 
        <p style="color: red;" > <?php echo $error; ?> </p>
    <?php } ?>
    <form action="<?php echo SITEURL ?>/core/auth.php" method="post">
        <input type="hidden" name="request" value="login">

        <h3 class="content">Email:</h3>
        <input name="email" type="text" class="details" placeholder="(exapmle@email.com)" />

        <h3 class="content">Password:</h3>
        <input class="details" type="password" name="password" />

        <p class="forget"><a href="<?php echo SITEURL ?>/auth/register.php?error=create%20a%20new%20account">  Forget password?</a></p>

        <input type="submit" class="login" value="Log In">

        <hr>
        <p class="or">OR</p>
        <a href="<?php echo SITEURL ?>/auth/register.php"><button type="button" class="signup">Sign Up</button></a>
    </form>
</div>

<?php 

require_once BASEURL . "/components/footer.php";

?>