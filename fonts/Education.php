<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="css/bootstrap.min.css" >

<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
</head>

<body style="height: 1500px">
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
	<h3>Step 3. Education</h3>
	<form class="form-horizontal" action="Education.php" method="POST">
		<div class="form-group">
			    <label class="control-label col-sm-2" for="degree">School Type</label>
			<label class="radio-inline">
		      <input type="radio" name="optradio">School
		    </label>
		     <label class="radio-inline">
		      <input type="radio" name="optradio">College
		      </label>
		    <label class="radio-inline">
		      <input type="radio" name="optradio">Others
		    </label>
		</div>
	    <div class="form-group">
	    <label class="control-label col-sm-2" for="degree">Degree</label>
	    <div class="col-xs-6">
	      <input type="text" class="form-control" id="degree" placeholder="Enter Degree ">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="institution">Institution</label>
	    <div class="col-xs-6">
	      <input type="text" class="form-control" id="institution" placeholder="Institution Name ">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="year">Passing Year</label>
	    <div class="col-xs-6">
	      <input type="text" class="form-control" id="year" placeholder="Enter Year">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="major">Major</label>
	    <div class="col-xs-6">
	      <input type="text" class="form-control" id="major" placeholder="Enter Major">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="cgpa">CGPA</label>
	    <div class="col-xs-6">
	      <input type="text" class="form-control" id="cgpa" placeholder="Enter CGPA">
	    </div>
	  </div>
	  <div class="form-group"> 
		 <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">Save and Continue</button>
		 </div>
	   </div>
	</form>
</body>