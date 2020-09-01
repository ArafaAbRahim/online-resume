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
	$responsibility = $_POST['responsibility'];
	$q = mysqli_query($con, "insert into workexperience(cname, email, phone, year, designation,responsibility) 
	values('$cname', '$email', '$phone', '$year', '$designation','$responsibility')");

	if($q){
		header("Location: personalinfo.php") ;
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
            <img src="image/work.png"/>
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
		<h3 style="color: #2DAAA1; padding-left: 150px; font-weight: bold;">Step 5. Work Experiences</h3>
		<form class="form-horizontal" action="" method="POST" style="margin-top: 10px">
		<div class="form-group">
			    <label class="control-label col-sm-2" for="cname">Company Name</label>
			    <div class="col-xs-6">
			      <input type="text" class="form-control" name="cname" placeholder="Enter Company Name">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="responsibility">Responsibility</label>
			    <div class="col-xs-6">
			      <input type="text" class="form-control" name="responsibility" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="email">Email</label>
			    <div class="col-xs-6">
			      <input type="text" class="form-control" name="email" placeholder="Enter Email">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="phone">Phone</label>
			    <div class="col-xs-6">
			      <input type="text" class="form-control" name="phone" placeholder="Enter Phone No">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="year">Year</label>
			    <div class="col-xs-6">
			      <input type="text" class="form-control" name="year" placeholder="Enter Year">
			    </div>
			  </div>
			  <div class="form-group">
			<label class="control-label col-sm-2" for="designation">Designation</label>
				    <div class="col-xs-4">
			  <textarea class="form-control" rows="3" name="designation"></textarea>
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