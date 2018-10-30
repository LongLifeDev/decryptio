<?php
$response = array();
$posts = array();

$jsoncc = file_get_contents('https://www.cryptocompare.com/api/data/coinlist/');

$datacc = json_decode($jsoncc); 
$jsoncd = file_get_contents('cryptodata.json');
$datacd = json_decode($jsoncd, TRUE); //decodes in associative array
$ar = $datacd['posts'];
$json = file_get_contents('https://api.coinmarketcap.com/v1/ticker/?limit=180');
$data = json_decode($json, TRUE); //decodes in associative array
for ($i=0; $i<180; $i++){
$prusdcd = (float)$ar[$i]['price_usd'];
$coin = $data[$i]['id'];
$name = $data[$i]['name'];
$symbol = $data[$i]['symbol'];
$rank = $data[$i]['rank'];
$pricebtc = $data[$i]['price_btc'];
$priceusd = ((float)$data[$i]['price_usd']);
$twfrvlusd = $data[$i]['24h_volume_usd'];
$marktcapusd = $data[$i]['market_cap_usd'];
$availsup = $data[$i]['available_supply'];
$totsup = $data[$i]['total_supply'];
$perchngh = $data[$i]['percent_change_1h'];
$perchngth = $data[$i]['percent_change_24h'];
$perchngd = $data[$i]['percent_change_7d'];
$blockup = $data[$i]['last_updated'];
if ($symbol == 'MIOTA'){
		$symbol = 'IOT';
	}
if ($symbol == 'NANO'){
		$symbol = 'XRB';
	}

if (!empty($datacc->{'Data'}->$symbol->ImageUrl)){	
$ImageUrl = $datacc->{'Data'}->$symbol->ImageUrl;}
if (!empty($datacc->{'Data'}->$symbol->Algorithm)){
$Algorithm = $datacc->{'Data'}->$symbol->Algorithm;}
if (!empty($datacc->{'Data'}->$symbol->ProofType)){
$ProofType = $datacc->{'Data'}->$symbol->ProofType;}

if ($symbol == 'ETHOS'){
		$ImageUrl ="/media/16404851/ethos.png";
	}
if ($symbol == 'BCO'){
		$ImageUrl ="/media/16746477/bco.png";
	}
	

if ($priceusd > $prusdcd){
	$prusd = "lightgreen";
} else if ($priceusd < $prusdcd){
	$prusd = "#E44D2E";
} else if ($priceusd == $prusdcd){
	$prusd = "white";
}
$posts[] = array('coin'=> $coin, 'name'=> $name, 'symbol'=> $symbol, 'rank'=> $rank, 'price_btc'=> $pricebtc,'price_usd'=> $priceusd, '24h_volume_usd'=> $twfrvlusd, 'market_cap_usd'=> $marktcapusd, 'available_supply'=> $availsup, 'total_supply'=> $totsup, 'percent_change_1h'=> $perchngh, 'percent_change_24h'=> $perchngth, 'percent_change_7d'=> $perchngd, 'last_updated'=> $blockup, 'prusd'=> $prusd, 'ImageUrl'=> $ImageUrl, 'Algorithm'=> $Algorithm, 'ProofType'=> $ProofType);




}
$response['posts'] = $posts;
$fp = fopen('cryptodata.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);


header('Location: ../index.php');
?>

