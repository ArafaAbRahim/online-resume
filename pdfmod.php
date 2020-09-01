<?php
require('fpdf.php');

class PDF extends FPDF
{
}
//Connect to database
$con=mysqli_connect("localhost", "root", "", "resume");
    //mysqli_select_db($con, "resume");

$uid = $_POST['id'];    

$pdf=new FPDF();
$pdf->AddPage();

//$pdf->Cell(450,3," ---------------------------------------------------------------------------------------------------------------------------------------------------------------");
/*$prop=array('HeaderColor'=>array(255,150,100),
            'color1'=>array(210,245,255),
            'color2'=>array(255,255,210),
            'padding'=>2);*/
//Connect to database
    //mysqli_select_db($con, "resume");

     if (!$con) {
     echo "Error: Unable to connect to MySQL." . PHP_EOL;
     echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
     echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
     exit;
    }
  
    else{
        $sql = "SELECT * FROM contactinfo WHERE id='$uid'";
        
        $result = array();
        $query = mysqli_query($con, $sql);
        $id = 0;
        while($rows=mysqli_fetch_assoc($query))
        {
            //$id = $id + 1;
          
            $name = $rows['name'];
            $address = $rows['address'];
            $email = $rows['email'];
            $phone = $rows['phone'];

            $pdf->SetFont('Arial','B',16);
            $pdf->Cell(0,4, "$name" ,0,4,'C');
            $pdf->Ln();
            $pdf->SetFont('Arial','B',9);
            $pdf->Cell(0,3, "$address" ,0,3,'C');
            $pdf->Ln();
            $pdf->Cell(0,3, "$email" ,0,3,'C');
            $pdf->Ln();
            $pdf->Cell(0,3, "$phone" ,0,3,'C');
            /*$prop=array('HeaderColor'=>array(255,150,100),
                            'color1'=>array(210,245,255),
                            'color2'=>array(255,255,210),
                            'padding'=>2);*/
        }
    }

$pdf->Ln();
 if (!$con) {
     echo "Error: Unable to connect to MySQL." . PHP_EOL;
     echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
     echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
     exit;
    }
  
    else{
            $sql = "SELECT * FROM career WHERE id='$uid'";
            $result = array();
            $query = mysqli_query($con, $sql);
            $id = 0;
            while($rows=mysqli_fetch_assoc($query))
        {
    
            $aboutme = $rows['aboutme'];
            $careerobj = $rows['careerobj'];
            $pdf->Ln();
            $pdf->SetFont('Arial','B',13);
            $pdf->Cell(0,3,'----------------------------------------------------  About ME  ------------------------------------------------------------',0,3,'C');
            $pdf->Ln();
            $pdf->SetFont('Arial','',9);
            $pdf->multiCell(195,5,"$aboutme");
            $pdf->Ln();
            $pdf->SetFont('Arial','B',13);
            $pdf->Cell(0,3,'----------------------------------------------  Career Objective  -------------------------------------------------------',0,3,'C');
            $pdf->Ln();
            $pdf->SetFont('Arial','',9);
            $pdf->multiCell(195,5,"$careerobj");
            
        }
    }
$pdf->Ln();
$pdf->SetFont('Arial','B',13);
$pdf->Cell(0,3,'----------------------------------------------------- Education ----------------------------------------------------------',0,3,'C');
$pdf->Ln();
 $pdf->SetFont('Arial','B',11);
 $pdf->Cell(30,5,"year");
 $pdf->Cell(30,5,"degree");
$pdf->Cell(80,5,"institution");
$pdf->Cell(25,5,"Major:");
$pdf->Cell(25,5,"CGPA:");
 if (!$con) {
     echo "Error: Unable to connect to MySQL." . PHP_EOL;
     echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
     echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
     exit;
    }
  
    else{
            $sql = "SELECT * FROM education WHERE id='$uid'";
            $result = array();
            $query = mysqli_query($con, $sql);
            $id = 0;
            while($rows=mysqli_fetch_assoc($query))
        {
        
            $degree = $rows['degree'];
            $institution = $rows['institution'];
            $year = $rows['year'];
            $major = $rows['major'];
            $cgpa = $rows['cgpa'];
            $pdf->Ln(6);
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(30,5,"$year");
            
            $pdf->Cell(30,5,"$degree");
            
            $pdf->Cell(80,5,"$institution");
           
            $pdf->Cell(25,5,"$major");
            $pdf->Cell(25,5,"$cgpa");
            /*$prop=array('HeaderColor'=>array(255,150,100),
                            'color1'=>array(210,245,255),
                            'color2'=>array(255,255,210),
                            'padding'=>2);*/
        }
    }
