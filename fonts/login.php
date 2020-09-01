<?php
$error='';
if (isset($_POST['submit'])) {
	if (empty($_POST['studentid']) || empty($_POST['password'])) {
		$error="StudentId or Password is Invalid";
	}
	else{
		$studentid=$_POST['studentid'];
		$password=$_POST['password'];
		$conn=mysql_connect("localhost", "root", "");
		$db=mysqli_select_db($conn, "resume");
		$query= mysql_query($conn, "SELECT * FROM login WHERE studentid='$studentid' AND password='$password'");
		$rows = mysqli_num_rows($query);
		if ($rows == 1) {
			header("Location: index.php");
		}
		else{
			$error="StudentId or Password is Invalid";
		}
		mysql_close($conn);
	}
	
}
?>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="style.css">

<link rel="stylesheet" href="css/bootstrap.min.css" >

<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
</head>
<body>
	<script src="js/jquery-3.1.1.min.js"></script>

	<script src="js/bootstrap.min.js"></script>
	<div id="border">
		<div id="image">
			<div class="container resume">
		        <div class="wrapper">
		            <div id="logo_2">
						<img src="image/logo.png"/>
					</div>
		        </div>
		    </div>  
		    <div class="container color">
		        <div class="wrapper">
		            <div id="logo_2">
						<h2 align="center">Login</h2>
					</div>
		        </div>
		    </div>  
		<div class="container" style="margin-top: 100px">	    
			<form class="form-horizontal" action="" method="POST">

			  <div class="form-group">
			    <label class="control-label col-sm-2" for="">StudentId:</label>
			    <div class="col-xs-3">
			      <input type="text" class="form-control" id="" placeholder="Enter ID">
			    </div>
			  </div>
			  <form class="form-horizontal" action="" method="POST">

			  <div class="form-group">
			    <label class="control-label col-sm-2" for="">Password</label>
			    <div class="col-xs-3">
			      <input type="text" class="form-control" id="" placeholder="Enter Password">
			    </div>
			  </div>

			  <div class="form-group"> 
			  	<div class="col-sm-offset-2 col-sm-10">
					<span><?php echo $error; ?></span>
			    </div>
			  	<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default">login</button>
			    </div>
			  </div>
			</form>
		</div>
	</div>
</body>