<?php
session_start();

?>
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


<div class="row"> <div class="nav navbar-default">
<ul class="nav navbar-nav">

      <li> <a href="index.php">Home</a></li>
     <li> <a href="SignUp.php">Sign Up</a></li>
     <li> <a href="lodge.php">Lodge Complain</a></li>
	 <li> <a href="search.php"> Search for Law </a> </li>
	 <li><a href="feedback.php">Feedback</a></li>
	 
    </ul>
</div>	
<div class="col-sm-12">
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
<div class="col-sm-6"><input type="text" name="gid" class="form-control" placeholder="Enter Government Id">  </div>
<div class="col-sm-2"><button type="submit" name="Submit" value="Submit" class="btn btn-primary">Submit </button></div>
<div class="col-sm-2"><button type="submit" name="Logout" value="Logout" class="btn btn-primary">Logout</button></div>
<div class="col-sm-2"><button type="submit" name="ActionC" value="Submit" class="btn btn-primary">Action </button></div>
<?php 
   
   if($_SERVER['REQUEST_METHOD']=="POST"){

    if(isset($_POST["Submit"])){
     $conn = mysqli_connect("localhost","id3343021_bhavna","bhavna1234","id3343021_ols");
    if(!$conn){
	 echo "Connection failed";
	 }
	 
    $a = $_POST['gid'];
    $sql1 = "Select Incharge from govt where Gid = '$a'";
    $result1 = mysqli_query($conn,$sql1);
    if(mysqli_num_rows($result1)>0){
        if($row = mysqli_fetch_assoc($result1)){
           $inc = $row['Incharge'];
            echo "Incharge = '$inc'";
        }
    }
    else{
        echo "No such Government ID";
    }
	$sql = "Select * from complains where Type_Of_Complain='$inc'";
	$result = mysqli_query($conn,$sql);
    
	echo "<table class='table-responsive table table-striped'>";
	if (mysqli_num_rows($result)>0){
	    echo "<tr><th> Complain ID </th><th> Voter Id </th><th> Aadhar </th><th>Name</th><th>Email</th><th>Phone</th><th>Type of Complain</th><th>Complain</th><th> Action </th></tr>";
		while($row = mysqli_fetch_assoc($result)){
			
				echo "<tr> <td>";
				echo $row['CPID'] ."</td><td>";
			    echo $row['VoterId'] ."</td><td>";
				echo $row['Aadhar'] ."</td><td>";
				echo $row['Name'] ."</td><td>";
				echo $row['Email'] ."</td><td>";
			    echo $row['Phone'] ."</td><td>";
			    echo $row['Type_Of_Complain'] ."</td><td>";
				echo $row['Complain'] ."</td><td>";
				
				echo "</tr>";
								
				
				
				
				
			}
			
		}
		else{
		    echo "<h3>No Complains</h3>";
		}
		echo "</table>";
    }
     if(isset($_POST["Logout"])){
    			session_destroy(); 
	} 
    if(isset($_POST["ActionC"])){
       	echo '<script type="text/javascript" language="javascript"> 
						window.open("Welcome1.php"); 
						</script>';
    }
?>
</form>
</div>
<?php
 
        
	
   
}


?>


</div>
</body>
</html>