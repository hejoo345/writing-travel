<?php
require_once 'dbconfig.php';
$data = array();
session_start();
$userid = "z";
if(empty($userid)) die ("ID IS NULL");

$username = "되니?name";
if(empty($userid)) die ("NAME IS NULL");
$data['username']  = $username;

$sql = "SELECT * FROM travel WHERE id='$userid'";
$result = mysql_query($sql, $connect)or die(mysql_error());
$total_record = mysql_num_rows($result);
$data['travelCnt'] = $total_record;

for ($i=0; $i < $total_record; $i++){
  mysql_data_seek($result, $i);
  $row = mysql_fetch_array($result);
  $data[$i]['country']=$row[country];
  $data[$i]['code']=$row[code];

  $data[$i]['start_y']=$row[start_y];
  $data[$i]['start_m']=$row[start_m];
  $data[$i]['start_d']=$row[start_d];

  $data[$i]['end_y']=$row[end_y];
  $data[$i]['end_m']=$row[end_m];
  $data[$i]['end_d']=$row[end_d];


    //echo $row[country],",",$row[code], ",", $row[start_y], ",",$row[start_m], ",",$row[start_d], ",",$row[end_y], ",",$row[end_m], ",",$row[end_d],",";
  }


echo json_encode($data); // 무슨 용도인지 모름.. 일단 블로그 따라 친다 ㅋ
?>
