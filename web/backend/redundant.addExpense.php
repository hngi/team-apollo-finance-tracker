<?php 
//session starts
session_start();
error_reporting(0);
include('Database.php');

# Gets data from the form
if(isset($_POST['submit'])) {
	$userid=$_SESSION['userid'];
	$dateexpense=$_POST['dateexpense'];
	$item=$_POST['item'];
	$details=$_POST['details'];
	$costitem=$_POST['costitem'];

	# Query the database to insert new data
	$query=mysqli_query($con, "insert into expense(userId,time,item,details,cost) value('$userid','$dateexpense','$item','$details','$costitem')");
	if($query) {
		echo "<script>alert('Expense has been added');</script>";
		#echo "<script>window.location.href='#'</script>"; navigates to the manage expense page
	} 
	else {
		echo "<script>alert('Something went wrong. Please try again');</script>";
	}
}
?>
