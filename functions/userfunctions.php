<?php 
    function fetchUser($conn, $kw){
		$request = $conn->prepare(" SELECT crypto1, crypto2, crypto3, crypto4, crypto5, crypto6, crypto7, crypto8, crypto9, crypto10, crypto11, crypto12, crypto13, crypto14, crypto15, keyword1, keyword2, keyword3, keyword4 FROM users WHERE username = :keyword");
		$request->bindParam(':keyword', $kw);
		$request->execute();
		$results = $request->fetch(PDO::FETCH_ASSOC);
        return $results; 
	}
	
	function fetchNews($conn){
        $request = $conn->prepare(" SELECT news_id, news_title, news_short_description, news_author, web_link, news_published_on FROM news ORDER BY news_published_on DESC LIMIT 80");
        return $request->execute() ? $request->fetchAll() : false; 
    }
	
	function fetchKeyword($conn, $kw1, $kw2, $kw3, $kw4){
		$request = $conn->prepare(" SELECT * FROM news WHERE news_title LIKE :keyword1 OR news_title LIKE :keyword2 OR news_title LIKE :keyword3 OR news_title LIKE :keyword4 ORDER BY news_published_on DESC LIMIT 18");
		$kw1 = "%".$kw1."%";
		$kw2 = "%".$kw2."%";
		$kw3 = "%".$kw3."%";
		$kw4 = "%".$kw4."%";	
		$request->bindParam(':keyword1', $kw1);
		$request->bindParam(':keyword2', $kw2);
		$request->bindParam(':keyword3', $kw3);
		$request->bindParam(':keyword4', $kw4);
        return $request->execute() ? $request->fetchAll() : false; 
	}
	
	function insertKyword($conn, $kw, $kw2){
		$request = $conn->prepare("UPDATE users SET ".$field." = :coin WHERE username = :user");
		$kw = "%".$kw."%";
		$kw2 = $kw2."%";
		$request->bindParam(':keyword', $kw);
		$request->bindParam(':keywrd', $kw2);
        return $request->execute() ? $request->fetchAll() : false; 
	}
	
	function fetchDate($conn, $st, $ed){
		$request = $conn->prepare(" SELECT * FROM news WHERE news_published_on BETWEEN :start AND :end ORDER BY news_published_on DESC");
		$request->bindParam(':start', $st);
		$request->bindParam(':end', $ed);
        return $request->execute() ? $request->fetchAll() : false; 
	}
	
	

    function getAnArticle( $id_article, $conn ){
        $request =  $conn->prepare(" SELECT news_id, news_title, news_full_content, news_author, news_published_on FROM news WHERE news_id = ? ");
        return $request->execute(array($id_article)) ? $request->fetchAll() : false; 
    }

    function getOtherArticles( $differ_id, $conn ){
        $request =  $conn->prepare(" SELECT news_id, news_title, news_short_description, news_full_content, news_author, news_published_on FROM news WHERE news_id != ? ORDER BY news_published_on DESC LIMIT 15 ");
        return $request->execute(array($differ_id)) ? $request->fetchAll() : false; 
    }
?>