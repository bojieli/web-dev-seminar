<?php
$con = mysql_connect("localhost","root","23914521X@!");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_set_charset("utf8",$con);
mysql_select_db("says", $con);
$id=$_POST['id'];
$updates=$_POST['updates'];
echo $id;
echo $updates;
$sql="INSERT INTO updates (id, updates)
VALUES
('$id','$updates')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
mysql_close($con)
?>
