<?php
    require_once BASEURL . "/components/header.php";

    $token = isset($_GET['token']) ? $_GET['token'] : '';

    $menuMainModel = get_main_menu_model();

    $cartSessionItems = isset($_SESSION['shopping_cart']) ? $_SESSION['shopping_cart'] : array();

?>

<div style="width: 100%; height: 100%; padding: 10px;">
    <div style="width: 100%; box-shadow: rgba(0, 0, 0, 0.75) 0px 0px 10px 0px; margin-bottom: 20px; border-radius: 0px 15px 15px;">
        <h1 style="font-size: 2em; font-weight: bold; padding: 10px 15px;"> <?php echo $menuMainModel->Name ; ?> </h1>
        <div style="background-color: rgb(152, 0, 0); width: 50%; height: 10px;"></div>
    </div>

    <?php
    $menu_groups = $menuMainModel->MenuGroups[0];

    foreach ( $menu_groups as $menu_group):  ?>
        <div id="menu-item-<?php echo $menu_group->ID ?>" style="width: 100%; padding: 10px 0px; box-shadow: rgba(0, 0, 0, 0.75) 0px 0px 10px 0px; border-radius: 0px 15px 15px; margin-bottom: 20px;">
            <h1 style="font-size: 1.5em; font-weight: bold; padding: 10px 15px;"> <?php echo $menu_group->Name ?> </h1>
            <div style="background-color: rgb(152, 0, 0); width: 50%; height: 10px;"></div>
            <div style="display: flex; gap: 50px; overflow: auto hidden; white-space: nowrap; height: 350px; width: 100%; padding: 10px;">
                
                <?php foreach ($menu_group->MenuItems as $menu_item):
                    if ($menu_item->isAvailable === 0) continue;

                    $itemsAddToCart = addQuery( SITEURL .'/core/cart-actions.php', array(
                        'token' => $token,
                        'item' => $menu_item->id,
                        'action' => 'add'
                    ));
                    
                    ?>
                    <div id="menu-item-<?php echo $menu_item->id ?>" style="border-radius: 15px; background-color: rgb(152, 0, 0); height: 100%; min-width: 300px; padding-bottom: 10px;">
                        <img src="<?php echo $menu_item->image ?>" style="height: 80%; width: 100%; border-radius: 15px;">
                        <p style="font-size: 1em; font-weight: bold; padding: 5px 15px; color: white;"> <?php echo $menu_item->name ?> </p>
                        <div style="display: flex; justify-content: space-between; padding: 0px 15px;">
                            <p style="font-size: 1em; color: white;"><?php echo $menu_item->price ?></p>
                            <a href="<?php echo $itemsAddToCart ?>" style="font-size: 1em; font-weight: bold; background-color: white; padding: 0px 15px; border-radius: 10px;">Add to cart</a>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php require_once BASEURL . "/components/footer.php"; ?>