<!DOCTYPE html>
<html>
<head>
<body>
<?php

require_once 'DB_ToDoList.php';
$sql = "SELECT *FROM picture WHERE namePic in ('todo')";

if($sql !=NULL){
$obj = $conn->query($sql);
}

if($obj != null){
while($olist = $obj->fetch_array()){
?>

<style type="text/css">
html { 
background-image:  url('<?php echo $olist[pic]?>');
background-repeat: no-repeat;
background-position: center center;
background-attachment: fixed;
-o-background-size: 100% 100%, auto;
-moz-background-size: 100% 100%, auto;
-webkit-background-size: 100% 100%, auto;
background-size: 100% 100%, auto;

}
</style>

<?php
}}
else
?>
</body>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<title></title>
<body>
<table style="width: 95%;">
<tr> <td height="500" align="center" ><input class="MyBut" style="background: #F0FFFF; width:auto; padding: 10px; " type="button" value="login เพื่อเข้าใช้งาน" onclick="window.location.href='login.php'"></th>
		<input class="MyBut" style="background: #F0FFFF; color:black; width:auto; padding: 10px; " type="button" value="สมัครสมาชิก" onclick="window.location.href='register.html'">
    	
        </table>
</body>
</html>

