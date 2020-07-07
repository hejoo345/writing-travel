<?php
header('Content-Type: text/html; charset=utf-8');
$connect=mysql_connect( "localhost", "writingtavel", "whfdjq#2019") or
    die( "SQL server error.");

mysql_query("SET NAMES UTF8");
mysql_select_db("writingtavel",$connect);
//0. DB 연결 확인
if (mysqli_connect_errno($connect))
echo "Failed to connect to MySQL: " . mysqli_connect_error();
else{
//1. 세션 확인
session_start();
$userid = $_SESSION['userid'];
if(empty($userid)) echo "ID IS NULL";
else{
  //2. 값 확인
//  $code = $_POST['code'];
//  if(empty($code)) echo "CODE IS NULL";
//  else{
$pl_num = $_POST['plnum'];
if(empty($pl_num)) echo "PLNUM IS NULL";
else{
$sql = "SELECT * FROM plan WHERE pl_num='$pl_num'";
$result = mysql_query($sql, $connect)or die(mysql_error());
$row = mysql_fetch_array($result);
echo $row[day_day],",",$row[place], ",",$row[pl_tit], ",",$row[pl_pic],",",$row[pl_txt],",",$row[money],",";
}//2
}//1
}//0
?>
