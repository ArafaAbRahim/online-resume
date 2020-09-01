<?php
require('fpdf.php');

class PDF extends FPDF
{

}

//Connect to database
$con=mysqli_connect("localhost", "root", "", "resume");
    //mysqli_select_db($con, "resume");

    

$pdf=new FPDF();
$pdf->AddPage();
//Second table: specify 3 columns

$pdf->SetFont('Arial','',18);
$pdf->Cell(0,6,'Contact Information',0,1,'C');
$pdf->Cell(1000,3,"                                   -------------------------------");
$pdf->Ln(10);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(25,15,"id");
$pdf->Cell(50,15,"Name");
$pdf->Cell(50,15,"Address");
$pdf->Cell(50,15,"Email");
$pdf->Cell(50,15,"Phone");
$pdf->Ln();
$pdf->Cell(450,3," ---------------------------------------------------------------------------------------------------------------------------------------------------------------");
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
        $sql = "SELECT * FROM contactinfo";
        
        $result = array();
        $query = mysqli_query($con, $sql);
        $id = 0;
        while($rows=mysqli_fetch_assoc($query))
        {
            $id = $id + 1;
            $id = $rows['id'];
            $name = $rows['name'];
            $address = $rows['address'];
            $phone = $rows['phone'];
            $email = $rows['email'];
            $pdf->Ln();
            $pdf->Cell(25,15,"$id");
            $pdf->Cell(50,15,"$name");
            $pdf->Cell(50,15,"$address");
            $pdf->Cell(50,15,"$email");
            $pdf->Cell(50,15,"Phone");
            /*$prop=array('HeaderColor'=>array(255,150,100),
                            'color1'=>array(210,245,255),
                            'color2'=>array(255,255,210),
                            'padding'=>2);*/
        }
    }

$pdf->Ln();
$pdf->SetFont('Arial','',18);
$pdf->Cell(0,6,'Career',0,1,'C');
$pdf->Cell(1000,3,"                                   -------------------------------");
$pdf->Ln(10);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(25,15,"id");
$pdf->Cell(50,15,"aboutme");
$pdf->Cell(50,15,"careerobj");
$pdf->Cell(50,15,"erxtraactivities");
$pdf->Ln();
$pdf->Cell(450,3," ---------------------------------------------------------------------------------------------------------------------------------------------------------------");
 if (!$con) {
     echo "Error: Unable to connect to MySQL." . PHP_EOL;
     echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
     echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
     exit;
    }
  
    else{
            $sql = "SELECT * FROM career";
            $result = array();
            $query = mysqli_query($con, $sql);
            $id = 0;
            while($rows=mysqli_fetch_assoc($query))
        {
            $id = $id + 1;
            $id = $rows['id'];
            $aboutme = $rows['aboutme'];
            $careerobj = $rows['careerobj'];
            $erxtraactivities = $rows['erxtraactivities'];
            $pdf->Ln();
            $pdf->Cell(25,15,"$id");
            $pdf->Cell(50,15,"$aboutme");
            $pdf->Cell(50,15,"$careerobj");
            $pdf->Cell(50,15,"$erxtraactivities");
            $prop=array('HeaderColor'=>array(255,150,100),
                            'color1'=>array(210,245,255),
                            'color2'=>array(255,255,210),
                            'padding'=>2);
        }
    }
    
$pdf->Ln();
$pdf->SetFont('Arial','',18);
$pdf->Cell(0,6,'Education',0,1,'C');
$pdf->Cell(1000,3,"                                   -------------------------------");
$pdf->Ln(10);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,15,"id");
$pdf->Cell(20,15,"degree");
$pdf->Cell(70,15,"institution");
$pdf->Cell(20,15,"year");
$pdf->Cell(25,15,"major");
$pdf->Cell(10,15,"cgpa");
$pdf->Ln();
$pdf->Cell(450,3," ---------------------------------------------------------------------------------------------------------------------------------------------------------------");
 if (!$con) {
     echo "Error: Unable to connect to MySQL." . PHP_EOL;
     echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
     echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
     exit;
    }
  
    else{
            $sql = "SELECT * FROM education";
            $result = array();
            $query = mysqli_query($con, $sql);
            $id = 0;
            while($rows=mysqli_fetch_assoc($query))
        {
            $id = $id + 1;
            $id = $rows['id'];
            $degree = $rows['degree'];
            $institution = $rows['institution'];
            $year = $rows['year'];
            $major = $rows['major'];
            $cgpa = $rows['cgpa'];
            $pdf->Ln();
            $pdf->Cell(10,15,"$id");
            $pdf->Cell(20,15,"$degree");
            $pdf->Cell(70,15,"$institution");
            $pdf->Cell(20,15,"year");
            $pdf->Cell(25,15,"major");
            $pdf->Cell(10,15,"cgpa");
            $prop=array('HeaderColor'=>array(255,150,100),
                            'color1'=>array(210,245,255),
                            'color2'=>array(255,255,210),
                            'padding'=>2);
        }
    }
    
    
$pdf->Output();
?>