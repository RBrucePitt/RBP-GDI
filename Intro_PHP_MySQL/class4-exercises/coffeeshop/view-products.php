<?php
    include 'header.php';
?>
<p>We have a variety of delicious coffees in stock.</p>
<?php
    //Connect to DB
	include 'db.inc.php';
    
    //This is a new syntax. Because we are selecting data from two tables, we need to specify which one by using tablename.fieldname
	$sql='SELECT 
        product.productID as productID, 		
        product.type as type, 
        product.roast as roast, 
        product.companyID_fk as companyID_fk,
        product.description as description, 
        company.companyID as companyID,
        company.name as  name
        FROM product, company
        where product.companyID_fk=company.companyID;
';
    
	$result = mysqli_query($link, $sql);
    
	if (!$result) { 	
		$error = 'Error fetching data: ' . mysqli_error($link);	
		echo $error; 	
		exit();
	}
    
    echo '<table>
            <thead>
                <tr><th>Company</th><th>Type</th><th>Roast</th><th>Description</th><th>Edit</th><th>Delete</th></tr>
            </thead>
            <tbody>';
    
    //Pretty loop makes table rows
    while($recording=mysqli_fetch_array($result)){
        $productID=htmlspecialchars($recording['productID'], ENT_QUOTES, 'UTF-8');	
        $company=htmlspecialchars($recording['name'], ENT_QUOTES, 'UTF-8');
        $type=htmlspecialchars($recording['type'], ENT_QUOTES, 'UTF-8');
        $roast=htmlspecialchars($recording['roast'], ENT_QUOTES, 'UTF-8');
        $description=htmlspecialchars($recording['description'], ENT_QUOTES, 'UTF-8');
            echo '<tr>';
            echo '<td>' . $company . '</td>';
            echo '<td>' . $type . '</td>';
            echo '<td>' . $roast . '</td>';
            echo '<td>' . $description . '</td>';
            
            //These links pass the ID as a URL parameter
            echo '<td><a href="edit-products.php?productID='. $productID .'">Edit</a></td>';
            echo '<td><a href="delete-products.php?productID='. $productID .'">Delete</a></td>';
            echo '</tr>';
	}
    
    echo '</tbody>
            </table>';
    
    
?>
<p>Return to <a href="index.php">home</a>.</p>
<?php
    include 'sidebar.php';
    include 'footer.php';  
?>