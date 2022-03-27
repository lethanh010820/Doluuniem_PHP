<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>




<?php

/**
 * 
 */
class nguoidung
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function Login_Customer($data)
	{
		$username = mysqli_real_escape_string($this->db->link, $data['username']);
		$password = mysqli_real_escape_string($this->db->link, md5($data['password']));
		$check = "SELECT * FROM users WHERE (username= '$username')  AND password ='$password' limit 1";
		$result_check = $this->db->select($check);
		if ($result_check) {
			$value = $result_check->fetch_assoc();
			Session::set('customer_login', true);
			Session::set('customer_user', $value['username']);
			Session::set('userId', $value['id']);
			Session::set('customer_name', $value['name']);
			echo '<script> alert("Đăng nhập thành công!"); location.href = "/shopluuniem/index.php"; </script>';
		} else {
			$alert = '<span class="text-danger" > Sai tài khoản hoặc mật khẩu</span>';
			return $alert;
		}
	}
	public function insert_Customer($data)
	{

		$username = mysqli_real_escape_string($this->db->link, $data['username']);
		$password = mysqli_real_escape_string($this->db->link, $data['password']);
		$repeatpassword = mysqli_real_escape_string($this->db->link, $data['repeatpassword']);
		$name = mysqli_real_escape_string($this->db->link, $data['name']);
		$address = mysqli_real_escape_string($this->db->link, $data['address']);
		$phone = mysqli_real_escape_string($this->db->link, $data['phone']);


		if ($name == "" || $username == ""  || $address == "" || $phone == "" || $password == "") {
			$alert = '<span class="text-danger">Vui lòng không để trống thông tin</span>';
			return $alert;
		} else {
			$check = "SELECT * FROM users ";
			$result_check = $this->db->select($check);
			$data = mysqli_fetch_array($result_check);
			$check_phone = $data['phone'];
			$check_username = $data['username'];
			if ($username == $check_username) {
				$alert = '<span class="text-danger">Username Tồn Tại</span>';
				return $alert;
			} elseif ($phone == $check_phone) {
				$alert = '<span class="text-danger">Số điện Tồn Tại</span>';
				return $alert;
			}
			if ($password != $repeatpassword) {
				$alert = '<span class="text-danger">Mật Khẩu Không Trùng Khớp</span>';
				return $alert;
			} else {
				$password = md5($password);
				$query = "INSERT INTO users( idRoles, username, password, name, address, phone) VALUES (0,'$username','$password','$name','$address','$phone')";
				$result = $this->db->insert($query);
				if ($result) {
					$alert = '<span class="text-success">Đăng ký khách hàng thành công</span>';
					return $alert;
				} else {
					$alert = '<span class="text-danger">Lỗi. Đăng ký khách hàng thất bại</span>';
					return $alert;
				}
			}
		}
	}
	public function get()
	{
		$userId = Session::get('userId');
		$query = "SELECT * FROM users WHERE id = '$userId' LIMIT 1";
		$mysqli_result = $this->db->select($query);
		if ($mysqli_result) {
			$result = mysqli_fetch_all($this->db->select($query), MYSQLI_ASSOC)[0];
			return $result;
		}
		return false;
	}
}

?>