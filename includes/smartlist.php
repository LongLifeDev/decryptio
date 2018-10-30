<?php
$json = file_get_contents('process/cryptodata.json');
$data = json_decode($json, TRUE); //decodes in associative array
$ar = $data['posts'];
$cnt = 0;// 'SpectreCoin' ||'SumoKoin' || 'DeepOnion' || 'Grin' || 'Aeon' || 'Pure' || 'Aion' || 'Zencash' || 'Prime-XI'
for ($i=0; $i<100; $i++){
	if ($cnt < 10 && ($ar[$i]['name'] == 'Ethereum' || $ar[$i]['name'] == 'Ethereum Classic' || $ar[$i]['name'] == 'NEO' || $ar[$i]['name'] == 'Stratis' || $ar[$i]['name'] == 'Lisk' || $ar[$i]['name'] == 'EOS' || $ar[$i]['name'] == 'Waves' || $ar[$i]['name'] == 'ChainLink' || $ar[$i]['name'] == 'Cardano' || $ar[$i]['name'] == 'Qtum' || $ar[$i]['name'] == 'NEM' || $ar[$i]['name'] == ' iOlite' || $ar[$i]['name'] == 'Neblio' || $ar[$i]['name'] == 'Hyperledger Fabric' || $ar[$i]['name'] == 'DFINITY' || $ar[$i]['name'] == 'Exonum' || $ar[$i]['name'] == 'NXT' || $ar[$i]['name'] == 'quorum' || $ar[$i]['name'] == 'Radix' || $ar[$i]['name'] == 'Rootstock' || $ar[$i]['name'] == 'Tezos' || $ar[$i]['name'] == 'Ubiq' || $ar[$i]['name'] == 'Urbit' || $ar[$i]['name'] == 'ICON')){
    $coin = $ar[$i]['coin'];
	$name = $ar[$i]['name'];
	$symbol = $ar[$i]['symbol'];
	$rank = $ar[$i]['rank'];
    $price_usd = $ar[$i]['price_usd'];
	$price_btc = $ar[$i]['price_btc'];
	$percent_change_24h = $ar[$i]['percent_change_24h'];
	$clr = $ar[$i]['prusd'];
	$ImageUrl = $ar[$i]['ImageUrl'];
	$godat = "cryptodata/coindat.php?nmx=".$name."&keyword=".$coin."&keywrd=".$symbol;
	echo "<span style='color:white;margin: 0% 1% 0% 0%'> ".$rank."</span><img style='width: 32px;margin: .5% 1.5% 0% 0%' float='center' src = 'https://www.cryptocompare.com".$ImageUrl."'></img><a href='".$godat."' style='color:gold;margin: 0% 3% 0% 0%' target='_blank'> ".$name." <span style='color:white;margin: 0% 3% 0% 0%'> ".$symbol."</span><span style='color:lightblue'></span><span style='color:".$clr.";margin: 0% 0% 0% 0%'>$".$price_usd."</span></a><br />";
    echo "<a href='".$godat."' style='color:gold;margin: 0% 0% 5% 5%' target='_blank'> -<span style='color:lightblue'> btc </span><span style='color:white;margin: 0px 9px 0px 0px'>".$price_btc."</span><span style='color:lightblue'>24hCh. </span><span style='color:white;margin: 0px 9px 0px 0px'>".$percent_change_24h."%</span></a><br />";
	$cnt=$cnt+1;
    }
}
?> 