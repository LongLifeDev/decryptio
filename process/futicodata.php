<?php
$response = array();
$liveico = array();
$json = file_get_contents('https://api.icowatchlist.com/public/v1/upcoming');
$data = json_decode($json, TRUE); //decodes in associative array

$response = $data;

$fp = fopen('upcomingicodata.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);
header('Location:../index.php');
