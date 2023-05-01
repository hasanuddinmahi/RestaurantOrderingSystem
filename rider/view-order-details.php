<?php 

require_once BASEURL . "/components/header.php";
require BASEURL . "/core/function.php";

$id = isset($_GET['ID']) ? $_GET['ID'] : false;
$confirm=isset($_GET['confirm']) ? $_GET['confirm'] : true;
$token = isset($_GET['token']) ? $_GET['token'] : false;

$order_details = getOrderDetails($id);

$orderItems = json_decode($order_details["OrderItems"], true);

$price = 0;
$itemsCount = 0;
foreach ($orderItems as $item) {
    $price += (float) $item['price'];
    $itemsCount += (int) $item['quantity'];
}

?>

<script>
    var RiderToken = '<?= $token ?>';
    var OrderID = '<?= $order_details["ID"] ?>';
	
	
function redirect() {
    if (confirm("Thanks for delivery >> Redirecting to Home Page?")) {
        window.location.href = "http://localhost/rider/rider-homepage.php?token=<?= $token ?>";
    }
}

</script>

<link rel="stylesheet" href="<?php echo SITEURL ?>/public/css/RiderOrderdetails.css" />

<section>
<div class="container">
<h1>Order Details</h1>
<hr>

    <div class="vertical"></div>
    <div class="details">
        <div class="details1">
            <h3>Order Number: <?php echo $order_details["ID"] ?></h3>
            <h3>Customer Name: <?php echo $order_details["FirstName"]." ".$order_details["LastName"] ?></h3>
            <h3>Address: <?php echo $order_details["Address"] ?></h3>
            <h3>Phone Number: <?php echo $order_details["Phone"] ?></h3>
            <h3>Items: </h3>
            <div class="food">
            <?php foreach ($orderItems as $key => $order): ?>
             <p style="font-size: 1em; font-weight: 200; margin-left: 50px;"> <?= $order['quantity'] .'x - '. $order['name'] ?> </p>
                <?php endforeach;  ?>
        </div>
</div>
        <div class="details2" >
            <div class="reciepe">
              

                
                
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
            <div id="confrim_container">




            </div>
			
			

<?php 

if($confirm===true)
{
	?>
			
           <button  type="submit" class="con-del"><a href="../core/order-confrimation.php?orderID=<?php echo $order_details["ID"] ?>&token=<?= $token ?>"">Confirm</a></button> 
       
<?php

}
else
{
echo '<button onclick="redirect()"  type="submit" class="con-del">Confirm Delivery</button>';



}

?>
	   </div>
</form>
</div>
</section>
<!-- 
 <script src="http://localhost/public/js/confrimation.js"></script> -->

<?php

// require_once BASEURL . "/components/footer.php";

?>