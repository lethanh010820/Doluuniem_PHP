<?php
ob_start();
include 'includes/header.php';
$role_id = Session::get('role_id');
if ($role_id == 1) {
    # code...
} else {
    header("Location:../index.php");
}
include '../classes/bill.php';

$order = new bill();
$list = $order->getListBill();
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý bill</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <?php $count = 1;
                if ($list) { ?>
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Người đặt hàng</th>
                                <th>Ngày đặt</th>
                                <th>Ngày giao</th>
                                <th>Tình trạng</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $key => $value) { ?>

                                <tr>
                                    <td><?= $count++ ?></td>
                                    <td><?= $value['name'] ?></td>
                                    <td><?= $value['createdDate'] ?></td>
                                    <td><?= ($value['status'] != "Processing") ? $value['receivedDate'] : "Dự kiến 3 ngày sau khi đơn hàng đã được xử lý" ?> <?= ($value['status'] != "Complete" && $value['status'] != "Processing") ? "(Dự kiến)" : "" ?> </td>
                                    <td><?= $value['status'] ?></td>
                                    <td>
                                        <a href="billlistdetail.php?orderId=<?= $value['id'] ?>">Chi tiết</a>
                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
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