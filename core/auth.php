<?php 
require_once 'function.php';

$auth_request = $_POST['request'];

if ($auth_request === 'login') { 

    $status = false;
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

    if($email !== false){
        $status = login(
            $_POST['email'],
            $_POST['password'],
        );
    }

    if ($status !== false) {
        switch ($status['usertype']) {
            case 'customers':
                $url = addQuery('http://localhost/customer/homepage.php', array(
                    'token' => $status['token'],
                ));
                header('Location: ' . $url);
                break;
            
            case 'riders':
                $url = addQuery('http://localhost/rider/rider-homepage.php', array(
                    'token' => $status['token'],
                ));
                header('Location: ' . $url);
                break;

            case 'admin':
                $url = addQuery('http://localhost/admin/dashboard.php', array(
                    'token' => $status ['token'],
                ));
                header('Location: ' . $url);
                break;
            
            default:
                $url = addQuery('http://localhost/auth/login.php', array('error' => 'try again later'));
                header('Location: ' . $url);
                break;
        }
    } else {
        $url = addQuery('http://localhost/auth/login.php', array('error' => 'invalid email or password'));
        header('Location: ' . $url);
    }

} elseif ($auth_request === 'register') {
    if ( $_POST['tos'] !== 'on' ) {
        $url = addQuery('http://localhost/auth/register.php', array('error' => 'terms of service not accepted'));
        header('Location: ' . $url);
        return;
    }

    if( $_POST['password'] !== $_POST['confrim_password']){
        $url = addQuery('http://localhost/auth/register.php', array('error' => 'unmatching password'));
        header('Location: ' . $url);
        return;
    }

    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    if( $email === false ){
        $url = addQuery('http://localhost/auth/register.php', array('error' => 'invalid email'));
        header('Location: ' . $url);
        return;
    }

    $keys = array(
        'email' => 'Email', 
        'password' => 'Password', 
        'first_name' => 'First Name', 
        'last_name' => 'Last Name', 
        'address' => 'Address',
        'phone_number' => 'Phone Number'
    );

    foreach ($keys as $key => $value) {
        if (empty($_POST[$key])) {
            $url = addQuery('http://localhost/auth/register.php', array('error' => 'empty ' . $value . ' field'));
            header('Location: ' . $url);
            return;
        }
    }

    $status = register(
        $_POST['email'],
        $_POST['password'],
        $_POST['first_name'],
        $_POST['last_name'],
        $_POST['address'],
        $_POST['phone_number'],
    );

    if ($status === true) {
        header('Location: ' . 'http://localhost/auth/login.php');
    } else {
        $url = addQuery('http://localhost/auth/register.php', array('error' => $status));
        header('Location: ' . $url);
    }
}

?>