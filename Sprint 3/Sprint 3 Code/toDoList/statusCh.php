<html>
<head>
</head>
<body>
<?php 
	require_once 'DB_ToDoList.php';
?>
<?php

$sql =	"SELECT *FROM list WHERE Title='".$_GET['statusTi']."' AND id =  '".$_SESSION['id']."';";
$obj = $conn->query($sql);
	if($obj===false)
{			
			echo $_GET['statusTi'];
			 echo "<script>";
			 echo "alert('ไม่พบข้อมูล');";
		    echo "window.location='add.php';";
          	 echo "</script>";
}
	else
	{
		$olist = $obj->fetch_array();
		if($olist['Status']==0){
		$sql =	"UPDATE list SET Status = '1'  WHERE Title = '".$_GET['statusTi']."'";
		}
		else{
		$sql =	"UPDATE list SET Status = '0'  WHERE Title = '".$_GET['statusTi']."'";
		}	

	 
	if($conn->query($sql)===true){
			 echo "<script>";
			 echo "alert('เสร็จสิ้น');";
			 echo "window.location='add.php';";
          	 echo "</script>";

	}else{
			 echo "<script>";
			 echo "alert('เกิดปัญหาไม่สามารถแก้ไขสถานะได้');";
			 echo "window.location='add.php';";
          	 echo "</script>";

	}
}
	mysql_close($objConnect);
?>
</body>
</html>