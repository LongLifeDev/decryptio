<?php 
    function fetchNewsf($conn){
        $request = $conn->prepare(" SELECT news_id, news_title, news_short_description, news_author, web_link, source, tags, image_url, news_published_on FROM news ORDER BY news_published_on DESC LIMIT 6");
        return $request->execute() ? $request->fetchAll() : false; 
    }
	
	function fetchNews2($conn){
        $request = $conn->prepare(" SELECT news_id, news_title, news_short_description, news_author, web_link, source, tags, image_url, news_published_on FROM news ORDER BY news_published_on DESC LIMIT 12");
        return $request->execute() ? $request->fetchAll() : false; 
    }
	
	function fetchNews($conn){
        $request = $conn->prepare(" SELECT news_id, news_title, news_short_description, news_author, web_link, source, tags, image_url, news_published_on FROM news ORDER BY news_published_on DESC LIMIT 8");
        return $request->execute() ? $request->fetchAll() : false; 
    }
	
	function fetchKyword2($conn, $kw, $kw2, $kw3){
		$request = $conn->prepare(" SELECT * FROM news WHERE news_title LIKE :keyword OR news_title LIKE :keywrd OR news_short_description LIKE :keyword OR news_short_description LIKE :keywrd OR news_title LIKE :keywd OR news_short_description LIKE :keywd ORDER BY news_published_on DESC LIMIT 12");
		$kw = "%".$kw."%";
		$kw2 = $kw2."%";
		$kw3 = "%".$kw3."%";
		$request->bindParam(':keyword', $kw);
		$request->bindParam(':keywrd', $kw2);
		$request->bindParam(':keywd', $kw3);
        return $request->execute() ? $request->fetchAll() : false; 
	}
	
	function fetchKyword($conn, $kw, $kw2, $kw3){
		$request = $conn->prepare(" SELECT * FROM news WHERE news_title LIKE :keyword OR news_title LIKE :keywrd OR news_short_description LIKE :keyword OR news_short_description LIKE :keywrd OR news_title LIKE :keywd OR news_short_description LIKE :keywd ORDER BY news_published_on DESC LIMIT 8");
		$kw = "%".$kw."%";
		$kw2 = $kw2."%";
		$kw3 = "%".$kw3."%";
		$request->bindParam(':keyword', $kw);
		$request->bindParam(':keywrd', $kw2);
		$request->bindParam(':keywd', $kw3);
        return $request->execute() ? $request->fetchAll() : false; 
	}
	
	function fetchDate($conn, $st, $ed){
		$request = $conn->prepare(" SELECT * FROM news WHERE news_published_on BETWEEN :start AND :end ORDER BY news_published_on DESC");
		$request->bindParam(':start', $st);
		$request->bindParam(':end', $ed);
        return $request->execute() ? $request->fetchAll() : false; 
	}
	
	function fetchDk($conn, $st, $ed, $kw){
		$request = $conn->prepare(" SELECT * FROM news WHERE news_full_content LIKE :keyword AND news_published_on BETWEEN :start AND :end ORDER BY news_published_on DESC");
		$kw = "%".$kw."%";
		$request->bindParam(':keyword', $kw);
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