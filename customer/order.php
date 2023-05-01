<?php 

require_once BASEURL . "/components/header.php";
require BASEURL . "/core/function.php";

$token = isset($_GET['token']) ? $_GET['token'] : false;

    $orderID = isset($_GET['order-id']) ? $_GET['order-id'] : false;

if (!$token || !validateUserToken($token)) {
    header('Location: ' . SITEURL . '/auth/login.php?error=login+required');
}

$order = get_user_order($orderID);
$orderItems = json_decode($order['OrderItems'], true);

$price = 0;
$itemsCount = 0;
foreach ($orderItems as $item) {
    $price += (float) $item['price'];
    $itemsCount += (int) $item['quantity'];
}

?>

<div style="width: 100%; height: 100%; padding-bottom: 20px;">
    <div
        style="margin: 0px 40px 20px; height: 400px; box-shadow: rgba(0, 0, 0, 0.75) 0px 0px 10px 0px; border-radius: 0px 15px 15px; overflow: hidden auto; white-space: nowrap;">
        <div style="width: 100%; padding-bottom: 20px;">
            <h1 style="font-size: 2.25em; font-weight: bold; margin: 0px; padding: 10px 15px;">Order</h1>
            <div style="background-color: rgb(152, 0, 0); width: 100%; height: 10px;"></div>
            <div style="margin-top: 20px; padding: 0px 15px;">
                <p style="font-size: 1.25em; font-weight: bold; margin: 0px;">Order Number: <span style="font-size: 0.85em; font-weight: normal;"> <?= $order['ID']  ?> </span> </p>
                <p style="font-size: 1.25em; font-weight: bold; margin: 0px;">Total: <span style="font-size: 0.85em; font-weight: normal;"> <?= $price ?> MYR </span> </p>
                <p style="font-size: 1.25em; font-weight: bold; margin: 0px;">Qty: <span style="font-size: 0.85em; font-weight: normal;"> <?= $itemsCount ?> </span>  </p>
                <p style="font-size: 1.25em; font-weight: bold; margin: 0px;">Status: <span style="font-size: 0.85em; font-weight: normal;"> <?= $order['OrderStatus']  ?> </span> </p>
                <p style="font-size: 1.25em; font-weight: bold; margin: 0px;">Ordered At: <span style="font-size: 0.85em; font-weight: normal;"> <?= $order['OrderedDate']  ?> </span> </p>
                <p style="font-size: 1.25em; font-weight: bold; margin: 0px;">Ordered Items: </p>
                <?php foreach ($orderItems as $key => $order): ?>
                    <p style="font-size: 0.85em; font-weight: normal; margin: 0px; margin-left: 20px;"> <?= $order['quantity'] .'x - '. $order['name'] ?> </p>
                <?php endforeach;  ?>
            </div>
        </div>
    </div>
    <div
        style="width: 100%; padding: 0px 40px; height: 250px; display: flex; gap: 20px; justify-content: space-around;">
        <a href="<?php echo SITEURL ?>/customer/menu.php" 
            style="width: 35%; box-shadow: rgba(0, 0, 0, 0.75) 0px 0px 10px 0px; border-radius: 30px; background-image: url('<?php echo SITEURL ?>/public/media/pranjall-kumar-sejqj6Eaqe8-unsplash1.png'); background-size: cover; display: flex; justify-content: center; align-items: center; color: white; font-size: 1.5em; font-weight: bold; margin-top: 20px; border: none;">Offers</a>
        <a href="<?php echo SITEURL ?>/" 
            style="width: 35%; box-shadow: rgba(0, 0, 0, 0.75) 0px 0px 10px 0px; border-radius: 30px; background-image: url('<?php echo SITEURL ?>/public/media/pranjall-kumar-sejqj6Eaqe8-unsplash 3.png'); background-size: cover; display: flex; justify-content: center; align-items: center; color: white; font-size: 1.5em; font-weight: bold; margin-top: 20px; border: none;">Home</a>
        <a href="<?php echo SITEURL ?>/customer/menu.php" 
            style="width: 35%; box-shadow: rgba(0, 0, 0, 0.75) 0px 0px 10px 0px; border-radius: 30px; background-image: url('<?php echo SITEURL ?>/public/media/pranjall-kumar-sejqj6Eaqe8-unsplash1.png'); background-size: cover; display: flex; justify-content: center; align-items: center; color: white; font-size: 1.5em; font-weight: bold; margin-top: 20px; border: none;">Menu</a>
    </div>
</div>

<?php 

require_once BASEURL . "/components/footer.php";

?>