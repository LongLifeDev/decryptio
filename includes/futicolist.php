<?php
$json = file_get_contents('process/futicodata.json');
$data = json_decode($json, TRUE); //decodes in associative array
$ar = $data['ico'];
$i = 0;
while (!empty($ar['upcoming'][$i])){
	$name = $ar['upcoming'][$i]['name'];
    $image = $ar['upcoming'][$i]['image'];
    $description = $ar['upcoming'][$i]['description'];
    $website_link = $ar['upcoming'][$i]['website_link'];
    $icowatchlist_url = $ar['upcoming'][$i]['icowatchlist_url'];
    $start_time = $ar['upcoming'][$i]['start_time'];
    $end_time = $ar['upcoming'][$i]['end_time'];
    $timezone = $ar['upcoming'][$i]['timezone'];	
								  
    $godat = "cryptodata/icodat.php?keyword=".$name."&keywrd=ICO&jsn=upcoming";
    echo "<img src='".$image."' width='20%' style='background-color:#f2f2f2;margin: 0% 0% 1% 1%'></img><a href='".$godat."' style='color:gold' target='_blank'> ".$name." <span style='color:white'> :".$description."</span></a></br>";
	$i = $i + 1;					  
}	
    
	

?>