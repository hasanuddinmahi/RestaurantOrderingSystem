<?php 

require_once BASEURL . "/components/header.php";
require BASEURL . "/core/function.php";

$token = isset($_GET['token']) ? $_GET['token'] : false;

if (!$token || !validateUserToken($token)) {
    header('Location: ' . SITEURL . '/auth/login.php?error=login+required');
}

$error = $_GET['error'] ?? false;

// get cart items from session

$cartSessionItems = $_SESSION['shopping_cart'] ?? [];

$cartItems = get_cart_items($cartSessionItems) ?? [];

?>

<div style="width: 100%; height: 100%;">
    <div style="display: flex; justify-content: space-between; padding-bottom: 20px; gap: 25px;">
        <div style="width: 75%; margin: 20px;">
            <div
                style="width: 100%; height: 53%; box-shadow: rgba(0, 0, 0, 0.75) 0px 0px 10px 0px; margin-bottom: 20px; border-radius: 0px 15px 15px; padding-bottom: 20px; overflow: hidden auto; white-space: nowrap;">
                <h1 style="font-size: 2.25em; font-weight: bold; margin: 0px; padding: 10px 15px;">Your Cart</h1>
                <?php if ($error) { ?> 
                    <p style="color: rgb(152, 0, 0); padding: 0px 15px;" > <?php echo $error; ?> </p>
                <?php } ?>
                <div style="background-color: rgb(152, 0, 0); width: 75%; height: 10px;"></div>
                <div style="margin-top: 20px; display: flex; padding: 0px 15px;">
                    <p style="font-size: 1.25em; font-weight: bold; margin: 0px; flex: 1 1 0%;">Qty</p>
                    <p style="font-size: 1.25em; font-weight: bold; margin: 0px; flex: 2 1 0%;">Item</p>
                    <p style="font-size: 1.25em; font-weight: bold; margin: 0px; flex: 1 1 0%;">Price (MYR)</p>
                    <p style="font-size: 1.25em; font-weight: bold; margin: 0px; flex: 1 1 0%;"></p>
                </div>
                <?php foreach ( $cartItems as $key => $items): ?>
                    <div style="margin-top: 20px; display: flex; padding: 0px 15px;">
                        <p style="font-size: 1.25em; font-weight: bold; margin: 0px; flex: 1 1 0%;"> <?php echo $items['quantity'] . 'x' ?> </p>
                        <p style="font-size: 1.25em; font-weight: bold; margin: 0px; flex: 2 1 0%;"> <?php echo $items['Name'] ; ?> </p>
                        <p style="font-size: 1.25em; font-weight: bold; margin: 0px; flex: 1 1 0%;"> <?php echo $items['Price'] ; ?> </p>
                        <a href="<?php echo SITEURL . '/core/cart-actions.php?token=' . $token . '&item=' . $items['ID'] . '&action=remove' ?>" style="text-decoration: underline; color: black; font-size: 0.75em; margin: 0px; flex: 1 1 0%;">Remove</a>
                    </div>
                <?php endforeach; ?>
            </div>
            <div style="width: 100%; height: 44%; display: flex; gap: 20px; justify-content: space-around;">
                <button onclick="window.location = `<?= SITEURL; ?>/customer/menu.php?token=<?php echo $token; ?>`"
                    style="width: 50%; box-shadow: rgba(0, 0, 0, 0.75) 0px 0px 10px 0px; border-radius: 15px; background-image: url('<?php echo SITEURL ?>/public/media/pranjall-kumar-sejqj6Eaqe8-unsplash1.png'); background-size: cover; display: flex; justify-content: center; align-items: center; color: white; font-size: 1.5em; font-weight: bold; margin-top: 20px; border: none;">Offers</button>
                <button onclick="window.location = `<?= SITEURL; ?>/customer/menu.php?token=<?php echo $token; ?>`"
                    style="width: 50%; box-shadow: rgba(0, 0, 0, 0.75) 0px 0px 10px 0px; border-radius: 15px; background-image: url('<?php echo SITEURL ?>/public/media/pranjall-kumar-sejqj6Eaqe8-unsplash 3.png'); background-size: cover; display: flex; justify-content: center; align-items: center; color: white; font-size: 1.5em; font-weight: bold; margin-top: 20px; border: none;">Menu</button>
            </div>
        </div>
        <div style="width: 25%; box-shadow: rgba(0, 0, 0, 0.75) 0px 0px 10px 0px; margin: 20px; border-radius: 0px 15px 15px;">
            <div style="background-color: rgb(152, 0, 0); width: 60%; height: 10px; margin-top: 50px;"></div>
            <div style="background-color: rgb(0, 152, 33); width: 80%; height: 10px;"></div>
            <img src="<?php echo SITEURL ?>/public/media/Group 22.png" style="height: 70%; width: 100%;">
            <div style="width: 100%; display: flex; justify-content: center;">
                <a href="http://localhost/customer/checkout.php?token=<?php echo $token; ?>" style="background-color: rgb(0, 152, 33);width: 80%;height: 60px;border-radius: 10px;border: none;color: white;font-size: 1.5em;font-weight: bold;margin-top: 20px;display: flex;justify-content: center;align-items: center;"> 
                    Checkout 
                </a>
            </div>
        </div>
    </div>
</div>

<?php 

require_once BASEURL . "/components/footer.php";

?>