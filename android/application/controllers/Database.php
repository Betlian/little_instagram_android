<?php 

	class Database{
		private $host;
		private $username;
		private $password;
		private $dbName;
		private static $_connection;
		
		public function __construct($host, $username, $password, $dbName){
			$this->host = $host;
			$this->username = $username;
			$this->password = $password;
			$this->dbName = $dbName;
			$this->openConnection();
		}

		private function openConnection(){
			// if(Database::$_connection == null){
			// 	Database::$_connection= new mysqli ($this->host,$this->username,$this->password,$this->dbName);
			// }
			// return Database::$_connection;
			mysqli_connect('localhost', 'root', '', 'db_android');
		}

		public function execReadSQL($sql){
			$con=$this->openConnection();
			$resultSet = mysqli_query($con, $sql);
			return $resultSet;
		}

		public function execWriteSQL($sql){
			$con = $this->openConnection();
			$result = $con->query($sql);
		}
	}
?>