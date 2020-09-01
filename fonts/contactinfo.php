<?php
    $con=mysqli_connect("localhost", "root", "");
    mysqli_select_db($con, "resume");
    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $q = mysqli_query($con, "insert into contactinfo(name, address, email, phone) 
        values('$name', '$address', '$email', '$phone')");

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

<link rel="stylesheet" href="css/bootstrap.min.css" >

<link rel="stylesheet" href="css/bootstrap-theme.min.css" >
</head/>

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
    <form class="form-horizontal" action="" method="POST">
        <div class="container" style="margin-top: 30px">
          <h3>Step 1. Contact Info</h3>
    	  <div class="form-group">
    	    <label class="control-label col-sm-2" for="name">Name</label>
    	    <div class="col-xs-6">
    	      <input type="text" class="form-control" id="name" placeholder="Enter Name">
    	    </div>
    	  </div>
    	  <div class="form-group">
    	    <label class="control-label col-sm-2" for="pwd">Address</label>
    	    <div class="col-xs-6"> 
    	      <input type="text" class="form-control" id="address" placeholder="Enter address">
    	    </div>
    	  </div>
    	  <div class="form-group">
    	    <label class="control-label col-sm-2" for="pwd">Email</label>
    	    <div class="col-xs-6"> 
    	      <input type="text" class="form-control" id="email" placeholder="Enter Email">
    	    </div>
    	  </div>
    	  <div class="form-group">
    	    <label class="control-label col-sm-2" for="pwd">Phone</label>
    	    <div class="col-xs-6"> 
    	      <input type="text" class="form-control" id="phone" placeholder="Enter Phone">
    	    </div>
    	  </div>
    	  <div class="form-group"> 
    	    <div class="col-sm-offset-2 col-sm-10">
    	      <button type="submit" class="btn btn-default">Submit</button>
    	    </div>
          </div>
        </div>
    </form>
</body>