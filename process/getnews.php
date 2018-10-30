<?php
require '../config/config.php';
require '../functions/newsfunctions.php';
$html = "";
$response = array();
$coins = array();

$json = file_get_contents('https://min-api.cryptocompare.com/data/news/?feeds=cryptocompare,cointelegraph,coindesk');
$data = json_decode($json);


for($i=0;$i<50;$i++){
    $title = $data[$i]->title;
    $published_on = date("Y-m-d\TH:i:s\Z",($data[$i]->published_on));
    $source = $data[$i]->source;
    $body = $data[$i]->body;
    $url = $data[$i]->url;
    $imageurl = $data[$i]->imageurl;
    $tags = $data[$i]->tags;
        
	$nwschk = connect_to_db()->prepare("SELECT * FROM news WHERE news_title = :title");
	$nwschk->bindParam(':title', $title);
	$nwschk->execute();
	
		if($nwschk->rowCount() > 0){
			
		} else {
			$insrtdb = connect_to_db()->prepare("INSERT INTO news(news_title, news_short_description, source, news_published_on, web_link, image_url, tags) VALUES (:title,:short,:source,:date,:link,:image,:tags)");
			$insrtdb->bindParam(':title', $title);
			$insrtdb->bindParam(':short', $body);
			$insrtdb->bindParam(':source', $source);
			$insrtdb->bindParam(':date', $published_on);
			$insrtdb->bindParam(':link', $url);
			$insrtdb->bindParam(':image', $imageurl);			
			$insrtdb->bindParam(':tags', $tags);
			
			$insrtdb->execute();	
		}
	}	
		
header('Location: ../index.php');
?>