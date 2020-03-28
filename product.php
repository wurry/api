<?php
class Product{
	private $conn;
	private $table = "test";
	
	public $id;
	public $name;
	public $stock;
	public $created;
	
	public function __construct($db){
		$this->conn = $db;
	}
	
	public function read(){
		$query = "SELECT * FROM " .$this->table;
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt;
	}
}
?>