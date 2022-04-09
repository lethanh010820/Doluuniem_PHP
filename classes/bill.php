<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../lib/session.php');
include_once($filepath . '/../classes/cart.php');
include_once($filepath . '/../classes/sanpham.php');
?>


 
<?php
/**
 * 
 */
class bill
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function add()
    {
        $userId = Session::get('userId');
        //Add new order
        $sql_insert_cart = "INSERT INTO bill VALUES(NULL,'$userId','" . date('y/m/d') . "',NULL,'Processing' )";
        $insert_cart = $this->db->insert($sql_insert_cart);
        if (!$insert_cart) {
            return false;
        }

        //Get cart list by userId
        $cart = new cart();
        $cart_user = $cart->get();

        //Get last orderid
        $sql_get_cart_last_id = "SELECT id FROM bill ORDER BY id DESC LIMIT 1";
        $get_cart_last_id = $this->db->select($sql_get_cart_last_id);
        if ($get_cart_last_id) {
            $orderId = mysqli_fetch_row($get_cart_last_id)[0];
        }

        //Update product qty
        $product = new sanpham();
        foreach ($cart_user as $key => $value) {
            //Add item cart to order detail
            $sql_insert_order_details = "INSERT INTO `billdetails`(
                `id`,
                `orderId`,
                `productId`,
                `quantity`,
                `productPrice`,
                `productName`,
                `productImage`
            )
            VALUES(
                NULL,
                $orderId,
                " . $value['maSP'] . ",
                " . $value['quantity'] . ",
                " . $value['giaBan'] . ",
                '" . $value['tenSP'] . "',
                '" . $value['image'] . "'
            )";
            echo $sql_insert_order_details;
            $insert_order_details = $this->db->insert($sql_insert_order_details);
            if (!$insert_order_details) {
                return false;
            }
            $product->updateQty($value['maSP'], $value['quantity']);
            if (!$product) {
                return false;
            }
        }

        //Delete cart
        $sql_delete_cart = "DELETE FROM cart WHERE userId = $userId";
        $delete_cart = $this->db->delete($sql_delete_cart);
        if ($delete_cart) {
            return true;
        }

        return false;
    }
    public function getOrderByUser()
    {
        $userId = Session::get('userId');
        $query = "SELECT * FROM bill WHERE userId = '$userId' ";
        $mysqli_result = $this->db->select($query);
        if ($mysqli_result) {
            $result = mysqli_fetch_all($this->db->select($query), MYSQLI_ASSOC);
            return $result;
        }
        return false;
    }
    public function completeOrder($id)
    {
        $query = "UPDATE bill SET status = 'Complete', receivedDate = '" . date('y/m/d') . "' WHERE id = $id";
        $mysqli_result = $this->db->update($query);
        if ($mysqli_result) {
            return true;
        }
        return false;
    }
    public function getListBill()
    {
        $query = "SELECT bill.*, users.name as name
			 FROM bill INNER JOIN users ON bill.userId = users.id
			 order by bill.id desc";
        $mysqli_result = $this->db->select($query);
        if ($mysqli_result) {
            $result = mysqli_fetch_all($this->db->select($query), MYSQLI_ASSOC);
            return $result;
        }
        return false;
    }
    public function getById($id)
    {
        $query = "SELECT * FROM bill WHERE id = '$id' ";
        $mysqli_result = $this->db->select($query);
        if ($mysqli_result) {
            $result = mysqli_fetch_all($this->db->select($query), MYSQLI_ASSOC)[0];
            return $result;
        }
        return false;
    }
}
?>