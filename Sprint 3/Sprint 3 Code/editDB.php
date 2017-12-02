<html>
<head>
</head>
<body>
<?php 
	require_once 'DB_ToDoList.php';
?>

<?php
$prior = $_REQUEST['priorEd'];
$titleE = $_REQUEST['titleEd'];
$dateE = $_REQUEST['dateEd'];
$de = $_REQUEST['detailEd'];

$sql = "UPDATE list SET 
         priority= '".$prior."' , Title = '".$titleE."',
		   Date = '".$dateE."', Detail = '".$de."' WHERE Title='".$_GET['editTi']."' AND id =  '".$_SESSION['id']."'";


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
			 echo "window.location='edit.php?editTi=".$_GET['editTi']."';";
          	 echo "</script>";
		}
	

	mysql_close($objConnect);
?>
</body>
</html>