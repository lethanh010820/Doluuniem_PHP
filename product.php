<?php
include "inc/header.php";
?>
<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="./index.php">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="./product.php">Sản phẩm</a></li>
            <li class="breadcrumb-item active">Danh sách sản phẩm</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Product List Start -->
<div class="product-view">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-view-top">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php

                                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                                        $name = $_POST['search'];
                                        echo "<h2>Search By '$name'</h2>";
                                    } elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['namepro'])) {
                                        $name = $_GET['namepro'];
                                        echo "<h2>Search By '$name'</h2>";
                                    } else {
                                        echo '<h2>TẤT CẢ SẢN PHẨM</h2>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                            <?php  
                            if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['namepro'])) {
                                 $searchget=" A.tenSP LIKE  '%".$_GET['namepro']."%' AND";
                             }else{
                                $searchget="";
                             }
                        
                        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                             $searchpost=" A.tenSP LIKE  '%".$_POST['search']."%' AND";
                             
                            
                        }else{
                           $searchpost='';
                        }   
                        
                 ?>
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['maLoai'])) {
                        $id = $_GET['maLoai'];
                        $getProByLoaiSP = $sanpham->Show_sanPhamByloaiSanPham($id);
                        if ($getProByLoaiSP) {
                            while ($result = $getProByLoaiSP->fetch_assoc()) {
                    ?>
                                <div class="col-md-4">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="details.php?tenSP=<?php echo $result['tenSP'] ?>"><?php echo $result['tenSP'] ?></a>
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
                                            <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Mua ngay</a>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>

                        <?php
                    } else {
                        $danhsachsanpham = $sanpham->show_sanpham($searchpost,$searchget);
                        if ($danhsachsanpham) {

                            while ($result = $danhsachsanpham->fetch_assoc()) {
                        ?>
                                <div class="col-md-4">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="details.php?tenSP=<?php echo $result['tenSP'] ?>"><?php echo $result['tenSP'] ?></a>
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
                                            <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Mua ngay</a>
                                        </div>
                                    </div>
                                </div>
                    <?php
                            }
                        }
                    }
                    ?>
                </div>

                <!-- Pagination Start -->
                <div class="col-md-12">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- Pagination Start -->
            </div>

            <!-- Side Bar Start -->
            <div class="col-lg-4 sidebar">
                <div class="sidebar-widget category">
                    <h2 class="title">Loại sản phẩm</h2>
                    <nav class="navbar bg-light">
                        <?php
                        $show = $loaisanpham->show_loaisanpham($searchpost,$searchget);
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
                                        <a href="details.php?tenSP=<?php echo $result['tenSP'] ?>"><?php echo $result['tenSP'] ?></a>
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
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
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
<!-- Product List End -->


<!-- Brand End -->
<?php
include "inc/footer.php";
?>