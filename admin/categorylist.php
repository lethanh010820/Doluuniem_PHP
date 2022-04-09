<?php
ob_start();
include 'includes/header.php';
include '../classes/loaisanpham.php';
$role_id = Session::get('role_id');
if ($role_id == 1) {
    # code
} else {
    header("Location:../index.php");
}
$categories = new loaisanpham();
$list = $categories->getAllAdmin((isset($_GET['page']) ? $_GET['page'] : 1));
$pageCount = $categories->getCountPaging();
?>
<!-- table Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý loại sản phẩm</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="./add_category.php">Thêm mới loại sản phẩm</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php $count = 1;
                if ($list) { ?>
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Loại sản phẩm</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $key => $value) { ?>

                                <tr>
                                    <td><?= $count++ ?></td>
                                    <td><?= $value['tenLoai'] ?></td>
                                    <td>
                                        <a href="edit_category.php?maLoai=<?= $value['maLoai'] ?>">Xem/Sửa</a>||
                                        <a href="delete_category.php?maLoai=<?= $value['maLoai'] ?>">Xóa</a>

                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                <?php } else { ?>
                    <h3>Chưa có sản phẩm nào...</h3>
                <?php } ?>
                <div class="pagination">
                    <a href="categorylist.php?page=<?= (isset($_GET['page'])) ? (($_GET['page'] <= 1) ? 1 : $_GET['page'] - 1) : 1 ?>">&laquo;</a>
                    <?php
                    for ($i = 1; $i <= $pageCount; $i++) {
                        if (isset($_GET['page'])) {
                            if ($i == $_GET['page']) { ?>
                                <a class="active" href="categorylist.php?page=<?= $i ?>"><?= $i ?></a>
                            <?php } else { ?>
                                <a href="categorylist.php?page=<?= $i ?>"><?= $i ?></a>
                            <?php  }
                        } else {
                            if ($i == 1) { ?>
                                <a class="active" href="categorylist.php?page=<?= $i ?>"><?= $i ?></a>
                            <?php  } else { ?>
                                <a href="categorylist.php?page=<?= $i ?>"><?= $i ?></a>
                            <?php   } ?>
                        <?php  } ?>
                    <?php }
                    ?>
                    <a href="categorylist.php?page=<?= (isset($_GET['page'])) ? $_GET['page'] + 1 : 2 ?>">&raquo;</a>
                </div>
            </div>
        </div>
    </div>

</div>
<?php
include 'includes/footer.php'
?>