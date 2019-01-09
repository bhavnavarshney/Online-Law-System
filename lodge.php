<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Complain Form</title>
</head>

<body>
<?php
	$aadharerr=$prooferr=$inchargeerr= $gtcerr=$gcerr=$votererr=$gnameerr=$gemailerr=$gpwderr=$gpnoerr=$gusererr="";
	$aadhar=$cmp=$complain=$proof=$voter=$inc=$gname=$guser=$gpwd=$gpno=$gemail="";
	$flag=0;
if($_SERVER["REQUEST_METHOD"]=="POST"){
	
	
	if(empty($_POST['aadhar'])){
		$aadharerr="Aadhar id is required";
	}
	else{
		$aadhar = valid($_POST['aadhar']);
		if(preg_match('/^[a-zA-Z0-9]{4}\s[a-zA-Z0-9]{4}\s[a-zA-Z0-9]{4}$/',$aadhar)){
			$flag++;
		}
		else{
			$aadharerr = "Invalid aadhar id - Note : Enter space after every 4 characters!";
		}
	}
	if(empty($_POST['voter'])){
		$votererr="Voter id is required";
	}
	else{
		$voter = valid($_POST['voter']);
		if(preg_match('/^[a-zA-Z0-9]{10}$/',$voter)){
			$flag++;
		}
		else{
			$votererr = "Invalid voter id";
		}
	}
	if(empty($_POST['gname'])){
		$gnameerr="Name is required";
	}
	else{
		$gname = valid($_POST['gname']);
		$flag++;
	}
	
	if(empty($_POST['gemail'])){
		$gemailerr="EMAIL is required";
	}
	else{
		$gemail = valid($_POST['gemail']);
		if(!filter_var($gemail,FILTER_VALIDATE_EMAIL)){
			$gemailerr = "Invalid EMAIL";
		}
		else{
			$flag++;
		}
	}
	if(empty($_POST['gpno'])){
		$gpnoerr="Phone no is required";
	}
	else{
		$gpno = valid($_POST['gpno']);
		if(preg_match('/^[0-9]{10}$/',$gpno)){
			$flag++;
		}
		else{
			$gpnoerr = "Phone no invalid";
		}
	}
	if(empty($_POST['cmp'])){
		$gtcerr = "Please select type of complain";
	}
	else{
		$cmp = $_POST['cmp'];
		$flag++;
	}
	if(strlen($_POST['complain'])==0){
		$gcerr="Please enter your complain";
	}
	else{
		if(strlen($_POST['complain']>100)){
			$gcerr = "Complain cannot be more than 100 chars";
		}
		else{
			$flag++;
			$complain = valid($_POST['complain']);
		}
	}
	if(empty($_POST['proof'])){
		$prooferr = "Proof cannot be empty";
	}
	else{
		$flag++;
	}
	
	
}
function valid($data){
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>
<style>
.brander{
	padding-top : 1%;
	padding-left : 350px;
	font-family: "Times new Roman";
	font-style: bold-italic;
	font-size : 20pt;
	
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
</nav> </div>


<div class="row">
<div class="col-sm-1 sidenav">

      <p><a href="index.php">Home</a></p>
      <p><a href="SignUp.php">Sign Up</a></p>
      <p><a href="lodge.php">Lodge Complain</a></p>
	  <p><a href="search.php"> Search for Law </a> </p>
	  <p><a href="feedback.php">Feedback</a></p>
	  
    </div>
	<h3> Complain Form </h3>
<div class="col-sm-9">
	<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		<div class="form-group">
			<label for="gid">Voter Id : </label>
			<input type="text" class="form-control" name="voter"> <?php echo $votererr?>
		</div>
		<div class="form-group">
			<label for="aadhar">Aadhar Id : </label>
			<input type="text" class="form-control" name="aadhar"> <?php echo $aadharerr?>
		</div>
		<div class="form-group">
			<label for="gname">Full Name : </label>
			<input type="text" class="form-control" name="gname"> <?php echo $gnameerr?>
		</div>
		<div class="form-group">
			<label for="email">EMAIL  : </label>
			<input type="email" class="form-control" name="gemail"> <?php echo $gemailerr?>
		</div>
		<div class="form-group">
			<label for="gpno">Phone no  : </label>
			<input type="number" class="form-control" name="gpno"> <?php echo $gpnoerr?>
		</div>
		<div class="form-group">
			<label for="type"> Select type of Complain </label>
			<select name="cmp">
			<option name="cmp" value="Molestation"> Molestation </option>
			<option name="cmp" value="Abuse of Duty"> Abuse of Duty </option>
			<option name="cmp" value="Corruption"> Corruption </option>
			<option name="cmp" value="Criminal Offence"> Criminal Offence</option>
			<option name="cmp" value="Neglect of Duty"> Neglect of Duty</option>
			<option name="cmp" value="Cleanliness"> Cleanliness </option>
			<option name="cmp" value="Other"> Other</option>
			</select> <?php echo $gtcerr ?>
		</div>
		<div class="form-group">
			<label for="complain"> Complain </label>
			<textarea class="form-control" name="complain" rows="6" id="complain"> </textarea> <?php echo $gcerr ?>
		</div>
		
		<center><button type="Submit" name="Submit" value="Submit" class="btn btn-default"> Submit </button></center>
	</form>
</div>	
</div>
</div> <br><br>
<footer class="nav navbar-inverse">
     <div class="container"> 
       <center> <p style="color:white;">Copyright &copy; 2017 Online Law System - Designed By Bhavna Varshney </p> </center>
    </div> </footer> 
<?php

	if($flag == 7){
	    
		$localhost = "localhost";
		$username="id3343021_bhavna";
		$password = "bhavna1234";
		$db = "id3343021_ols";
		$conn= mysqli_connect($localhost,$username,$password,$db);
		if(!$conn){
			echo "Connection issue ".mysqli_error($conn);
		}
		else{
		$sql = "Insert into complains(VoterId,Aadhar,Name,Email,Phone,Type_Of_Complain,Complain) values('$voter','$aadhar','$gname','$gemail','$gpno','$cmp','$complain')";
		if(!mysqli_query($conn,$sql)){
			echo "Insertion error" .mysqli_error($conn);
		}
		}
		mysqli_close($conn);
	
	}
?>
</body>
</html>