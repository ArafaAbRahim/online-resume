<?php
$error='';
if (isset($_POST['submit'])) {
	if (empty($_POST['studentid']) || empty($_POST['password'])) {
	
		$error="StudentId or Password is empty";
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
  
   <div class="container">
        <div >
            <img src="image/login.jpg"/>
        </div>
   </div>
   <div class="container" style=" background-color: #9493D6;">
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
</body>