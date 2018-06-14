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
        //EXERCISE: Complete this while loop.
        //Please note that I opened and closed the section outside the block of PHP
        //You only need to make the options.
        //The form is <option value="ID">Name</option>
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