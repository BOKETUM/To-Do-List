<?php 
	require_once 'DB_ToDoList.php';
?>
<?php
 //print_r($_REQUEST);
 
$Title = $_REQUEST['title'];
$Date = $_REQUEST['date'];

$sql = "INSERT INTO list( Title,Date,Detail,Status)
		VALUES('".$Title."','".$Date."','','0');";

if($conn->query($sql)===TRUE){
			echo "<script>";
			 echo "alert('เสร็จสิ้น');";
			 echo "window.location='add.php';";
          	 echo "</script>";
}else{	
	 		 echo "<script>";
			 echo "alert('มีtitleนี้อยู่แล้ว');";
			 echo "window.location='add.php';";
          	 echo "</script>";
}

$conn->close();		

?>
