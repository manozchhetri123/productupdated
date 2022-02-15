<?php
include('dbconfig.php');
$con = mysqli_connect(host,username,password,database);
$obj = new dbconfig();
if(isset($_GET['deleteid']))
{
	$rid=intval($_GET['deleteid']);
	$sql=mysqli_query($con,"DELETE from producttab where id = $rid");
	echo "<script>alert('Data deleted');</script>"; 
	echo "<script>window.location.href = 'displayproduct.php'</script>";     
} 
?>