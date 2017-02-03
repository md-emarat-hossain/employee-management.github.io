<?php
include "lib/database.php";
$db=new database();
if(isset($_POST['btn-upload']))
{    
 
 $pname=$_POST['pname'];
 $eid=$_POST['eid'];
 $date=$_POST['date'];
 $pdes=$_POST['pdes'];    
 $file = rand(1000,100000)."-".$_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="uploads/";
 
 move_uploaded_file($file_loc,$folder.$file);
 $sql="INSERT INTO tbl_uploads(file,type,size,pname,eid,dat,pdes) VALUES('$file','$file_type','$file_size','$pname',$eid,'$date','$pdes')";
 //mysql_query($sql); 
 $result4=$db->insert($sql);
}

if(isset($_POST['btn-upload2']))
{
$id1=$_GET['id'];
$st="SUBMITTED";
$file = rand(1000,100000)."-".$_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="uploads/";
 
 move_uploaded_file($file_loc,$folder.$file);
 $sql="UPDATE tbl_uploads SET file='$file',type='$file_type',size='$file_size',status='$st' WHERE id=$id1";
 $result4=$db->insert($sql);
 if($result4==true)
 {
 	echo "File updated/uploaded successfully Log in/Refresh to see updates ".'<a href="index.php"  class="btn-link">LOG IN</a>';
 }
}
?>