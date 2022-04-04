<?php  ob_start();
include 'inc/header.php';
?>
<?php 
$check = Session::get('customer_login');
    if($check== true){
        header('Location:index.php');
    }
 ?>
<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
    $insert_Customer=$nguoidung->insert_Customer($_POST);
}
?>
 <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript" charset="utf-8" async defer></script>
                    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    form {
        border: 3px solid #f1f1f1;
    }

    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    button {
        background-color: #FF6F61;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    button:hover {
        opacity: 0.8;
    }

    .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
    }

    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
    }

    img.avatar {
        width: 40%;
        border-radius: 50%;
    }

    .container {
        padding: 16px;
    }

    span.psw {
        float: right;
        padding-top: 16px;
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }

        .cancelbtn {
            width: 100%;
        }
    }
</style>
<section class="breadcrumb-section set-bg" data-setbg="img/background.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Đăng ký</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.php">Trang chủ</a>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        
        <div class="checkout__form">
            <h4>Đăng ký tài khoản</h4>
            <center><h3><?php if (isset($insert_Customer)) {
            echo $insert_Customer;

      } ?></h3></center>
            <form action="register.php" method="post">
                <div class="row">
                    <div class="modal-body">
                        <div class="checkout__input">
                            <p>Tài khoản<span>*</span></p>
                            <input type="text" name="username" placeholder="Enter Username">
                        </div>
                        <div class="checkout__input">
                            <p> họ và tên<span>*</span></p>
                            <input type="text" name="name" placeholder="Enter Name">
                        </div>
                        <div class="checkout__input">
                            <p> Mật khẩu<span>*</span></p>
                            <input type="password" name="password" placeholder="Enter Password">
                        </div>
                        <div class="checkout__input">
                            <p>Nhật lại mật khẩu<span>*</span></p>
                            <input type="password" name="repeatpassword" placeholder="Repeat Password">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Số điện thoại<span>*</span></p>
                                    <input type="text" name="phone" placeholder="Enter Phone">
                                </div>
                            </div>
                        </div>
                                <div class="checkout__input">
                                    <p>Địa chỉ<span>*</span></p>
                                    <input type="text" name="address" placeholder="Enter Address">
                                </div>
                           
                        <td>
                        	
                        <center><button style="width: 100%;" type="submit" class="site-btn" name="register">Đăng ký</button></center>
                        </td>
                    </div>  	
                    
                </form>
            </div>
        </div>
        
    </section>
    

    <?php
    include 'inc/footer.php';
    
    ob_end_flush();?>