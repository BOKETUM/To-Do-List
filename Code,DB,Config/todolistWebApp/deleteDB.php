<?php 
	require_once 'DB_ToDoList.php';
?>
<?php

	$sql =	"DELETE FROM list WHERE Title =  '".$_GET['ti']."'";
	
	
	if($conn->query($sql)===true){
			 echo "<script>";
			 echo "alert('เสร็จสิ้น');";
			 echo "window.location='add.php';";
          	 echo "</script>";

	}else{
			 echo "<script>";
			 echo "alert('เกิดปัญหาไม่สามารถลบได้');";
			 echo "window.location='add.php';";
          	 echo "</script>";

	}
	mysql_close($objConnect);
?>