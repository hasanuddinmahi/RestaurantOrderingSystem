<?php

require_once BASEURL . "/core/function.php";

$orderID = isset($_GET['orderID']) ? $_GET['orderID'] : false;

$order = getOrderDetails($orderID);
$orderItems = json_decode($order['OrderItems'], true);

$price = 0;
$itemsCount = 0;
foreach ($orderItems as $item) {
    $price += (float) $item['price'];
    $itemsCount += (int) $item['quantity'];
}

?>

<link rel="stylesheet" href="<?php echo SITEURL ?>/public/css/adminorder.css" />
<style>
    .table-row:last-child { margin-left: 0px; }
    .table-row { border-bottom: none; }
    .table-head { margin-bottom: 0px; border-bottom: none; }
</style>
<div class="main-content-body">
    <div class="main-content-body-title">
        <h2>Order</h2>
    </div>
    <div class="dashboard-overview">
        <div class="main-left">
            <div class="customer">
                <div class="customer-img">
                    <img src="<?php echo SITEURL ?>/public/media/user.png" alt="customer" />
                </div>
                <a href="#"><?= $order['FirstName'] . ' ' . $order['LastName'] ?></a>
            </div>
            <div class="timeline">
                <div class="events">

                    <div class="event">
                        <div style="background: <?= $order['OrderStatus'] != 'Recieved' ? 'red' : 'green' ?>;" class="knob"></div>
                        <div class="title">
                            <h2>Order Delivered</h2>
                        </div>
                        <div class="description">
                            <p><?= $order['CreationDate'] ?></p>
                        </div>
                    </div>

                    <div class="event">
                        <div style="background: <?= $order['isPaid'] == 0 ? 'red' : 'green' ?>;" class="knob"></div>
                        <div class="title">
                            <h2>Payment Success</h2>
                            <div class="description">
                                <p><?= $order['CreationDate'] ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="event">
                        <div style="background: green;" class="knob"></div>
                        <div class="title">
                            <h2>Order created</h2>
                        </div>
                        <div class="description">
                            <p><?= $order['CreationDate'] ?></p>
                        </div>
                    </div>
                    
                    <div class="line"></div>
                </div>
            </div>
        </div>
        <div class="main-right">
            <div class="main-content-body-title dashboard-overview-title">
                <h2>Items</h2>
            </div>
            <div class="table">
                <div class="table-row">
                    <div class="table-head">

                    </div>
                    <div class="table-head">
                        <p>Name</p>
                    </div>
                    <div class="table-head">
                        <p>Qty</p>
                    </div>
                    <div class="table-head">
                        <p>Price</p>
                    </div>
                    <div class="table-head">
                        <p>Total price</p>
                    </div>
                </div>

                <?php foreach ($orderItems as $item):
                        $total_price = (float) $item['price'] * (int) $item['quantity'];
                        $img = get_order_image($item['id']);  
                    ?>
                    <div class="table-row">
                        <div class="table-cell">
                            <img src="<?= $img ?>" alt="product_image">
                        </div>
                        <div class="table-cell">
                            <p> <?= $item['name'] ?> </p>
                        </div>
                        <div class="table-cell">
                            <p> <?= $item['quantity'] ?> </p>
                        </div>
                        <div class="table-cell">
                            <p> <?= $item['price'] ?> </p>
                        </div>
                        <div class="table-cell">
                            <p> <?= $total_price ?> </p>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>