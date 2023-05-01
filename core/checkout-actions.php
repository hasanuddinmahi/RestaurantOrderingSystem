<?php

require dirname(dirname(__FILE__)) . '/database-manager.php';

$body = array(
    'order_payment', 
    'order_subtotal', 
    'order_tax', 
    'order_delv', 
    'order_total', 
    'order_user',
    'order_items'
);

foreach ($body as $key) {
    if (!isset($c[$key]) || empty($_POST[$key])) {
        header('Location: http://localhost/customer/checkout.php?error=error+occured');
    }
}

$payment = $_POST['order_payment'];
$subtotal = $_POST['order_subtotal'];
$tax = $_POST['order_tax'];
$delv = $_POST['order_delv'];
$total = $_POST['order_total'];
$user = $_POST['order_user'];
$items = $_POST['order_items'];

$db = new DatabaseManager();

$token = uniqid();

$isPaid = $payment == "Cash" ? 0 : 1;

$result = $db->query("INSERT INTO `customerorder` (`ID`, `CustomerID`, `OrderItems`, `OrderStatus`, `CreationDate`, `OrderedDate`, `PreparedDate`, `TakenOverDate`, `isPaid`, `Price`, `Note`) 
VALUES ('$token', '$user', '$items','ordered', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '$isPaid', '$total', '')");

if($result === false){
    header('Location: http://localhost/customer/checkout.php?error=error+occured');
    return;
}

session_start();
$_SESSION['shopping_cart'] = array();

header('Location: http://localhost/customer/orders.php?token=' . $user);