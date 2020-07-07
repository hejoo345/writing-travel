<?php
require_once 'dbconfig.php';

session_start();
$userid = $_SESSION['userid'];
if(empty($userid)) die ("ID IS NULL");

$code = $_POST['code'];
$place = $_POST['place'];
$day_day = $_POST['sel_day'];

if(empty($code)||empty($place)||empty($day_day))
  die ("CODE / PLACE / DAY ARE NULL");

$sql = "SELECT MAX(pl_num) AS pl_num FROM plan";
$result = mysql_query($sql, $connect)or die(mysql_error());
$row = mysql_fetch_array($result);
$pl_num = $row[pl_num]+1;

$sql = "INSERT INTO plan (id, code, day_day, place, pl_num, pl_tit, pl_pic, pl_txt, pl_rod, money, state) VALUES ('$userid', '$code', '$day_day', '$place', '$pl_num', 'null', 'null' , 'null', 0 ,0, 0)";
$result = mysql_query($sql, $connect) or die(mysql_error());

echo $result; //확인용임

?>
