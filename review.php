<?php

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
        echo " Your Submitted information: ";
        echo "Name is : " + $name;
        echo "Address is : " + $address;
        echo "Email is : " + $email;
        echo "Phone is : " + $phone;
        header("Location: review.php") ;
        }
        else{
            echo "save unsuccessfull" ;
        }
    }
    
?>