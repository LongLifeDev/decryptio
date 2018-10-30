<?php
$response = array();
$posts = array();
//$slug = 'ethereum';  find all at https://files.coinmarketcap.com/generated/search/quick_search.json
//$tick = file_get_contents('https://api.coinmarketcap.com/v1/ticker/?limit=40');
//$url = $tick;
//echo $url;
$jsonx = file_get_contents('cryptodata.json');
$datax = json_decode($jsonx, TRUE); //decodes in associative array
$ar = $datax['posts'];
for ($i=0; $i<1; $i++){
    $name = $ar[$i]['name'];
	$json = file_get_contents('https://en.wikipedia.org/w/api.php?action=query&prop=revisions&rvprop=content&format=json&redirects=1&titles='.$name.'');
	//$json = file_get_contents('http://en.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&exlimit=max&explaintext&exintro&titles='.$name.'&redirects=');
    $data = json_decode($json, TRUE); //decodes in associative array
    $posts[] = array('id'=> $data);
}

$response['posts'] = $posts;

$fp = fopen('cryptowiki.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);
//http://en.wikipedia.org/w/api.php?action=query&prop=revisions&rvprop=content&format=jsonfm&formatversion=2&titles=Main%20Page
//http://en.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&exlimit=max&explaintext&exintro&titles=Yahoo|Google&redirects=