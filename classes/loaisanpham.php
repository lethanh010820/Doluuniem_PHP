
<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once  ($filepath.'/../helpers/format.php');

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
		
		public function show_loaisanpham(){
			$query = "SELECT * FROM `loaisanpham`";
			$result = $this->db->select($query);
			return $result;
		}
		public function getnamebyId($id){
			$query = "SELECT * FROM loaisanpham WHERE maLoai = '$id' ";
			$result = $this->db->select($query);
			return $result;
		}
	}
 ?>