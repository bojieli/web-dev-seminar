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
$result = mysql_query("SELECT id FROM updates ORDER by id DESC LIMIT 1");
$row = mysql_fetch_array($result);
$result=$row['id'];
echo $result;
mysql_close($con);
?>