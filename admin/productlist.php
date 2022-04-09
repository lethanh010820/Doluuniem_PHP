<?php
ob_start();
include 'includes/header.php';
include '../classes/sanpham.php';
$role_id = Session::get('role_id');
if ($role_id == 1) {
    # code
} else {
    header("Location:../index.php");
}
$product = new sanpham();
$list = $product->getAllAdmin((isset($_GET['page']) ? $_GET['page'] : 1));
$pageCount = $product->getCountPaging();
 ?>
<!-- table Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý sản phẩm</h1>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <a href="./add_product.php">Thêm mới sản phẩm</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php $count = 1;
                if ($list) { ?>
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Giá gốc</th>
                                <th>Số lượng</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $key => $value) { ?>

                                <tr>
                                    <td><?= $count++ ?></td>
                                    <td><?= $value['tenSP'] ?></td>
                                    <td><img width="100px" height="120px" class="image-cart" src="uploads/<?= $value['image'] ?>" alt=""></td>
                                    <td><?= number_format($value['giaBan'], 0, '', ',') ?> VND</td>
                                    <td><?= $value['quantity'] ?></td>
                                    <td>
                                        <a href="edit_product.php?maSP=<?= $value['maSP'] ?>">Xem/Sửa</a>||
                                        <a href="delete_product.php?maSP=<?= $value['maSP'] ?>">Xóa</a>

                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                <?php } else { ?>
                    <h3>Chưa có sản phẩm nào...</h3>
                <?php } ?>
                <div class="pagination">
            <a href="productlist.php?page=<?= (isset($_GET['page'])) ? (($_GET['page'] <= 1) ? 1 : $_GET['page'] - 1) : 1 ?>">&laquo;</a>
            <?php
            for ($i = 1; $i <= $pageCount; $i++) {
                if (isset($_GET['page'])) {
                    if ($i == $_GET['page']) { ?>
                        <a class="active" href="productlist.php?page=<?= $i ?>"><?= $i ?></a>
                    <?php } else { ?>
                        <a href="productlist.php?page=<?= $i ?>"><?= $i ?></a>
                    <?php  }
                } else {
                    if ($i == 1) { ?>
                        <a class="active" href="productlist.php?page=<?= $i ?>"><?= $i ?></a>
                    <?php  } else { ?>
                        <a href="productlist.php?page=<?= $i ?>"><?= $i ?></a>
                    <?php   } ?>
                <?php  } ?>
            <?php }
            ?>
            <a href="productlist.php?page=<?= (isset($_GET['page'])) ? $_GET['page'] + 1 : 2 ?>">&raquo;</a>
        </div>
            </div>
        </div>
    </div>

</div>
 <?php
include 'includes/footer.php'
 ?>