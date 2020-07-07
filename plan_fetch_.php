<?php
require_once 'dbconfig.php';

session_start();
$userid = $_SESSION['userid'];
if(empty($userid)) die ("ID IS NULL");

$code = $_POST['code'];
if(empty($code)) die("CODE IS NULL");

$sql = "SELECT country FROM travel WHERE code='$code'";
$result = mysql_query($sql, $connect)or die(mysql_error());
$row = mysql_fetch_array($result);
echo $row[country],",";

$sql = "SELECT MAX(day_day) AS day_day FROM day WHERE code='$code'";
$result = mysql_query($sql, $connect)or die(mysql_error());
$row = mysql_fetch_array($result);
$dayCnt = $row[day_day];
echo $dayCnt,","; // dayCnt


$sql = "SELECT * FROM plan WHERE code='$code' ORDER BY day_day, pl_num ASC";
//$sql = "SELECT * FROM plan WHERE code='$code' ORDER BY day_day, plnum";
$result = mysql_query($sql, $connect)or die(mysql_error());
$cnt= mysql_num_rows($result);
echo $cnt, ","; //plCnt

for ($i=0; $i < $cnt; $i++){
    mysql_data_seek($result, $i);
    $row = mysql_fetch_array($result);
    echo $row[day_day],",",$row[place], ",", $row[pl_num], ",",$row[pl_tit], ",",$row[pl_pic],",",$row[pl_txt],",",$row[pl_rod],",",$row[money],",";
}

//

for ($i=0; $i < $dayCnt; $i++){
$sql = "SELECT * FROM day WHERE code='$code' ORDER BY day_day ASC";
$result = mysql_query($sql, $connect)or die(mysql_error());
mysql_data_seek($result, $i);
$row = mysql_fetch_array($result);
echo $row[day_y],",", $row[day_m],",", $row[day_d], ",", $row[day_day],",";
// y, m, d , day
}

?>
