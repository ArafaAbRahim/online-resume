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
	$aboutme = $_POST['aboutme'];
	$careerobj = $_POST['careerobj'];
	$extraactivities = $_POST['extraactivities'];
	$q = mysqli_query($con, "insert into career(aboutme, careerobj, extraactivities) 
	values('$aboutme', '$careerobj', '$extraactivities')");

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
		<form class="form-horizontal" action="" method="POST">
			<h2>Step 2. Career Info</h2>
			<div class="form-group">
			<label class="control-label col-sm-2" for="aboutme">About Me</label>
				    <div class="col-xs-4">
			  <textarea class="form-control" rows="3" id="aboutme"></textarea>
			</div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-2" for="careerobj">Career Objective</label>
				    <div class="col-xs-4">
			  <textarea class="form-control" rows="3" id="careerobj"></textarea>
			</div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-2" for="rxtraactivities">Extra Activities</label>
				<div class="col-xs-4">
			  		<textarea class="form-control" rows="3" id="extraactivities"></textarea>
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