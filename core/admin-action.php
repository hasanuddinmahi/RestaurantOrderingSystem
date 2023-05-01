<?php

require_once "function.php";


switch ($_POST['action']) {
    case 'add-menu-items':

        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];
        $image = $_FILES['image']['tmp_name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        $filepath = $_SERVER['DOCUMENT_ROOT'] . '/public/media/' . $newFileName;
        
        if(move_uploaded_file($image, $filepath)){

            $ava = !isset($_POST['ava']) ? 0 : ($_POST['ava'] ? 1 : 0);

            $res = add_menu_items(
                $_POST['name'],
                $_POST['price'],
                $_POST['desc'],
                $ava,
                'http://localhost/public/media/'. $newFileName,
                $_POST['menugroup']
            );

            header('Location: http://localhost/admin/dashboard.php?token='. $_POST['token'] .'&panel=add-menu&message=success');
            return;
        }

        header('Location: http://localhost/admin/dashboard.php?token='. $_POST['token'] .'&panel=add-menu&message=failed');
        break;
    
    case 'edit-menu-items':
        $fileName = $_FILES['image']['name'];
        $img = false;
        if($fileName){
            $fileSize = $_FILES['image']['size'];
            $fileType = $_FILES['image']['type'];
            $image = $_FILES['image']['tmp_name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            $filepath = $_SERVER['DOCUMENT_ROOT'] . '/public/media/' . $newFileName;
            @move_uploaded_file($image, $filepath);
            $img = 'http://localhost/public/media/'. $_FILES['image']['name'];
        }

        $ava = !isset($_POST['ava']) ? 0 : ($_POST['ava'] ? 1 : 0);

        $res = edit_menu_items(
            $_POST['id'],
            $_POST['name'],
            $_POST['price'],
            $_POST['desc'],
            $ava,
            $img,
            $_POST['menugroup']
        );

        if($res){
            header('Location: http://localhost/admin/dashboard.php?token='. $_POST['token'] .'&panel=add-menu&message=success&id=' . $_POST['id']);
        }else{
            header('Location: http://localhost/admin/dashboard.php?token='. $_POST['token'] .'&panel=add-menu&message=failed&id=' . $_POST['id']);
        }

        break;

    case 'del-menu-item':
        $res = del_menu_items( $_POST['id']);

        if($res){
            header('Location: http://localhost/admin/dashboard.php?token='. $_POST['token'] .'&panel=menu');
        }else{
            header('Location: http://localhost/admin/dashboard.php?token='. $_POST['token'] .'&panel=products-details&message=failed&id=' . $_POST['id']);
        }
        break;
    default:
        # code...
        break;
}