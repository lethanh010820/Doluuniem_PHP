<?php
include 'includes/header.php';
$role_id = Session::get('role_id');
if ($role_id == 1) {
    header("Location:productlist.php");
} else {
    header("Location:../index.php");
}
 ?>
 <?php
include 'includes/footer.php'
 ?>