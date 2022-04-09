<?php
ob_start();
include 'includes/header.php';
$role_id = Session::get('role_id');
if ($role_id == 1) {
    # code...
} else {
    header("Location:../index.php");
}
include_once '../classes/bill.php';

if (isset($_GET['orderId'])) {
    $order = new bill();
    $result = $order->completeOrder($_GET['orderId']);
    if ($result) {
        echo '<script type="text/javascript">alert("Thành công!"); history.back();</script>';
    } else {
        echo '<script type="text/javascript">alert("Thất bại!"); history.back();</script>';
    }
}