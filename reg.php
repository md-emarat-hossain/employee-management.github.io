
<!DOCTYPE html>
<html>
	
	<head>
		<title>Registration</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/custom.css">
	</head>
	<body class="b_reg">
	
	<div class='row'>

    <strong><h3 id="title_reg1">REGISTER YOURSELF</h3></strong><br>
    <div class='col-md-6 col-md-offset-3 val'>
    <?php
    include 'lib/user.php';
     $us=new user();
     //$db=new database();
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['reg']))
     {
        $us->validation($_POST);
     	if($us==true)
     	{
     	$us->pass_db();
     	header('Location: index.php');
        exit;
        }
     }
    ?>
    </div>
	<form method="POST" enctype="multipart/form-data">
	<div class='col-md-3 col-md-offset-3 reg'>
	<br><br>
			 <input type="text" class="form-control inp" name="name" placeholder="Name" required="1" /><br>
			 <input type="email" class='form-control inp' name="email" placeholder="Email" required="1"/><br>
			 <input type="text" class='form-control inp' name="m_number" placeholder="Mobole Number" required="1"/><br>
			 <input type="text" class="form-control inp" name="u_name" placeholder="User Name" required="1"/><br>
			 <input type="password" class="form-control inp" name="pass" placeholder="Password" required="1"/><br>
			 <input type="password" class="form-control inp" name="rpass" placeholder="Re Enter Your Password" required="1"/><br>
		
	</div>
	<div class="col-md-3 reg">
	<br><br>
		<textarea placeholder="Enter Your Skill seperated by comma" class="form-control" name="skill" required="1"></textarea><br>
		<textarea placeholder="Enter Your Current Address" class="form-control" name="add" required="1"></textarea><br>
        <p style="color:white">Browse Your Profile Image</p><input type="file" name="file"/><br><br>

		<info id='wrn'></info>
		<input type="submit" value="REGISTER" name="reg" class="btn btn-success btn1" />
		<a href="index.php" class="btn btn-success btn1">LOG IN</a>
	</div>

	</form>
	</div>
	</body>

</html>