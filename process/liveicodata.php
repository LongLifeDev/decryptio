<?php
$response = array();
$liveico = array();
$json = file_get_contents('https://api.icowatchlist.com/public/v1/live');
$data = json_decode($json); //decodes in associative array

$response = $data;

$fp = fopen('liveicodata.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);
header('Location:../index.php');