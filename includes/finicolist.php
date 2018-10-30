<?php
$json = file_get_contents('process/finicodata.json');
$data = json_decode($json, TRUE); //decodes in associative array
$ar = $data['ico'];
$i = 106;
while (!empty($ar['finished'][$i])){
	$name = $ar['finished'][$i]['name'];
    $image = $ar['finished'][$i]['image'];
    $description = $ar['finished'][$i]['description'];
    $website_link = $ar['finished'][$i]['website_link'];
    $icowatchlist_url = $ar['finished'][$i]['icowatchlist_url'];
    $start_time = $ar['finished'][$i]['start_time'];
    $end_time = $ar['finished'][$i]['end_time'];
    $timezone = $ar['finished'][$i]['timezone'];	
								  
    $godat = "cryptodata/icodat.php?keyword=".$name."&keywrd=ICO&jsn=finished";
    echo "<img src='".$image."' width='20%' style='background-color:#f2f2f2;margin: 0% 0% 1% 1%'></img><a href='".$godat."' style='color:gold' target='_blank'> ".$name." <span style='color:white'> :".$description."</span></a></br>";
	$i = $i + 1;					  
}	
    
	

?>