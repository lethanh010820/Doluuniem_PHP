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

if (isset($_GET['maSP'])) {
    $product = new sanpham();
    $result = $product->deleteAProduct($_GET['maSP']);
    if ($result) {
        echo '<script type="text/javascript">alert("Xóa sản phẩm thành công!"); history.back();</script>';
    } else {
        echo '<script type="text/javascript">alert("Xóa sản phẩm thất bại!"); history.back();</script>';
    }
}
?>
 <?php
include 'includes/footer.php'
 ?>