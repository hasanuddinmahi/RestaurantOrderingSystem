<?php

require_once 'function.php';

$token = isset($_GET['token']) ? $_GET['token'] : false;

if (!$token || !validateUserToken($token)) {
    header('Location: http://localhost/customer/login.php?error=login+required');
    return;
}

$cartItem = isset($_GET['item']) ? $_GET['item'] : false;

if (!$cartItem) {
    header('Location: http://localhost/customer/menu.php?error=invalid+item');
    return;
}

$action = isset($_GET['action']) ? $_GET['action'] : false;

session_start();

$cart = isset($_SESSION['shopping_cart']) ? $_SESSION['shopping_cart'] : array();

if($action == 'add'){
    $exits = false;
    for ($i=0; $i < count($cart); $i++) { 
        if($cart[$i]['item'] === $cartItem){
            $cart[$i]['quantity'] = (int) $cart[$i]['quantity'] + 1;
            $exits = true;
            break;
        }
    }

    if(!$exits){
        array_push($cart, array(
            'quantity' => 1,
            'token' => $token,
            'item' => $cartItem,
        ));
    }

    $_SESSION['shopping_cart'] = $cart;

    header('Location: http://localhost/customer/menu.php?token=' . $token);


} else if($action == 'remove'){
    foreach ($cart as $key => $item) {
        if($item['item'] === $cartItem){
            $count = (int) $item['quantity'];
            if($count > 1){
                $item['quantity'] = (int) $item['quantity'] - 1;
                $cart[$key] = $item;
            }else{
                unset($cart[$key]);
            }
        }
    }
    $_SESSION['shopping_cart'] = $cart;

    header('Location: http://localhost/customer/cart.php?token=' . $token);

}