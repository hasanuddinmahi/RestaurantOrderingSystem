<?php 

require_once BASEURL . "/components/header.php";

$error = $_GET['error'] ?? false;

?>

<link rel="stylesheet" href="<?php echo SITEURL ?>/public/css/sign-up.css">

<div class="main">
    <h1> Sign Up </h1>

    <?php if ($error) { ?> 
        <p style="color: red;" > <?php echo $error; ?> </p>
    <?php } ?>
    
    <form action="<?php echo SITEURL ?>/core/auth.php" method="post">
        <input type="hidden" name="request" value="register">

        <div id="name">
            <h3 class="name">Name:</h3>
            <input name="first_name" class="firstname" type="text" />
            <label class="firstlabel">First Name</label>
            <input name="last_name" class="lastname" type="text" />
            <label class="lastlabel">Last Name</label>
        </div>

        <h3 class="name">Address:</h3>
        <input name="address" class="address" type="text" placeholder="(House Number,Road Number etc.)" />

        <h3 class="content">Phone Number:</h3>
        <input name="phone_number" type="tel" class="details" />

        <h3 class="content">Email:</h3>
        <input name="email" type="email" class="details" placeholder="(exapmle@email.com)" />

        <h3 class="content">Create Password:</h3>
        <input name="password" class="passwd" type="password" />

        <h3 class="content">Confirm Password:</h3>
        <input name="confrim_password" type="password" class="passwd" />

        <p class="term"> <span><input name="tos" type="Checkbox" /></span> I agree to the terms of services </p>

        <input type="submit" value="Sign up">

        <p class="login">Already have an account?<a href="<?php echo SITEURL ?>/auth/login.php"> Login here</a></p>
    </form>
</div>

<?php 

require_once BASEURL . "/components/footer.php";

?>