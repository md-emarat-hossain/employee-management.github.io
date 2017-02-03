<table width="80%" border="1">
    <tr>
    <td>File Name</td>
    <td>File Type</td>
    <td>File Size(KB)</td>
    <td>View</td>
    </tr>
    <?php
    include "lib/database.php";
 $db=new database();
 $sql="SELECT * FROM tbl_uploads";
  //$result4=$db->insert($sql);
 $result_set=$db->select($sql);
 while($row4=$result_set->fetch_assoc())
 {
  ?>
        <tr>
        <td><?php echo $row['file'] ?></td>
        <td><?php echo $row['type'] ?></td>
        <td><?php echo $row['size'] ?></td>
        <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
        </tr>
        <?php
 }
 ?>
</table>