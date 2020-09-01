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
	$degree = $_POST['degree'];
	$institution = $_POST['institution'];
	$year = $_POST['year'];
	$major = $_POST['major'];
	$cgpa = $_POST['cgpa'];
	$q = mysqli_query($con, "insert into college(degree, institution, year, major, cgpa) 
	values('$degree', '$institution', '$year', '$major', '$cgpa')");

	if($q){
		header("Location: university.php") ;
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
        <div>
            <img src="image/school.jpg"/>
        </div>
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
		<h3 style="color: #2DAAA1; padding-left: 150px; font-weight: bold;">Step 3. Education</h3>
		<form class="form-horizontal" action="" method="POST" style="margin-top: 10px">
		<div class="form-group">
			<label class="control-label col-sm-2" for="">School Type</label>
			<label class="radio-inline">
		     <a href="Education.php"><input type="radio" name="optradio">School</a>
		    </label>
		     <label class="radio-inline">
		      <input type="radio" name="optradio">College
		     </label>
		    <label class="radio-inline">
		      <a href="university.php"><input type="radio" name="optradio">Others</a>
		    </label>
		</div>
	    <div class="form-group">
	    <label class="control-label col-sm-2" for="degree">Degree</label>
	    <div class="col-xs-6">
	      <input type="text" class="form-control" name="degree" placeholder="Enter Degree ">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="institution">Institution</label>
	    <div class="col-xs-6">
	      <input type="text" class="form-control" name="institution" placeholder="Institution Name ">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="year">Passing Year</label>
	    <div class="col-xs-6">
	      <input type="text" class="form-control" name="year" placeholder="Enter Year">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="major">Major</label>
	    <div class="col-xs-6">
	      <input type="text" class="form-control" name="major" placeholder="Enter Major">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="cgpa">CGPA</label>
	    <div class="col-xs-6">
	      <input type="text" class="form-control" name="cgpa" placeholder="Enter CGPA">
	    </div>
	  </div>
	  <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default" name="submit" value="Submit">Submit</button>
            </div>
          </div>
	</form>
</body>