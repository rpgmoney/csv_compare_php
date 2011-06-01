<?php
header("Content-type: text/html; charset=utf-8");
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
setlocale(LC_ALL, 'en_US.UTF-8');
// big5
//setlocale(LC_ALL, 'zh_TW.BIG5');


$file = "data1_2_1_import.csv";
$fp = fopen("$file","r");
$rows = 0;
while(($ar = fgetcsv($fp, 1000, ","))!=false) {
  if ($rows!=0) {
    foreach($ar as $k=>$v) {
      $d['data'][$rows][$d['field'][$k]] = $v;
    }
  } else {
    foreach($ar as $k=>$v) {
      $d['field'][$k] = $v;
    }
  }
  $rows++;
}

echo "<pre>";
print_r($d);
echo "</pre>";

?>
