<?php
require_once BASEURL . "/core/function.php";

$token = isset($_GET['token']) ? $_GET['token'] : false;
$search = isset($_POST['search']) ? $_POST['search'] : false;

$items = get_all_menu_items($search);

$main = get_main_menu();
$submain = get_sub_main_menu($main[0]->ID);

?>
<link rel="stylesheet" href="<?php echo SITEURL ?>/public/css/menu.css" />
<style>

</style>
<div class="main-content-body">
    <div class="main-content-body-title">
        <h1>Menu</h1>
    </div>
    <div class="main-section">
        <div class="section-title">
            <h2>Product List</h2>
            <div class="sarch-bar">
                <form action="http://localhost/admin/dashboard.php?token=<?= $token ?>&panel=menu" method="post">
                    <input type="search" name="search" placeholder="Search...">
                    <input type="submit" name="sumit" value="Search">
                </form>
            </div>
        </div>
        <div style="padding: 10px 50px;">
            <div style="display: flex;justify-content: space-evenly;margin: 20px 0px;font-weight: bold;background: green;padding: 20px 10px;border-radius: 10px;">
                <div style="flex: 1;">
                    <p>  # </p>
                </div>
                <div style="flex: 2;">
                    <p> Image </p>
                </div>
                <div style="flex: 2;">
                    <p> Name </p>
                </div>
                <div style="flex: 1;">
                    <p> Menu Group </p>
                </div>
                <div style="flex: 1;">
                    <p> Availablitiy </p>
                </div>
                <div style="flex: 1;">
                    <p> Price </p>
                </div>
                <div style="flex: 1;">
                    <p> Actions </p>
                </div>
            </div>
            <?php foreach ($items as $key => $item):
                $current_submenu = array_filter($submain, function ($var) use ($item) { return $var->ID === $item['MenuGroupID']; });
                $current_submenu = array_values($current_submenu);
                ?>

                <div style="display: flex; margin: 20px 0px;">
                    <div style="flex: 1;">
                        <p> <?= $key ?> </p>
                    </div>
                    <div style="flex: 2;">
                        <img style="flex: 2;height: 50px; weight: 20px;" src="<?= $item['Image'] ?>" alt="product_image">
                    </div>
                    <div style="flex: 2;">
                        <p> <?= $item['Name'] ?> </p>
                    </div>
                    <div style="flex: 1;">
                        <p> <?= $current_submenu[0]->Name ?> </p>
                    </div>
                    <div style="flex: 1;">
                        <p> <?= $item['isAvailable'] == 1 ? 'Available' : 'Not Available'; ?> </p>
                    </div>
                    <div style="flex: 1;">
                        <p> <?= $item['Price'] ?> </p>
                    </div>
                    <div style="flex: 1;">
                        <p> 
                            <a style="color: black; font-size: medium;" href="<?php echo SITEURL ?>/admin/dashboard.php?token=<?= $token ?>&panel=products-details&itemID=<?= $item['ID'] ?>" >
                                view
                            </a> 
                        </p>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</div>