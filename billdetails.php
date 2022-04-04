<?php
include 'inc/header.php';

$billdetails = new billdetails();

$totalQty = $ct->getTotalQtyByUserId();
$result = $billdetails->getBillDetails($_GET['orderId']);
?>
<style>
.image-bill{
    width: 160px;
}
.btn-billdetails {
    background: crimson;
    width: 130px;
    height: 50px;
    text-align: center;
    line-height: 50px;
    border-radius: 10px;
    float: right;
}
.btn-billdetails a {
    color: white;

}
.btn-billdetails:hover {
    opacity: 0.5;
}
</style>
<!-- Wishlist Start -->
<div class="wishlist-page">
    <div class="container-fluid">
        <div class="wishlist-page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                <?php $count = 1;
                                foreach ($result as $key => $value) { ?>
                                    <tr>
                                        <td><?= $count++ ?></td>
                                        <td><?= $value['productName'] ?></td>
                                        <td><img class="image-bill" src="admin/uploads/<?= $value['productImage'] ?>" alt=""></td>
                                        <td><?= number_format($value['productPrice'], 0, '', ',') ?>VND</td>
                                        <td><?= $value['quantity'] ?></td>
                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="btn-billdetails">
                            <a href="./bill.php" >Trở về</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Wishlist End -->
<?php
include "inc/footer.php";
?>