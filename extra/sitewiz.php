<?php

    for ($i=0;$i<25;$i++){
        $json = file_get_contents('cryptosites'.$i.'.json');
        $data = json_decode($json, TRUE); //decodes in associative array
        $ar = $data['sites']; 
		$x=0;
        while (!empty($ar[$x])){
			$coin = $ar[$x]['coin'];
			$website = $ar[$x]['website'];
            $page[] = array('coin'=> $coin,'website'=> $website);
			$x=$x+1;
		}	
                                        								  
	} 
$response['sites'] = $page;	
$fp = fopen('cryptosites.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);  	
?>