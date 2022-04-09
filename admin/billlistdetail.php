<?php
ob_start();
include 'includes/header.php';
$role_id = Session::get('role_id');
if ($role_id == 1) {
    # code...
} else {
    header("Location:../index.php");
}
include '../classes/billdetails.php';
include '../classes/bill.php';

$orderDetails = new billdetails();
$result = $orderDetails->getBillDetails($_GET['orderId']);
$order = new bill();
$order_result = $order->getById($result[0]['orderId']);
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý chi tiết bill</h1>
    <div class="title">
        <h1>Chi tiết đơn đặt hàng <?= $order_result['id'] ?></h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <?php $count = 1;
                if ($result) { ?>
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $key => $value) { ?>

                                <tr>
                                    <td><?= $count++ ?></td>
                                    <td><?= $value['productName'] ?></td>
                                    <td><img width="100px" height="120px" class="image-cart" src="uploads/<?= $value['productImage'] ?>" alt=""></td>
                                    <td><?= $value['productPrice'] ?></td>
                                    <td><?= $value['quantity'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php
                    if ($order_result['status'] == 'Processing') { ?>
                        <a href="processed_order.php?orderId=<?= $_GET['orderId'] ?>">Xác nhận đơn hàng</a>
                    <?php }
                    ?>
                <?php } else { ?>
                    <h3>Chưa có đơn hàng nào...</h3>
                <?php } ?>
            </div>
        </div>
    </div>

</div>
<?php
include 'includes/footer.php'
?>