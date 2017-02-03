<?php
include "lib/database.php";
$db=new database();
$result2=false;
$result3;
$row1;
$id;
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['log']))
{
	$email=$_POST['email1'];
	$pass=md5($_POST['pass1']);
	$sql= "SELECT pass FROM employee_info WHERE email='$email'";
    $result=$db->select($sql);	
	if($result!=false)
	{
	$row=$result->fetch_assoc();
	if($row['pass']==$pass)
	{
		$result2=true;
	}
    }
    else
    {
    echo"Request is not under stood";
    }
}

if($result2==true)
{
 $sql="SELECT * FROM employee_info WHERE email='$email'";
 $result3=$db->select($sql);
 $row1=$result3->fetch_assoc();
 $id=$row1['id'];

 $sql2="SELECT * FROM tbl_uploads WHERE eid='$id'";
 $result4=$db->select($sql2);
 //$row2=$result3->fetch_assoc();

 $sql3="SELECT * FROM tbl_uploads WHERE eid='$id'";
 $result5=$db->select($sql3);
}

?>



<?php if($result2==true){?>
<!DOCTYPE html>
<html>
	
	<head>
		<title>Profile</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/custom.css">
		<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
		<script src="js/cus.js"></script>
	</head>
	<body>
	<div class='row'>
	<div class="col-md-2" id="menu">
		<section id="propic">
         <img  style="height:50px;width:50px;margin-top:10px;border-radius:20px;" src="uploads/<?php echo $row1['file'] ?>">
         <a style="font-size:20px;px;color:white;margin-left:10px;" href='index.php'>Log Out</a>
		</section>
		<section id="men_btn">
        <a class="btn btn-primary btn_m" id="inf">Your Info</a>
        <a class="btn btn-primary btn_m" id="pd">Projects Details</a><br>
        <a class="btn btn-primary btn_m" id="udp">Update/Upload Projects</a>
		</section>
	</div>
	<section id="pr">
	<div class='col-md-8'>
	<div style="height:50px;width:1100px;background-color:#6c3483">

	<h4 style="color:white;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; margin-left:250px;padding-top:10px;">YOUR INFORMATIONS

	</h4>

	</div>
	<table class="table-bordered" style="margin-top:10px;">
		<tr>
			<th>CATAGORY</th>
			<th>INFORMATION</th>
			<th><a href='edit.php?id=<?php echo $id?>'>EDIT</a></th>
		</tr>
		<tr>
			<th>ID</th>
			<td id="td_p id"><?php echo $row1['id'];?></td>
		</tr>
		<tr>
			<th>NAME</th>
			<td id="td_p name" ><?php echo $row1['name'];?></td>
		</tr>
		<tr>
			<th>IMAGE</th>
			<td id="td_p name" ><a href="uploads/<?php echo $row1['file'] ?>" target="_blank"><?php echo $row1['file'] ?></a></td>
		</tr>
		<tr>
			<th>SPECIALIZED</th>
			<td id="td_p sp"><?php echo $row1['skill'];?></td>
		</tr>
		<tr>
			<th>RANK</th>
			<td id="td_p"><?php echo $row1['rank'];?></td>
		</tr>
		<tr>
			<th>SALERY</th>
			<td id="td_p"><?php echo $row1['salery'];?></td>
		</tr>
		<tr>
			<th>EMAIL</th>
			<td id="td_p"><?php echo $row1['email'];?></td>
		</tr>
		<tr>
	    	<th>PHONE</th>
			<td id="td_p phone"><?php echo $row1['mobile_number'];?></td>
		</tr>
	    <tr>
			<th>ADDRESS</th>
			<td id="td_p add"><?php echo $row1['address'];?></td>
		</tr>
	</table>
	</div>
    </section>




    <section id="mp">
    	


     <div class='col-md-8'>
	<div style="height:50px;width:1100px;background-color:#6c3483">

	<h4 style="color:white;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; margin-left:250px;padding-top:10px;">PROJECTS INFORMATION

	</h4>

	</div>
	<table class="table-bordered" style="margin-top:10px;">
		<tr>
			<th>ID</th>
			<th>NAME</th>
			<th>DEAD LINE</th>
			<th>STATUS</th>
			<th>PROJECT.ZIP</th>
			<th>PROJECT DETAILS</th>
		</tr>
		<?php 
        if($result4==true)
        {
		while($row2=$result4->fetch_assoc()){ $id=$row2['id'];?>
		<tr>
        <td><?php echo $row2['id'] ?></td>
        <td><?php echo $row2['pname'] ?></td>
        <td><?php echo $row2['dat'] ?></td>
        <td><?php echo $row2['status'] ?></td>
        <td id="t"><a  style="width:20px;" href="uploads/<?php echo $row2['file'] ?>" target="_blank" ><?php echo $row2['pname'] ?></a></td>
        <td><a href="viewp.php?id=<?php echo $id?>" target="_blank">See Project Details</a></td>
        <!--<td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>-->
        </tr>
		<?php }}


		else
         {?>
     <tr>
        <td><?php echo"NO PROJECT FOUND" ?></td>
      </tr><?php
         }?>

	</table>
	</div>


    </section>



    <section id="up">
    	

    	<div class='col-md-8'>
	<div style="height:50px;width:1100px; background-color:#6c3483">

	<h4 style="color:white;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; margin-left:250px;padding-top:10px;">UPDATE YOUR PROJECT

	</h4>

	</div>
<table class="table-bordered" style="margin-top:10px;">
		<tr>
			<th>ID</th>
			<th>NAME</th>
			<th>DEAD LINE</th>
			<th>STATUS</th>
			<th>PROJECT.ZIP</th>
			<th>PROJECT DETAILS</th>
			<th>UPDATE PROJECT</th>
			<th></th>
		</tr>
		<?php 
        
        if($result5==true)
        {
        
		while($row3=$result5->fetch_assoc()){ $id=$row3['id'];?>
		<tr>
        <td><?php echo $row3['id'] ?></td>
        <td><?php echo $row3['pname'] ?></td>
        <td><?php echo $row3['dat'] ?></td>
        <td><?php echo $row3['status'] ?></td>
        <td id="t"><a style="width:20px;" href="uploads/<?php echo $row3['file'] ?>" target="_blank"><?php echo $row3['pname'] ?></a></td>
        <td><a href="viewp.php?id=<?php echo $id?>" target="_blank">See Project Details</a></td><form  style="margin-top:10%;" action='upload.php?id=<?php echo $id?>'method="post" enctype="multipart/form-data">
        <td><input type="file" name="file" required="1" /></td>
        <td><button type="submit" name="btn-upload2">upload</button></td></form>
        <!--<td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>-->
        </tr>
		<?php }}


		else
         {?>
     <tr>
        <td><?php echo"NO PROJECT FOUND" ?></td>
      </tr><?php
         }?>

	</table>
	</div>
    </section>
 

     


	</div>
	<div style="height:50px;background-color:#6c3483">
	<h6 style="color:white;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; margin-left:500px;padding-top:10px;">© <?php echo date("Y"); ?> Md Emarat Hossain Badhon

	</h6>

	</div>
	</body>

</html>
<?php }

else
{
	echo "Incorrect Password";
	header('Location: index.php?msg="incorrect Password OR Email"');
        exit;
}


?>