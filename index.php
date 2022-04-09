 <?php
    include "inc/header.php";
    ?>
 <!-- Main Slider Start -->
 <div class="header">
     <div class="container-fluid">
         <div class="row">
             <div class="col-md-3">
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
             </div>
             <div class="col-md-6">
                 <div class="header-slider normal-slider">
                     <div class="header-slider-item">
                         <img height="400px" src="./admin/uploads/quoctephunu.png" alt="Slider Image" />
                         <div class="header-slider-caption">
                             <p>Dành tặng những món quà ý nghĩa nhất đến tay Chị Em,</p>
                         </div>
                     </div>
                     <div class="header-slider-item">
                         <img height="400px" src="./admin/uploads/Valentine.png" alt="Slider Image" />
                         <div class="header-slider-caption">
                             <p>VALENTINE'S DAY Quà tặng tình yêu tan chây trái tim</p>
                         </div>
                     </div>
                     <div class="header-slider-item">
                         <img height="400px" src="./admin/uploads/merrychristmas.png" alt="Slider Image" />
                         <div class="header-slider-caption">
                             <p>Giáng sinh an lành món quà thém ấp áp, ý nghĩae</p>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-md-3">
                 <div class="header-img">
                     <div class="img-item">
                         <img src="./admin/uploads/img-doluuniem.jpg" />
                         <a class="img-text" href="">
                             <p>Some text goes here that describes the image</p>
                         </a>
                     </div>
                     <div class="img-item">
                         <img src="./admin/uploads/img-doluuniem2.png" />
                         <a class="img-text" href="">
                             <p>Some text goes here that describes the image</p>
                         </a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Main Slider End -->
            <div class="featured-product product">
            <div class="container-fluid">
                <div class="section-header">
                    <h1>Sản phẩm nổi bật</h1>
                </div>
                <div class="row align-items-center product-slider product-slider-4">
                <?php
                $get_ProductbyNoibat = $sanpham->Get_ProductNoibat();
                if ($get_ProductbyNoibat) {
                    while ($result = $get_ProductbyNoibat->fetch_assoc()) {
                ?>
                    <div class="col-lg-3">
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
                                 <a class="btn" href="add_cart.php?maSP=<?= $result['maSP'] ?>">Thêm vào giỏ</a>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                }
                    ?>
                </div>
            </div>
        </div>
 <!-- Featured Product End -->
         <!-- Call to Action Start -->
         <div class="call-to-action">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1>Gọi cho chúng tôi</h1>
                    </div>
                    <div class="col-md-6">
                        <a href="">086-657-1001</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to Action End -->   
 <!-- Feature Start-->
 <div class="feature">
     <div class="container-fluid">
         <div class="row align-items-center">
             <div class="col-lg-3 col-md-6 feature-col">
                 <div class="feature-content">
                     <i class="fab fa-cc-mastercard"></i>
                     <h2>Thanh toán an toàn</h2>
                 </div>
             </div>
             <div class="col-lg-3 col-md-6 feature-col">
                 <div class="feature-content">
                     <i class="fa fa-truck"></i>
                     <h2>Vận chuyển toàn cầu</h2>
                 </div>
             </div>
             <div class="col-lg-3 col-md-6 feature-col">
                 <div class="feature-content">
                     <i class="fa fa-sync-alt"></i>
                     <h2>90 ngày hoàn trả</h2>
                 </div>
             </div>
             <div class="col-lg-3 col-md-6 feature-col">
                 <div class="feature-content">
                     <i class="fa fa-comments"></i>
                     <h2>Hỗ trợ 24/7</h2>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <style>
     .product-image{
         height: 300px;
     }
     .header-slider-item img{
         height: 400px;
     }
 </style>
 <!-- Feature End-->
 <?php
    include "inc/footer.php";
    ?>