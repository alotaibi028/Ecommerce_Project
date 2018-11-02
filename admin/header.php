<?php include '../includes/config.php';
session_start();
if(!isset($_SESSION['lang'])){
    $_SESSION['lang'] = 'english';
}
require 'core/init.php';

if(!isset($_SESSION['u_id']) || !isset($_SESSION['u_type']) || $_SESSION['u_type'] != 'admin'){
    header('location:../login.php');
}
?>
<!DOCTYPE html>
<?php
if($_SESSION['lang'] == 'arabic'){
    echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ar" dir="rtl">';
}else{
    echo '<html lang="en">';
}
?>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Productive Families</title>
    <link rel='stylesheet' href='../assets/css/owl.carousel.min.css'>
    <link rel='stylesheet' href='../assets/css/font-awesome.css'>
    <link rel='stylesheet' href='../assets/css/jquery.mmenu.all.css'>
    <link rel='stylesheet' href='../assets/css/flaticon.css'>
    <link rel='stylesheet' href='../assets/css/style.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i;Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">



</head>
<body>
	<header>
        <div class="header-top">
            <div class="container">
                <div class="header-top-right">
                    <p style="margin-right: 75px;">
                        <?php if(isset($_SESSION['u_id'])){
                            echo '<div class="dropdown" style="margin-right: 80px;margin-top: 2px"><a href="#">Welcome, '.$_SESSION['u_fname'].'</a>';
                            echo '<div class="dropdown-content" style="margin-left: 30px;margin-top: 8px"><a href="../logout.php">LogOut</a></div></div>';
                        }else{?>
                            <a href="#"><?php echo $lang['register']; ?></a>
                            <span style="color: #4ebae3;">or</span>
                            <a href="../login.php"><?php echo $lang['login']; ?></a>
                        <?php } ?>
                    </p>
                    <div class="dropdown">
                        <?php if($_SESSION['lang'] === 'english'){?>
                            <a href="<?php if(@$_GET['action']=="update"){echo 'view_products.php';} ?>?lang=english"><button>English</button></a>
                        <?php }else{?>
                            <a href="<?php if(@$_GET['action']=="update"){echo 'view_products.php';} ?>?lang=arabic"><button>العربية</button></a>
                        <?php } ?>
                        <div class="dropdown-content">
                            <?php if($_SESSION['lang'] === 'english'){ ?>
                                <a href="<?php if(@$_GET['action']=="update"){echo 'view_products.php';} ?>?lang=arabic">العربية</a>
                            <?php }else{  ?>
                                <a href="<?php if(@$_GET['action']=="update"){echo 'view_products.php';} ?>?lang=english">English</a>
                            <?php } ?>
                        </div>
                    </div>
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
                            <input type="text" placeholder="<?php echo $lang['search']; ?>...">
                            <button class="button-search"><i class="flaticon-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="header-mid-right">
                    <div>
                        <div class="cart-menu">
                            <a href="#">
                                <i class="flaticon-commerce"></i>
                                <?php echo $lang['cart']; ?>
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
                    <span class="flaticon-bars"></span><?php echo $lang['main_menu']; ?>
                </a>
                <nav id="primary-navigation" class="site-navigation main-menu menu-home1">
                    <ul id="primary-menu" class="menu">
                        <li class="menu-item ">
                            <a href="../index.php"><?php echo $lang['home']; ?></a>
                        </li>
                        <li class="menu-item "><a href="view_users.php">View All Users</a></li>
                        <li class="menu-item "><a href="view_products.php">View All Products</a></li>
                        <li class="menu-item "><a href="view_orders.php">View All Orders</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>