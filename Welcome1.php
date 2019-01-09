<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Welcome</title>
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
<div class="row"> <div class="nav navbar-default">
<ul class="nav navbar-nav">

      <li> <a href="index.php">Home</a></li>
     <li> <a href="SignUp.php">Sign Up</a></li>
     <li> <a href="lodge.php">Lodge Complain</a></li>
	 <li> <a href="search.php"> Search for Law </a> </li>
	 <li><a href="feedback.php">Feedback</a></li>
	 
    </ul>
</div>
</div> <br><br><br><br>
<div class="col-sm-12">	<center>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"> <br><br>
<input type="number" placeholder="Enter Complain number" class="form-control-group" name="cpid"> <br><br>
<input type="text" placeholder="Enter email id" class="form-control-group" name="email"> <br><br>
<button type="submit" value="Approve" name="Approve" class="btn btn-primary">Approve</button>
<button type="submit" value="Reject" name="Reject" class="btn btn-danger">Reject</button>
</form> </center>
</div>
<?php
	if($_SERVER['REQUEST_METHOD']=="POST"){
	    $e = $_POST["email"];
	    $cpid = $_POST["cpid"];
		if(isset($_POST['Approve'])){
		    
			$subject ="Status of your complain on Online Law System";
			$msg="Your complain has been approved by the Government Officials.Action will be taken within 10-15 days and you will be notified.Please give feedback by providing your complain number when action has been taken. Your Complain number is '$cpid'";
			$status=mail($e,$subject,$msg);
			
			if( $status == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
		}
		if(isset($_POST['Reject'])){
			$subject ="Status of your complain on Online Law System";
			$msg = "I'm sorry your complain has been rejected!";
			$status=mail($e,$subject,$msg);
			if( $status == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
		}
	}
	if(isset($_POST["Logout"])){
		session_destroy();
	}
?>

</body>
</html>