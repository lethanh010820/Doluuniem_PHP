<?php
ob_start();
include 'includes/header.php';
include '../classes/loaisanpham.php';
$role_id = Session::get('role_id');
if ($role_id == 1) {
    $categories = new loaisanpham();
    $categoryUpdate = mysqli_fetch_assoc($categories->getByIdAdmin($_GET['maLoai']));
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $result = $categories->updateCategory($_POST, $_FILES);
        $categoryUpdate = mysqli_fetch_assoc($categories->getByIdAdmin($_GET['maLoai']));
    }
} else {
    header("Location:../index.php");
}
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Sửa loại sản phẩm</h4>
                    </div>
                    <?php
                    if (isset($result)) {
                        echo $result;
                    }
                    ?>
                    <div class="card-body">
                        <form action="edit_category.php?maLoai=<?= $categoryUpdate['maLoai'] ?>" method="post">
                            <div class="row">
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>Mã danh mục :</label>
                                        <label class="form-control"><?php echo $categoryUpdate['maLoai'] ?></label>
                                        <input type="text" hidden name="maLoai" style="display: none;" value="<?= (isset($_GET['maLoai']) ? $_GET['maLoai'] : $categoryUpdate['maLoai']) ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>Tên danh mục:</label>
                                        <input type="text" class="form-control" id="tenLoai" name="tenLoai" value="<?= $categoryUpdate['tenLoai'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <input type="submit" name="submit" value="Lưu lại" class="btn btn-info btn-fill pull-right">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'includes/footer.php'
?>