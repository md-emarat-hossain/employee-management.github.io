<!DOCTYPE html>
<html>
	
	<head>
		<title>Log in</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/custom.css">
	</head>
	<body class="b_log">
	<div class='row'>
	<strong><h2 id="title_reg">WELLCOME TO EMPLOYEE MANEGER</h2></strong><br>
	<strong><h3 id="title_reg1">LOGG IN</h3></strong><br>
	<div class='col-md-3 col-md-offset-3 reg'>
	<?php
     if(isset($_GET['msg']))
     {
     	echo "<t style='color:red;'>".$_GET['msg']."</t>";
     }
	?>
	<br><br>
	<form method="POST" action="profile.php">
			 <input type="text" class="form-control inp" name="email1" placeholder="User Name" required="1" /><br>
			 <input type="Password" class='form-control inp' name="pass1" placeholder="Password" required="1"/><br>
			 <input type="submit" value="LOGG IN" name="log" class="btn btn-success btn1" />
			 <a href="reg.php" class="btn btn-success btn1">REGISTER</a> <br><br>
	</form>
	</div>
	<div class="col-md-3 reg">
	<br><br>
		
		<a href="admin.php" class="btn btn-success btn1">LOG IN AS ADMIN</a>
	
	</div>
	</body>

</html>