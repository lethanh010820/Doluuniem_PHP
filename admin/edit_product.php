<?php
include 'includes/header.php';

include '../classes/sanpham.php';
include '../classes/loaisanpham.php';
$role_id = Session::get('role_id');
if ($role_id == 1) {
    $product = new sanpham();
    $productUpdate = mysqli_fetch_assoc($product->getProductbyIdAdmin($_GET['maSP']));
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $result = $product->updateSanpham($_POST, $_FILES);
        $productUpdate = mysqli_fetch_assoc($product->getProductbyIdAdmin($_GET['maSP']));
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
                        <h4 class="card-title">Sửa sản phẩm</h4>
                    </div>
                    <?php
                    if (isset($result)) {
                        echo $result;
                    }
                    ?>
                    <div class="card-body">
                        <form action="edit_product.php?maSP=<?= $productUpdate['maSP'] ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                            <input type="text" hidden name="maSP" style="display: none;" value="<?= $productUpdate['maSP'] ?>">
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>Tên sản phẩm :</label>
                                        <input type="text" id="tenSP" class="form-control" name="tenSP" placeholder="Tên sản phẩm.." value="<?= $productUpdate['tenSP'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>Giá bán:</label>
                                        <input type="number" class="form-control" id="giaBan" name="giaBan" value="<?= $productUpdate['giaBan'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-12 pl-1">
                                    <div class="form-group">
                                        <label for="image">Hình ảnh</label>
                                        <img  src="uploads/<?= $productUpdate['image'] ?>" style="height: 200px;" id="image"> <br>

                                        <label for="imageNew">Chọn hình ảnh mới</label>
                                        <input class="form-control" type="file" id="imageNew" name="image">
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label for="cateId">Loại sản phẩm</label>
                                        <select id="maLoai" name="maLoai">
                                            <?php foreach ($categoriesList as $key => $value) {
                                                if ($value['id'] == $productUpdate['maLoai']) { ?>
                                                    <option selected value="<?= $value['maLoai'] ?>"><?= $value['tenLoai'] ?></option>
                                                <?php  } else { ?>
                                                    <option value="<?= $value['maLoai'] ?>"><?= $value['tenLoai'] ?></option>
                                                <?php   } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label for="quantity">Số lượng</label>
                                        <input type="number" id="quantity" name="quantity" value="<?= $productUpdate['quantity'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-12 pl-1">
                                    <div class="form-group">
                                        <label for="dvt">Mô tả</label>
                                        <textarea class="form-control" name="dvt" id="dvt" cols="90" rows="10"><?= $productUpdate['dvt'] ?></textarea>
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