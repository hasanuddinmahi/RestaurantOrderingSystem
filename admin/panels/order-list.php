<?php

require_once BASEURL . "/core/function.php";

$token = isset($_GET['token']) ? $_GET['token'] : false;

$ordes = GetAllOrders();

?>

<style>
    .table-head {
        border-bottom: none
    }
</style>

<div class="main-content-body">
    <div class="main-title-content">
        <div class="main-content-body-title">
            <h1>Order List</h1>
        </div>
    </div>
    <div class="main-table">

        <div class="table">
            <div class="table-row">
                <div class="table-head">
                    <p>Order ID <img src="<?php echo SITEURL ?>/public/media/top2.png" alt="icon"></p>
                </div>
                <div class="table-head">
                    <p>Date <img src="<?php echo SITEURL ?>/public/media/top.png" alt="icon"></p>
                </div>
                <div class="table-head">
                    <p>Customer name <img src="<?php echo SITEURL ?>/public/media/top.png" alt="icon"></p>
                </div>
                <div class="table-head">
                    <p>Amount <img src="<?php echo SITEURL ?>/public/media/top.png" alt="icon"></p>
                </div>
                <div class="table-head">
                    <p>Status order <img src="<?php echo SITEURL ?>/public/media/top.png" alt="icon"></p>
                </div>
                <div class="table-head">
                    <p>Options</p>
                </div>
            </div>

            <?php foreach ($ordes as $order): ?>
                <div class="table-row">
                    <div class="table-cell">
                        <?= $order['ID'] ?>
                    </div>
                    <div class="table-cell">
                        <?= $order['CreationDate']; ?>
                    </div>
                    <div class="table-cell">
                        <?=  get_username($order['CustomerID']) ; ?>
                    </div>
                    <div class="table-cell">
                        <?= $order['Price']; ?>
                    </div>
                    <div class="table-cell">
                        <p><button class="table-btn">
                            <?= $order['OrderStatus']; ?>
                        </p></button></p>
                    </div>
                    <div class="table-cell">
                        <p> 
                            <a style="color: black; font-size: medium;" href="<?php echo SITEURL ?>/admin/dashboard.php?token=<?= $token ?>&panel=order&orderID=<?= $order['ID'] ?>" >
                                view
                            </a> 
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="table-row">
                <div class="table-cell">&nbsp;</div>
                <div class="table-cell"></div>
                <div class="table-cell"></div>
                <div class="table-cell"></div>
            </div>
        </div>
    </div>
</div>