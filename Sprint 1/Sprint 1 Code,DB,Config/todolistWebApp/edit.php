<html>
<head>
</head>
<body>
<?php 
	require_once 'DB_ToDoList.php';
?>
<form action="editDB.php?editTi=<?php echo $_GET["editTi"];?>""name="editDb" method="post">
<?php
$sql = "SELECT *FROM list WHERE Title = '".$_GET['editTi']."' ";
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

<table width="25%" border="1" >
	<tr>
	</tr>
    <tr>
	<th width="40"> <div align="center">title </div></th>
	<th width="30"> <div align="center">date </div></th>

	</tr>
    <tr>
    <th><input type="text" name="titleEd" size="40" value=<?php echo $olist["Title"];?>></td>
    <th><input type="date" name="dateEd" size="30" value=<?php echo $olist["Date"];?>></td>
  </tr>
  </table>
   <td height="12">
   <tr> 
             <td height="38" align="center"><?php
  }
  ?>
               <input type="submit" name="submit" value="submit">
  </form>
</body>
</html>