<?php require_once 'DB_ToDoList.php'; ?>

<!DOCTYPE html>
<html>
<head>
<body style="background-color: #ADD8E6;">
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<title></title>

<?php
//session_start();
require_once 'DB_ToDoList.php';
date_default_timezone_set('Asia/Bangkok');
 // 	echo วันที่ปัจจุบัน ;
 //  echo date("d-m-Y");
?>

<style>
label {
font-family:serif;
font-weight: bold;
font-size: 150%;
color: black;
}
</style>

<script LANGUAGE="JavaScript">
function check(myForm) {
	const now = new Date();
	const se =new Date(myForm.date.value);
	now.getMonth()+1
	submitResult = true;
	if(myForm.title.value==""){
		  submitResult = false ; 
	 	 alert("กรุณาใส่title");
	}
	else if(se.getYear()>=now.getYear()){
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

<body>
		<label>ID : <?php echo $_SESSION["id"]; ?></label>&nbsp;
		<a href="logout.php">Log out</a>

	<form action="addList.php" method="post" onSubmit="return check(this);" >
	
	<table style="width: 100%;">
	<tr>
		<td width="97%" height="166" align="center" ><label style="font-size: 300% ; font-family:sans-serif;color:#FF69B4;">To Do List</label></td>
	</tr>	
	<tr>
		<td height="38" align="center"colspan >
			<label>title : <input type="text" name="title">&nbsp; date :
			<input type="date" name="date" placeholder="YYYY-MM-DD" required pattern ="[0-9]{4}-[0-9]{2}-[0-9]{2}" title="Enter a date in this formart YYYY-MM-DD"/>
			</label>
         
   <label>priority <select name="p">
                        <?php
                        for($i=1;$i<=10;$i++){
                            echo "<option value='$i'>$i</option>";
                        }
                        ?>
                        </select>
                        
                        <br><br>
		 detail &nbsp;<textarea name="detail" row="3" cols="40"></textarea></label>
       </tr>          
	<tr> 
		<td height="38" align="center"><input type="submit" value="OK"></td>
	</tr>
	</form>
		<td height="12"><label style="font-size: 300%; font-family:sans-serif; padding-left :300px;"> List</label></td>
	
	<form action="add.php" method="post">
	<tr>
		<td height="38" align="center">
			<input type="radio"  name="Show" value="1" id="RadioGroup1_0">ซ่อนที่เสร็จ 
			<input  name="Show" type="radio" id="RadioGroup1_1"  value="0">แสดงทั้งหมด &nbsp;
			<input name="btnSub" type="submit" value="Submit">
		</td>
	</tr>
	</table>
	</form>	
</body> 
</html>



<?php

$sql = "SELECT *FROM list WHERE id =  '".$_SESSION['id']."' ORDER BY list.priority DESC";
if($sql !=NULL){
$obj = $conn->query($sql);
}
else {$obj = null;
echo 'error';
}
?>

<br><br><br>

<table width="50%" border="1" align="center">
	<tr>
	<th width="100" style="background-color: #2BF5DD;"> <div align="center">Status</div></th>
    <th width="50" style="background-color: #2BF5DD;"> <div align="center">Priority</div></th>
	<th width="220" style="background-color: #2BF5DD;"> <div align="center">Title</div></th>
	<th width="120" style="background-color: #2BF5DD;"> <div align="center">Date</div></th>
    <th width="220" style="background-color: #2BF5DD;"> <div align="center">Detail</div></th>
	<th width="50" style="background-color: #2BF5DD;"> <div align="center">Edit</div></th>
	<th width="70" style="background-color: #2BF5DD;"> <div align="center">Delete</div></th>
	</tr>

<div align="center">
<?php 
if($obj != null){
while($olist = $obj->fetch_array()){
	$sta = "Done";
		if($olist[Status] != 1){
{
	$sta = "NotDone";

?>
<?php 
}}
if($_POST['Show'] == 1 && $olist[Status] != 1){
	
?>

	<tr>
	<th width="100"><div align="center"><a href="statusCh.php?statusTi=<?php echo $olist[Title];?>"><?php echo $sta;?></a></div></td>
	<th width="50" > <div align="center"> <?php echo $olist[priority]?></div></th>
    <th width="220" > <div align="center"> <?php echo $olist[Title]?></div></th>
	<th width="120"><div align="center"><?php list($y,$m,$d)=explode('-',$olist[Date]);echo $d.'/'.$m.'/'.$y;?></div></th>
 	<th><textarea name="detailEd" row="3" cols="30" readonly ><?php  echo $olist["Detail"];?></textarea></td>
	<th width="50"> <div align="center"><a class="various iframe" href onClick="window.open('edit.php?editTi=<?php echo $olist[Title];?>','','width=800,height=200'); return false;" ';}">Edit</a></div></td>  
	<th width="70"><div align="center"><a href="JavaScript:if(confirm('คุณแน่ใจที่จะลบใช่หรือไม่?') == true){window.location='deleteDB.php?ti=<?php echo $olist[Title];?>';}">Delete</a></div></td>
	</tr>
<?php 
}
if($_POST['Show'] != 1){
?>
	<tr>
	<th width="100"><div align="center"><a href="statusCh.php?statusTi=<?php echo $olist[Title];?>"><?php echo $sta;?></a></div></td>
	<th width="50" > <div align="center"> <?php echo $olist[priority]?></div></th>
    <th width="220" > <div align="center"> <?php echo $olist[Title]?></div></th>
	<th width="120"><div align="center"><?php list($y,$m,$d)=explode('-',$olist[Date]);echo $d.'/'.$m.'/'.$y;?></div></th>
 	<th><textarea name="detailEd" row="3" cols="30" readonly ><?php  echo $olist["Detail"];?></textarea></td>
	<th width="50"> <div align="center"><a class="various iframe" href onClick="window.open('edit.php?editTi=<?php echo $olist[Title];?>','','width=800,height=200'); return false;" ';}">Edit</a></div></td>  
	<th width="70"><div align="center"><a href="JavaScript:if(confirm('คุณแน่ใจที่จะลบใช่หรือไม่?') == true){window.location='deleteDB.php?ti=<?php echo $olist[Title];?>';}">Delete</a></div></td>
	</tr>
<?php
}}}

?>

</table>
</div>
<br><br><br>