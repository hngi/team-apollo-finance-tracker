<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php
//including the database connection file
include('Database.php');

if(isset($_POST['Submit'])) {    

	$dateexpense=$_POST['dateexpense'];

	$item=$_POST['item'];

	$details=$_POST['details'];

	$costitem=$_POST['costitem'];
        
    // checking empty fields
    if(empty($dateexpense) || empty($item) || empty($details) || empty($costitem) ) {                
        if(empty($dateexpense)) {
            echo "<font color='red'>dateexpense field is empty.</font><br/>";
        }
        
        if(empty($item)) {
            echo "<font color='red'>item field is empty.</font><br/>";
        }
        
        if(empty($details)) {
            echo "<font color='red'>details field is empty.</font><br/>";
        }

        if(empty($costitem)) {
        	echo "<font color='red'>costitem field is empty.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO users(dateexpense,item,details,costitem) VALUES('$dateexpense','$item','$details','$costitem')");
        
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>
</body>
</html>

