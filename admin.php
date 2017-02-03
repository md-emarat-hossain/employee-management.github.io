<?php

include "lib/database.php";
$db=new database();
$sql="SELECT * FROM employee_info";
$result=$db->select($sql);



$sql3="SELECT * FROM tbl_uploads";
 $result5=$db->select($sql3);
?>
<!DOCTYPE html>
<html>
	
	<head>

		<title>Profile</title>
		<meta name="viewport" content="width=device-width" content="initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/custom.css">
		<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
		<script src="js/cus1.js"></script>
	</head>
	<body>
	<div class='row'>
	<div class="col-md-2" id="menu">
		<section id="propic">
         <a style="font-size:20px;px;color:white;margin-left:10px;" href='index.php'>Log Out</a>
		</section>
		<section id="men_btn">
        <button class="btn btn-primary btn_m" id="emp" value="Employee List">Employee List</button>
        <a class="btn btn-primary btn_m" id="ap">Assign Projects</a>
        <a class="btn btn-primary btn_m" id="sp">Projects Details</a><br>
        
		</section>
	</div>
	
	<div class='col-md-8'>
	<section  id="emp_p">

	
	<div style="height:10%;width:1100px;; background-color:#6c3483;padding-top:0%;position:fixed;top:0%;z-index:1;">

	<h4 style="color: white;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; margin-left:350px;padding-top:0px;">EMPLOYEE INFORMATIONS

	</h4>

	</div>

	<table class="table-bordered" id="table" style="margin-top:100px;">
		<tr>
			<th>ID</th>
			<th>NAME</th>
			<th>SPECIALIZED</th>
			<th>RANK</th>
			<th>SALERY</th>
			<th>EMAIL</th>
			<th>PHONE</th>
			<th>ADDRESS</th>
			<th>ACTION</th>
		</tr>
		<?php while($row=$result->fetch_assoc()){ $id=$row['id'];?>
		<tr>
			<td><?php echo $row["id"]?></td>
			<td><?php echo $row["name"]?></td>
			<td><?php echo $row["skill"]?></td>
			<td><?php echo $row["rank"]?></td>
			<td><?php echo $row["salery"]?></td>
			<td><?php echo $row["email"]?></td>
			<td><?php echo $row["mobile_number"]?></td>
			<td><?php echo $row["address"]?></td>
			<td><a href='edit_admin.php?id=<?php echo $id?>'>EDIT SALERY & RANK</a></td>
		</tr>
		<?php }?>
	</table>
	 </section>



  <section  id="emp_ap">
	
<div style="height:50px;width:1050px; background-color:#6c3483;padding-top:0px;position:fixed;
	top:0px;
  z-index:1;">

	<h4 style="color: white;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; margin-left:450px;padding-top:0px;">FORM

	</h4>

	</div>
 
    <form  style="margin-top:10%;" action="upload.php" method="post" enctype="multipart/form-data">
    <div class="row">
    <div class="col-md-6">
             <input type="text" class="form-control inp" name="pname" placeholder="Project Name" required="1" /><br>
			 <input type="text" class='form-control inp' name="eid" placeholder="Employee Id" required="1"/><br>
			 <input type="text" class='form-control inp' name="date" placeholder="Last Date of submission d/m/y" required="1"/><br>
			 <input type="file" name="file" />
    </div>
    <div class="col-md-6">
             <textarea  type="text" class="form-control inp" name="pdes" placeholder="Project Description" style="height:300px;width:500px;" required="1"></textarea>
    </div>
    </div>
    <button type="submit" name="btn-upload">upload</button>
    </form>
    </section>

    <section id="pr">

	<div style="height:10%;width:1100px; background-color:#6c3483;padding-top:0%;position:fixed;top:0%;z-index:1;">

	<h4 style="color: white;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; margin-left:350px;padding-top:0px;">PROJECTS
	</h4>

	</div>

     <table class="table-bordered" id="table" style="margin-top:100px;">
		<tr>
			<th>PROJECT ID</th>
			<th>PROJECT NAME</th>
			<th>PROJECT</th>
			<th>PRO DESCRIPTION</th>
			<th>EMP ID</th>
		</tr>
		<?php while($row=$result5->fetch_assoc()){ $id=$row['id'];?>
		<tr>
			<td><?php echo $row["id"]?></td>
			<td><?php echo $row["pname"]?></td>
			<td><a style="width:20px;" href="uploads/<?php echo $row['file'] ?>" target="_blank"><?php echo $row['file'] ?></a></td>
			<td><a href="viewp.php?id=<?php echo $id?>" target="_blank">See Project Details</a></td>
			<td><?php echo $row["eid"]?></td>
		</tr>
		<?php }?>
	</table>
    </section>
    


	</div>

	</div>
<div style="height:50px;background-color:#6c3483">
	<h6 style="color:white;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; margin-left:500px;padding-top:10px;">© <?php echo date("Y"); ?> Md Emarat Hossain Badhon

	</h6>

	</div>
	</body>

</html>