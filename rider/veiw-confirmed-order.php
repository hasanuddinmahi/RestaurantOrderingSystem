<?php

require_once BASEURL . "/components/header.php";

$orders = array();

$token = isset($_GET['token']) ? $_GET['token'] : false;

if (!$token || !validateUserToken($token, 'riders')) {
    header('Location: ' . SITEURL . '/auth/login.php?error=login+required');
}
$orders = GetConfirmedOrders();

?>


<link rel="stylesheet" href="<?php echo SITEURL ?>/public/css/Riderassignpage.css" />

<section>
 <div class="container">
    <h1>View Confirmed Orders</h1>
    <hr />
    <div class="vertical" style="margin-top: -5em"></div>
    <div class="details">
        <table>
            <tr>
                <th>Order Number</th>
                <th>Customer Name</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Order Details</th>
            </tr>
            <?php foreach ($orders as $order) {
                echo '<tr>
                    <td>'.$order["ID"].'</td>
                    <td>'.$order["FirstName"]." ".$order["LastName"].'</td>
                    <td>'.$order["Address"].'</td>
                    <td>'.$order["Phone"].'</td>
                    <td><button><a href="view-order-details.php?ID='.$order["ID"] .'&token='.$token.'&confirm=true">View</a></button></td>
                 </tr>';
            }
            ?>
        </table>
    </div>
    </div>
</section>

<?php 

// require_once BASEURL . "/components/footer.php";

?>