<?php
// including the database connection file
include_once("Database.php");
 
if(isset($_POST['update']))
{    
    $dateexpense=$_POST['dateexpense'];

    $item=$_POST['item'];

    $details=$_POST['details'];

    $costitem=$_POST['costitem'];
        
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
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE users SET dateexpense='$dateexpense',item='$item',details='$details',costitem='$costitem' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $dateexpense = $res['dateexpense'];
    $item = $res['item'];
    $details = $res['details'];
    $costitem = $res['costitem'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr>
                <td>dateexpense</td>
                <td><input $type="text" $name="dateexpense" $value="<?php echo $dateexpense;?>"></td>
            </tr>
            <tr>
                <td>item</td>
                <td><input $type="text" $name="item" $value="<?php echo $item;?>"></td>
            </tr>
            <tr>
                <td>details</td>
                <td><input $type="text" $name="details" $value="<?php echo $details;?>"></td>
            </tr>
            <tr>
                <td>costitem</td>
                <td><input $type="value" $name="costitem" $value="<?php echo $costitem;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value='<?php echo $_GET['id'];?>'></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>