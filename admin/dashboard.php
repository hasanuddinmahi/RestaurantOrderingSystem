<?php

require_once BASEURL . "/admin/components/header.php";
require_once BASEURL . "/core/function.php";

$token = isset($_GET['token']) ? $_GET['token'] : false;

if (!$token || !validateUserToken($token, 'admin')) {
    header('Location: ' . SITEURL . '/auth/login.php?error=login+required');
}

$panel = isset($_GET['panel']) ? $_GET['panel'] : 'main';

?>

<div class="main-area">
  <div class="container">
    <div class="content">
      <?php require_once BASEURL . "/admin/components/sidebar.php"; ?>
      <div class="main-content">

        <?php require_once BASEURL . "/admin/components/topbar.php"; ?>

        <?php 

        switch ($panel) {
          case 'order':
            require_once BASEURL . "/admin/panels/order.php"; 
            break;

          case 'order-list':
            require_once BASEURL . "/admin/panels/order-list.php"; 
            break;
          
          case 'menu':
            require_once BASEURL . "/admin/panels/menu.php"; 
            break;

          case 'add-menu':
            require_once BASEURL . "/admin/panels/add-menu.php"; 
            break;
          
          case 'products-details':
            require_once BASEURL . "/admin/panels/products-details.php"; 
            break;
            
          case 'invoice-list':
            require_once BASEURL . "/admin/panels/invoice-list.php"; 
            break;

          default:
            require_once BASEURL . "/admin/panels/main.php"; 
            break;
        }
        
        ?>

      </div>
    </div>
  </div>
</div>

<?php require_once BASEURL . "/admin/components/footer.php"; ?>