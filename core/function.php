<?php
require dirname(dirname(__FILE__)) . '/database-manager.php';

if (!function_exists('login'))   {
    function login($email, $password){
        $db = new DatabaseManager();

        $resultCustomer = $db->query("SELECT ID FROM `customers` WHERE `email` = '$email' AND `password` = '$password'");

        if($resultCustomer->num_rows == 1){
            $db->close();
            $row = $resultCustomer->fetch_assoc();
            $token = $row['ID'];
            return array('token' => $token, 'usertype' => 'customers');
        }

        $resultRider = $db->query("SELECT ID FROM `riders` WHERE `email` = '$email' AND `password` = '$password'");

        if($resultRider->num_rows == 1){
            $db->close();
            $row = $resultRider->fetch_assoc();
            $token = $row['ID'];
            return array('token' => $token, 'usertype' => 'riders');
        }

        $resultAdmin = $db->query("SELECT ID FROM `admin` WHERE `email` = '$email' AND `password` = '$password'");

        if($resultAdmin->num_rows == 1){
            $db->close();
            $row = $resultAdmin->fetch_assoc();
            $token = $row['ID'];
            return array('token' => $token, 'usertype' => 'admin');
        }
        
        return false;
    }   
}

if (!function_exists('register')) {
    function register($email, $password, $first_name, $last_name, $address, $phone_number){
        $db = new DatabaseManager();
    
        // Check if email is already registered
        $result = $db->query("SELECT * FROM `customers` WHERE `Email` = '$email'");
        if($result->num_rows > 0){
            return "email already registered";
        }
    
        // genereate uuid
        $token = uniqid();
    
        $result = $db->query("INSERT INTO `customers` (`ID`, `Email`, `Password`, `FirstName`, `LastName`, `Address`, `Phone`) VALUES ('$token', '$email', '$password', '$first_name', '$last_name', '$address', '$phone_number')");
        $db->close();
    
        if($result === false){
            return "failed to register";
        }
    
        return true;
    }
}


if (!function_exists('validateUserToken')) {
    function validateUserToken($token, $usertype = "customers"){
        if(!isset($token) || !$token){
            return false;
        }

        $db = new DatabaseManager();
        $result = $db->query("SELECT * FROM $usertype WHERE `ID` = '" . $token . "'");
        $db->close();
    
        if($result->num_rows <= 0 || $result->num_rows > 1){
            return false;
        }
    
        return true;
    }
}


if (!function_exists('get_username')) {
    function get_username($token){
        if(!isset($token) || !$token){
            return false;
        }

        $db = new DatabaseManager();
        $result = $db->query("SELECT * FROM `customers` WHERE `ID` = '" . $token . "'");
        $db->close();
    
        if($result->num_rows <= 0 || $result->num_rows > 1){
            return false;
        }

        $row = $result->fetch_assoc();
        $username = $row['FirstName'];
    
        return $username;
    }
}


if (!function_exists('addQuery')) {
    function addQuery($url, array $query)
    {
        $query = array_filter($query, function ($value) {
            return $value !== null && $value !== '';
        });

        $cache = parse_url($url, PHP_URL_QUERY);

        if (empty($cache))
            return $url . "?" . http_build_query($query);
        else
            return $url . "&" . http_build_query($query);
    }
}


if (!function_exists('get_user_type')) {
    function get_user_type($token)
    {
        $db = new DatabaseManager();
        $result = $db->query("SELECT * FROM `customers` WHERE `ID` = '" . $token . "'");
        if ($result->num_rows > 0) {
            return "customers";
        }

        $result = $db->query("SELECT * FROM `riders` WHERE `ID` = '" . $token . "'");
        if ($result->num_rows > 0) {
            return "riders";
        }

        $result = $db->query("SELECT * FROM `admin` WHERE `ID` = '" . $token . "'");
        if ($result->num_rows > 0) {
            return "admin";
        }

        return false;
    }
}


if (!function_exists('get_main_menu')) {
    function get_main_menu()
    {

        $db = new DatabaseManager();
        $result = $db->query("SELECT * FROM `menu`");
        $db->close();

        if ($result->num_rows <= 0) {
            return false;
        }

        require_once dirname(dirname(__FILE__)) . '/models/Menu.php';

        $menus = array();
        while ($row = $result->fetch_assoc()) {
            $menu = new Menu($row['ID'], $row['Name']);
            array_push($menus, $menu);
        }

        return $menus;
    }

}

if (!function_exists('get_sub_main_menu')) {
    function get_sub_main_menu($menu_id)
    {
        $db = new DatabaseManager();
        $result = $db->query("SELECT * FROM `menugroup` WHERE `MenuID` = '$menu_id'");
        $db->close();

        if ($result->num_rows <= 0) {
            return false;
        }

        require_once dirname(dirname(__FILE__)) . '/models/MenuGroup.php';

        $menus = array();
        while ($row = $result->fetch_assoc()) {
            $menu = new MenuGroup(
                $row['ID'],
                $row['MenuID'],
                $row['Name'],
                $row['OrderIndex']
            );
            array_push($menus, $menu);
        }

        return $menus;
    }
}

