<?php
$json = file_get_contents('process/liveicodata.json');
$data = json_decode($json, TRUE); //decodes in associative array
$ar = $data['ico'];
$i = 0;
while (!empty($ar['live'][$i])){
	$name = $ar['live'][$i]['name'];
    $image = $ar['live'][$i]['image'];
    $description = $ar['live'][$i]['description'];
    $website_link = $ar['live'][$i]['website_link'];
    $icowatchlist_url = $ar['live'][$i]['icowatchlist_url'];
    $start_time = $ar['live'][$i]['start_time'];
    $end_time = $ar['live'][$i]['end_time'];
    $timezone = $ar['live'][$i]['timezone'];	
								  
    $godat = "cryptodata/icodat.php?keyword=".$name."&keywrd=ICO&jsn=live";
    echo "<img src='".$image."' width='20%' style='background-color:#f2f2f2;margin: 0% 0% 1% 1%'></img><a href='".$godat."' style='color:gold' target='_blank'> ".$name." <span style='color:white'> :".$description."</span></a></br>";
	$i = $i + 1;					  
}	
    
	

?>