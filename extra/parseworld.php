<?php
$json = file_get_contents('cryptodata.json');
$data = json_decode($json, TRUE); //decodes in associative array
$ar = $data['posts'];
    for ($i=145;$i<150;$i++){
        $name = $ar[$i]['coin'];
		if ($name === "Bitcoin Cash"){
			$name = "bitcoin-cash";
		} else if ($name === "Ethereum Classic") {
			$name = "ethereum-classic";
		} else if ($name === "Bitcoin Gold") {
			$name = "bitcoin-gold";
		} else if ($name === "Binance Coin") {
			$name = "binance-coin";
		} else if ($name === "KuCoin Shares") {
			$name = "kucoin-shares";
		} else if ($name === "Basic Attention Token") {
			$name = "basic-attention-token";
		} else if ($name === "Byteball Bytes") {
			$name = "byteball-bytes";
		} else if ($name === "Kyber Network") {
			$name = "kyber-network";
		} else if ($name === "Power Ledger") {
			$name = "power-ledger";
		} else if ($name === "Request Network") {
			$name = "request-network";
		} else if ($name === "Raiden Network Token") {
			$name = "raiden-network-token";
		} else if ($name === "Santiment Network Token") {
			$name = "santiment-network-token";
		} else if ($name === "Enjin Coin") {
			$name = "enjin-coin";
		} else if ($name === "Po.et") {
			$name = "poet";
		} else if ($name === "iExec RLC") {
			$name = "rlc";
		} else if ($name === "High Performance Blockchain") {
			$name = "high-performance-blockchain";
		} else if ($name === "Time New Bank") {
			$name = "time-new-bank";
		} else if ($name === "Nav Coin") {
			$name = "nav-coin";
		} else if ($name === "Experience Points") {
			$name = "experience-points";
		} else if ($name === "Red Pulse") {
			$name = "red-pulse";
		} else if ($name === "Genesis Vision") {
			$name = "genesis-vision";
		} else if ($name === "Dynamic Trading Rights") {
			$name = "dynamic-trading-rights";
		} else if ($name === "Bytecoin") {
			$name = "bytecoin-bcn";
		}
        $url1 = "https://coinmarketcap.com/currencies/".$name."/";
		$output = file_get_contents($url1);
		$slicefront = strstr($output,'<span class="glyphicon glyphicon-link text-gray" title="Website">');
        $sliceend = strstr($slicefront,'</a>', true);
		$slicefront2 = strstr($sliceend,'https');
        $sliceend2 = strstr($slicefront2,'"', true);
		//$striped = strip_tags($sliceend2);
		$sites[] = array('coin'=> $name,'website'=> $sliceend2 );
		$response['sites'] = $sites;

                                        								  
	}  
$fp = fopen('cryptosites25.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);  	
?>