<?php
$json = file_get_contents('process/liveicodata.json');
$data = json_decode($json, true); //decodes in associative array
$ar = $data['ico'];
for ($i=0; $i<8; $i++){
$name = $ar['live'][$i]['name'];
$image = $ar['live'][$i]['image'];
$description = $ar['live'][$i]['description'];
	$godat = "cryptodata/icodat.php?keyword=".$name."&keywrd=ICO&jsn=live";
    echo "<img src='".$image."' width='35%' style='background-color:#f2f2f2;margin-left:1%'></img><a href='".$godat."' style='color:gold;text-align:right;margin: 0% 0% 0% 1%' target='_blank'> ".$name.": </a><br /><div style='margin-bottom:.1%;font-family: Georgia, Times New Roman;color:white'> -<i>".$description."</i></div></br>";
}
?>