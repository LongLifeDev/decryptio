<script> 
function runScript(e) {
    if (e.keyCode == 13) {
        setMssg()
        return false;
    }
}
</script>
<script>  
    
	function ajax(){	
		var req;
		try{
            // Opera 8.0+, Firefox, Safari, Chrome 
            req = new XMLHttpRequest();
        }catch (e){
            // Internet Explorer Browsers
            try{
                req = new ActiveXObject("Msxml2.XMLHTTP");
            }catch (e){
                try{
                    req = new ActiveXObject("Microsoft.XMLHTTP");
                }catch (e){
                    // Something went wrong
                    alert("Your browser broke!");
                    return false;
                }
            }
        }
		req.onreadystatechange = function(){
		    if(req.readyState == 4 && req.status == 200){
		        document.getElementById('chat').innerHTML = req.responseText;
						
		    } 
		}
		req.open('GET','process/chatprocess.php',true); 
		req.send();
	}
	setInterval(function(){ajax()},3000);
</script>
<script>
	function setMssg(){	    
		var areq;
		areq=new XMLHttpRequest();
		var mssg = document.getElementById('mes').value;
        var params = "message=" + mssg;
		if (areq.readyState == 4 || areq.readyState == 0){
        areq.open("POST", "process/chatprocess.php");
        areq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		
          
			areq.send(params);
			document.getElementById('mes').value="";
			var sendWav = new Audio();
			sendWav.volume = .2;
			sendWav.src = 'chat.wav';
			sendWav.play();	
        }			
	}
</script> 


    <div style="font-size:1em">
        <span id="chat"></span>             
    </div>
    <br />             

    <?php if(isset($_GET['error'])) : ?>
    <div class="error"><?php echo $_GET['error']; ?></div>
    <?php endif; ?>
	<div class="text-center">
    <input type="text" name="message" style="color:black" id="mes" size="30" onkeypress="return runScript(event)" placeholder="Enter A Message"/>
    <button type="button" class="" style="color:darkgrey; margin: 10px 0px 0px 0px" onclick="setMssg()">Send Message</button> 
    </div>    


