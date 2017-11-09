<?php 
	require_once 'DB_ToDoList.php';
?>
<?php
 //print_r($_REQUEST);
 
$Title = $_REQUEST['title'];
$Date = $_REQUEST['date'];
$prior = $_REQUEST['p'];
$de = $_REQUEST['detail'];

//$sqlGetId =	"SELECT id FROM member WHERE id = '".$_SESSION['id']."';";
//$ob = $conn->query($sqlGetId) or trigger_error($conn->error."[$sqlGetId]");;
//$id = $ob->fetch_array();

$sql = "INSERT INTO list( Title,Date,Detail,Status,id,priority)
		VALUES('".$Title."','".$Date."','".$de."','0','".$_SESSION["id"]."','".$prior."');";

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
