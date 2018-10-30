<?php
//include 'functions/newsfunctions.php';
// get the database handler
$dbh = connect_to_db(); // function created in dbconnect, remember?
// Fetch news
$news2 = fetchKyword($dbh, 'Regulation', 'zx', 'Regulator');

                
if ( $news2 && !empty($news2) ) :?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xsm-1 col-lg-push-0" align="center">
		<div class="container" style='margin: 0% 0% 1.5% 0%;padding: 0% 0% 0% 0%'>
			<img style='width: 90%;margin: 0% 0% 0% 0%;padding: 0% 0% 0% 0%' float='center' src = '<?= $news2[0]->image_url; ?>'></img>			
		</div>
	</div>			
	
		
		    <div class="col-lg-12 col-md-12 col-lg-push-0" align="center">
		        <div class="container" style='margin: 0% 0% .5% 0%;padding: 1% 0% 0% 0%'>
					<a class="headline" style="color:gold;font-size:1.1em;margin: 0px 0px 0px 0px" href="<?= $news2[0]->web_link; ?>" target="_blank"><span class="glyphicon glyphicon-hand-right" style="color:gold;font-size:.8em"></span> <?= stripslashes($news2[0]->news_title); ?></a>			
			    </div>
		    			
	    </div>
	    
		    <div class="col-lg-12 col-md-12 col-lg-push-0" align="center">
		        <div class="container" style='margin: 0% 0% 1.5% 0%;padding: 0% 0% 0% 0%'>
					<span class="headline" style="color:white;font-size:.95em;font-style: italic;margin: 0% 0% 0% 5%;padding: 0% 0% 0% 0%" href="<?= $news2[0]->web_link; ?>" target="_blank"><?= stripslashes($news2[0]->news_short_description); ?></span>
			    </div>
		    </div>		
	   
	
</div>	<?php
    foreach ($news2 as $key => $article) :
		if	($article->news_title != $news2[0]->news_title){?>		
        <a class="headline" style="color:gold;font-size:1.1em;margin: 0px 0px 3px 10px" href="<?= $article->web_link; ?>" target="_blank"><span class="glyphicon glyphicon-hand-right" style="color:gold;font-size:.8em"></span> <?= stripslashes($article->news_title); ?></a><br />
		<span class="headline" style="color:white;font-size:.95em;font-style: italic;margin: 0% 0% 0% 5%;padding: 0% 0% 0% 0%"><?= stripslashes($article->news_short_description); ?></span><br />	
		<?php };
    endforeach?>

<?php endif?>  