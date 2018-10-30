<?php
$json = file_get_contents('process/cryptodata.json');
$data = json_decode($json, TRUE); //decodes in associative array
$ar = $data['posts'];
$cnt = 0;// 'SpectreCoin' ||'SumoKoin' || 'DeepOnion' || 'Grin' || 'Aeon' || 'Pure' || 'Aion' || 'Zencash' || 'Prime-XI'
for ($i=0; $i<100; $i++){
	if ($cnt < 10 && ($ar[$i]['name'] == 'Monero' || $ar[$i]['name'] == 'Dash' || $ar[$i]['name'] == 'Verge' || $ar[$i]['name'] == 'PIVX' || $ar[$i]['name'] == 'Zcash' || $ar[$i]['name'] == 'NavCoin' || $ar[$i]['name'] == 'Electroneum' || $ar[$i]['name'] == 'Enigma' || $ar[$i]['name'] == 'Hcash' || $ar[$i]['name'] == 'Digital Note' || $ar[$i]['name'] == 'Shield' || $ar[$i]['name'] == 'Particl' || $ar[$i]['name'] == 'SagaCoin' || $ar[$i]['name'] == 'CloakCoin' || $ar[$i]['name'] == 'Zcoin' || $ar[$i]['name'] == 'Karbo' || $ar[$i]['name'] == 'InnovaCoin' || $ar[$i]['name'] == 'Zoin' || $ar[$i]['name'] == 'Phore' || $ar[$i]['name'] == 'Pura' || $ar[$i]['name'] == 'Bytecoin' || $ar[$i]['name'] == 'SolarisCoin' || $ar[$i]['name'] == 'Obsidian' || $ar[$i]['name'] == 'Komodo' || $ar[$i]['name'] == 'StealthCoin' || $ar[$i]['name'] == 'Hush' || $ar[$i]['name'] == 'Crave Project' || $ar[$i]['name'] == 'Bulwark')){
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