<html>
<head>
</head>
<body>
<?php 
	require_once 'DB_ToDoList.php';
?>
<form action="detailDB.php?detailTi=<?php echo $_GET["detailTi"];?>""name="editDb" method="post">
<?php
$sql = "SELECT *FROM list WHERE Title = '".$_GET['detailTi']."' ";
$obj = $conn->query($sql);


if($obj===false)
{
			 echo "<script>";
			 echo "alert('ไม่พบข้อมูล');";
			 echo "window.location='add.php';";
          	 echo "</script>";
}
else
{
$olist = $obj->fetch_array();
?>

	<?php echo "<div style=\"font-size:150% ;\">Detail</div>" ;?>
  <textarea name="detailDB" row="10" cols="70" ><?php echo $olist["Detail"];?></textarea>
     
  <td height="12">
   <tr> 
             <td height="38" align="center"><?php
  }
  ?></tr>
<input type="submit" name="submitDe" value="submit">
  </form>

</body>
</html>