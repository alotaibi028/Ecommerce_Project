<?php session_start(); ?>

<!DOCTYPE html>
<html lang='en' xmlns='http://www.w3.org/1999/xhtml'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Productive Families</title>
    <link rel='stylesheet' href='../assets/css/owl.carousel.min.css'>
    <link rel='stylesheet' href='../assets/css/font-awesome.css'>
    <link rel='stylesheet' href='../assets/css/jquery.mmenu.all.css'>
    <link rel='stylesheet' href='../assets/css/flaticon.css'>
    <link rel='stylesheet' href='../assets/css/style.css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i;Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>
<body class="about-page">
	<header class="header header-style2">
        <div class="header-top">
            <div class="container">
                <div class="header-top-right">
                    <p>
                        <a href="#">Register</a>
                        <span style="color: #4ebae3;">or</span>
                        <a href="#">Login</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="header-mid">
            <div class="container">
                <div class="header-mid-left">
                    <h1 class="logo">
                        <a href="index.php">
                            <img src="../assets/images/logo.png" alt="logo">
                        </a>
                    </h1>
                    <div class="header-search">
                        <form action="form.php" class="form form-search-header">
                            <input type="text" placeholder="Search...">
                            <button class="button-search"><i class="flaticon-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="header-mid-right">
                    <div>
                        <div class="cart-menu">
                            <a href="#">
                                <i class="flaticon-commerce"></i>
                                Cart
                                <?php
                                $total_quantity = 0;
                                $total_price = 0;
                                if(isset($_SESSION["cart_item"])) {
                                    foreach ($_SESSION["cart_item"] as $item) {
                                        $total_quantity += $item["quantity"];
                                        $total_price += ($item["price"] * $item["quantity"]);
                                    }
                                }
                                ?>
                                <p class="cart-amount"><?php echo $total_quantity; ?></p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-primary">
            <div class="container">
                <a href="#primary-navigation" class="menu-button primary-navigation-button">
                    <span class="flaticon-bars"></span>Main Menu
                </a>
                <nav id="primary-navigation" class="site-navigation main-menu menu-home1">
                    <ul id="primary-menu" class="menu">
                        <li class="menu-item ">
                            <a href="#">Home</a>
                        </li>
                        <li class="menu-item"><a href="add_products.php">Add Products</a></li>
                        <li class="menu-item"><a href="#">View Orders</a></li>
                        <li class="menu-item"><a href="#">Manage Orders</a></li>
                        <li class="menu-item "><a href="#">Change Order Status</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>