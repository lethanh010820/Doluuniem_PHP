<?php
include 'includes/header.php';

include '../classes/sanpham.php';
include '../classes/loaisanpham.php';
$role_id = Session::get('role_id');
if ($role_id == 1) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $product = new sanpham();
        $result = $product->themSanPham($_POST, $_FILES);
    }
} else {
    header("Location:../index.php");
}

$category = new loaisanpham();
$categoriesList = $category->show_loaisanpham();
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Thêm mới sản phẩm</h4>
                    </div>
                    <p style="color: green;"><?= !empty($result) ? $result : '' ?></p>
                    <div class="card-body">
                        <form action="add_product.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>Tên sản phẩm :</label>
                                        <input type="text" id="tenSP" class="form-control" name="tenSP" placeholder="Tên sản phẩm.." required>
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>Giá bán:</label>
                                        <input type="number" class="form-control" id="giaBan" name="giaBan" required min="1">
                                    </div>
                                </div>
                                <div class="col-md-12 pl-1">
                                    <div class="form-group">
                                        <label for="image">Hình ảnh</label>
                                        <input type="file" id="image" name="image" required>
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label for="maLoai">Loại sản phẩm</label>
                                        <select id="maLoai" name="maLoai">
                                            <?php
                                            foreach ($categoriesList as $key => $value) { ?>
                                                <option value="<?= $value['maLoai'] ?>"><?= $value['tenLoai'] ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label for="quantity">Số lượng</label>
                                        <input type="number" id="quantity" name="quantity" required min="1">
                                    </div>
                                </div>
                                <div class="col-md-12 pl-1">
                                    <div class="form-group">
                                        <label for="dvt">Mô tả</label>
                                        <textarea class="form-control" name="dvt" id="dvt" cols="90" rows="10" required></textarea>
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