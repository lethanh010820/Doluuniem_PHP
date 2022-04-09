
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
		$query = "SELECT A.maSP, A.tenSP, A.image, A.giaBan, A.dvt FROM sanpham A, loaisanpham B WHERE " . $searchpost . " " . $searchget . " A.maLoai= B.maLoai GROUP BY A.tenSP, A.image, A.giaBan, A.dvt ORDER BY A.tenSP DESC  ";

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
	//list san pham theo page
	public function getAllAdmin($page = 1, $total = 8)
    {
        if ($page <= 0) {
            $page = 1;
        }
        $tmp = ($page - 1) * $total;
        $query =
            "SELECT *
			 FROM sanpham
             limit $tmp,$total";
        $result = $this->db->select($query);
        return $result;
    }
	public function getCountPaging($row = 8)
    {
        $query = "SELECT COUNT(*) FROM sanpham";
        $mysqli_result = $this->db->select($query);
        if ($mysqli_result) {
            $totalrow = intval((mysqli_fetch_all($mysqli_result, MYSQLI_ASSOC)[0])['COUNT(*)']);
            $result = ceil($totalrow / $row);
            return $result;
        }
        return false;
    }
	public function getProductbyIdAdmin($id)
    {
        $query = "SELECT * FROM sanpham where maSP = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
	public function updateSanpham($data, $files)
    {
        $tenSP = $data['tenSP'];
        $giaBan = $data['giaBan'];
        $maLoai = $data['maLoai'];
        $quantity = $data['quantity'];
        $dvt = $data['dvt'];


        $file_name = $_FILES['image']['name'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;

        //If user has chooose new image
        if (!empty($file_name)) {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "UPDATE `sanpham` SET
                    tenSP = '$tenSP',
                    image = '$unique_image',
                    giaBan = '$giaBan',
                    quantity = '$quantity',
                    dvt = '$dvt',
                    maLoai = '$maLoai'
                    WHERE maSP = ".$data['maSP']."";
        } else {
            $query = "UPDATE `sanpham` SET
                    tenSP = '$tenSP',
                    giaBan = '$giaBan',
                    quantity = '$quantity',
                    dvt = '$dvt',
                    maLoai = '$maLoai'
                    WHERE maSP = ".$data['maSP']."";
        }
        $result = $this->db->update($query);
        if ($result) {
            $alert = '<script> alert("Cap nhat thành công!"); location.href = "/shopluuniem/admin/productlist.php"; </script>';
            return $alert;
        } else {
            $alert = "<span class='error'>Cập nhật sản phẩm thất bại</span>";
            return $alert;
        }
    }
    public function themSanPham($data)
    {
        $tenSP = $data['tenSP'];
        $giaBan = $data['giaBan'];
        $maLoai = $data['maLoai'];
        $quantity = $data['quantity'];
        $dvt = $data['dvt'];


        $file_name = $_FILES['image']['name'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;

        move_uploaded_file($file_temp, $uploaded_image);
        $query = "INSERT INTO `sanpham`(
            `maSP`,
            `tenSP`,
            `image`,
            `giaBan`,
            `quantity`,
            `dvt`,
            `maLoai`,
            `soldcount`
        )
        VALUES(
            NULL,
            '$tenSP',
            '$unique_image',
            '$giaBan',
            '$quantity',
            '$dvt',
            '$maLoai',
            0
        )";
        $result = $this->db->insert($query);
        if ($result) {
            $alert = "<span class='success'>Sản phẩm đã được thêm thành công</span>";
            return $alert;
        } else {
            $alert = "<span class='error'>Thêm sản phẩm thất bại</span>";
            return $alert;
        }
    }
    public function deleteAProduct($maSP)
    {
        $query = "DELETE FROM sanpham WHERE maSP = '$maSP'";
        $row = $this->db->delete($query);
        if ($row) {
            return true;
        }
        return false;
    }

}
?>