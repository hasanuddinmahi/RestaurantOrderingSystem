<?php 

require_once BASEURL . "/components/header.php";
require BASEURL . "/core/function.php";

$token = isset($_GET['token']) ? $_GET['token'] : false;

if (!$token || !validateUserToken($token)) {
    header('Location: ' . SITEURL . '/auth/login.php?error=login+required');
}

$orders = get_user_orders($token);
?>

<div style="width: 100%; height: 100%; padding-bottom: 20px;">
    <div
        style="margin: 0px 40px 20px; height: 400px; box-shadow: rgba(0, 0, 0, 0.75) 0px 0px 10px 0px; border-radius: 0px 15px 15px; overflow: hidden auto; white-space: nowrap;">
        <div style="width: 100%; padding-bottom: 20px;">
            <h1 style="font-size: 2.25em; font-weight: bold; margin: 0px; padding: 10px 15px;">Orders</h1>
            <div style="background-color: rgb(152, 0, 0); width: 100%; height: 10px;"></div>
            <div style="margin-top: 20px; display: flex; padding: 0px 15px;">
                <p style="font-size: 1.25em; font-weight: bold; margin: 0px; flex: 1 1 0%;">#</p>
                <p style="font-size: 1.25em; font-weight: bold; margin: 0px; flex: 2 1 0%;">Order Number</p>
                <p style="font-size: 1.25em; font-weight: bold; margin: 0px; flex: 1 1 0%;">Total</p>
                <p style="font-size: 1.25em; font-weight: bold; margin: 0px; flex: 1 1 0%;">Qty</p>
                <p style="font-size: 1.25em; font-weight: bold; margin: 0px; flex: 1 1 0%;">Status</p>
                <p style="font-size: 1.25em; font-weight: bold; margin: 0px; flex: 2 1 0%;">Ordered At</p>
                <p style="font-size: 1.25em; font-weight: bold; margin: 0px; flex: 1 1 0%;"></p>
            </div>
            <?php foreach ($orders as $key => $order):
                $order_arr = json_decode($order['OrderItems'], true);
                $orderItemsCount = 0;
                foreach ($order_arr as $item) {
                    $orderItemsCount += (int) $item['quantity'];
                }

                ?>
                <div style="margin-top: 20px; display: flex; padding: 0px 15px;">
                    <p style="font-size: 1em; font-weight: bold; margin: 0px; flex: 1 1 0%;"><?= $key ?></p>
                    <p style="font-size: 1em; font-weight: bold; margin: 0px; flex: 2 1 0%;"><?= $order['ID'] ?></p>
                    <p style="font-size: 1em; font-weight: bold; margin: 0px; flex: 1 1 0%;"><?= $order['Price'] ?></p>
                    <p style="font-size: 1em; font-weight: bold; margin: 0px; flex: 1 1 0%;"><?= $orderItemsCount ?></p>
                    <p style="font-size: 1em; font-weight: bold; margin: 0px; flex: 1 1 0%;"><?= $order['OrderStatus'] ?></p>
                    <p style="font-size: 1em; font-weight: bold; margin: 0px; flex: 2 1 0%;"><?= $order['CreationDate'] ?></p>
                    <p style="font-size: 1em; font-weight: bold; margin: 0px; flex: 1 1 0%;">
                        <a style="text-decoration: underline; color: black; font-size: 0.75em; margin: 0px; flex: 1 1 0%;" href="<?php echo SITEURL ?>/customer/order.php?token=<?= $token ?>&order-id=<?= $order['ID'] ?>"> veiw </a>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div style="width: 100%; padding: 0px 40px; height: 250px; display: flex; gap: 20px; justify-content: space-around;">
        <a href="<?php echo SITEURL ?>/customer/menu.php?token=<?= $token ?>" 
            style="width: 35%; box-shadow: rgba(0, 0, 0, 0.75) 0px 0px 10px 0px; border-radius: 30px; background-image: url('<?php echo SITEURL ?>/public/media/pranjall-kumar-sejqj6Eaqe8-unsplash1.png'); background-size: cover; display: flex; justify-content: center; align-items: center; color: white; font-size: 1.5em; font-weight: bold; margin-top: 20px; border: none;">Offers</a>
        <a href="<?php echo SITEURL ?>/customer/homepage.php?token=<?= $token ?>" 
            style="width: 35%; box-shadow: rgba(0, 0, 0, 0.75) 0px 0px 10px 0px; border-radius: 30px; background-image: url('<?php echo SITEURL ?>/public/media/pranjall-kumar-sejqj6Eaqe8-unsplash 3.png'); background-size: cover; display: flex; justify-content: center; align-items: center; color: white; font-size: 1.5em; font-weight: bold; margin-top: 20px; border: none;">Home</a>
        <a href="<?php echo SITEURL ?>/customer/menu.php?token=<?= $token ?>" 
            style="width: 35%; box-shadow: rgba(0, 0, 0, 0.75) 0px 0px 10px 0px; border-radius: 30px; background-image: url('<?php echo SITEURL ?>/public/media/pranjall-kumar-sejqj6Eaqe8-unsplash1.png'); background-size: cover; display: flex; justify-content: center; align-items: center; color: white; font-size: 1.5em; font-weight: bold; margin-top: 20px; border: none;">Menu</a>
    </div>
</div>

<?php 

require_once BASEURL . "/components/footer.php";

?>