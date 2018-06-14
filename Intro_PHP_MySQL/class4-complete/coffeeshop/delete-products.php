<?php
include 'db.inc.php';

$productID = $_GET['productID'];
 
$sql = "DELETE FROM product WHERE 
				productID='" . $productID . "'";
	$result = mysqli_query($link, $sql);
	
	if (!$result) { 	
		$error = 'Error deleting product' . mysqli_error($link);	
		echo $error; 	
		exit();
	}
    
    header('Location:view-products.php');
?>