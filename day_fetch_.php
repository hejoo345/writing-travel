<?php
require_once 'dbconfig.php';

session_start();
$userid = $_SESSION['userid'];
if(empty($userid)) die("ID IS NULL");

$code = $_POST['code'];
if(empty($code)) die("CODE IS NULL");

#

$data = array();

$sql = "SELECT * FROM day WHERE code = '$code' ORDER BY day_day ASC";
$result = mysql_query($sql, $connect)or die(mysql_error());
$dayCnt = mysql_num_rows($result);
$data['dayCnt'] = $dayCnt;

for ($i=0; $i < $dayCnt; $i++){
  mysql_data_seek($result, $i);
  $row = mysql_fetch_array($result);
  $data[$i]['day_y'] = $row[day_y];
  $data[$i]['day_m'] = $row[day_m];
  $data[$i]['day_d'] = $row[day_d];
  $data[$i]['day_day'] = $row[day_day];

  //echo $row[day_y],",",$row[day_m], ",", $row[day_d], ",",$row[day_day], ",";
}

echo json_encode($data);
?>
