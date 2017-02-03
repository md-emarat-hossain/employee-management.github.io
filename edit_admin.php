<?php
include"lib/database.php";
if(isset($_GET['id']))
{
$id= $_GET['id'];
$db=new database();
$sql="SELECT * FROM employee_info WHERE id='$id'";
$result=$db->select($sql);
$row1=$result->fetch_assoc();
$result1=false;

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['up']))
{
	$rank=$_POST['rank'];
	$salery=$_POST['salery'];
	//$add=$_POST['add'];
	//$mobile=$_POST['phone'];
	$sql="UPDATE employee_info SET rank='$rank',salery='$salery' WHERE id='$id'";
	$result1=$db->update($sql);
}
?>

<?php if($result1!=true){?>

<!DOCTYPE html>
<html>
	
	<head>
		<title>Admin Panel</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/custom.css">
		<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
		<script src="js/cus.js"></script>
	</head>
	<body>
	<div class='row'>
	<div class='col-md-8 col-md-offset-2'>
	<div style="height:100px;background-color:#a93226">

	<h3 style="color: #2c3e50;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; margin-left:250px;padding-top:30px;">EDIT INFORMATIONS

	</h3>

	</div>
	<form method="POST">
	<table class="table-bordered">
		<tr>
			<th>CATAGORY</th>
			<th>INFORMATION</th>
			<th><input type="submit" value="UPDATE" name="up" class="btn-link"></th>
		</tr>
		<tr>
			<th>ID</th>
			<td id="td_p id1"><?php echo $row1['id'];?></td>
		</tr>
		<tr>
			<th>NAME</th>
			<td id="td_p name1"><?php echo $row1['name'];?></td>
		</tr>
		<tr>
			<th>SPECIALIZED</th>
			<td id="td_p sp1"><?php echo $row1['skill'];?></td>
		</tr>
		<tr>
			<th>RANK</th>
			<td id="td_p"><input type="text" name="rank" value="<?php echo $row1['rank'];?>"></td>
		</tr>
		<tr>
			<th>SALERY</th>
			<td id="td_p"><input type="text" name="salery" value="<?php echo $row1['salery'];?>"></td>
		</tr>
		<tr>
			<th>EMAIL</th>
			<td id="td_p"><?php echo $row1['email'];?></td>
		</tr>
		<tr>
	    	<th>PHONE</th>
			<td id="td_p phone1 "><?php echo $row1['mobile_number'];?></td>
		</tr>
	    <tr>
			<th>ADDRESS</th>
			<td id="td_p add1"><?php echo $row1['address'];?></td>
		</tr>
	</table>
	</form>
			<div style="height:100px;background-color:#a93226">
	<h3 style="color: #2c3e50;font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; margin-left:250px;padding-top:30px;">© <?php echo date("Y"); ?> Md Emarat Hossain Badhon

	</h3>

	</div>
	</div>
	</div>
	</body>

</html>
<?php }
else
{
?>
Log in as ADMIN to see your profile <a href="admin.php" class="btn-link">LOG IN</a>

<?php }}
else
{
	echo "REQUEST IS NOT UNDERSTOOD";
}
?>