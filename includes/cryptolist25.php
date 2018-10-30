<?php
$json = file_get_contents('process/cryptodata.json');
$data = json_decode($json, TRUE); //decodes in associative array
$ar = $data['posts'];
for ($i=0; $i<25; $i++){
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
	echo "<span style='color:white;margin: 0% 1% 0% 0%'> ".$rank."</span><img style='width: 33px;margin: .5% 1.5% 0% 0%' float='center' src = 'https://www.cryptocompare.com".$ImageUrl."'></img><a href='".$godat."' style='color:gold;margin: 0% 3% 0% 0%' target='_blank'> ".$name." <span style='color:white;margin: 0% 3% 0% 0%'> ".$symbol."</span><span style='color:lightblue'></span><span style='color:".$clr.";margin: 0% 0% 0% 0%'>$".$price_usd."</span></a><br />";
    echo "<a href='".$godat."' style='color:gold;margin: 0% 0% 5% 5%' target='_blank'> -<span style='color:lightblue'> btc </span><span style='color:white;margin: 0px 9px 0px 0px'>".$price_btc."</span><span style='color:lightblue'>24hCh. </span><span style='color:white;margin: 0px 9px 10px 0px'>".$percent_change_24h."%</span></a><br />";
}
?>

