<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Online Law System</title>
<meta name="title" content="Online law System">
<meta name="description" content="The site which creates transparency between users and government. Allows users to lodge complain directly to government officials and can search various laws.">
<meta name="keywords" content="search law justice">
<meta name="robots" content="index, follow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="English">
<meta name="revisit-after" content="5 days">
<meta name="author" content="Bhavna Varshney">
</head>

<body>
<style>
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
<div class="col-sm-8"
<nav class="navbar navbar-inverse">
	
		<div class="navbar-header">
		 <table><tr> <td>
		 
		  <img  src="/images/logo.jpg" class="img-thumbnail" alt="logo">  </td> 
		

		<td> <div class="brander"> <h1><span class = "navbar-center label label-primary"><b> ONLINE LAW SYSTEM </b> </span>	</h1> </div> </td>
		</tr> </table> 
		</div>
</div> 
</nav>
</div>

<div class="row">
<div class="col-sm-1 sidenav">

      <h4><p><a href="index.php">Home</a></p></h4>
      <p><a href="SignUp.php">Sign Up</a></p>
      <p><a href="lodge.php">Lodge Complain</a></p>
	  <p><a href="search.php"> Search for Law </a> </p>
	  <p><a href="feedback.php">Feedback</a></p>
	  
    </div>

<div class="col-sm-9">
<div id="homepage" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
	<li data-tarPOST="#homepage" data-slide-to="0" class="active"> </li>
	<li data-tarPOST="#homepage" data-slide-to="1"> </li>
	<li data-tarPOST="#homepage" data-slide-to="2"> </li>
	
</ol>

<div class="carousel-inner">
	<div class="item active">
		<img src="/images/1img.jpg" alt="img1" class="img-rounded" width="1500px" height="500px">
	</div>
	
	<div class="item">
		<img src="/images/2img.jpg" alt="img2" class="img-rounded" width="1500px" height="500px">
	</div>
	
	<div class="item">
		<img src="/images/3img.jpg" alt="img3" class="img-rounded" width="1500px" height="500px">
	</div>
	
	<a class="left carousel-control" href="#homepage" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"> </span>
		<span class="sr-only"> Previous </span>
	</a>
	<a class="right carousel-control" href="#homepage" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"> </span>
		<span class="sr-only"> Next </span>
	</a>
	
</div>
</div> </div>
<div class="col-sm-2">
<div style="background-color:black;color:white;" class="loginsetting"> 
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"> <br><center> 
<h2><label for="lg">Login  </label>  </center> <br></h2>
    <div class="form-group">
<h3><center> <label for "u"> Username : </label></center> <input type="text" class="form-control" name="user" size="15"></h3> </div> 
<div class="form-group">
<h3><center> <label for="p">Password : </label></center><input type="password" class="form-control" name="pwd" size="15"></div></h3>
    <br><br>
<h5><center> <font color="black"> <input class="btn btn-default" type="Submit" value="Submit"></font></center> <br></h5>
</form> 
 </div> </div></div>
   </div>
     
<br><br>
    
    <!-- /.container -->

    <!-- Footer -->
	
   <h6> <footer class="nav navbar-inverse">
     <div class="container"> 
       <center> <p style="color:white;">Copyright &copy; 2017 Online Law System - Designed By Bhavna Varshney </p> </center>
    </div> </footer> </h6>
    
    

 <?php
 if($_SERVER['REQUEST_METHOD']=="POST"){
 $flag=0;
 $conn = mysqli_connect("localhost","id3343021_bhavna","bhavna1234","id3343021_ols");
 if(!$conn){
	 echo "Connection failed";
	 }
else{
	$sql = "Select * from govt";
	if($result = mysqli_query($conn,$sql)){
	
	if (mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			if($row['Username']==$_POST['user'] && $row['Password']==$_POST['pwd']){
			    
				$flag=1;
				echo '<script type="text/javascript" language="javascript"> 
						window.open("Welcome.php"); 
						</script>'; 
				
				
			}
		}
	}
    if($flag==0){
        echo '<span class="label label-danger">Wrong credentials</span>';
    }	
}
else{
    echo "Query error : ";
}
}
 }
 ?>
</body></html>