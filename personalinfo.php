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
	$DOB = $_POST['DOB'];
	$fathersname = $_POST['fathersname'];
	$mothersname = $_POST['mothersname'];
	$paddress = $_POST['paddress'];
	$religion = $_POST['religion'];
	$nationality = $_POST['nationality'];
	$maritalstatus = $_POST['maritalstatus'];
	$q = mysqli_query($con, " insert into personalinfo(fathersname, mothersname, paddress, religion, nationality, maritalstatus)
        values('$fathersname', '$mothersname' '$paddress', '$religion', '$nationality', '$maritalstatus') ");


	if($q){
		header("Location: references.php") ;
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
  
  <div class="container">
        <div >
            <img src="image/about.jpg"/>
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
		<h3 style="color: #2DAAA1; padding-left: 150px; font-weight: bold;">Step 6. Personal Information</h3>
		<form class="form-horizontal" action="" method="POST" style="margin-top: 10px">
			<div class="form-group">
			    <label class="control-label col-sm-2" for="DOB">Date of Birth</label>
			    <div class="col-xs-6">
			      <input type="date" class="form-control" name="DOB" placeholder=" ">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="fathersname">Father's Name</label>
			    <div class="col-xs-6">
			      <input type="text" class="form-control" name="fathersname" placeholder="Enter Fathersname">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="mothersname">Mother's Name</label>
			    <div class="col-xs-6">
			      <input type="text" class="form-control" name="mothersname" placeholder="Enter Mothersname">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="paddress">Permanent Address</label>
			    <div class="col-xs-6">
			      <input type="text" class="form-control" name="paddress" placeholder="Enter Address ">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="religion">Religion</label>
			    <div class="col-xs-6">
			      <input type="text" class="form-control" name="religion" placeholder="Enter Religion">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="nationality">Nationality</label>
			    <div class="col-xs-6">
			      <input type="text" class="form-control" name="nationality" placeholder="Enter nationality">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="maritalstatus">Marital Status</label>
			    <div class="col-xs-6">
			      <input type="text" class="form-control" name="maritalstatus" placeholder="Enter Maritalstatus">
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