<?php
    include 'header.php';
?>
<?php
    //Connect to the DB
    include 'db.inc.php';
    
    //Fetch some data to pre-load the form
    $productID = htmlspecialchars($_GET["productID"]);
	//EXERCISE: Create a variable called $sql and write the SQL statement
    //Don't forget the where!
    //If you are stuck, try combine the statements from add-products.php and delete-products.php
	$result = mysqli_query($link, $sql);
	if (!$result) { 	
			$error = 'Error: ' . mysqli_error($link);	
			echo $error; 	
	exit();
	}
    
    //Name the variables and save them to use later
	$recording=mysqli_fetch_array($result);
	$companyID_fk=htmlspecialchars($recording['companyID_fk'], ENT_QUOTES, 'UTF-8');
	$type = htmlspecialchars($recording['type'], ENT_QUOTES, 'UTF-8');
	$roast = htmlspecialchars($recording['roast'], ENT_QUOTES, 'UTF-8');
	$description = htmlspecialchars($recording['description'], ENT_QUOTES, 'UTF-8');
?>
<form action="product_edit_result.php" method="get">
    Company: <select name="company">
<?php
    //This is the same code from the add-products form; it gets the data for the dropdown.
    $sql='SELECT companyID, name FROM company ORDER BY name';					
    $result = mysqli_query($link, $sql);
    if (!$result) { 									
        $error = 'Error fetching data: ' . mysqli_error($link);
        echo $error; 
        exit();				
    }
    
    //Loops through the possible options
    while($recording=mysqli_fetch_array($result)){
        $c_id=htmlspecialchars($recording['companyID'], ENT_QUOTES, 'UTF-8');						
		$c_name=htmlspecialchars($recording['name'], ENT_QUOTES, 'UTF-8');
		echo "<option value='" . $c_id. "'";
        //Marks the current value with SELECTED, so it will be pre-chosen in the HTML form
        if ($c_id==$companyID_fk) {
            echo " SELECTED";
        }
        echo">" . $c_name. "</option>";;
    }

?>
    </select>
    <br/>
    Type: <input type="text" name="type" value="<?php echo $type //Sets current value as default?>"/><br/>
    Roast:
    <input type="radio" name="roast" value="light" <?php if ($roast=="light") echo "checked='checked'" //Sets current value as default if appropriate?>>Light</input>
    <input type="radio" name="roast" value="medium" <?php if ($roast=="medium") echo "checked='checked'" ?>>Medium </input>
    <input type="radio" name="roast" value="dark" <?php if ($roast=="dark") echo "checked='checked'" ?>>Dark</input>
    <br/>
    <textarea name="description" rows="10" cols="40"><?php echo $description //Sets current value as default?></textarea><br/>
    <input type="hidden" name="productID" value="<?php echo $productID //Hidden field to make the form work better?>" >
    <input type="submit" value="Submit"/>
</form>

<?php
    include 'sidebar.php';
    include 'footer.php';  
?>