<?php
/*
require_once 'dbconfig.php';

session_start();
$userid = $_SESSION['userid'];
if(empty($userid)) die ("ID IS NULL");

$codeNum = $_POST['codeNum'];
if(empty($codeNum)) die("CODE IS NULL");
*/
extract($_POST);
if (isset($_POST)){
//echo $userid, "-", $code, "-", $y, "-", $m, "-", $d, "-",$dd, " * " ;
//y m d dd 하나라도 안 오면 에러 떠야 하지만... 일단 생략
$sql = "INSERT INTO day (id, code, day_y, day_m, day_d, day_day)VALUES ('$userid', '$code', '$y', '$m', '$d', '$dd')";
$result = mysql_query($sql, $connect) or die(mysql_error())
echo "day insert success";
} else echo "VALUES IS NULL";

?>
