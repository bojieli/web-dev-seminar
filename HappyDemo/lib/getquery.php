<?php
function myjson($code)
{
	$code = json_encode($code);
	return preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2', 'UTF-8', pack('H4', '\\1'))", $code);
}
$con = mysql_connect("localhost","root","23914521X@!");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_set_charset("utf8",$con);
mysql_select_db("says", $con);
$reqid=$_GET["id"];
$result = mysql_query("SELECT id,updates FROM updates WHERE id=$reqid");
$i=0;
while($row = mysql_fetch_array($result))
  { 
      $all[$i]=array("id" => $row['id'],"updates" => $row['updates']);
      $i=$i+1;
  }
$answer=myjson($all);
echo $answer;
mysql_close($con);
?>