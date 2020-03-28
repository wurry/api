<?php
header("Access-Conttol-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include "config.php";
include "product.php";

$database = new Connection;
$db = $database->getConnection();

$product = new Product($db);

$stmt = $product->read();
$num = $stmt->rowCount();

if($num>0){
	//$product_array = array();
	$product_array["data"] = array();
	
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		
		$data = array(
			"id" => $id,
			"name" => $name,
			"stock" => $stock,
			"created" => $created
		);
		
		array_push($product_array["data"], $data);
	}
	echo json_encode($product_array);
} else {
	echo "Not Found";
}
?>