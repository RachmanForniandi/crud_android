<?php 
	
	class DbOperation{
		
		private $connection;
		
		function __construct(){
			require_once dirname(__FILE__).'/DbConnect.php';
			
			$db = new DbConnect();
			
			$this->connection = $db->connect();
		}
		
		//Create
		function createUser($username, $pass, $email){
			$password = md5($pass);
			$stmt = $this->connection->prepare("INSERT INTO 'users'('id', 'username', 'password', 'email') VALUES(NULL, ?, ?, ?);");
			$stmt->bind_param("sss", $username, $password, $email);
			
			if($stmt->execute()){
				return true;
			}else{
				return false;
			}
		}
	}
?>