$pdf->Ln();
if (!$con) {
     echo "Error: Unable to connect to MySQL." . PHP_EOL;
     echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
     echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
     exit;
    }
  
    else{
            $sql = "SELECT * FROM college WHERE id='$uid'";
            $result = array();
            $query = mysqli_query($con, $sql);
            while($rows=mysqli_fetch_assoc($query))
        {
        
            $degree = $rows['degree'];
            $institution = $rows['institution'];
            $year = $rows['year'];
            $major = $rows['major'];
            $cgpa = $rows['cgpa'];
            $pdf->Ln(3);
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(30,5,"$year");
           
            $pdf->Cell(30,5,"$degree");
            
            $pdf->Cell(80,5,"$institution");
           
            $pdf->Cell(25,5,"$major");
            $pdf->Cell(25,5,"$cgpa");
         }
    } 
$pdf->Ln();
if (!$con) {
     echo "Error: Unable to connect to MySQL." . PHP_EOL;
     echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
     echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
     exit;
    }
  
    else{
            $sql = "SELECT * FROM university WHERE id='$uid'";
            $result = array();
            $query = mysqli_query($con, $sql);
            while($rows=mysqli_fetch_assoc($query))
        {
        
            $degree = $rows['degree'];
            $institution = $rows['institution'];
            $year = $rows['year'];
            $major = $rows['major'];
            $cgpa = $rows['cgpa'];
            $pdf->Ln(3);
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(30,5,"$year");
            $pdf->Cell(30,5,"$degree");
            $pdf->Cell(80,5,"$institution");
           
            $pdf->Cell(25,5,"$major");
            $pdf->Cell(25,5,"$cgpa");
         }
    }             
$pdf->Ln(6);    

$pdf->SetFont('Arial','B',13);
$pdf->Cell(0,6,'----------------------------------------------------  Skill Sets  ----------------------------------------------------------',0,6,'C');
     if (!$con) {
     echo "Error: Unable to connect to MySQL." . PHP_EOL;
     echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
     echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
     exit;
    }
  
    else{
        $sql = "SELECT * FROM skillsets WHERE id='$uid'";
        
        $result = array();
        $query = mysqli_query($con, $sql);
        //$id = 0;
        while($rows=mysqli_fetch_assoc($query))
        {
            
            $language = $rows['language'];
            $computer = $rows['computer'];
            $social = $rows['social'];
            $others = $rows['others'];
            $pdf->Ln(3);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(50,3,"Language :");
            $pdf->SetFont('Arial','',9);
            $pdf->MultiCell(50,3,"$language");
            $pdf->Ln(); 
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(50,3,"Computer Skills :");
            $pdf->SetFont('Arial','',9);
            $pdf->MultiCell(50,3,"$computer");
            $pdf->Ln(); 
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(50,3,"Social Skills :");
            $pdf->SetFont('Arial','',9);
            $pdf->MultiCell(50,3,"$social");
            $pdf->Ln(); 
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(50,3,"Others :");
            $pdf->SetFont('Arial','',9);
            $pdf->MultiCell(50,3,"$others");
            /*$prop=array('HeaderColor'=>array(255,150,100),
                            'color1'=>array(210,245,255),
                            'color2'=>array(255,255,210),
                            'padding'=>2);*/
        }
    }    //
