<?php
error_reporting(E_ALL ^ E_DEPRECATED); 
$hostname = "localhost";
$username = "ghatgegr_hrpayr";
$dbname = "ghatgegr_hrpayroll";
$password = "ghatgehrpayroll";
 
//echo "session".$_POST['application_id'];
error_reporting(0);
mysql_connect($hostname, $username, $password) OR DIE ("Unable to
connect to database! Please try again later.");
$db = mysql_select_db($dbname);

//function
	function convert_number($number) 
{ 
    if (($number < 0) || ($number > 999999999)) 
    { 
    throw new Exception("Number is out of range");
    } 

    $Gn = floor($number / 1000000);  /* Millions (giga) */ 
    $number -= $Gn * 1000000; 
    $kn = floor($number / 1000);     /* Thousands (kilo) */ 
    $number -= $kn * 1000; 
    $Hn = floor($number / 100);      /* Hundreds (hecto) */ 
    $number -= $Hn * 100; 
    $Dn = floor($number / 10);       /* Tens (deca) */ 
    $n = $number % 10;               /* Ones */ 

    $res = ""; 

    if ($Gn) 
    { 
        $res .= convert_number($Gn) . " Million"; 
    } 

    if ($kn) 
    { 
        $res .= (empty($res) ? "" : " ") . 
            convert_number($kn) . " Thousand"; 
    } 

    if ($Hn) 
    { 
        $res .= (empty($res) ? "" : " ") . 
            convert_number($Hn) . " Hundred"; 
    } 

    $ones = array("", "One", "Two", "Three", "Four", "Five", "Six", 
        "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", 
        "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen", 
        "Nineteen"); 
    $tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty", 
        "Seventy", "Eigthy", "Ninety"); 

    if ($Dn || $n) 
    { 
        if (!empty($res)) 
        { 
            $res .= " and "; 
        } 

        if ($Dn < 2) 
        { 
            $res .= $ones[$Dn * 10 + $n]; 
        } 
        else 
        { 
            $res .= $tens[$Dn]; 

            if ($n) 
            { 
                $res .= "-" . $ones[$n]; 
            } 
        } 
    } 

    if (empty($res)) 
    { 
        $res = "zero"; 
    } 

    return $res; 
}

//End of function



 $str = $_POST['month'];
  $date = date('F Y', strtotime($str));
  $datenew = date('F_Y', strtotime($str));
   
  $sql1 = "SELECT * from tbl_employee_monthly_salary where month_year='".$date."' and emp_id='".$_POST['empid']."' and application_id='".$_POST['application_id']."'";
//echo $sql1;
	$result = mysql_query($sql1); 
	$row=mysql_num_rows($result);
	$data = mysql_fetch_array($result);
	if($row>0)
	{
		//echo $data['pf'];
	$empname1 = mysql_query("select * from tbl_employee_details where emp_id='".$data['emp_id']."' and application_id='".$_POST['application_id']."'");
	//echo "select * from tbl_employee_details where emp_id='".$data['emp_id']."'";
	$empname = mysql_fetch_array($empname1);
	$emp_name = $empname['emp_name'];
	 
	$saldetails = mysql_fetch_array(mysql_query("select * from tbl_employee_monthly_salary_base where emp_id = '".$empname['emp_id']."' and  month_year='".$date."' and application_id='".$_POST['application_id']."'"));
	$des = mysql_fetch_array(mysql_query("select * from tbl_designation where des_id = '".$empname['des_id']."'"));
	$dept = mysql_fetch_array(mysql_query("select * from tbl_department where dept_id = '".$empname['dept_id']."'"));
	}

require('fpdf.php');
 
