<?php
require_once 'dbconfig.php';

session_start();
$userid = $_SESSION['userid'];
if(empty($id)) die ("ID IS NULL");

extract($_POST);
if(isset($_POST)){
  $sql = "SELECT MAX(code) AS code FROM travel";
  $result = mysql_query($sql, $connect)or die(mysql_error());
  $row = mysql_fetch_array($result);
  $code = $row[code]+1;

  $sql = "INSERT INTO travel (id,country, code, start_y, start_m, start_d, end_y, end_m, end_d, total_money) VALUES ('".$userid."','".$getWhere."','".$code."','".$deYear."','".$deMonth."','".$deDay."','".$arYear."','".$arMonth."','".$arDay."', 0)";
  $result = mysql_query($sql, $connect);

  if($result)
    require_once 'day_insert_.php';
  else
    die(mysql_error());
  echo $code; //코드 번호 꼭 넘겨야주야함
}

?>
