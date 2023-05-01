<?php

$token = isset($_GET['token']) ? $_GET['token'] : false;
$itemID = isset($_GET['itemID']) ? $_GET['itemID'] : false;

$order = get_items($itemID);
$main = get_main_menu();
$submain = get_sub_main_menu($main[0]->ID);
$current_submenu = array_filter($submain, function ($var) use ($order) { return $var->ID === $order['MenuGroupID']; });
$current_submenu = array_values($current_submenu);
?>

<link rel="stylesheet" href="<?php echo SITEURL ?>/public/css/productdetails.css" />

<div class="main-content-body">
    <div class="main-section">
        <div class="product">
            <div class="product-title">
                <h2>PRODUCT Details </h2>
            </div>
            <div class="product-main">
                <div class="product-img">
                    <img src="<?= $order['Image'] ?>" alt="">
                </div>
            </div>
        </div>
        <div class="product-descrption">
            <div class="product-title">
                <h2>PRODUCT Descrption</h2>
            </div>
            <p>
                <?= $order['Description'] ?>
            </p>
        </div>
    </div>
    <div class="product-info-main">
        <div class="product-info">
            <div class="product-info-title">
                <h2>PRODUCT info</h2>
            </div>
            <div class="info-table">
                <div>
                    <p>Name:</p>
                    <p>
                        <?= $order['Name']; ?>
                    </p>
                </div>
                <div>
                    <p>Price:</p>
                    <p>
                        <?= $order['Price']; ?>
                    </p>
                </div>
                <div>
                    <p>Menu Group :</p>
                    <p>
                        <?= $current_submenu[0]->Name ?>
                    </p>
                </div>
                <div>
                    <p>Availibilty:</p>
                    <p>
                        <?= $order['isAvailable'] == 1 ? 'Available' : 'Not Available'; ?>
                    </p>
                </div>
                <div>
                    <p>Delivery charge free :</p>
                    <p>
                        10 MYR
                    </p>
                </div>
                <div class="actions">
                    <a href="http://localhost/admin/dashboard.php?token=<?= $token ?>&panel=add-menu&id=<?= $order['ID'] ?>"><button> Edit </button></a>

                    <form action="<?php echo SITEURL ?>/core/admin-action.php" method="post">
                        <input type="hidden" name="action" value="del-menu-item">
                        <input type="hidden" name="token" value="<?= $token ?>">
                        <input type="hidden" name="id" value="<?= $order['ID'] ?>">
                        <button> Delete </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>