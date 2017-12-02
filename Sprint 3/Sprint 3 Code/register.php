
<?php 
	require_once 'DB_ToDoList.php';
?>
<?php
 print_r($_REQUEST);

$id = $_REQUEST['cid'];
$pass = $_REQUEST['cpassword'];
$name = $_REQUEST['cname'];
$lastname = $_REQUEST['clname'];

$sql = "INSERT INTO member(	Fname,Lname,id,pass)
		VALUES('".$name."','".$lastname."','".$id."','".$pass."');";

if($conn->query($sql)===TRUE){
	echo "<script>";
	echo "alert('Created ID Successfully');";
	echo "window.location='login.php';";
	echo "</script>";
}else{
	echo "<script>";
	echo "alert('Failed to Created ID');";
	echo "window.location='register.html';";
	echo "</script>";
}

$conn->close();		

?>
