<?php
$error='';
if (isset($_POST['submit'])) {
	if (empty($_POST['studentid']) || empty($_POST['password'])) {
	
		$error="StudentId or Password is emptyw";
	}
	else{
		$studentid = $_POST['studentid'];
		$password = $_POST['password'];
		$con=mysqli_connect("localhost", "root", "", "resume");
		$query = mysqli_query($con, "SELECT * FROM login WHERE studentid='$studentid' AND password='$password'");
		$rows = mysqli_num_rows($query);
		if ($rows) {
			header("Location: home.php");
		}
		else{
			$error="StudentId or Password is Invalid";
		}
		mysqli_close($con);
	}
}
if (isset($_POST['submit'])) {
	if (empty($_POST['userid']) || empty($_POST['password'])) {
	
		$error="UserId or Password is empty";
	}
	else{
		$userid = $_POST['userid'];
		$password = $_POST['password'];
		$con=mysqli_connect("localhost", "root", "", "resume");
		$query = mysqli_query($con, "SELECT * FROM faculty WHERE userid='$userid' AND password='$password'");
		$rows = mysqli_num_rows($query);
		if ($rows) {
			header("Location: home2.php");
		}
		else{
			$error="UserId or Password is Invalid";
		}
		mysqli_close($con);
	}	
}
?>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="style.css">

<link rel="stylesheet" href="css/bootstrap.min.css" >

<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
</head>

<body style="background: #dfe8f3">
	<script src="js/jquery-3.1.1.min.js"></script>

	<script src="js/bootstrap.min.js"></script>
  
   <div class="container" style="background-image: url(image/nv.jpg)">
        <div style="padding-left: 200px">
            <img src="image/logo.png"/>
        </div>
   </div>
   <div class="container" style=" background-color: #153144;">
        <h2 style="color: white; font-weight: bold;"><center>LOG IN</center></h2>
    </div>
    <h2 style="color: #217985; font-weight: bold;"><center>Student Login</center></h2>
	<div class="container" style="margin-top: 50px">	    
		<form class="form-horizontal" action="" method="POST">
		<h4 style="padding-left: 200px; font-weight: bold">Please login!</h4>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="">StudentID:</label>
		    <div class="col-xs-3">
		      <input type="text" class="form-control" name="studentid" placeholder="Enter ID">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="">Password</label>
		    <div class="col-xs-3">
		      <input type="text" class="form-control" name=" password" placeholder="Enter Password">
		    </div>
		  </div>

		  <div class="form-group"> 
		  	<div class="col-sm-offset-2 col-sm-10">
				<span><?php echo $error; ?></span>
		    </div>
		  	<div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default" name="submit" value="Submit">login</button>
            </div>
          </div>
		</form>	
	</div>
	<div class="container">
		<h2 style="color: #217985  ; font-weight: bold; margin-top: 50px;"><center>Faculty Login</center></h2>
		<div class="container" style="margin-top: 50px">	    
			<form class="form-horizontal" action="" method="POST">
				<h4 style="padding-left: 200px; font-weight: bold">Please login!</h4>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="">UserID:</label>
			    <div class="col-xs-3">
			      <input type="text" class="form-control" name="userid" placeholder="Enter ID">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="">Password</label>
			    <div class="col-xs-3">
			      <input type="text" class="form-control" name=" password" placeholder="Enter Password">
			    </div>
			  </div>

			  <div class="form-group"> 
			  	<div class="col-sm-offset-2 col-sm-10">
					<span><?php echo $error; ?></span>
			    </div>
			  	<div class="form-group">
	            <div class="col-sm-offset-2 col-sm-10">
	              <button type="submit" class="btn btn-default" name="submit" value="Submit">login</button>
	            </div>
	          </div>
			</form>	
		</div>
	</div>
</body>