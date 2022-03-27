<?php
ob_start();
include 'inc/header.php';

?>

<?php
if (!isset($_GET['tenSP']) || $_GET['tenSP'] == NULL) {
    echo "<script>window.location = '404.php'</script>";
} else {
    $name = $_GET['tenSP'];
}
?>
<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="./index.php">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="./product.php">Sản phẩm</a></li>
            <li class="breadcrumb-item active">Chi tiết sản phẩm</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Product Detail Start -->
<div class="product-detail">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <form action="" method="post">
                    <?php

                    $prodList = $sanpham->get_1Product($name);
                    if ($prodList) {

                        while ($result = $prodList->fetch_assoc()) {


                    ?>

                            <div class="product-detail-top">
                                <div class="row align-items-center">
                                    <div class="col-md-5">
                                        <div class="product-slider-single normal-slider">
                                            <img src="admin/uploads/<?php echo $result['image'] ?>" alt="Product Image">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="product-content">
                                            <div class="title">
                                                <h2><?php echo $result['tenSP'] ?></h2>
                                            </div>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="price">
                                                <h4>Giá:</h4><p><?php echo $fm->format_currency($result['giaBan']) ?><span>đ</span></p>
                                            </div>
                                            <div class="description">
                                                <h3>Mô tả:</h3>
                                                <p><?php echo $result['dvt'] ?></p>
                                            </div>
                                            <div class="product__details__quantity">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input name="quantity" type="text" value="1" min="1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="action">
                                            <a class="btn" href="add_cart.php?maSP=<?= $result['maSP'] ?>">Thêm vào giỏ</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row product-detail-bottom">
                                <div class="col-lg-12">
                                    <ul class="nav nav-pills nav-justified">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="pill" href="#description">Mô tả</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#specification">Thông tin chi tiết</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#reviews">Đánh giá (1)</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div id="description" class="container tab-pane active">
                                            <h4>Mô tả sản phẩm</h4>
                                            <p>
                                            <?php echo $result['dvt'] ?>
                                            </p>
                                        </div>
                                        <div id="specification" class="container tab-pane fade">
                                            <h4>Product specification</h4>
                                            <p>
                                            <?php echo $result['dvt'] ?>
                                            </p>
                                        </div>
                                        <div id="reviews" class="container tab-pane fade">
                                            <div class="reviews-submitted">
                                                <div class="reviewer">Phasellus Gravida - <span>01 Jan 2020</span></div>
                                                <div class="ratting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p>
                                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
            </div>
    <?php
                        }
                    }
    ?>
    </form>

    <!-- Side Bar Start -->
    <div class="col-lg-4 sidebar">
        <div class="sidebar-widget category">
            <h2 class="title">Category</h2>
            <nav class="navbar bg-light">
                <?php
                $show = $loaisanpham->show_loaisanpham();
                if ($show) {

                    while ($result = $show->fetch_assoc()) {


                ?>
                        <ul class="navbar-nav">

                            <li class="nav-item"><a class="nav-link" href="product.php?maLoai=<?php echo $result['maLoai'] ?>,&tenLoai=<?php echo $result['tenLoai'] ?>"><i class="fa fa-shopping-bag"></i><?php echo $result['tenLoai']; ?></a></li>

                        </ul>
                <?php
                    }
                }
                ?>
            </nav>
        </div>

        <div class="sidebar-widget widget-slider">
            <div class="sidebar-slider normal-slider">
                <?php
                $get_ProductbyNoibat = $sanpham->Get_ProductNoibat();
                if ($get_ProductbyNoibat) {
                    while ($result = $get_ProductbyNoibat->fetch_assoc()) {
                ?>
                        <div class="product-item">
                            <div class="product-title">
                                <a href="details.php?proname=<?php echo $result['tenSP'] ?>"><?php echo $result['tenSP'] ?></a>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="product-image">
                                <a href="product-detail.html">
                                    <img src="admin/uploads/<?php echo $result['image'] ?>" alt="Product Image">
                                </a>
                                <div class="product-action">
                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><?php echo   $fm->format_currency($result['giaBan']) ?><span>đ</span></h3>
                                <a class="btn" href="add_cart.php?maSP=<?= $result['maSP'] ?>">Thêm vào giỏ</a>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Side Bar End -->
        </div>
    </div>
</div>
<!-- Product Detail End -->

<!-- Brand End -->

<?php
include "inc/footer.php";
?>