class PDF extends FPDF
{
// Page header
function Header()
{
   // Logo
   if($_POST['application_id']=='hr1')
   {
  $this->Image('http://ghatgegroup.in/images/renault_logo2.png',16,20,18);   
   
    // Move to the right
    $this->Cell(60);
	 // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Title
	$this->Cell(0,8,'', 0, 1,'');
	$this->SetTextColor(39,64,139);
    $this->Cell(210,17,'ROHARSH MOTORS PVT LTD',0,1,'C');
	  $this->Cell(60);
	 // Arial bold 15
    $this->SetFont('Arial','B',9);    
   
	$this->Cell(90,0,'R .S. NO : 35, DEEP COMPLEX, MUMBAI PUNE HIGHWAY BYPASS , BANER , PUNE - 57', 0,0,'C');
	  // Line break
	$this->Ln(0);
   }
   else if($_POST['application_id']=='chetan')
	    {
  //$this->Image('http://ghatgegroup.in/images/logo_login.png',16,20,18);
   
    // Move to the right
    $this->Cell(60);
	 // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Title
	$this->Cell(0,8,'', 0, 1,'');
	$this->SetTextColor(39,64,139);
    $this->Cell(210,17,'CHETAN MOTORS PVT LTD',0,1,'C');
	  $this->Cell(60);
	 // Arial bold 15
    $this->SetFont('Arial','B',9);    
   
	$this->Cell(90,0,'R .S. NO : 35, DEEP COMPLEX, MUMBAI PUNE HIGHWAY BYPASS , BANER , PUNE - 57', 0,0,'C');
	  // Line break
	$this->Ln(0);
   }
}

// Page footer
/*function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','B',9);
    // Page number
    $this->Cell(0,10,'THIS IS COMPUTER GENERATED DOCUMENT, HENCE SIGNATURE IS NOT REQUIRED. '.$this->PageNo().'/{nb}',0,0,'C');
}*/
}


// Instanciation of inherited class
$pdf = new PDF();
$pdf1 = new PDF();
$pdf->AliasNbPages(); 
$pdf->AddPage();
$pdf->SetFont('Times','',12); 
$pdf->Cell(0,4,'________________________________________________________________________________________',0,1);
$pdf->Cell(0,6,'',0,1);
//for($i=1;$i<=40;$i++)
 
$pdf->Cell(60);
$pdf->SetFont('Times','B',10);
    $pdf->Cell(10,10,'SALARY SLIP for '.$date);
	$pdf->SetFont('Times','',10); 
	$pdf->Cell(95);
	$pdf->Cell(10,10,'F/HR/03');
	
	$pdf->Ln(10);
    //$pdf->Cell(15);
	//$pdf->Cell(40,7,'Payslip No. ', 1, 0);$pdf->Cell(50,7,'1', 1, 0); $pdf->Cell(40,7,'Month ', 1, 0);$pdf->Cell(50,7,$date, 1, 1);
$pdf->Cell(40,5,'Emp. No. ', 1, 0);$pdf->Cell(50,5,$empname['emp_id'], 1, 0);$pdf->Cell(40,5,'Name', 1, 0);$pdf->Cell(50,5,$empname['emp_name'], 1, 1); 
$pdf->Cell(40,5,'Department', 1, 0);$pdf->Cell(50,5,$dept['dept_name'], 1, 0); $pdf->Cell(40,5,'Designation', 1, 0);$pdf->Cell(50,5,$des['des_name'], 1, 1);
$pdf->Cell(40,5,'Grade', 1, 0);$pdf->Cell(50,5,$empname['grade'], 1, 0); $pdf->Cell(40,5,'Branch ', 1, 0);$pdf->Cell(50,5,$empname['officebranch'], 1, 1);
$pdf->Cell(40,5,'Bank A/c no.', 1, 0);$pdf->Cell(50,5,$empname['bank_acc_no'], 1, 0);$pdf->Cell(40,5,'PAN No', 1, 0);$pdf->Cell(50,5,$empname['pan_no'], 1, 1); 
$pdf->Cell(40,5,'ESI No. ', 1, 0);$pdf->Cell(50,5,$empname['esi_no'], 1, 0);$pdf->Cell(40,5,'UAN No ', 1, 0);$pdf->Cell(50,5,$empname['uan_no'], 1, 1);
 
$pdf->Cell(40,5,'PF No.', 1, 0);$pdf->Cell(50,5,$empname['pf_no'], 1, 0);$pdf->Cell(40,5,'Present Days ', 1, 0);$pdf->Cell(50,5,$data['present_day'], 1, 1); 

$pdf->Ln(02);
$pdf->SetFont('Times','B',10);  
$pdf->Cell(45,5,'Leave', 1, 0);$pdf->Cell(30,5,'CL', 1, 0);$pdf->Cell(30,5,'SL', 1, 0);$pdf->Cell(45,5,'PL', 1, 0); $pdf->Cell(30,5,'Absent', 1, 1);
$pdf->SetFont('Times','',10); 
$pdf->Cell(45,5,'Availed', 1, 0);$pdf->Cell(30,5,'-', 1, 0);$pdf->Cell(30,5,'-', 1, 0);$pdf->Cell(45,5,'-', 1, 0); $pdf->Cell(30,5,'-', 1, 1);

$pdf->Cell(45,5,'Balance', 1, 0);$pdf->Cell(30,5,'-', 1, 0);$pdf->Cell(30,5,'-', 1, 0);$pdf->Cell(45,5,'-', 1, 0); $pdf->Cell(30,5,'-', 1, 1);

 

 

