<?php
$json = file_get_contents('../process/comparedata.json');
$data = json_decode($json, true); //decodes in associative array
$ar = $data['Data'];
for ($i=0; $i<200; $i++){
$time = date("Y-m-d\TH:i:s\Z",($ar[$i]['time']));
$close = $ar[$i]['close'];
$high = $ar[$i]['high'];
$low = $ar[$i]['low'];
$open = $ar[$i]['open'];
$volumefrom = $ar[$i]['volumefrom'];
$volumeto = $ar[$i]['volumeto'];

//echo  $time.' '.$close.' '.$high.' '.$low.' '.$open.' '.$volumefrom.' '.$volumeto.'<br />';	
}
?>
<html>
<head>

<script type="text/javascript">
 function loadJSON(callback) {   

    var xobj = new XMLHttpRequest();
        xobj.overrideMimeType("application/json");
    xobj.open('GET', '../process/comparedata.json', true); // Replace 'my_data' with the path to your file
    xobj.onreadystatechange = function () {
          if (xobj.readyState == 4 && xobj.status == "200") {
            // Required use of an anonymous callback as .open will NOT return a value but simply returns undefined in asynchronous mode
            callback(xobj.responseText);
          }
    };
    xobj.send(null);  
 }

loadJSON(function(response) {
    // Parse JSON string into object
	var actual_JSON = JSON.parse(response);
	var time = actual_JSON['Data'][100].time;
	var date = new Date(time*1000);
// Hours part from the timestamp
var year = date.getFullYear()
var hours = date.getHours();
// Minutes part from the timestamp
var minutes = "0" + date.getMinutes();
// Seconds part from the timestamp
var seconds = "0" + date.getSeconds();
var syear = year.toString();

// Will display time in 10:30:23 format
var formattedTime = hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);
document.getElementById("chartContainer").innerHTML = syear;	
	
 });
 



         
  </script>

</head>
<body>
    <canvas id="myCanvas" style="background: white;"></canvas>
	<legend for="myCanvas"></legend>
    <script type="text/javascript" src="dailyscript.js"></script>
    
  
  </div>
</body>
</html>