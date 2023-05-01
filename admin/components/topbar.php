<?php

require_once BASEURL . "/core/function.php";

$token = isset($_GET['token']) ? $_GET['token'] : false;

get_admin_name($token);

?>


<div class="header">
    <div class="menu-toggler">
        <button id="menu_toggle">
            <img src="<?php echo SITEURL ?>/public/media/menu-toggle.png" alt="toggler" />
        </button>
    </div>
    <div class="user-pro">
        <button class="notifi">
            <img src="<?php echo SITEURL ?>/public/media/noticifation.png" alt="noticifation" />
        </button>
        <button class="user-info">
            <div class="user-img">
                <img src="<?php echo SITEURL ?>/public/media/user.png" alt="user" />
            </div>
            <div class="user-name">
                <span><?= get_admin_name($token) ?></span>
            </div>
        </button>
    </div>
    <div class="notifications">
        <div class="noticifation-header">
            <h4>Notifications (0)</h4>
        </div>
        <div class="notification-item">
            <div class="noticifation-img">
                <img src="<?php echo SITEURL ?>/public/media/user.png" alt="" />
            </div>
            <p>Update your settings</p>
        </div>
        <div class="notification-item">
            <div class="noticifation-img">
                <img src="<?php echo SITEURL ?>/public/media/user.png" alt="" />
            </div>
            <p>New noticifations</p>
        </div>
        <div class="notification-item">
            <div class="noticifation-img">
                <img src="<?php echo SITEURL ?>/public/media/user.png" alt="" />
            </div>
            <p>New noticifation</p>
        </div>
    </div>
    <div class="account-drop"> 
        <a href="<?php echo SITEURL ?>/admin/dashboard.php?token=<?= $token ?>&panel=profile">Profile</a>
        <a href="<?php echo SITEURL ?>/admin/dashboard.php?token=<?= $token ?>&panel=settings">Settings</a>
        <a href="<?php echo SITEURL ?>/admin/dashboard.php">Logout</a>
    </div>
</div>