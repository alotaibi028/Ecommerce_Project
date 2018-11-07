<footer class="footer" style="background-color: #ffffff">
    <div class="container">
        <div class="footer-top">
            <div class="row">
                <div id="bl1">
                    <div class="footer-top-logo">
                        <h1 class="logo">
                            <a href="index.php">
                                <img src="../assets/images/logo.png" alt="logo">
                            </a>
                        </h1>
                    </div>
                    <div class="footer-infomation">
                        <p><b><?php echo $lang['address']; ?>:</b> Example Street 68, Mahattan,
                            New York, USA</p>
                        <p><b><?php echo $lang['phone']; ?>:</b> + 65 123 456 789</p>
                        <p><b><?php echo $lang['email']; ?>:</b> <a href="#">info@productiveteam.com</a></p>
                    </div>
                </div>

                  <div id="bl2">
                    <div class="footer-top-title"><h4 class="title-footer"><?php echo $lang['about']; ?></h4></div>
                    <ul class="menu-footer">
                        <li class="footer-item"><a href="../aboutus.php"><?php echo $lang['about_us']; ?></a></li>
                        <li class="footer-item"><a href="../termsofuse.php"><?php echo $lang['terms']; ?></a></li>
                        <li class="footer-item"><a href="../privacypolicy.php"><?php echo $lang['privacy']; ?></a></li>
                        <!--<li class="footer-item"><a href="#"><?php echo $lang['site_map']; ?></a></li>-->
                    </ul>
                </div>
                <div id="bl3">
                    <div class="footer-top-title"><h4 class="title-footer"><?php echo $lang['cs_service']; ?></h4></div>
                    <ul class="menu-footer">
                        <li class="footer-item"><a href="../shippingpolicy.php"><?php echo $lang['shipping_policy']; ?></a></li>
                        <?php if(isset($_SESSION['u_id']) && $_SESSION['u_type'] == 'customer'){ ?>
                            <li class="footer-item"><a href="../track_order.php"><?php echo $lang['track_order']; ?></a></li>
                        <?php }else if(isset($_SESSION['u_id']) && $_SESSION['u_type'] == 'vendor'){ ?>
                            <li class="footer-item"><a href="../vendors/add_products.php"><?php echo $lang['my_account']; ?></a></li>
                        <?php }else if(isset($_SESSION['u_id']) && $_SESSION['u_type'] == 'admin'){ ?>
                            <li class="footer-item"><a href="view_users.php">Admin Panel</a></li>
                        <?php } ?>
                        <li class="footer-item"><a href="../returnandexchange.php"><?php echo $lang['return_exchange']; ?></a></li>
                        <li class="footer-item"><a href="../contactus.php"><?php echo $lang['contact_us']; ?></a></li>
                    </ul>
                </div>
                <div id="bl4">
                    <div class="footer-top-title"><h4 class="title-footer"><?php echo $lang['products']; ?></h4></div>
                    <ul class="menu-footer">
                        <?php if(isset($_SESSION['u_id']) && $_SESSION['u_type'] == 'customer'){ ?>
                            <li class="footer-item"><a href="../track_order.php"><?php echo $lang['my_order']; ?></a></li>
                        <?php }else if(isset($_SESSION['u_id']) && $_SESSION['u_type'] == 'vendor'){ ?>
                            <li class="footer-item"><a href="../vendors/view_orders.php"><?php echo $lang['my_order']; ?></a></li>
                        <?php }else if(isset($_SESSION['u_id']) && $_SESSION['u_type'] == 'admin'){ ?>
                            <li class="footer-item"><a href="view_orders.php"><?php echo $lang['my_order']; ?></a></li>
                        <?php } ?>
                        <li class="footer-item"><a href="../desserts.php"><?php echo $lang['dessert']; ?></a></li>
                        <li class="footer-item"><a href="../baked.php"><?php echo $lang['baked']; ?></a></li>
                        <li class="footer-item"><a href="../tfood.php"><?php echo $lang['tr_food']; ?></a></li>
                        <!--<li class="footer-item"><a href="#"><?php echo $lang['my_address']; ?></a></li>-->
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="copyright">
                <i class="fa fa-copyright" aria-hidden="true"></i>
                Copyright 2018 <a href="#">Productive Team</a> All rights reserved.
            </div>
        </div>
    </div>
    <a href="#" class="backtotop ts-block"><span><?php echo $lang['top']; ?></span></a>

</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type='text/javascript' src='assets/js/jquery.min.js'></script>
<script type='text/javascript' src='assets/js/wow.min.js'></script>
<script type='text/javascript' src='assets/js/owl.carousel.min.js'></script>
<script type='text/javascript' src='assets/js/jquery.appear.min.js'></script>
<script type='text/javascript' src='assets/js/jquery.bxslider.min.js'></script>
<script type='text/javascript' src='assets/js/jquery.mmenu.all.min.js'></script>
<script type='text/javascript' src='assets/js/chosen.jquery.min.js'></script>
<script type='text/javascript' src='assets/js/frontend.js'></script>
