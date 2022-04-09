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

if (isset($_GET['maLoai'])) {
    $category = new loaisanpham();
    $result = $category->deleteACategory($_GET['maLoai']);
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