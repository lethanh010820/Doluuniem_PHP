<?php
include 'inc/header.php';

$list = $ct->get();
$totalPrice = $ct->getTotalPriceByUserId();
$userInfo = $nguoidung->get();
?>

<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
            <li class="breadcrumb-item active">Giỏ hàng</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Cart Start -->
<div class="cart-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="cart-page-inner">
                    <div class="table-responsive">
                        <?php
                        if ($list) { ?>
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Hình ảnh</th>
                                        <th>Đơn giá</th>
                                        <th>Số lượng</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    <?php
                                    $count = 1;
                                    foreach ($list as $key => $value) { ?>
                                        <tr>
                                            <td>
                                                <p><?= $count++ ?></p>
                                            </td>
                                            <td>
                                                <div class="img">
                                                    <p><?= $value['tenSP'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="img">
                                                    <a href="#"><img src="admin/uploads/<?= $value['image'] ?>" alt="Image"></a>
                                                </div>
                                            </td>
                                            <td><?= number_format($value['giaBan'], 0, '', ',') ?>VND </td>
                                            <td>
                                                <input id="<?= $value['maSP'] ?>" type="number" name="quantity" class="quantity" value="<?= $value['quantity'] ?>" onchange="update(this)" min="1">
                                            </td>
                                            <td>
                                                <a href="delete_cart.php?maSP=<?= $value['maSP'] ?>">Xóa</a>
                                            </td>
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart-page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="cart-summary">
                                <div class="cart-content">
                                    <h1>Thông tin đơn đặt hàng</h1>
                                    <p>Người đặt hàng:<span><?= $userInfo['name'] ?></span></p>
                                    <p>Số lượng:<span id="qtycart"><?= $totalQty['total'] ?></span></p>
                                    <p>Địa chỉ nhận hàng:<span><?= $userInfo['address'] ?></span></p>
                                    <h2>Tổng tiền:<span id="totalcart"><?= number_format($totalPrice['total'], 0, '', ',') ?>VND</span></h2>
                                </div>
                                <div class="cart-btn">
                                    <a href="add_order.php">Tiến hành đặt hàng</a>
                                    <button>Checkout</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <h3>Giỏ hàng hiện đang rỗng</h3>
        <?php }
        ?>
        </div>
    </div>
</div>
<!-- Cart End -->
<script type="text/javascript">
    
    function update(e) {
        var http = new XMLHttpRequest();
        var url = './update_cart.php';
        var params = "maSP=" + e.id + "&quantity=" + e.value;
        http.open('POST', url, true);

        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        http.onreadystatechange = function() {
            if (http.readyState === XMLHttpRequest.DONE) {
                var status = http.status;
                if (status === 200) {
                    var arr = http.responseText;
                    var b = false;
                    var result = "";
                    for (let index = 0; index < arr.length; index++) {
                        if (arr[index] == "[") {
                            b = true;
                        }
                        if (b) {
                            result += arr[index];
                        }
                    }
                    var arrResult = JSON.parse(result.replace("undefined", ""));
                    console.log(arrResult);
                    document.getElementById("totalQtyHeader").innerHTML = arrResult[1]['total'];
                    document.getElementById("qtycart").innerHTML = arrResult[1]['total'];
                    document.getElementById("totalcart").innerHTML = arrResult[0]['total'].replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,") + "VND";

                    //alert('Đã cập nhật giỏ hàng!');
                } else if (status === 501) {
                    alert('Số lượng sản phẩm không đủ để thêm vào giỏ hàng!');
                    e.value = parseInt(e.value) - 1;
                } else {
                    alert('Cập nhật giỏ hàng thất bại!');
                    window.location.reload();
                }
            }

        }
        http.send(params);
    }

    var list = document.getElementsByClassName("quantity");
    for (let item of list) {
        item.addEventListener("keypress", function(evt) {
            evt.preventDefault();
        });
    }
</script>
<?php
include "inc/footer.php";
?>