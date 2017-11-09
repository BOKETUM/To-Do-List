<?php
include("DB_ToDoList.php");

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login Form</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/main.css">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="js/jquery-1.8.2.min.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/main.js"></script>
    </head>
    <body>
<?php
	$error = '';
	$id = $_POST['id'];
	$pass = $_POST['password'];
	if(isset($_POST['is_login'])){
		$strSQL = "SELECT * FROM member WHERE id = '".$id."' and pass= '".$pass."'";
		$objQuerySQL = $conn->query($strSQL);
		$user = $objQuerySQL->fetch_array();
			if($user){
			$_SESSION["id"] = $user['id'];
			header("location:add.php");
			}
			else{
			$error = 'Wrong id or password.';
			}		
		
	}
	
?>

	    <form id="login-form" class="login-form" name="form1" method="post" action="login.php">
	    	<input type="hidden" name="is_login" value="1">
	        <div class="h1">Login Form</div>
	        <div id="form-content">
	            <div class="group">
	                <label for="id">ID</label>
	                <div><input id="id" name="id" class="form-control required" type="id" placeholder="id"></div>
	            </div>
	           <div class="group">
	                <label for="name">Password</label>
	                <div><input id="password" name="password" class="form-control required" type="password" placeholder="Password"></div>
	            </div>
	            <?php if($error) { ?>
	                <em>
						<label class="err"  style="display: block;"><?php echo $error ?></label>
					</em>
				<?php } ?>
	            <div class="group submit">
	                <label class="empty"></label>
					<div><input name="submit" type="submit" value="Submit"/>
					<input type="button" value="register" onclick="window.location.href='register.html'"></div>
	            </div>
	        </div>
	        <div id="form-loading" class="hide"><i class="fa fa-circle-o-notch fa-spin"></i></div>
	    </form>

    </body>
</html>
