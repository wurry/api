<?php 
class Connection{
	private $host;
	private $db;
	private $user;
	private $pass;
	public $conn;
	
	function getConnection(){
		$host = "localhost";
		$db = "test";
		$user = "root";
		$pass = "";
		
		try{
			$this->conn = new PDO("mysql:host=".$host.";dbname=".$db, $user, $pass);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $this->conn;
		} catch(PDOException $e){
			echo "Connection Failed : " .$e->getMessage();
		}
	}
}
?>