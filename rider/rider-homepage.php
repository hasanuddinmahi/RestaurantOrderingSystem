<?php 

require_once BASEURL . "/components/header.php";

$token = isset($_GET['token']) ? $_GET['token'] : false;

if (!$token || !validateUserToken($token, 'riders')) {
    header('Location: ' . SITEURL . '/auth/login.php?error=login+required');
}


?>
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->

<link rel="stylesheet" href="<?php echo SITEURL ?>/public/css/riderwelcome.css" />

<section>
    <div class="welcome">
        <h1>Welcome Rider</h1>
        <hr>
    </div>

    <div class="main-section">
        <div class="buttons">
           <button class="btn"> <a href="<?php echo SITEURL ?>/rider/view-assgined-orders.php<?php echo $token ? '?token=' . $token : '' ?>">
                Assigned Orders
            </a></button>
            <br>
            <button class="btn"><a href="<?php echo SITEURL ?>/rider/veiw-confirmed-order.php<?php echo $token ? '?token=' . $token : '' ?>">
                Confirmed Orders
            </a></button>
        </div>
        <div >
            <img class="img-section" src="https://i.ibb.co/WDZm16p/image.png" alt="">
        </div>
    </div>
</section>


<?php 

require_once BASEURL . "/components/footer.php";

?>