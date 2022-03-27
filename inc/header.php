<?php
include 'lib/session.php';
session::init();
include_once("lib/database.php");
include_once("helpers/format.php");
Spl_autoload_register(function ($className) {
    include_once("classes/" . $className . ".php");
});
$db = new database();
$fm = new format();
$loaisanpham = new loaisanpham();
$sanpham = new sanpham();
$nguoidung = new nguoidung();
$ct = new cart();
$totalQty = $ct->getTotalQtyByUserId();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>E Store - eCommerce HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="eCommerce HTML Template Free Download" name="keywords">
    <meta content="eCommerce HTML Template Free Download" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/slick/slick.css" rel="stylesheet">
    <link href="lib/slick/slick-theme.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Top bar Start -->
    <div class="top-bar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <i class="fa fa-envelope"></i>
                    <?php
                    $name = Session::get('customer_name');
                    echo $name;
                    ?>
                </div>
                <div class="col-sm-6">
                    <i class="fa fa-phone-alt"></i>
                    <?php
                    $user = Session::get('userId');
                    echo $user;
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Top bar End -->

    <!-- Nav Bar Start -->
    <div class="nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                <a href="#" class="navbar-brand">MENU</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto">
                        <a href="./index.php" class="nav-item nav-link active">Trang chủ</a>
                        <a href="./product.php" class="nav-item nav-link">Sản phẩm</a>
                        <a href="product-detail.html" class="nav-item nav-link">Product Detail</a>
                        <a href="cart.html" class="nav-item nav-link">Cart</a>
                        <a href="checkout.html" class="nav-item nav-link">Checkout</a>
                        <a href="my-account.html" class="nav-item nav-link">My Account</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">More Pages</a>
                            <div class="dropdown-menu">
                                <a href="wishlist.html" class="dropdown-item">Wishlist</a>
                                <a href="login.html" class="dropdown-item">Login & Register</a>
                                <a href="contact.html" class="dropdown-item">Contact Us</a>
                            </div>
                        </div>
                    </div>
                    <?php
                    $check = Session::get('customer_login');
                    if ($check == false) {
                    ?>

                        <div class="header__top__right__social">
                            <a href="register.php"><i></i> Đăng ký</a>
                        </div><?php
                            }
                                ?>
                    <div class="header__top__right__auth">
                        <?php
                        $check = Session::get('customer_login');
                        if ($check == false) {
                            echo '<a href="login.php"><i class="fa fa-user"></i> Login</a>';
                        } else {
                            echo '<a href="logout.php"><i class="fa fa-user"></i>Logout</a></div>';
                        }
                        ?>
                    </div>

            </nav>
        </div>
    </div>
    <!-- Nav Bar End -->

    <!-- Bottom Bar Start -->
    <div class="bottom-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="logo">
                        <a href="index.html">
                            <img src="img/logo.png" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="search">
                        <form action="product.php" method="GET">
                            <input type="text" name="namepro" placeholder="Search">
                            <button><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="user">
                        <a href="checkout.php" class="btn cart">
                            <i class="fa fa-shopping-cart"></i>
                            <span><?= ($totalQty['total']) ? $totalQty['total'] : "0" ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bottom Bar End -->