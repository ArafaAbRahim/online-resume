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
        $name = $_POST['name'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        /*$q = mysqli_query($con, " INSERT INTO contactinfo(name, address, email, phone) values('$name', '$address', '$email', '$phone')");*/
        $q = mysqli_query($con, " insert into contactinfo(name, address, email, phone)
        values('$name', '$address', '$email', '$phone') ");

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
  
<body style="background: #dfe8f3">
	<script src="js/jquery-3.1.1.min.js"></script>

	<script src="js/bootstrap.min.js"></script>

    <div class="container">
        <div >
            <img src="image/contact.png"/>
        </div>

  
       <div class="container" style=" background-color: #17202A">
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
	<div class="container" style="margin-top: 50px">
        <h3 style="color: #2DAAA1; padding-left: 150px; font-weight: bold;">Step 1. Contact Info</h3>
        <form class="form-horizontal" action="" method="POST" style="margin-top: 40px">   
    	  <div class="form-group">
    	    <label class="control-label col-sm-2" for="name">Name</label>
    	    <div class="col-xs-6">
    	      <input type="text" class="form-control" name="name" placeholder="Enter Name">
    	    </div>
    	  </div>
    	  <div class="form-group">
    	    <label class="control-label col-sm-2" for="address">Address</label>
    	    <div class="col-xs-6"> 
    	      <input type="text" class="form-control" name="address" placeholder="Enter address">
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
    	      <input type="text" class="form-control" name="phone" placeholder="Enter Phone">
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