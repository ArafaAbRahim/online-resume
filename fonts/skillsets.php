<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="style.css">

<link rel="stylesheet" href="css/bootstrap.min.css" >

<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
</head>
<?php
$con=mysqli_connect("localhost", "root", "");
mysqli_select_db($con, "resume");
if(isset($_POST['submit']))
{
	$cname = $_POST['cname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$year = $_POST['year'];
	$designation = $_POST['designation'];
	$q = mysqli_query($con, "insert into workexperience(cname, email, phone, year, designation) 
	values('$cname', '$email', '$phone', '$year', '$designation')");

	if($q){
		echo "save successfull" ;
	}
	else{
		echo "save unsuccessfull" ;
	}

}

?>
<body>
	<script src="js/jquery-3.1.1.min.js"></script>

	<script src="js/bootstrap.min.js"></script>
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
		            <ul>
		                <li><a href='contactinfo.php'>Contact Info</a></li>
		                <li><a href='career.php'>Career</a></li>
		                <li><a href='Education.php'>Education</a></li>
		                <li><a href='skillsets.php'>Skill Sets</a></li>
		                <li><a href=''>Others</a>
		                    <ul>
		                        <li><a href='workexperience.php'>Work Exp</a></li>
		                        <li><a href='personalinfo.php'>Personal Info</a></li>
		                        <li><a href='references.php'>References</a></li>
		                    </ul>
		                </li>
		                <li><a href='index.php'>Logout</a></li>
		            </ul>
		        </div>
		    </div>
	 <div class="container" style="margin-top: 30px">
		<h3>Step 4. Skill Sets</h3>
		<form class="form-horizontal" action="" method="POST">
			<div class="form-group">
				<label class="control-label col-sm-2" for="language">Language Eficiency</label>
					    <div class="col-xs-4">
				  <textarea class="form-control" rows="3" id="language"></textarea>
				</div>
				</div>
				<div class="form-group">
				<label class="control-label col-sm-2" for="computer">Computer Skills</label>
					    <div class="col-xs-4">
				  <textarea class="form-control" rows="3" id="computer"></textarea>
				</div>
				</div>
				<div class="form-group">
				<label class="control-label col-sm-2" for="social">Social & Cultural Skills</label>
					    <div class="col-xs-4">
				  <textarea class="form-control" rows="3" id="social"></textarea>
				</div>
				</div>
				<div class="form-group">
				<label class="control-label col-sm-2" for="others">Others Skills</label>
					    <div class="col-xs-4">
				  <textarea class="form-control" rows="3" id="others"></textarea>
				</div>
				</div>
				<div class="form-group"> 
					 <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-default">Save and Continue</button>
					 </div>
				</div>
		</form>
	</div>
</body>