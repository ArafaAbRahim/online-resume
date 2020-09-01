<?php 
require('fpdf/fpdf.php');

//create a FPDF object
$uid = $_POST['id'];
$pdf=new FPDF(); 

//set font for the entire document
$pdf->SetFont('Helvetica','B',20);
//$pdf->SetTextColor(50,60,100);

//set up a page
$pdf->AddPage('P'); 
$pdf->SetDisplayMode('default');

//insert an image and make it a link
//$pdf->Image('image/logo.gif',100,10,20,0);

//display the title with a border around it
$pdf->SetXY(40,30);
$pdf->SetDrawColor(50,60,100);
//$pdf->Write(10,'The Pakistan Credit Rating Agency Limited',0,'C',0);
$pdf->Line(10,40,200,40);

//Set x and y position for the main text, reduce font size and write content
$pdf->SetXY (20,45);
$pdf->SetFontSize(10);
$pdf->SetTextColor(30,30,100);
//$pdf->Write(5,'NL FYI s-l4l (PSO-040515)');

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="contactinfo"; // Database name 
$tbl_name="contact info"; // Table name

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,"resume");
if (!$con) {
     echo "Error: Unable to connect to MySQL." . PHP_EOL;
     echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
     echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
     exit;
    }
  
else
{
$sql="SELECT * FROM contactinfo WHERE id = '$uid'" || $sql = "SELECT * FROM career WHERE id='$uid'";
$result = array();
$query = mysqli_query($con, $sql);
while($rows=mysqli_fetch_assoc($query))
{           
    $name = $rows['name'];
    $address = $rows['address'];
    $email = $rows['email'];
    $phone = $rows['phone'];
    $aboutme = $rows['aboutme'];
    $pdf->SetXY (20,60);
    $pdf->SetFontSize(12);
    $pdf->SetTextColor(0,0,0);
    $pdf->Write(7,$name);
    $pdf->SetXY (20,65);
    $pdf->Write(7,$address);
    $pdf->SetXY (20,70);
    $pdf->Write(7,$email);
    $pdf->SetXY (50,80);
    $pdf->Write(7,$phone);
    $pdf->SetXY (50,90);
    $pdf->Write(7,$aboutme);
    $pdf->Ln(); 
}
}
/*$pdf->Ln();
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
    
            
            $careerobj = $rows['careerobj'];
            $pdf->Ln();
            $pdf->SetXY (60,100);
            $pdf->SetFontSize(12);
            $pdf->SetTextColor(0,0,0);
            $pdf->Write(7,$aboutme);
            $pdf->SetXY (20,65);
            $pdf->Write(7,$careerobj);
            $pdf->Ln(); 
                }
    }
$pdf->Ln();    

$pdf->SetFont('Arial','B',11);
$pdf->Cell(0,8,'Skill Sets',0,1,'L');
$pdf->Cell(100,2,"----------------");
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
            $pdf->Ln(6);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(20,5,"Language");
            $pdf->Ln();
            $pdf->SetFont('Arial','',9);
            $pdf->MultiCell(50,5,"$language");
            $pdf->Ln(); 
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(50,5,"Computer Skills");
            $pdf->Ln();
            $pdf->SetFont('Arial','',9);
            $pdf->MultiCell(50,5,"$computer");
            $pdf->Ln(); 
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(50,5,"Social Skills");
            $pdf->Ln();
            $pdf->SetFont('Arial','',9);
            $pdf->MultiCell(50,5,"$social");
            $pdf->Ln(); 
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(50,5,"Others");
            $pdf->Ln();
            $pdf->SetFont('Arial','',9);
            $pdf->MultiCell(50,5,"$others");
            /*$prop=array('HeaderColor'=>array(255,150,100),
                            'color1'=>array(210,245,255),
                            'color2'=>array(255,255,210),
                            'padding'=>2);
        }
    }    
$pdf->Ln();
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0,8,'Personal Information',0,1,'L');
$pdf->Cell(1000,5,"----------------------------------");

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
            $paddress = $rows['paddress'];
            $religion = $rows['religion'];
            $nationality = $rows['nationality'];
            $maritalstatus = $rows['maritalstatus'];
            $pdf->Ln(6);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(20,15,"DOB");
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(20,15,"$DOB");
            $pdf->Ln();
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(30,15,"Permanent Address");
            $pdf->SetFont('Arial','',9);
            $pdf->MultiCell(30,15,"$paddress");
            $pdf->Ln();
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(20,15,"Religion:");
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(20,15,"$religion");
            $pdf->Ln();
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(30,15,"Nationality:");
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(30,15,"$nationality");
            $pdf->Ln();
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(15,15,"Marital Status:");
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(15,15,"$maritalstatus");
            /*$prop=array('HeaderColor'=>array(255,150,100),
                            'color1'=>array(210,245,255),
                            'color2'=>array(255,255,210),
                            'padding'=>2);*/
      
