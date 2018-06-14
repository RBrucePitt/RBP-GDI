<?php 
	include 'db.inc.php';
	$sql='SELECT productID , company, type, roast, description FROM product ORDER BY productID DESC'; 
	$result = mysqli_query($link, $sql);
	if (!$result) { 	
		$error = 'Error fetching data: ' . mysqli_error($link);	
		echo $error; 	
		exit();
	}
    while($recording=mysqli_fetch_array($result)){
        $id=htmlspecialchars($recording['productID'], ENT_QUOTES, 'UTF-8');	
        $company= htmlspecialchars($recording['company'], ENT_QUOTES, 'UTF-8');
        $type=htmlspecialchars($recording['type'], ENT_QUOTES, 'UTF-8');
        $roast=htmlspecialchars($recording['roast'], ENT_QUOTES, 'UTF-8');
        $description=htmlspecialchars($recording['description'], ENT_QUOTES, 'UTF-8');
            echo $company . ' ';
            echo $type . ' ';
            echo $roast . ' ';
            echo $description . '<br />';
	}
    
    echo 'Return to <a href="index.php">home</a>.'
?>