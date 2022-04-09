<?php
ob_start();
include 'includes/header.php';
include '../classes/loaisanpham.php';
$role_id = Session::get('role_id');
if ($role_id == 1) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $category = new loaisanpham();
        $result = $category->insertCategory($_POST['tenLoai']);
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
                        <h4 class="card-title">Thêm mới danh mục</h4>
                    </div>
                    <p style="color: green;"><?= !empty($result) ? $result : '' ?></p>
                    <div class="card-body">
                    <form action="add_category.php" method="post">
                            <div class="row">
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>Tên danh mục :</label>
                                        <input type="text" id="tenLoai" class="form-control" name="tenLoai" placeholder="Tên danh mục.." required>
                                    </div>
                                </div>
                                <div class="col-md-12 pl-1">
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