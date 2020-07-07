<?php

//html에서 통화코드 받아오면, php로 환율 돌려줌
$_ISO4217= $_POST[exchageIdx];//html에서 받아온 통화코드
if(empty($_ISO4217)) die("-1");
/*$holidays = $array(
  //월, 일
  $array(01, 01),
  $array(03, 01),
  $array(05, 05),
  $array(06, 06),
  $array(08, 15),
  $array(10, 03),
  $array(10, 09),
  $array(12, 25)
);//날짜가 매해 바뀌는 설날과 추석은 일단 고려하지 않음 (1~5일은 +5, 25일은 -5)
*/

$myKey='T5T9bO7x2aYuPeOuOfUIgqAOzUi9rrhF';
//'https://www.koreaexim.go.kr/site/program/financial/exchangeJSON?authkey=T5T9bO7x2aYuPeOuOfUIgqAOzUi9rrhF&searchdate=20191108&data=AP01',
$date= date(Ymd);//해당 날짜정보 넣을 변수(년,월,일), 데이트 구하는거 생각해보기 (고려할것->빨간날은 조회불가)
$url='https://www.koreaexim.go.kr/site/program/financial/exchangeJSON?authkey='.$myKey.'&searchdate='.$date.'&data=AP01'.'&cur_unit='.$_ISO4217;
// $data=file_get_contents($url);
// $xml=simplexml_load_string($data);

try{
  $ch = curl_init();
  $header = array('Content-Type: application/json; charset=UTF-8',);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_VERBOSE, true);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request));
  $output = curl_exec($ch);

  if($server_output === false) {
      echo "Error Number:".curl_errno($ch)."\n";
      echo "Error String:".curl_error($ch)."\n";
  }
  curl_close($ch);
} catch ( Exception $e ) {
  echo "error : ".$e->getMessage ();
}
$result_json = json_decode($output);//api의 정보가 '배열'로 담김
echo $result_json;

?>
