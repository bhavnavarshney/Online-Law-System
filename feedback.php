<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Feedback</title>
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
		 
		  <img  src="/images/logo.jpg" class="img-thumbnail">  </td> 
		

		<td> <div class="brander"> <h1><span class = "navbar-center label label-primary"><b> ONLINE LAW SYSTEM </b> </span>	</h1> </div> </td>
		</tr> </table> 
		</div>
</div> 
</nav>
</div>

<div class="row">
<div class="col-sm-1 sidenav">

      <p><a href="index.php">Home</a></p>
      <p><a href="SignUp.php">Sign Up</a></p>
      <p><a href="lodge.php">Lodge Complain</a></p>
	  <p><a href="search.php"> Search for Law </a> </p>
	  <p><a href="feedback.php">Feedback</a></p>
	  
    </div>
<div class="col-sm-8">
<form name="feedback" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"><br>
<h3></h3><span class="label label-primary"> Enter the complain number once action has been taken!</span></h3>
<h3></h3><span class="label label-info"> (Check your mail to get the complain number) </span></h3>
<br><br><br><input class="form-control" name="nos" type="number" size="10"><br><br><br>
<center><input class="btn btn-primary" type="submit" value="Submit"></center>
</form>

</div>
</div>
</div>
<?php
    if($_SERVER["REQUEST_METHOD"]=='POST'){
    $cno = $_POST['nos'];
   
     $conn = mysqli_connect("localhost","id3343021_bhavna","bhavna1234","id3343021_ols");
     if(!$conn){
	 echo "Connection failed";
	 }
	 else{
	    $sql = "DELETE FROM complains WHERE CPID='$cno'";
	     
        if (mysqli_query($conn, $sql)) {
        echo '<br><center> <span class="label label-success">Thanks for your feedback!</span></center>';
        } else {
            echo '<br><center><span class="label label-danger">Deletion Error!</span></center>';
        }

            mysqli_close($conn);
	 }
    }
?>

	
    
</body>
</html>