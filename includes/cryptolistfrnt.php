<?php
$json = file_get_contents('process/cryptodata.json');
$data = json_decode($json, TRUE); //decodes in associative array
$ar = $data['posts'];
for ($i=0; $i<20; $i++){
    $coin = $ar[$i]['coin'];
	$name = $ar[$i]['name'];
	$symbol = $ar[$i]['symbol'];
	$rank = $ar[$i]['rank'];
    $price = $ar[$i]['price_usd'];
	$clr = $ar[$i]['prusd'];
	$ImageUrl = $ar[$i]['ImageUrl'];
	$godat = "cryptodata/coindat.php?nmx=".$name."&keyword=".$coin."&keywrd=".$symbol;
    echo "<h3 style='font-size:1.1em;font-family: Avant Garde, Tahoma;color:gold;margin: 0% 1.5% 1.5% 12%'><img style='width: 10%' src = 'https://www.cryptocompare.com".$ImageUrl."'></img><a href='".$godat."' style='color:gold' target='_blank'> ".$name." $<span style='color:".$clr."'>".$price."</span></a></h3>";
}
?>