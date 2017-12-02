<!DOCTYPE html>
<html>
<head>
<body style="background-color: #2ECCFA;">
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<title></title>
<?php 
	require_once 'DB_ToDoList.php';
?>
<script LANGUAGE="JavaScript">
function check(myForm) {
	const now = new Date();
	const se =new Date(myForm.dateEd.value);
	now.getMonth()+1
	submitResult = true;
	 if(se.getYear()>=now.getYear()){
			if(se.getMonth()==now.getMonth()){
				if(se.getDate()<now.getDate()){
					  submitResult = false ; 
	 				 alert("ห้ามกรอกวันย้อนหลัง");
				}
			}
			else if(se.getMonth()>now.getMonth()){}
			else { 
					submitResult = false ; 
	 			 alert("ห้ามกรอกเดือนย้อนหลัง");	
			 }	 
	}
	else {submitResult = false ;alert("ห้ามกรอกปีย้อนหลัง");}
	return  submitResult;
}
</script>

<form action="editDB.php?editTi=<?php echo $_GET["editTi"];?>"name="editDb" method="post" onSubmit="return check(this);">
<?php
$sql = "SELECT *FROM list WHERE Title = '".$_GET['editTi']."' AND id =  '".$_SESSION['id']."'";
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

<table width="20%" border="1" align ="center" >
    <tr>
    <th width="20"> <div align="center"> priority </div></th>
	<th width="40"> <div align="center"> title </div></th>
	<th width="30"> <div align="center"> date </div></th>
    <th width="30"> <div align="center"> detail </div></th>

	</tr>
    <tr>
 
    <th><select name="priorEd">
                        <?php
						if($olist[priority]==1){
                              echo "<option value='3' >very important</option>";
  						 	  echo "<option value='2'>important</option>";
						      echo "<option value='1'selected=1>normal</option>";
						}
						else if($olist[priority]==2){
						  	  echo "<option value='3' >very important</option>";
  						 	  echo "<option value='2 selected=1'selected=1>important</option>";
						   	  echo "<option value='1'>normal</option>";
						}
						else{ 
							  echo "<option value='3' selected=1>very important</option>";
  						 	  echo "<option value='2'>important</option>";
						   	  echo "<option value='1'>normal</option>";
						}
                        ?>
                        </select></td>
    <th><input type="text" name="titleEd"  value=<?php echo $olist["Title"];?>></td>
    <th><input type="date" name="dateEd"  value=<?php echo $olist["Date"];?>></td>
 	<th><textarea name="detailEd" row="3" cols="30"><?php echo $olist["Detail"];?></textarea></td>
  </tr>
  </table>  
            <?php
  }
  ?> 
      <td align="center"><input type="submit" name="submit" value="submit"></td>  
  </form>
</body>
</html>