<?php 

require_once BASEURL . "/components/header.php";
require BASEURL . "/core/function.php";

$token = isset($_GET['token']) ? $_GET['token'] : false;

if (!$token || !validateUserToken($token)) {
    header('Location: ' . SITEURL . '/auth/login.php?error=login+required');
}

$user = get_user_info($token);

?>

<div style="width: 100%; height: 100%; padding-bottom: 20px;">
    <div
        style="margin: 0px 40px 20px; height: 400px; box-shadow: rgba(0, 0, 0, 0.75) 0px 0px 10px 0px; border-radius: 0px 15px 15px; overflow: hidden auto; white-space: nowrap;">
        <div style="width: 100%; padding-bottom: 20px;">
            <h1 style="font-size: 2.25em; font-weight: bold; margin: 0px; padding: 10px 15px;">Profile</h1>
            <div style="background-color: rgb(152, 0, 0); width: 100%; height: 10px;"></div>
            <div style="margin-top: 20px; padding: 0px 15px;">
                <p style="font-size: 1.25em; font-weight: bold; margin: 0px; margin-bottom: 10px;">
                    Full Name:
                    <span style="font-size: 0.85em; font-weight: normal;"> <?= $user['FirstName'] . ' ' . $user['LastName'] ?> </span>
                </p>
                <p style="font-size: 1.25em; font-weight: bold; margin: 0px; margin-bottom: 10px;">
                    Email:
                    <span style="font-size: 0.85em; font-weight: normal;"> <?= $user['Email'] ?> </span>
                </p>
                <p style="font-size: 1.25em; font-weight: bold; margin: 0px; margin-bottom: 10px;">
                    Phone:
                    <span style="font-size: 0.85em; font-weight: normal;"> <?= $user['Phone']  ?> </span>
                </p>
                <p style="font-size: 1.25em; font-weight: bold; margin: 0px; margin-bottom: 10px;">
                    Address:
                    <span style="font-size: 0.85em; font-weight: normal;"> <?= $user['Address'] ?> </span>
                </p>
            </div>
        </div>
    </div>
    <div
        style="width: 100%; padding: 0px 40px; height: 250px; display: flex; gap: 20px; justify-content: space-around;">
        <a href="<?php echo SITEURL ?>/customer/menu.php?token<?= $token ?>" 
            style="width: 35%; box-shadow: rgba(0, 0, 0, 0.75) 0px 0px 10px 0px; border-radius: 30px; background-image: url('<?php echo SITEURL ?>/public/media/pranjall-kumar-sejqj6Eaqe8-unsplash1.png'); background-size: cover; display: flex; justify-content: center; align-items: center; color: white; font-size: 1.5em; font-weight: bold; margin-top: 20px; border: none;">Offers</a>
        <a href="<?php echo SITEURL ?>/customer/homepage.php?token=<?= $token ?>"
            style="width: 35%; box-shadow: rgba(0, 0, 0, 0.75) 0px 0px 10px 0px; border-radius: 30px; background-image: url('<?php echo SITEURL ?>/public/media/pranjall-kumar-sejqj6Eaqe8-unsplash 3.png'); background-size: cover; display: flex; justify-content: center; align-items: center; color: white; font-size: 1.5em; font-weight: bold; margin-top: 20px; border: none;">Home</a>
        <a href="<?php echo SITEURL ?>/customer/menu.php?token<?= $token ?>" 
            style="width: 35%; box-shadow: rgba(0, 0, 0, 0.75) 0px 0px 10px 0px; border-radius: 30px; background-image: url('<?php echo SITEURL ?>/public/media/pranjall-kumar-sejqj6Eaqe8-unsplash1.png'); background-size: cover; display: flex; justify-content: center; align-items: center; color: white; font-size: 1.5em; font-weight: bold; margin-top: 20px; border: none;">Menu</a>
    </div>
</div>

<?php 

require_once BASEURL . "/components/footer.php";

?>