$pdf->Ln(02);
$pdf->SetFont('Times','B',10);  
$pdf->Cell(45,5,'Earnings Details', 1, 0);$pdf->Cell(30,5,'Rate Rs', 1, 0);$pdf->Cell(30,5,'Amount Rs.', 1, 0);$pdf->Cell(45,5,'Deduction Details.', 1, 0); $pdf->Cell(30,5,'Amount Rs.', 1, 1);
$pdf->SetFont('Times','',10); 
$pdf->Cell(45,5,'Basic', 1, 0);$pdf->Cell(30,5,$saldetails['basic'], 1, 0);$pdf->Cell(30,5,$data['basic'], 1, 0);$pdf->Cell(45,5,'PF', 1, 0); $pdf->Cell(30,5,$data['pf'], 1, 1);

$pdf->Cell(45,5,'FDA', 1, 0);$pdf->Cell(30,5,$saldetails['fda'], 1, 0);$pdf->Cell(30,5,$data['fda'], 1, 0);$pdf->Cell(45,5,'PT', 1, 0); $pdf->Cell(30,5,$data['pt'], 1, 1);

$pdf->Cell(45,5,'HRA', 1, 0);$pdf->Cell(30,5,$saldetails['hra'], 1, 0);$pdf->Cell(30,5,$data['hra'], 1, 0);$pdf->Cell(45,5,'ESI', 1, 0); $pdf->Cell(30,5,$data['esi'], 1, 1);

$pdf->Cell(45,5,'Medical', 1, 0);$pdf->Cell(30,5,$saldetails['medical'], 1, 0);$pdf->Cell(30,5,$data['medical'], 1, 0);$pdf->Cell(45,5,'Arears', 1, 0); $pdf->Cell(30,5,$data['arears'], 1, 1);

$pdf->Cell(45,5,'Conveyance', 1, 0);$pdf->Cell(30,5,$saldetails['conveyance'], 1, 0);$pdf->Cell(30,5,$data['conveyance'], 1, 0);$pdf->Cell(45,5,'Insurance', 1, 0); $pdf->Cell(30,5,$data['insurance'], 1, 1);

$pdf->Cell(45,5,'Education', 1, 0);$pdf->Cell(30,5,$saldetails['education'], 1, 0);$pdf->Cell(30,5,$data['education'], 1, 0);$pdf->Cell(45,5,'Comp. off.', 1, 0); $pdf->Cell(30,5,$data['compoff_amount'], 1, 1);

$pdf->Cell(45,5,'Prof. Allowance', 1, 0);$pdf->Cell(30,5,$saldetails['prof_allow'], 1, 0);$pdf->Cell(30,5,$data['prof_allow'], 1, 0);$pdf->Cell(45,5,'Other', 1, 0); $pdf->Cell(30,5,$data['other'], 1, 1);

$pdf->Cell(45,5,'City Comp', 1, 0);$pdf->Cell(30,5,$saldetails['city_comp'], 1, 0);$pdf->Cell(30,5,$data['city_comp'], 1, 0);$pdf->Cell(45,5,'Revenue Stamp', 1, 0); $pdf->Cell(30,5,$data['revenue_st'], 1, 1);
$pdf->SetFont('Times','B',10);
$pdf->Cell(45,5,'Total Earning', 1, 0);$pdf->Cell(30,5,$saldetails['total_earning'], 1, 0);$pdf->Cell(30,5,$data['total_earning'], 1, 0);$pdf->Cell(45,5,'Total Deduction', 1, 0); $pdf->Cell(30,5,$data['total_deduction'], 1, 1);

$pdf->Cell(105,5,'Bank A/c No.'.$empname['bank_acc_no'], 1, 0);$pdf->Cell(45,5,'Net Pay Rs.', 1, 0); $pdf->Cell(30,5,$data['net_amount'], 1, 1);

$pdf->Cell(60,5,'In Words', 1, 0);$pdf->SetTextColor(39,64,139);   $pdf->Cell(120,5,convert_number($data['net_amount']), 1, 1);
$pdf->SetTextColor(20,19,19);

$pdf->SetFont('Times','',10); 
 $pdf->Cell(0,10,'THIS IS COMPUTER GENERATED DOCUMENT, HENCE SIGNATURE IS NOT REQUIRED. ');

 
//$pdf->Output($empname['emp_id'].'_'.$date.'.pdf','F');
$filename="../payslip/".$empname['emp_id'].'_'.$datenew.'.pdf';
$pdf->Output($filename,'F');

     
$pdf->Output();
?>