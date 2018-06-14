<?php
    include 'header.php';
?>
<form action="product_insert_result.php" method="get">
    Company: <select name="company">
<?php
    //Connect to the DB
    include 'db.inc.php';
    
    //Select the company IDs from the database
    $sql='SELECT companyID, name FROM company ORDER BY name';					
    $result = mysqli_query($link, $sql);
    if (!$result) { 									
        $error = 'Error fetching data: ' . mysqli_error($link);
        echo $error; 
        exit();				
    }
    while($recording=mysqli_fetch_array($result)){
        $c_id=htmlspecialchars($recording['companyID'], ENT_QUOTES, 'UTF-8');						
		$c_name=htmlspecialchars($recording['name'], ENT_QUOTES, 'UTF-8');
		echo "<option value=$c_id>" . " ". $c_name. "</option>";
    }
?>
    </select>
    <br/>
    Type: <input type="text" name="type"/><br/>
    Roast:
    <input type="radio" name="roast" value="light">Light</input>
    <input type="radio" name="roast" value="medium">Medium </input>
    <input type="radio" name="roast" value="dark">Dark</input>
    <br/>
    <textarea name="description" rows="10" cols="40"></textarea><br/>
        <input type="submit" value="Submit"/>
</form>

<?php
    include 'sidebar.php';
    include 'footer.php';  
?>