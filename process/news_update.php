<?php
    require '../config/config.php';
    require '../functions/newsfunctions.php';
    $html = "";
	
    
	$url = "https://bitrss.com/rss.xml";
	
	$xml = simplexml_load_file($url);
	
	for($i=0;$i<20;$i++){
		$title = $xml->channel->item[$i]->title;
		$date = date('y-m-d h:i:s',strtotime($xml->channel->item[$i]->pubDate));
		$author = $xml->channel->item[$i]->creator;
		$link = $xml->channel->item[$i]->link;
        
		//$html = $html."<h3>$title</h3><h5>$date</h5><h4>$description</h4><h5>$link</h5><p>$striped</p><hr />";
		$nwschk = connect_to_db()->prepare("SELECT * FROM news WHERE news_title = :title");
		$nwschk->bindParam(':title', $title);
		$nwschk->execute();
		if($nwschk->rowCount() > 0){
			
		} else {
			$insrtdb = connect_to_db()->prepare("INSERT INTO news(news_title, news_author, news_published_on, web_link) VALUES (:title,:author,:date,:link)");
			$insrtdb->bindParam(':title', $title);
			$insrtdb->bindParam(':author', $author);
			$insrtdb->bindParam(':date', $date);
			$insrtdb->bindParam(':link', $link);
			$insrtdb->execute();
		}
	}	
	
	
header('Location: new_up_2.php');
?>