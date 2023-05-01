<?php

require_once 'function.php';

$token = isset($_GET['token']) ? $_GET['token'] : false;

if (!$token || !validateUserToken($token,'riders')) {
    header('Location: http://localhost/rider/login.php?error=login+required');
}

$orderID = isset($_GET['orderID']) ? $_GET['orderID'] : false;

if (!$orderID) {
    header(`Location: http://localhost/rider/view-assgined-orders.php?token=$token&error=server+failed`);
}

$responese = RecieveOrder($orderID, $token);

if (!$responese) {
    header(`Location: http://localhost/rider/view-assgined-orders.php?token=$token&error=server+failed`);
}


header('Location: http://localhost/rider/rider-homepage.php?token=' . $token);