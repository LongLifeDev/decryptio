<?php
    require '../config/config.php';
    require '../functions/newsfunctions.php';
    $html = "";
	
    
		
	
	$url1 = "http://cryptscout.com/cryptocurrency-news-rss.php";
	$xml1 = simplexml_load_file($url1);
	
	for($i=0;$i<15;$i++){
		$title = $xml1->channel->item[$i]->title;
		$date = date('y-m-d h:i:s',strtotime($xml1->channel->item[$i]->pubDate));
		$author = $xml1->channel->item[$i]->creator;
		$link = $xml1->channel->item[$i]->link;
        
		//$html = $html."<h3>$title</h3><h5>$date</h5><h4>$description</h4><h5>$link</h5><p>$striped</p><hr />";
		$nwschk1 = connect_to_db()->prepare("SELECT * FROM news WHERE news_title = :title");
		$nwschk1->bindParam(':title', $title);
		$nwschk1->execute();
		if($nwschk1->rowCount() > 0){
			
		} else {
			$insrtdb = connect_to_db()->prepare("INSERT INTO news(news_title, news_author, news_published_on, link) VALUES (:title,:author,:date,:link)");
			$insrtdb->bindParam(':title', $title);
			$insrtdb->bindParam(':author', $author);
			$insrtdb->bindParam(':date', $date);
			$insrtdb->bindParam(':link', $link);
			$insrtdb->execute();
		}
    }
	
	
header('Location: new_up_3.php');
?>