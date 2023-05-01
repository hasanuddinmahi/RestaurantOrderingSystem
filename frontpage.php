<?php

require_once BASEURL . "/components/header.php";

?>
<link rel="stylesheet" href="<?php echo SITEURL ?>/public/css/frontpage.css">

<section style="margin-top: -20px;" class="banner">
    <div class="banner1">
        <div>

            <h1 class="italiano">
                <span class="sp-1">It</span><span class="sp-2">alia</span><span class="sp-3">no</span>
            </h1>
            <p>
                We proudly bring a piece of Italy to Malaysia We created an inclusive variety of food for all from scratch using the selected ingredients;
                <br>
                our very own classic Italian, vegetarian, vegan and gluten-free menu.
            </p>
            <button> <a href="<?php echo SITEURL ?>/customer/menu.php">View Our Menu</a>  </button>
        </div>
    </div>
    <div class="banner2">
        <img src="<?php echo SITEURL ?>/public/media/Cover.jpg" alt="">
    </div>
</section>


<!-- Register Section -->
<section class="register-sec">
    <div class="register">
        <button class="login"> <a href="<?php echo SITEURL ?>/auth/login.php">Login</a> </button>
        <p>----------------------OR----------------------</p>
        <button class="shared"> <a href="<?php echo SITEURL ?>/auth/register.php">Sign Up</a> </button>
    </div>
    <div>
        <button class="shared"> <a href="<?php echo SITEURL ?>/customer/menu.php"> Offers </a> </button>
    </div>
</section>


<!-- Image Section -->
<section>
    <div class="img-section">
        <img src="<?php echo SITEURL ?>/public/media\pasta offer.png" alt="pasta" />
        <img src="<?php echo SITEURL ?>/public/media\traditionoffer.png" alt="traditional food 1" />
        <img src="<?php echo SITEURL ?>/public/media\traditionoffer2.png" alt="traditional food 2" />
        <img src="<?php echo SITEURL ?>/public/media\pizzaoffer.png" alt="pizza" />
    </div>
</section>


<!-- Our Story -->
<section class="story-section">
    <div>
        <h3>Our Story</h3>
        <p style="padding: 0 100px;">
            Our Food is handcrafted fresh food which is light, springy, tender, silky in texture, rich with a delectable eggy flavour and with a soft yellow hue that complements our beautiful sauces. 
            Worry not as we do provide VEGAN & GLUTEN FREE Menus too which the ingredients are imported directly from Italy!
        </p>
    </div>

    <div class="story-img">
        <img src="<?php echo SITEURL ?>/public/media\storyphoto1.png" alt="story 1" />
        <img src="<?php echo SITEURL ?>/public/media\storyphoto2.png" alt="story 2" />
    </div>

</section>

<?php 

require_once BASEURL . "/components/footer.php";

?>