<?php 

require_once BASEURL . "/components/header.php";
require BASEURL . "/core/function.php";

$id = isset($_GET['ID']) ? $_GET['ID'] : false;
$token = isset($_GET['token']) ? $_GET['token'] : false;


$order_details = getOrderDetails($id);



?>

<link rel="stylesheet" href="<?php echo SITEURL ?>/public/css/RiderOrderdetails.css" />

<section>
<h1>Order Details</h1>
<hr>

    <div style="  background-color: rgba(0, 105, 0, 1);
    height: 610px;
    width: 12px;
    position: absolute;
    left: 65%;
    top: 240px;"></div>
    <div class="details">
        <div class="details1">
            <h3>Order Number: <?php echo $order_details["ID"] ?></h3>
            <h3>Customer Name: <?php echo $order_details["FirstName"]." ".$order_details["LastName"] ?></h3>
            <h3>Address: <?php echo $order_details["Address"] ?></h3>
            <h3>Phone Number: <?php echo $order_details["Phone"] ?></h3>
        </div>

        <div class="details2">
            <div class="reciepe">
                <h4>Items: <?php echo $order_details["OrderItems"] ?> </h4>
                
            </div>
            <div class="reciepe">
                <h4>Date and time: <?php echo $order_details["OrderedDate"] ?></h4>
               
            </div>
            <div class="reciepe">
                <h4>Delivery Status: <?php echo $order_details["OrderStatus"] ?></h4>
                
            </div>
            <div class="reciepe">
                <h4>Total Price: <?php echo $order_details["Price"] ?></h4>
                
            </div>
            <button type="submit" class="con-del"><a href="rider-homepage.php">Confirm Delivery</a></button>
        </div>
</form>
</section>

<?php

// require_once BASEURL . "/components/footer.php";

?>