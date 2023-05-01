<?php
//root directory

define('BASEURL', dirname(__FILE__));
define('SITEURL', 'http://localhost');

$current_path = $_SERVER['REQUEST_URI'];
$paresdURL = parse_url($current_path, PHP_URL_PATH);

$paths = explode('/', $paresdURL);
$page = str_replace('.php', '', end($paths));

session_start();

if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = array();
}

switch ($page) {
    // auth required
    case 'checkout':
        require_once "customer/checkout.php";
        break;
    case 'cart';
        require_once "customer/cart.php";
        break;
    case 'orders':
        require_once "customer/orders.php";
        break;
    case 'order':
        require_once "customer/order.php";
        break;
    case 'profile':
        require_once "customer/profile.php";
        break;
    case 'homepage':
        require_once "customer/homepage.php";
        break;
    
    case 'rider-homepage':
        require_once "rider/rider-homepage.php";
        break;
    case 'veiw-confirmed-order':
        require_once "rider/veiw-confirmed-order.php";
        break;
    case 'view-assgined-orders':
        require_once "rider/view-assgined-orders.php";
        break;
    case 'view-order-details':
        require_once "rider/view-order-details.php";
        break;

    // admin required    
    case 'dashboard':
        require_once "admin/dashboard.php";
        break;

    // no auth requried
    case 'menu':
        require_once "customer/menu.php";
        break;
    case 'login':
        require_once "auth/login.php";
        break;
    case 'register':
        require_once "auth/register.php";
        break;
    default:
        require_once "frontpage.php";
        break;
}

?>