if (!function_exists('get_sub_main_menu_items')) {
    function get_sub_main_menu_items($sub_menu_id)
    {
        $db = new DatabaseManager();
        $result = $db->query("SELECT * FROM `menuitem` WHERE `MenuGroupID` = '$sub_menu_id'");
        $db->close();

        if ($result->num_rows <= 0) {
            return false;
        }

        require_once dirname(dirname(__FILE__)) . '/models/MenuItem.php';

        $menus = array();
        while ($row = $result->fetch_assoc()) {
            $menu = new MenuItem(
                $row['ID'],
                $row['Name'],
                $row['Price'],
                $row['Description'],
                $row['Image'],
                $row['isAvailable'],
                $row['OrderIndex'],
                $sub_menu_id
            );
            array_push($menus, $menu);
        }

        return $menus;
    }
}

if (!function_exists('get_main_menu_model')) {
    function get_main_menu_model(){
        require_once dirname(dirname(__FILE__)) . '/models/Menu.php';
        require_once dirname(dirname(__FILE__)) . '/models/MenuGroup.php';
        require_once dirname(dirname(__FILE__)) . '/models/MenuItem.php';

        $menus = get_main_menu();

        $menu = reset($menus);
        if ($menu == false) return false;

        $sub_menus = get_sub_main_menu($menu->ID);
        foreach ($sub_menus as $sub_menu) {

            $items = get_sub_main_menu_items($sub_menu->ID);
            foreach ( $items as  $item) {
                $sub_menu->addMenuItem($item);
            }

            $menu->addMenuGroup($sub_menus);
        }
        return $menu;
    }
}


if (!function_exists('get_cart_items')) {
    function get_cart_items($item_ids = array()){
        $cartitems = array();
        foreach ($item_ids as $items) {

            $db = new DatabaseManager();
            $id = $items['item'];
            $result = $db->query("SELECT * FROM `menuitem` WHERE `ID` = '$id'");
            $db->close();
    
            if ($result->num_rows <= 0) return false;

            $row = $result->fetch_assoc();

            array_push($cartitems, array(
                ...$row,
                'quantity' => $items['quantity']
            ));
        }
        return $cartitems;
    }
}

if (!function_exists('get_user_orders')) {
    function get_user_orders($user_id){
        $db = new DatabaseManager();
        $result = $db->query("SELECT * FROM `customerorder` WHERE `CustomerID` = '$user_id'");
        $db->close();

        if ($result->num_rows <= 0) return array();

        $orders = array();
        while ($row = $result->fetch_assoc()) {
            array_push($orders, $row);
        }
        return $orders;
    }
}

if (!function_exists('get_user_order')) {
    function get_user_order($order_id){
        $db = new DatabaseManager();
        $result = $db->query("SELECT * FROM `customerorder` WHERE `ID` = '$order_id'");
        $db->close();

        if ($result->num_rows <= 0) return array();

        $row = $result->fetch_assoc();

        return $row;
    }
}

if (!function_exists('get_user_info')) {
    function get_user_info($token){
        $db = new DatabaseManager();
        $result = $db->query("SELECT * FROM `customers` WHERE `ID` = '$token'");
        $db->close();

        if ($result->num_rows <= 0) return array();

        $row = $result->fetch_assoc();

        return $row;
    }
}

if (!function_exists('cart_total')) {
    function cart_total($items){
        $total = 0;
        foreach ($items as $item) {
            $total += $item['Price'] * $item['quantity'];
        }
        return $total;
    }
}


if (!function_exists('cart_count')) {
    function cart_count($items){
        $count = 0;
        foreach ($items as $item) {
            $count += (int) $item['quantity'];
        }
        return $count;
    }
}
//Shows the data customerorder 

