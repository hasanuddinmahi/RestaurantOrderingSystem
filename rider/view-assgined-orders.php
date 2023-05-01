<?php 

require_once BASEURL . "/components/header.php";
require BASEURL . "/core/function.php";

$token = isset($_GET['token']) ? $_GET['token'] : false;

if (!$token || !validateUserToken($token, 'riders')) {
    header('Location: ' . SITEURL . '/auth/login.php?error=login+required');
}

$orders = get_all_orders();
?>

<link rel="stylesheet" href="<?php echo SITEURL ?>/public/css/Riderassignpage.css" />
<section>
<div class="container">
    <h1>Assigned Order</h1>
    <hr />
    <div class="vertical"></div>
    <div class="details">
        <table>
            <tr>
                <th>Order Number</th>
                <th>Customer Name</th>
                <th>Order Qty</th>
                <th>Order Price</th>
                <th>Location</th>
                <th>Order Details</th>
            </tr>
            

            <?php foreach ($orders as $order) { 
                
                $orderItems = json_decode($order["OrderItems"], true);

                $price = 0;
                $itemsCount = 0;
                foreach ($orderItems as $item) {
                    $price += (float) $item['price'];
                    $itemsCount += (int) $item['quantity'];
                }
                
                
                ?>
                <tr>
                <th> <?= $order["ID"] ?> </th>
                <th><?= $order["FirstName"]." ".$order["LastName"] ?></th>
                <th><?= $itemsCount ?> </th>
                <th><?= $price ?> </th>
                <th><?= $order["Address"] ?></th>
                <th> <button><a href="view-order-details.php?ID=<?= $order["ID"] ?>&token=<?= $token ?>">View</a></button> </th>
                </tr>
            <?php } ?>

        </table>
    </div>
            </div>
</section>

<?php
    // require_once BASEURL . "/components/footer.php";
?>