<?php

require_once 'dbconfig.php';

session_start();
$userid = $_SESSION['userid'];
if(empty($userid)) die ("ID IS NULL");

$code = $_POST['code'];
if(empty($code)) die("CODE IS NULL");

$prePlNum = $_POST['prePlNum'];
$preDay = $_POST['preDay'];
$nowPlNum = $_POST['nowPlNum'];
$nowDay = $_POST['nowDay'];
 echo $prePlNum ." / ". $preDay . " / ".$nowPlNum . " / ".$nowDay;


  $sql = "UPDATE plan SET day_day = '$nowDay', pl_num='$nowPlNum', state='1' WHERE pl_num = '$prePlNum' AND state='0'";
  $result = mysql_query($sql, $connect) or die(mysql_error());
	echo "pre - > now 됨 * ";

	$sql = "UPDATE plan SET day_day = '$preDay', pl_num='$prePlNum', state='1' WHERE pl_num = '$nowPlNum' AND state='0'";
	$result = mysql_query($sql, $connect) or die(mysql_error());
	echo "now - > pre 됨 * ";

	$sql = "UPDATE plan SET state=0 WHERE code = '$code'";
	$result = mysql_query($sql, $connect) or die(mysql_error());
	echo "state 0으로 셋팅 성공";

?>
