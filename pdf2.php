
<?php
define('FPDF_FONTPATH','font/');
require('fpdf.php');

class PDF extends FPDF
{
//Current column
var $col=0;
//Ordinate of column start
var $y0;

function Header()
{
    //Page header
    global $title;

    $this->SetFont('Arial','B',15);
    $w=$this->GetStringWidth($title)+6;
    $this->SetX((210-$w)/2);
    $this->SetDrawColor(0,80,180);
    $this->SetFillColor(230,230,0);
    $this->SetTextColor(220,50,50);
    $this->SetLineWidth(1);
    $this->Cell($w,9,$title,1,1,'C',1);
    $this->Ln(10);
    //Save ordinate
    $this->y0=$this->GetY();
}

function Footer()
{
    //Page footer
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->SetTextColor(128);
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}

function SetCol($col)
{
    //Set position at a given column
    $this->col=$col;
    $x=10+$col*65;
    $this->SetLeftMargin($x);
    $this->SetX($x);
}

function AcceptPageBreak()
{
    //Method accepting or not automatic page break
    if($this->col<2)
    {
        //Go to next column
        $this->SetCol($this->col+1);
        //Set ordinate to top
        $this->SetY($this->y0);
        //Keep on page
        return false;
    }
    else
    {
        //Go back to first column
        $this->SetCol(0);
        //Page break
        return true;
    }
}

function ChapterTitle($num,$label)
{
    //Title
    $this->SetFont('Arial','',12);
    $this->SetFillColor(200,220,255);
    $this->Cell(0,6,"Chapter  $num : $label",0,1,'L',1);
    $this->Ln(4);
    //Save ordinate
    $this->y0=$this->GetY();
}

function ChapterBody($fichier)
{
    //Read text file
    //$f=fopen($fichier,'r');
    //$txt=fread($f,filesize($fichier));
    //fclose($f);
    //Font
    $this->SetFont('Times','',12);
    //Output text in a 6 cm width column
    //$this->MultiCell(60,5,$txt);
    $this->Ln();
    //Mention
    $this->SetFont('','I');
    $this->Cell(0,5,'(end of excerpt)');
    //Go back to first column
    $this->SetCol(0);
}

function PrintChapter($num,$title,$file)
{
    //Add chapter
    $this->AddPage();
    $this->ChapterTitle($num,$title);
    $this->ChapterBody($file);
}
}
$con=mysqli_connect("localhost", "root", "", "resume");
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
            $pdf->SetFont('Arial','B',14,'C');;
            $pdf->cell(50,10,"$name");
            $pdf->Ln();
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(20,10,"Address:");
            $pdf->Ln();
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(10,10,"$address");
            $pdf->Ln();
            $pdf->SetFont('Times','B',10);
            $pdf->Cell(50,10,"Contact");
            $pdf->Ln();
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(50,6,"$email");
            $pdf->Ln();
            $pdf->Cell(50,5,"$phone");
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
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(50,15,"About Me");
            $pdf->Ln();
            $pdf->SetFont('Arial','',9);
            $pdf->MultiCell(50,15,"$aboutme");
            $pdf->Ln();
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(50,15,"Career Obj");
            $pdf->SetFont('Arial','',9);
            $pdf->MultiCell(50,15,"$careerobj");
            $prop=array('HeaderColor'=>array(255,150,100),
                            'color1'=>array(210,245,255),
                            'color2'=>array(255,255,210),
                            'padding'=>2);
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
                            'padding'=>2);*/
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
     }   
  }    
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