
<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');

?>


<?php

class loaisanpham
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function show_loaisanpham()
	{
		$query = "SELECT * FROM `loaisanpham`";
		$result = $this->db->select($query);
		return $result;
	}
	public function getnamebyId($id)
	{
		$query = "SELECT * FROM loaisanpham WHERE maLoai = '$id' ";
		$result = $this->db->select($query);
		return $result;
	}
	//list loai san pham theo page
	public function getAllAdmin($page = 1, $total = 8)
	{
		if ($page <= 0) {
			$page = 1;
		}
		$tmp = ($page - 1) * $total;
		$query =
			"SELECT *
			 FROM loaisanpham
             limit $tmp,$total";
		$result = $this->db->select($query);
		return $result;
	}
	public function getCountPaging($row = 8)
	{
		$query = "SELECT COUNT(*) FROM loaisanpham";
		$mysqli_result = $this->db->select($query);
		if ($mysqli_result) {
			$totalrow = intval((mysqli_fetch_all($mysqli_result, MYSQLI_ASSOC)[0])['COUNT(*)']);
			$result = ceil($totalrow / $row);
			return $result;
		}
		return false;
	}
	public function getByIdAdmin($maLoai)
    {
        $query = "SELECT * FROM loaisanpham where maLoai = '$maLoai'";
        $result = $this->db->select($query);
        return $result;
    }
	public function updateCategory($data)
    {
        $tenLoai = $data['tenLoai'];
		$query = "UPDATE `loaisanpham` SET
                    tenLoai = '$tenLoai'
                    WHERE maLoai = ".$data['maLoai']."";
        $result = $this->db->update($query);
        if ($result) {
            $alert = '<script> alert("Cập nhật thành công!"); location.href = "/shopluuniem/admin/categorylist.php"; </script>';
            return $alert;
        } else {
            $alert = "<span class='error'>Cập nhật danh mục thất bại</span>";
            return $alert;
        }
    }
	public function insertCategory($tenLoai)
    {
        $query = "INSERT INTO loaisanpham VALUES (NULL, '".$tenLoai."') ";
        $result = $this->db->insert($query);
        if ($result) {
            $alert = '<script> alert("Thêm danh mục thành công!"); location.href = "/shopluuniem/admin/categorylist.php"; </script>';
            return $alert;
        } else {
            $alert = "<span class='error'>Thêm danh mục thất bại</span>";
            return $alert;
        }
    }
	public function deleteACategory($maLoai)
    {
        $query = "DELETE FROM loaisanpham WHERE maLoai = '$maLoai'";
        $row = $this->db->delete($query);
        if ($row) {
            return true;
        }
        return false;
    }
}
?>