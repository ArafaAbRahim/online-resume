<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">

<link rel="stylesheet" href="css/bootstrap.min.css" >

<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
</head/>
  
<body style="background: #dfe8f3">
	<script src="js/jquery-3.1.1.min.js"></script>

	<script src="js/bootstrap.min.js"></script>
	  <div class="container">
        <div>
            <img src="image/pdfc.png"/>
        </div>

  
       <div class="container" style="background-color: #17202A">
            <div id="nav">
				<ul style="padding-left: 25% ">
					<li><a href='home2.php'>Home</a></li>
					<li style="width: 130px"><a href='resume.php'>Resume Template</a></li>
					<li><a href='pdfgenerator.php'>Resume PDF</a></li>
					<li><a href='facultylogin.php'>Logout</a></li>
				</ul>
			</div>	
		</div>
	</div>
	<div class="container" style="margin-top: 50px">
		<form class="form-horizontal" action="pdfmod.php" method="POST" style="margin-top: 40px">   
    	  <div class="form-group">
	    	    <label class="control-label col-sm-2" for="id">User ID</label>
	    	    <div class="col-xs-6">
	    	      <input type="text" class="form-control" name="id" placeholder="Enter Name">
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
</html>