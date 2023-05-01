<?php

require_once BASEURL . "/core/function.php";

$message = $_GET['message'] ?? false;
$token = isset($_GET['token']) ? $_GET['token'] : false;

$itemID = $_GET['id'] ?? false;
$item = get_items($itemID);

$main = get_main_menu();
$submain = get_sub_main_menu($main[0]->ID);

if($itemID){
    $current_submenu = array_filter($submain, function ($var) use ($item) { return $var->ID === $item['MenuGroupID']; });
    $current_submenu = array_values($current_submenu);
}


?>
<link rel="stylesheet" href="<?php echo SITEURL ?>/public/css/addmenu.css" />
<div class="main-content-body" style="margin: 15px;">
    <form action="<?php echo SITEURL ?>/core/admin-action.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="<?= $item ? 'edit-menu-items' : 'add-menu-items' ?>">
        <input type="hidden" name="token" value="<?= $token ?>">
        <?php if($itemID){ ?>
            <input type="hidden" name="id" value="<?= $itemID ?>">
        <?php } ?>

        <div style="padding: 15px 0px;" class="product-form">
            <div class="form-title">
                <h2> <?= $item ? 'Edit' : 'Add' ?> PRODUCT
                <?php if ($message) { ?> 
                    <span style="font-size: small; color: rgb(152, 0, 0); padding: 0px 15px;" > <?php echo $message; ?> </span>
                <?php } ?>
                </h2>
            </div>
            <div>
                <p>Product Name:</p>
                <input required name="name" type="text" value="<?= $item['Name'] ?? '' ?>">
            </div>
            <div>
                <p>Menu Group:</p>
                <select name="menugroup">
                    <?php foreach ($submain as $menu) : ?>
                        <option <?= $item ? ($current_submenu[0]->Name === $menu->Name ? 'selected' : '') : '' ?> value="<?= $menu->ID ?>"> <?= $menu->Name ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <p>Price:</p>
                <input required name="price" type="number" value="<?= $item['Price'] ?? '' ?>">
            </div>
            <div>
                <p> Description:</p>
                <textarea name="desc" rows="10"><?= $item['Description'] ?? '' ?></textarea>
            </div>
            <div>
                <p>Product Image</p>
                <input accept="image/png, image/gif, image/jpeg" <?= $item ? '' : 'required' ?> name="image" type="file">
            </div>
            <div>
                <p>Available</p>
                <input name="ava" <?= $item ? ($item['isAvailable'] == 1 ? 'checked' : '') : '' ?>  type="checkbox">
            </div>
            <div class="actions" >
                <input value="Save" type="submit">
            </div>
    </form>
</div>
<script src="js/AddMenu.js"></script>