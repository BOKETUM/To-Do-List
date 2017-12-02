<html>
<head>
</head>
<body>
<?php 
	require_once 'DB_ToDoList.php';
?>
<?php

$deta = $_REQUEST['detailDB'];

$sql = "UPDATE list SET 
          Detail = '".$deta."' WHERE Title='".$_GET['detailTi']."';";


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
			 echo "alert('error');";
			 echo "window.location='edit.php';";
          	 echo "</script>";
	}
	mysql_close($objConnect);
?>
</body>
</html>