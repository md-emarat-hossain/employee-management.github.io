<?php
$id=$_GET['id'];
include "lib/database.php";
$db=new database();
$sql3="SELECT pdes FROM tbl_uploads WHERE id=$id";
$result5=$db->select($sql3);
$row1=$result5->fetch_assoc();echo $row1['pdes'];
?>