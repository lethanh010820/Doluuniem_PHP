<?php
include 'inc/header.php';

$totalQty = $ct->getTotalQtyByUserId();

$bill = new bill();
$list = $bill->getOrderByUser();
?>
<!-- Wishlist Start -->
<div class="wishlist-page">
    <div class="container-fluid">
        <div class="wishlist-page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <?php
                        if ($list) { ?>
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã đơn hàng</th>
                                        <th>Ngày đặt</th>
                                        <th>Ngày giao</th>
                                        <th>Tình trạng</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    <?php $count = 1;
                                    foreach ($list as $key => $value) { ?>
                                        <tr>
                                            <td><?= $count++ ?></td>

                                            <td><?= $value['id'] ?></td>
                                            <td><?= $value['createdDate'] ?></td>
                                            <td><?= ($value['status'] != "Processing") ? $value['receivedDate'] : "Dự kiến 3 ngày sau khi đơn hàng đã được xử lý" ?>
                                                <?= ($value['status'] != "Complete" && $value['status'] != "Processing") ? "(Dự kiến)" : "" ?> </td>
                                            <?php
                                            if ($value['status'] == 'Delivering') { ?>
                                                <td>
                                                    <a href="complete_order.php?orderId=<?= $value['id'] ?>">Đang giao (Click vào để xác nhận đã nhận)</a>
                                                </td>
                                                <td>
                                                    <a href="billdetails.php?orderId=<?= $value['id'] ?>">Chi tiết</a>
                                                </td>
                                            <?php } else { ?>
                                                <td>
                                                    <?= $value['status'] ?>
                                                </td>
                                                <td>
                                                    <a href="billdetails.php?orderId=<?= $value['id'] ?>">Chi tiết</a>
                                                </td>
                                            <?php }
                                            ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php } else { ?>
                            <h3>Đơn hàng hiện đang rỗng</h3>
                        <?php } ?>
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