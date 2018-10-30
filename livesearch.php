<?php
$json = file_get_contents('process/cryptodata.json');
$data = json_decode($json, TRUE); //decodes in associative array	
$ar = $data['posts'];

//get the q parameter from URL
$q = filter_var($_GET["q"], FILTER_SANITIZE_STRING);
//lookup all links from the xml file if length of q>0
if (strlen($q)>0) {
  $hint="";
  for($i=0; $i<180; $i++) {
    $y=substr(strtolower($ar[$i]['name']),0);
    $y2=substr($y,0,strlen($q));
      //find a link matching the search text
      if (stristr($y2,$q)) {
        if ($hint=="") {
		  $godat = "cryptodata/coindat.php?nmx=".$ar[$i]['name']."&keyword=".$ar[$i]['coin']."&keywrd=".$ar[$i]['symbol'];
          $hint="<a href='".$godat."' target='_blank' style='margin: 0% 2.5% 0% 2.5%;color:white;text-align:center'>". 
          $y."</a>";
		  $i=180;
          
        } else {
          $hint=$hint;
        }
      }
    
  }
}

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") {
  $response="no suggestion";
} else {
  $response=$hint;
}

//output the response
echo $response;
?>