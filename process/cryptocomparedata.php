<?php
$response = array();
$coins = array();

$json = file_get_contents('https://min-api.cryptocompare.com/data/histoday?fsym=BTC&tsym=USD&limit=200&aggregate=1&e=CCCAGG');
$data = json_decode($json, true);
//$ar = $data['Data'];
//$time = $ar[0]['time'];

//echo $data['Response'];
//echo $time;


$response = $data;

$fp = fopen('comparedata.json', 'w');
fwrite($fp,json_encode($response));
fclose($fp);
