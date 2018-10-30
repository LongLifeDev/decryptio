<?php
include 'functions/newsfunctions.php';
// get the database handler
$dbh = connect_to_db(); // function created in dbconnect, remember?
// Fetch news
$news = fetchNewsf($dbh);

                
if ( $news && !empty($news) ) :

    foreach ($news as $key => $article) :?>
		<div class="row">
	<div class="col-lg-3 col-md-4 col-xsm-1 col-lg-push-0">
		<div class="container" style='margin: 0% 0% 1.5% 0%;padding: 0% 0% 0% 0%'>
			<img style='width: 100%;margin: 0% 0% 0% 0%;padding: 0% 0% 0% 0%' float='center' src = '<?= $article->image_url; ?>'></img>			
		</div>
	</div>			
	<div class="col-lg-9 col-md-8 col-xsm-11">
		<div class="row">
		    <div class="col-lg-12 col-md-12 col-lg-push-0">
		        <div class="container" style='margin: 0% 0% .5% 0%;padding: 1% 0% 0% 0%'>
					<a class="headline" style="font-family: Avant Garde, Tahoma;color:gold;font-size:1.1em;margin: 0px 0px 0px 0px" href="<?= $article->web_link; ?>" target="_blank"><span class="glyphicon glyphicon-hand-right" style="color:gold;font-size:.8em"></span> <?= stripslashes($article->news_title); ?></a>			
			    </div>
		    </div>			
	    </div>
	    <div class="row">
		    <div class="col-lg-12 col-md-12 col-lg-push-0">
		        <div class="container" style='margin: 0% 0% 1.5% 0%;padding: 0% 0% 0% 0%'>
					<span class="headline" style="font-family: 'Georgia', Times New Roman;color:white;font-size:1em;font-style: italic;margin: 0% 0% 0% 5%;padding: 0% 0% 0% 0%" href="<?= $article->web_link; ?>" target="_blank"><?= stripslashes($article->news_short_description); ?></span>
			    </div>
		    </div>		
	    </div>
	</div>
</div>		
        
    <?php endforeach?>

<?php endif?>  
