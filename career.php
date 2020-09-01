<?php
 $con=mysqli_connect("localhost", "root", "", "resume");
    //mysqli_select_db($con, "resume");

     if (!$con) {
     echo "Error: Unable to connect to MySQL." . PHP_EOL;
     echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
     echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
     exit;
    }
if(isset($_POST['submit']))
{
	$aboutme = $_POST['aboutme'];
	$careerobj = $_POST['careerobj'];
	$extraactivities = $_POST['extraactivities'];

	$q = mysqli_query($con, "insert into career(aboutme, careerobj, extraactivities) 
	values('$aboutme', '$careerobj', '$extraactivities')");

	if($q){
		header("Location: Education.php") ;
	}
	else{
		echo "save unsuccessfull" ;
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
  
<div class="container" >
        <div >
            <img src="image/career1.jpg"/>
        </div>

  
       <div class="container" style="background-color: #17202A">
            <div id="nav">

                <ul>
                    <li><a href='home.php'>Home</a></li>   
                    <li><a href='contactinfo.php'>Contact Info</a></li>
                    <li><a href='career.php'>Career</a></li>
                    <li><a href='Education.php'>Education</a></li>
                    <li><a href='skillsets.php'>Skill Sets</a></li>
                    <li><a href='workexperience.php'>Work Exp</a></li>
                    <li><a href='personalinfo.php'>Personal Info</a></li>
                    <li><a href='references.php'>References</a></li>
                    <li><a href='studentlogin.php'>Logout</a></li> 
                </ul>
            </div>
        </div>
    </div>
	<div class="container" style="margin-top: 10px">
		<h3 style="color: #2DAAA1; padding-left: 150px; font-weight: bold;">Step 2. Career</h3>
		<form class="form-horizontal" action="" method="POST" style="margin-top: 20px">
			<div class="form-group">
			<label class="control-label col-sm-2" for="aboutme">About Me</label>
				    <div class="col-xs-4">
			  <textarea class="form-control" rows="3" name="aboutme"></textarea>
			</div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-2" for="careerobj">Career Objective</label>
				    <div class="col-xs-4">
			  <textarea class="form-control" rows="3" name="careerobj"></textarea>
			</div>
			</div>
			<div class="form-group">
			  <label class="control-label col-sm-2" for="extraactivities">Extra Activities</label>
				<div class="col-xs-4">
			  		<textarea class="form-control" rows="3" name="extraactivities"></textarea>
				</div>
			</div>
			<div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default" name="submit" value="Submit">Submit</button>
            </div>
          </div>
		</form>
	</div>
</body>