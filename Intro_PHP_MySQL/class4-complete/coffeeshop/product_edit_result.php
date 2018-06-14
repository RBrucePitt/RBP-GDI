<?php 
	include 'db.inc.php';
    
    //Declare our variables
    $productID = mysqli_real_escape_string($link, $_GET['productID']);
	$company = mysqli_real_escape_string($link, $_GET['company']); 
	$type = mysqli_real_escape_string($link, $_GET['type']); 
	$roast = mysqli_real_escape_string($link, $_GET['roast']);
	$description = mysqli_real_escape_string($link, $_GET['description']);
    
    //SQL statement
    $sql = "UPDATE product SET	
    companyID_fk=" . $company . ",
	type='" . $type. "',
	roast='" . $roast. "',
	description='" . $description. "'
    WHERE productID='" . $productID . "'";
    
	if (!mysqli_query($link, $sql)){
		$error = 'Error adding submitted data: ' . mysqli_error($link);
		echo $error;
		exit();
	}
    
	header('Location:view-products.php');
?>