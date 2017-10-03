<html>
<head>
</head>
<body>
<?php 
	require_once 'DB_ToDoList.php';
?>
<?php

$titleE = $_REQUEST['titleEd'];
$dateE = $_REQUEST['dateEd'];


$sql = "UPDATE list SET 
          Title = '".$titleE."',
		   Date = '".$dateE."' WHERE Title='".$_GET['editTi']."';";


	if($conn->query($sql)===true)
	{
			 echo "<script>";
			 echo "alert('เสร็จสิ้น');";
			 echo "window.close();";
          	 echo "</script>";
	}
	else
	{
		  echo "<script>";
			 echo "alert('มีtitleนี้อยู่แล้วกรุณากรอกใหม่อีกครั้ง');";
			 echo "window.location='edit.php';";
          	 echo "</script>";
	}
	mysql_close($objConnect);
?>
</body>
</html>