$pdf->Ln();
$pdf->SetFont('Arial','B',13, 'blue');
$pdf->Cell(0,6,'----------------------------------------------  Personal Information  --------------------------------------------------',0,6,'C');
$pdf->Ln();
$pdf->SetFont('Arial','B',11);
$pdf->Cell(50,5,"DOB");
$pdf->Cell(50,5,"Religion");
$pdf->Cell(50,5,"Nationality");
$pdf->Cell(50,5,"Marital Status");
 if (!$con) {
     echo "Error: Unable to connect to MySQL." . PHP_EOL;
     echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
     echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
     exit;
    }
  
    else{
            $sql = "SELECT * FROM personalinfo WHERE id='$uid'";
            $result = array();
            $query = mysqli_query($con, $sql);
            $id = 0;
            while($rows=mysqli_fetch_assoc($query))
        {
    
            $DOB = $rows['DOB'];
            $religion = $rows['religion'];
            $nationality = $rows['nationality'];
            $maritalstatus = $rows['maritalstatus'];
            $pdf->Ln(6);
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(50,5,"$DOB");
            $pdf->Cell(50,5,"$religion");
            $pdf->Cell(50,5,"$nationality");
            $pdf->Cell(50,5,"$maritalstatus");
            /*$prop=array('HeaderColor'=>array(255,150,100),
                            'color1'=>array(210,245,255),
                            'color2'=>array(255,255,210),
                            'padding'=>2);*/
     }   
  }    

$pdf->Ln(10);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(0,3,'------------------------------------------------ Work Experiences ------------------------------------------------------',0,3,'C');

 if (!$con) {
     echo "Error: Unable to connect to MySQL." . PHP_EOL;
     echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
     echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
     exit;
    }
  
    else{
            $sql = "SELECT * FROM workexperience WHERE id='$uid'";
            $result = array();
            $query = mysqli_query($con, $sql);
            while($rows=mysqli_fetch_assoc($query))
        {
           
            $cname = $rows['cname'];
            $responsibility = $rows['responsibility'];
            $email = $rows['email'];
            $phone = $rows['phone'];
            $year = $rows['year'];
            
            $pdf->Ln(3);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(50,3,"Company/Institution Name :");
            $pdf->SetFont('Arial','',9);
            $pdf->MultiCell(50,3,"$cname");
            $pdf->Ln(); 
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(50,3,"Responsibility :");
            $pdf->SetFont('Arial','',9);
            $pdf->MultiCell(50,3,"$responsibility");
            $pdf->Ln(); 
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(50,3,"Company Email :");
            $pdf->SetFont('Arial','',9);
            $pdf->MultiCell(50,3,"$email");
            $pdf->Ln(); 
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(50,3,"Phone :");
            $pdf->SetFont('Arial','',9);
            $pdf->MultiCell(50,3,"$phone");
            $pdf->Ln(); 
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(50,3,"Year :");
            $pdf->SetFont('Arial','',9);
            $pdf->MultiCell(50,3,"$year");

            /*$prop=array('HeaderColor'=>array(255,150,100),
                            'color1'=>array(210,245,255),
                            'color2'=>array(255,255,210),
                            'padding'=>2);*/
        }
  }


$pdf->Ln(10);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(0,8,'-------------------------------------------------- References -------------------------------------------------------',0,1,'C');

 if (!$con) {
     echo "Error: Unable to connect to MySQL." . PHP_EOL;
     echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
     echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
     exit;
    }
  
    else{
            $sql = "SELECT * FROM reference WHERE id='$uid'";
            $result = array();
            $query = mysqli_query($con, $sql);
            while($rows=mysqli_fetch_assoc($query))
        {
            $cname = $rows['cname'];
            $cemail = $rows['cemail'];
            $cphone = $rows['cphone'];
            $designation = $rows['designation'];
            $pdf->Ln(3);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(50,3,"Company/Institution Name :");
            $pdf->SetFont('Arial','',9);
            $pdf->MultiCell(50,3,"$cname");
            $pdf->Ln(); 
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(50,3,"Company Email :");
            $pdf->SetFont('Arial','',9);
            $pdf->MultiCell(50,3,"$cemail");
            $pdf->Ln(); 
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(50,3,"Phone :");
            $pdf->SetFont('Arial','',9);
            $pdf->MultiCell(50,3,"$phone");
            $pdf->Ln(); 
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(50,3,"Designation :");
            $pdf->SetFont('Arial','',9);
            $pdf->MultiCell(50,3,"$designation");
            /*$prop=array('HeaderColor'=>array(255,150,100),
                            'color1'=>array(210,245,255),
                            'color2'=>array(255,255,210),
                            'padding'=>2);*/
        }
    }
$pdf->Output();
?>