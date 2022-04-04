<?php
include_once './lib/session.php';
session::init();
include_once './classes/bill.php';
$order = new bill();
$result = $order->add();
if ($result) {
    echo '<script type="text/javascript">alert("Đặt hàng thành công!"); history.back();</script>';
} else {
    echo '<script type="text/javascript">alert("Đặt hàng thất bại!"); history.back();</script>';
}
?>