if (!function_exists('get_all_orders')) {
    function get_all_orders()
    {
        $db = new DatabaseManager();

        $result = $db->query("select o.ID, c.FirstName, c.LastName, o.OrderItems, c. Address from customerorder o ,
         customers c where o.CustomerID = c.ID and  o.OrderStatus  = 'ordered'; ");

        $orders = array();
        while ($row = $result->fetch_assoc()) {
            array_push($orders, $row);
        }

        return $orders;
       
    }
}

if (!function_exists('GetAllOrders')) {
    function GetAllOrders()
    {
        $db = new DatabaseManager();

        $result = $db->query("SELECT * FROM `customerorder`;");

        $orders = array();
        while ($row = $result->fetch_assoc()) {
            array_push($orders, $row);
        }

        return $orders;
       
    }
}


//riderpart
//after clicking on view gets the order details
if(!function_exists('getOrderDetails')){
    function getOrderDetails($orderID)
    {
        $db = new DatabaseManager();

        $orderResult = $db->query("SELECT * FROM `customerorder` WHERE `ID` = '$orderID'");
        if ($orderResult->num_rows <= 0) return array();
        $order = $orderResult->fetch_assoc();

        $customerID = $order['CustomerID'];

        $customerResult = $db->query("SELECT * FROM `customers` WHERE `ID` = '$customerID'");
        if ($customerResult->num_rows <= 0) return array();
        $customer = $customerResult->fetch_assoc();

        unset($customer['ID']);

        return array(...$order,...$customer);
    } 
}

//after confirming it changes the status to "recievd" order


if (!function_exists('GetConfirmedOrders')) {
    function GetConfirmedOrders()
    {
        $db = new DatabaseManager();

        $result = $db->query("SELECT * FROM `customerorder` WHERE `OrderStatus` = 'Recieved'");

        $orders = array();
        while ($row = $result->fetch_assoc()) {
            $cID = $row['CustomerID'];
            $customerResult = $db->query("SELECT `FirstName`, `LastName`, `Address`, `Phone` FROM `customers` WHERE `ID` = '$cID'");

            if ($customerResult->num_rows <= 0) continue;

            $res = $customerResult->fetch_assoc();

            $data = array(
                ...$row,
                ...$res
            );

            array_push($orders, $data);
        }

        return $orders;

    }
}

// Shows the details of the confirmed orders
//inserts the riderid which confirmed the order id

if(!function_exists('RecieveOrder')){
    function RecieveOrder($OrderId, $riderId){
        $db = new DatabaseManager();

        $result = $db->query("INSERT INTO confirmed_orders (RiderID, OrderId) VALUES ('$riderId', '$OrderId');");

        if(!$result) return false;

        $date = date('Y-m-d H:i:s');

        $result = $db->query("UPDATE `customerorder` SET `OrderStatus`='Recieved',`TakenOverDate`='$date',`isPaid`=1 WHERE `ID` = '$OrderId';");

        if(!$result) return false;
      
        $db->close();
        
        return true;
    }
}


if(!function_exists('get_all_riders')){
    function get_all_riders()
    {
        $db = new DatabaseManager();
         
        $result = $db->query("SELECT * FROM 'riders'");
        
        if ($result->num_rows <= 0) return false;

        $db->close();

        $rider = array();
        while ($row = $result->fetch_assoc()) {
            array_push($rider, $row);
        }

        return $rider;
    }
}


if(!function_exists('get_admin_name')){
    function get_admin_name($token)
    {
        $db = new DatabaseManager();

        $result = $db->query("SELECT `FirstName` FROM `admin` WHERE `ID` = '$token'");

        if(!$result) return false;

        $res = $result->fetch_assoc();
        
        return $res['FirstName'];
    }
}


if(!function_exists('add_menu_items')){
    function add_menu_items($name, $price, $desc, $ava, $image, $groupMenuID)
    {
        $db = new DatabaseManager();

        // genereate uuid
        $id = uniqid();

        $result = $db->query("INSERT INTO `menuitem` (`ID`, `MenuGroupID`, `Description`, `Price`, `Image`, `OrderIndex`, `isAvailable`, `Name`) 
        VALUES ('$id', $groupMenuID, '$desc', $price, '$image', 1, $ava, '$name')");

        if(!$result) return false;
        
        return true;
    }
}

if(!function_exists('get_order_image')){
    function get_order_image($id)
    {
        $db = new DatabaseManager();

        $result = $db->query("SELECT `Image` FROM `menuitem` WHERE `ID` = '$id'");

        if(!$result) return false;

        $res = $result->fetch_assoc();

        return $res['Image'] ?? '';
    }
}

if(!function_exists('get_all_menu_items')){
    function get_all_menu_items($search)
    {
        $db = new DatabaseManager();

        $result = !$search ? $db->query("SELECT * FROM `menuitem`") : 
            $db->query("SELECT * FROM `menuitem` WHERE `Name` LIKE '%$search%';");

        if(!$result) return array();

        $items = array();
        while ($row = $result->fetch_assoc()) {
            array_push($items, $row);
        }

        return $items;
    }
}

if(!function_exists('get_items')){
    function get_items($id)
    {
        $db = new DatabaseManager();

        $result = $db->query("SELECT * FROM `menuitem` WHERE `ID` = '$id'");

        if(!$result) return array();

        $res = $result->fetch_assoc();

        return $res;
    }
}

if(!function_exists('edit_menu_items')){
    function edit_menu_items($id, $name, $price, $desc, $ava, $image, $groupMenuID)
    {
        $db = new DatabaseManager();

        $result = false;

        if($image){
            $result = $db->query("UPDATE `menuitem` 
                SET `Name`='$name',`Price`='$price',`Description`='$desc', `Image` = '$image', 
                `MenuGroupID` = '$groupMenuID', `isAvailable` = $ava 
                WHERE `ID` = '$id';
            ");
        }else{
            $result = $db->query("UPDATE `menuitem` 
                SET `Name`='$name',`Price`='$price',`Description`='$desc', `MenuGroupID` = '$groupMenuID', `isAvailable` = $ava 
                WHERE `ID` = '$id';
            ");
        }

        if(!$result) return false;
        
        return true;
    }
}

if(!function_exists('del_menu_items')){
    function del_menu_items($id)
    {
        $db = new DatabaseManager();

        $result = $db->query("DELETE FROM `menuitem` WHERE `ID` = '$id';");

        if(!$result) return false;
        
        return true;
    }
}



?>