$pdf->Ln();
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0,6,'Education',0,1,'L');
$pdf->Cell(1000,3,"-------------------");

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
            $pdf->Cell(30,5,"$year");
            $pdf->Ln();
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(70,5,"$institution");
            $pdf->Ln();
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(20,5,"$degree");
            $pdf->Ln();
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(15,5,"Major:");
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(15,5,"$major");
            $pdf->Ln();
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(10,5,"CGPA:");
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(10,5,"$cgpa");
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
            $pdf->Ln(4);
            $pdf->Cell(30,5,"$year");
            $pdf->Ln();
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(70,5,"$institution");
            $pdf->Ln();
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(20,5,"$degree");
            $pdf->Ln();
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(15,5,"Major:");
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(15,5,"$major");
            $pdf->Ln();
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(15,5,"CGPA:");
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(10,5,"$cgpa");
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
            $pdf->Ln(4);
            $pdf->Cell(30,5,"$year");
            $pdf->Ln();
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(70,5,"$institution");
            $pdf->Ln();
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(20,5,"$degree");
            $pdf->Ln();
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(15,5,"Major:");
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(15,5,"$major");
            $pdf->Ln();
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(15,5,"CGPA:");
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(10,5,"$cgpa");
         }
    }             
$pdf->Ln(6);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0,8,'Work Experiences',0,1,'L');
$pdf->Cell(1000,3,"-----------------------------");

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
            $email = $rows['email'];
            $phone = $rows['phone'];
            $year = $rows['year'];
            $responsibility = $rows['responsibility'];
            $pdf->Ln(6);
            $pdf->Cell(25,5,"$year");
            $pdf->SetFont('Arial','',9);
            $pdf->Ln();
            $pdf->SetFont('Arial','B',11);
            $pdf->Cell(40,5,"$responsibility");
            $pdf->Ln();
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(40,5,"$cname");
            $pdf->Ln();
            $pdf->Cell(30,5,"$email");
            $pdf->Ln();
            $pdf->Cell(30,5,"$phone");

            /*$prop=array('HeaderColor'=>array(255,150,100),
                            'color1'=>array(210,245,255),
                            'color2'=>array(255,255,210),
                            'padding'=>2);*/
        }
  }


$pdf->Ln();
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0,8,'References',0,1,'L');
$pdf->Cell(1000,3,"--------------------");

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
            $pdf->Ln(6);
            $pdf->SetFont('Arial','B',11);
            $pdf->Cell(50,5,"$cname");
            $pdf->Ln();
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(30,5,"$cemail");
            $pdf->Ln();
            $pdf->Cell(20,5,"$cphone");
            $pdf->Ln();
            $pdf->Cell(70,5,"$designation");
            /*$prop=array('HeaderColor'=>array(255,150,100),
                            'color1'=>array(210,245,255),
                            'color2'=>array(255,255,210),
                            'padding'=>2);*/
        }
    }

$pdf->Output();
?>