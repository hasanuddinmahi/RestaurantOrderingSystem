<?php

require_once BASEURL . "/components/header.php";
require BASEURL . "/core/function.php";

$token = isset($_GET['token']) ? $_GET['token'] : false;

$error = $_GET['error'] ?? false;

$cartSessionItems = $_SESSION['shopping_cart'] ?? [];

if (!$token || !validateUserToken($token)) {
    header('Location: ' . SITEURL . '/auth/login.php?error=login+required');
}

if(count($cartSessionItems) < 1){
    header('Location: ' . SITEURL . '/customer/cart.php?token=' . $token . '&error=Add+items+to+cart+first');
}

$cartItems = get_cart_items($cartSessionItems) ?? [];

$submitedCart = array_map(function ($item) {
    return [
        'id' => $item['ID'],
        'quantity' => $item['quantity'],
        'price' => $item['Price'],
        'name' => $item['Name'],
    ];
}, $cartItems);

$subtotal = cart_total($cartItems) ?? 0;

$tax = $subtotal * 0.04;

$delveryFee = 10;

$grandTotal = $subtotal + $tax + $delveryFee;

?>
<script src="http://localhost/public/js/anmojs-bundle.js"></script>
<form id="checkoutform" action="<?php echo SITEURL ?>/core/checkout-actions.php" method="post" style="width: 100%; height: 100%; padding-bottom: 20px;">
    <div
        style="margin: 0px 40px 20px; height: 400px; box-shadow: rgba(0, 0, 0, 0.75) 0px 0px 10px 0px; border-radius: 0px 15px 15px; overflow: hidden auto; white-space: nowrap; display: flex;">
        <div style="flex: 3 1 0%; padding-bottom: 20px;">
            <?php if ($error) { ?> 
                <p style="color: red;" > <?php echo $error; ?> </p>
            <?php } ?>
            <h1 style="font-size: 2.25em; font-weight: bold; margin: 0px; padding: 10px 15px;">Checkout</h1>
            <div style="background-color: rgb(152, 0, 0); width: 100%; height: 10px;"></div>
            <div style="margin-top: 20px; display: flex; padding: 0px 15px;">
                <p style="font-size: 1.25em; font-weight: bold; margin: 0px; flex: 1 1 0%;">Qty</p>
                <p style="font-size: 1.25em; font-weight: bold; margin: 0px; flex: 2 1 0%;">Item</p>
                <p style="font-size: 1.25em; font-weight: bold; margin: 0px; flex: 1 1 0%;">Price (MYR)</p>
            </div>
            <?php foreach ($cartItems as $key => $items): ?>
                <div style="margin-top: 20px; display: flex; padding: 0px 15px;">
                    <p style="font-size: 1.25em; font-weight: bold; margin: 0px; flex: 1 1 0%;"> <?php echo $items['quantity'] . 'x' ?> </p>
                    <p style="font-size: 1.25em; font-weight: bold; margin: 0px; flex: 2 1 0%;">
                        <?php echo $items['Name']; ?>
                    </p>
                    <p style="font-size: 1.25em; font-weight: bold; margin: 0px; flex: 1 1 0%;"> <?php echo $items['Price']; ?> </p>
                </div>
                <?php endforeach; ?>
        </div>
        <div style="flex: 1 1 0%; border-left: 10px solid green;">
            <h1
                style="font-size: 2.25em; font-weight: bold; color: rgb(255, 255, 255); margin: 0px; padding: 10px 15px;">
                :D
            </h1>
            <div style="background-color: rgb(152, 0, 0); width: 100%; height: 10px;"></div>
            <div style="margin-top: 20px; display: flex; padding: 0px 15px;">
                <p style="font-size: 1.25em; font-weight: bold; margin: 0px; flex: 2 1 0%;">Subtotal</p>
                <p style="font-size: 1.25em; font-weight: bold; margin: 0px; flex: 1 1 0%;">
                    <?= $subtotal ?>MYR
                </p>
            </div>
            <div style="margin-top: 20px; display: flex; padding: 0px 15px;">
                <p style="font-size: 1.25em; font-weight: bold; margin: 0px; flex: 2 1 0%;">Tax 4%</p>
                <p style="font-size: 1.25em; font-weight: bold; margin: 0px; flex: 1 1 0%;"><?= $tax ?> MYR</p>
            </div>
            <div style="margin-top: 20px; display: flex; padding: 0px 15px;">
                <p style="font-size: 1.25em; font-weight: bold; margin: 0px; flex: 2 1 0%;">Delivery</p>
                <p style="font-size: 1.25em; font-weight: bold; margin: 0px; flex: 1 1 0%;">
                    <?= $delveryFee ?>MYR
                </p>
            </div>
            <div style="margin-top: 20px; display: flex; padding: 0px 15px;">
                <p style="font-size: 1.25em; font-weight: bold; margin: 0px; flex: 2 1 0%;">Total</p>
                <p style="font-size: 1.25em; font-weight: bold; margin: 0px; flex: 1 1 0%;"><?= $grandTotal ?>MYR</p>
            </div>
        </div>
    </div>
    <div style="width: 100%; padding: 0px 40px; height: 250px; display: flex; gap: 20px; justify-content: space-around;">
        <button style="width: 35%; box-shadow: rgba(0, 0, 0, 0.75) 0px 0px 10px 0px; border-radius: 30px; background-image: url('http://localhost/public/media/pranjall-kumar-sejqj6Eaqe8-unsplash1.png'); background-size: cover; display: flex; justify-content: center; align-items: center; color: white; font-size: 1.5em; font-weight: bold; margin-top: 20px; border: none;">Offers</button>
        <button style="width: 35%; box-shadow: rgba(0, 0, 0, 0.75) 0px 0px 10px 0px; border-radius: 30px; background-image: url('http://localhost/public/media/pranjall-kumar-sejqj6Eaqe8-unsplash 3.png'); background-size: cover; display: flex; justify-content: center; align-items: center; color: white; font-size: 1.5em; font-weight: bold; margin-top: 20px; border: none;">Menu</button>
        <div id="checkout-body" style="width: 30%; box-shadow: rgba(0, 0, 0, 0.75) 0px 0px 10px 0px; margin-top: 20px; border-radius: 15px; display: flex; flex-direction: column; justify-content: center;"></div>
    </div>
    <input type="hidden" value="<?= $subtotal ?>" name="order_subtotal">
    <input type="hidden" value="<?= $tax ?>" name="order_tax">
    <input type="hidden" value="<?= $delveryFee ?>" name="order_delv">
    <input type="hidden" value="<?= $grandTotal ?>" name="order_total">
    <input type="hidden" value='<?= json_encode($submitedCart) ?>' name="order_items">
    <input type="hidden" value="<?= $token ?>" name="order_user">
</form>
<script src="http://localhost/public/js/dialogs.js"></script>

<?php

require_once BASEURL . "/components/footer.php";

?>