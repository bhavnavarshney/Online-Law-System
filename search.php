<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Search Law</title>
</head>

<body>
<style>
 .speech {border: 1px solid #DDD; width: 300px; padding: 0; margin: 0}
  .speech input {border: 0; width: 240px; display: inline-block; height: 30px;}
  .speech img {float: right; width: 40px }
.loginsetting{
	padding-right:2%;
	padding-left:2%;
	font-family: "Times new Roman";
	font-style: bold;
	font-size : 12pt;
}
.brander{
	padding-top : 1%;
	padding-left : 350px;
	font-family: "Times new Roman";
	font-style: bold-italic;
	font-size : 40px;
	
	}
</style>
<div class="container">
<div class="row">

<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
		 <table><tr> <td>
		 
		  <img  src="/images/logo.jpg" class="img-thumbnail">  </td> 
		

		<td> <div class="brander"> <h1><span class = "navbar-center label label-primary"><b> ONLINE LAW SYSTEM </b> </span>	</h1> </div> </td>
		</tr> </table></div> 
		
</div> 
</nav>
</div>
<div class="row">
<div class="col-sm-2 sidenav">

      <p><a href="index.php">Home</a></p>
      <p><a href="SignUp.php">Sign Up</a></p>
      <p><a href="lodge.php">Lodge Complain</a></p>
	  <p><a href="#"> Search for Law </a> </p>
	  <p><a href="feedback.php">Feedback</a></p>
	  
    </div>

<div class="col-sm-8">	
<br><center><h3> Search For Laws  </h3> <br>
<img src="/images/law.jpg" class="img-circle" width="150" height="150"> <br><br><br></center>
<script>

  function startDictation() {

    if (window.hasOwnProperty('webkitSpeechRecognition')) {

      var recognition = new webkitSpeechRecognition();

      recognition.continuous = false;
      recognition.interimResults = false;

      recognition.lang = "en-US";
      recognition.start();

      recognition.onresult = function(e) {
        document.getElementById('transcript').value
                                 = e.results[0][0].transcript;
        recognition.stop();
        document.getElementById('labnol').submit();
      };

      recognition.onerror = function(e) {
        recognition.stop();
      }

    }
  }

function showResult(str) {
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","searchlaw.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
<body>

<!--<form>
<input class="form-control" type="text" size="30" onkeyup="showResult(this.value)">
<div id="livesearch"></div>
</form>
-->

<center>
<form id="labnol" method="get" action="https://www.google.com/search">
  <div class="speech">
   <input type="text" name="q" id="transcript" placeholder="Speak" />
    <img onclick="startDictation()" src="/images/mic.jpg" />
     
  </div> </center>
</form>
</div>
	
</div>
</body>
</html>