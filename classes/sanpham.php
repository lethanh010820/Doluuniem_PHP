
<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');

?>


<?php

class sanpham
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function show_sanpham($searchpost, $searchget)
	{
		$query = "SELECT A.tenSP, A.image, A.giaBan, A.dvt FROM sanpham A, loaisanpham B WHERE " . $searchpost . " " . $searchget . " A.maLoai= B.maLoai GROUP BY A.tenSP, A.image, A.giaBan, A.dvt ORDER BY A.tenSP DESC  ";

		$result = $this->db->select($query);
		return $result;
	}
	public function Show_sanPhamByloaiSanPham($id)
	{
		$query = "SELECT * FROM sanpham A, loaisanpham B WHERE A.maLoai = B.maLoai AND A.maLoai ='$id' GROUP BY A.tenSP ORDER BY A.tenSP DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function Get_ProductNoibat()
	{
		$query = "SELECT * FROM sanpham LIMIT 5";
		$result = $this->db->select($query);
		return $result;
	}
	public function get_1Product($name)
	{
		$query = "SELECT *
					  FROM sanpham
					  WHERE tenSP = '$name'";
		$result = $this->db->select($query);
		return $result;
	}
	public function getProductbyId($id)
	{
		$query = "SELECT * FROM sanpham where maSP = '$id'";
		$mysqli_result = $this->db->select($query);
		if ($mysqli_result) {
			$result = mysqli_fetch_all($this->db->select($query), MYSQLI_ASSOC)[0];
			return $result;
		}
		return false;
	}
	public function updateQty($maSP, $quantity)
    {
        $query = "UPDATE sanpham SET quantity = quantity - $quantity, soldcount = soldcount + $quantity WHERE maSP = $maSP";
        $mysqli_result = $this->db->update($query);
        if ($mysqli_result) {
            return true;
        }
        return false;
    }
}
?>