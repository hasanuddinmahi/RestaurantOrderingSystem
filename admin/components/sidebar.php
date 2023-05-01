<?php

// side bar logic

?>

<link rel="stylesheet" href="<?php echo SITEURL ?>/public/css/adminorderlist.css" />

<div class="sidebar">
    <div class="sidebar-logo">
        <h2><span>It</span>alia<span>no</span></h2>
    </div>
    <div class="sidebar-menu">
        <div class="manu-item">
            <div class="menu-main">
                <img src="<?php echo SITEURL ?>/public/media/dashboard.png" alt="dashboard" />
                <span>DASHBOARD</span>
            </div>
            <div class="sub-menu">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL ?>/admin/dashboard.php?token=<?= $token ?>&panel=order-list">Order
                            List</a>
                    </li>
                    </li>
                </ul>
            </div>
        </div>
        <div class="manu-item">
            <div class="menu-main">
                <img src="<?php echo SITEURL ?>/public/media/menu.png" alt="menus" />
                <span>Menus</span>
            </div>
            <div class="sub-menu">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL ?>/admin/dashboard.php?token=<?= $token ?>&panel=menu">Menus</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL ?>/admin/dashboard.php?token=<?= $token ?>&panel=add-menu">Add Menu</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="manu-item">
            <div class="menu-main">
                <img src="<?php echo SITEURL ?>/public/media/invoice.png" alt="invoice" />
                <span>Invoice</span>
            </div>
            <div class="sub-menu">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL ?>/admin/dashboard.php?token=<?= $token ?>&panel=invoice-list">Invoices</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>