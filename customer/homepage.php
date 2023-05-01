<?php 

require_once BASEURL . "/components/header.php";
require BASEURL . "/core/function.php";

$token = isset($_GET['token']) ? $_GET['token'] : false;

if (!$token || !validateUserToken($token)) {
    header('Location: ' . SITEURL . '/auth/login.php?error=login+required');
}

$username = get_username($token);

?>

<link rel="stylesheet" href="<?php echo SITEURL ?>/public/css/customer-homepage.css">
<section class="relative h-full">
    <div class="flex h-full">
        <div class="w-3/4 p-4">
            <div class="p-4 w-full h-full rounded-lg " style="box-shadow: rgba(0, 0, 0, 0.25) 0px 0px 10px 5px;">
                <h1 class="text-black font-bold text-4xl">Welcome back, <?= $username ?? 'User' ?> </h1>
                <div class="h-2 w-1/2 my-4" style="background-color: rgb(152, 0, 0);"></div>
                <div class="w-full flex flex-row justify-between">
                    <div class="flex flex-col-reverse gap-4 w-1/2">
                        <a href="<?php echo SITEURL ?>/customer/menu.php<?php echo $token ? '?token=' . $token : '' ?>" class="w-full text-white text-xl font-bold p-2 rounded-lg"
                            style="background-color: rgb(0, 105, 0);">START ORDERING NOW !</a>
                        <a href="<?php echo SITEURL ?>/customer/menu.php<?php echo $token ? '?token=' . $token : '' ?>" class="w-2/3 text-white text-xl font-bold p-2 rounded-lg"
                            style="background-color: rgb(152, 0, 0);">GET 50% OFF NOW</a>
                    </div>
                    <div class="w-1/2">
                        <img src="<?php echo SITEURL ?>/public/media/customerhomepageimage.png" class="w-4/5 ml-auto">
                    </div>
                </div>
            </div>
        </div>
        <div class="w-1/4 p-4 flex flex-col gap-4">
            <div class="p-4 w-full h-1/2 rounded-lg flex justify-center items-center "
                style="box-shadow: rgba(0, 0, 0, 0.25) 0px 0px 10px 5px; background-image: url('<?php echo SITEURL ?>/public/media/image-block.png'); background-repeat: no-repeat; background-size: auto; background-position: center center;">
                <a href="<?php echo SITEURL ?>/">
                    <h1 class="text-center m-auto font-bold text-2xl text-white">Home</h1>
                </a>
            </div>
            <div class="p-4 w-full h-1/2 rounded-lg flex justify-center items-center "
                style="box-shadow: rgba(0, 0, 0, 0.25) 0px 0px 10px 5px; background-image: url('<?php echo SITEURL ?>/public/media/image-block-2.png'); background-repeat: no-repeat; background-size: auto; background-position: center center;">
                <a href="<?php echo SITEURL ?>/customer/cart.php<?php echo $token ? '?token=' . $token : '' ?>">
                    <h1 class="text-center m-auto font-bold text-2xl text-white">Cart</h1>
                </a>
            </div>
        </div>
    </div>
    <div class="w-full h-72 flex gap-8 p-4">
        <div class="p-4 w-full h-full rounded-lg flex justify-center items-center "
            style="box-shadow: rgba(0, 0, 0, 0.25) 0px 0px 10px 5px; background-image: url('<?php echo SITEURL ?>/public/media/image-block-3.png'); background-repeat: no-repeat; background-size: auto; background-position: center center;">
            <a href="<?php echo SITEURL ?>">
                <h1 class="text-center m-auto font-bold text-2xl text-white">Logout</h1>
            </a>
        </div>
        <div class="p-4 w-full h-full rounded-lg flex justify-center items-center "
            style="box-shadow: rgba(0, 0, 0, 0.25) 0px 0px 10px 5px; background-image: url('<?php echo SITEURL ?>/public/media/image-block-4.png'); background-repeat: no-repeat; background-size: auto; background-position: center center;">
            <a href="<?php echo SITEURL ?>/customer/profile.php<?php echo $token ? '?token=' . $token : '' ?>">
                <h1 class="text-center m-auto font-bold text-2xl text-white">Profile</h1>
            </a>
        </div>
        <div class="p-4 w-full h-full rounded-lg flex justify-center items-center "
            style="box-shadow: rgba(0, 0, 0, 0.25) 0px 0px 10px 5px; background-image: url('<?php echo SITEURL ?>/public/media/image-block-5.png'); background-repeat: no-repeat; background-size: auto; background-position: center center;">
            <a href="<?php echo SITEURL ?>/customer/orders.php<?php echo $token ? '?token=' . $token : '' ?>">
                <h1 class="text-center m-auto font-bold text-2xl text-white">Orders</h1>
            </a>
        </div>
        <div class="p-4 w-full h-full rounded-lg flex justify-center items-center "
            style="box-shadow: rgba(0, 0, 0, 0.25) 0px 0px 10px 5px; background-image: url('<?php echo SITEURL ?>/public/media/image-block-6.png'); background-repeat: no-repeat; background-size: auto; background-position: center center;">
            <a href="<?php echo SITEURL ?>/customer/menu.php<?php echo $token ? '?token=' . $token : '' ?>">
                <h1 class="text-center m-auto font-bold text-2xl text-white">Offers</h1>
            </a>
        </div>
    </div>
</section>

<?php 

require_once BASEURL . "/components/footer.php";

?>