<?php 
	require_once 'Database.php';

	class Application{
		private $_method;
		private $_allowedMethods;
		private $_db;

		public function __construct($method, array $allowedMethods){
			$this->_method = $method;
			$this->_allowedMethods = $allowedMethods;
			// Host, username, password, nama database
			$this->_db = new Database('localhost', 'root', '', 'db_android');
		}

		public function run(){
			$allowed = array_search($this->_method, $this->_allowedMethods);
			if($allowed !== false){
				$this->{$this->_method}();
			}else{
				$this->_api(404, "Cannot found method '{$this->_method}'");
			}
		}

		private function check_login(){
			$username=$_POST['username'];
			$password=$_POST['password'];
			$sql = "SELECT * FROM users WHERE username='$username' and password='$password';";
			$result = $this->_db->execReadSQL($sql);
			if($result){
				$temp=array();
				while ($row = mysqli_fetch_row($result)) {
			    	$temp['user_id']=$row[0];   
			    	$temp['username']=$row[1];   
			    	$temp['full_name']=$row[3];   
			    	$temp['sql']=$sql;   
			    }
				if(true){
					$temp['sql']=$sql;  
					$this->_api('200','Succes Login',$temp);
				}else{
					
					$this->_api('200','Username or Password wrong',$temp);
				}
			}
		}

		private function _api($code, $message, $data = array()){
			$api = array(
				'code'=> $code,
				'message' => $message,
				'data'=> $data
			);
			echo json_encode($api);
		}

		private function upload_status(){
			$content = $_POST['content'];
			$userId = $_POST['user_id'];
			$sql = "INSERT INTO status (content, user_id) VALUES ('$content','$userId')";
			$result=$this->_db->execWriteSQL($sql);
			$this->_api('200', 'Status successfully saved!');
		}

		private function download_all_status(){
			$user_id=$_POST['user_id'];
			$sql = "SELECT * FROM status WHERE user_id='$user_id'";
			$data = $this->_db->execReadSQL($sql);
			$temp = array();
			while ($row = mysqli_fetch_array($data)){
				$temp[] = $row;
			}
			$allStatus = array();
			foreach ($temp as $record){
				$status = array(
					'id' => $record['id'],
					'content' => $record['content'],
					'user_id' => $record['user_id']
				);
				$allStatus[] = $status;
			}
			$this->_api('200', 'All status downloaded', $allStatus);
		}
	}
 ?>