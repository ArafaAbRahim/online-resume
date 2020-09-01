<?php
$con=mysqli_connect("localhost", "root", "");
mysqli_select_db($con, "resume");
if(isset($_POST['submit']))
{
	$DOB = $_POST['DOB'];
	$fathersname = $_POST['fathersname'];
	$mothersname = $_POST['mothersname'];
	$paddress = $_POST['paddress'];
	$religion = $_POST['religion'];
	$nationality = $_POST['nationality'];
	$maritalstatus = $_POST['maritalstatus'];
	$q = mysqli_query($con, "insert into personalinfo(DOB,fathersname ,mothersname ,paddress ,religion, nationality, maritalstatus) 
	values('$DOB', '$fathersname', '$mothersname', '$paddress', '$religion', '$nationality', '$maritalstatus')");

	if($q){
		echo "save successfull" ;
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
		<h3>Step 6. Personal Information</h3>
		<form class="form-horizontal" action="" method="POST">
			<div class="form-group">
			    <label class="control-label col-sm-2" for="DOB">Date of Birth</label>
			    <div class="col-xs-6">
			      <input type="date" class="form-control" id="DOB" placeholder=" ">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="fathersname">Father's Name</label>
			    <div class="col-xs-6">
			      <input type="text" class="form-control" id="fathersname" placeholder="Enter Fathersname">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="mothersname">Mother's Name</label>
			    <div class="col-xs-6">
			      <input type="text" class="form-control" id="mothersname" placeholder="Enter Mothersname">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="paddress">Permanent Address</label>
			    <div class="col-xs-6">
			      <input type="text" class="form-control" id="paddress" placeholder="Enter Address ">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="religion">Religion</label>
			    <div class="col-xs-6">
			      <input type="text" class="form-control" id="religion" placeholder="Enter Religion">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="nationality">Nationality</label>
			    <div class="col-xs-6">
			      <input type="text" class="form-control" id="nationality" placeholder="Enter nationality">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="maritalstatus">Marital Status</label>
			    <div class="col-xs-6">
			      <input type="text" class="form-control" id="maritalstatus" placeholder="Enter Maritalstatus">
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