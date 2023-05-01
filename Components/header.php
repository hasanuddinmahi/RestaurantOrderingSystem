<?php
require_once BASEURL . '/core/function.php';

$token = isset($_GET['token']) ? $_GET['token'] : false;

function get_navs($token){
    $customer_pages = [
        "Home" => $token ? "/customer/homepage.php?token=" . $token : "/",
        "Menu" => "/customer/menu.php" . ($token ? "?token=" . $token : ""),
        "Cart" => "/customer/cart.php" . ($token ? "?token=" . $token : ""),
        "Orders" => "/customer/orders.php" . ($token ? "?token=" . $token : ""),
        "Profile" => "/customer/profile.php" . ($token ? "?token=" . $token : ""),
    ];
    
    $rider_pages = [
        "Home" => $token ? "/rider/rider-homepage.php?token=" . $token : "/",
        "Confrimed Orders" => "/rider/veiw-confirmed-order.php" . ($token ? "?token=" . $token : ""),
        "Assigned Orders" => "/rider/view-assgined-orders.php" . ($token ? "?token=" . $token : ""),
    ];

    $usertype = get_user_type($token);

    switch ($usertype) {
        case 'customers': return $customer_pages;
        case 'riders': return $rider_pages;
        case 'admin': return [];
        default: return [
            "Home" => "/",
            "Menu" => "/customer/menu.php"
        ];
    }
}


$loginOrOut = $token ? "Logout" : "Login";  



$navs = [
   ...get_navs($token),
 $loginOrOut => $token ? "" : "/auth/login.php",
];

$currentpage = key($navs);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo SITEURL ?>/public/css/headernav.css">
    <script src="<?php echo SITEURL ?>/public/js/anmojs-bundle.js"></script>
    <title> <?php echo $currentpage ?> </title>
</head>

<body>
    <section style="margin-bottom: 20px;"
        class="relative shadow-lg h-16 flex w-full border border-black justify-between bg-white items-center"
        style="z-index: 5;">
        <div id="logo" class="mx-5">
            <a href="/" data-link="">
                <img src="<?php echo SITEURL ?>/public/media/Screenshot_2022-12-12_152005-removebg-preview.png" width="150" height="30" style="max-width: 100%;">
            </a>
        </div>
        <div class="mx-5">
            <div class="flex font-bold text-sm gap-6 mx-5">
                <?php foreach ($navs as $name => $link): 
                    if ($name == "Cart") {
                        $cart = isset($_SESSION['shopping_cart']) ? $_SESSION['shopping_cart'] : array();
                        $count = cart_count($cart);
                    ?>
                        <a style="position: relative;" href="<?php echo SITEURL . $link ?>" ><?= $name ?> <span id="cart-count" ><?php echo $count === 0 ? '' : $count ?></span> </a>
                    <?php } else { ?>
                        <a href="<?php echo SITEURL . $link ?>" ><?= $name ?></a>
                    <?php } ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>