<html>
<head>
     
    <link href="themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="themes/1/js-image-slider.js" type="text/javascript"></script>
     
 




<?php
session_start();

$val=$_SESSION["id"];
$vi=$_SESSION['visitor'];
?>
<body>
<div id="art-main">
    <div class="art-sheet clearfix">
<header class="art-header">


    <div class="art-shapes">
     <div id="sliderFrame">
        <div id="slider"><!--
            <a href="http://www.menucool.com/javascript-image-slider" target="_blank">
                <img src="images/image-slider-1.jpg" alt="Welcome to Menucool.com" />
            </a>-->
            <img src="images1/1.PNG" alt="" />
            <img src="images1/2.PNG" alt="" />
            <img src="images1/3.PNG" alt="" />
            
        </div>
        
    </div>

    

                      
</header>
<nav class="art-nav">
    <ul class="art-hmenu"><li><a href="Tracking.php">Home</a></li><li><a href="Tracking.php">Tracking</a></li>
	 <?php
	 if($val==2)
	 {
		 ?>
	<li><a href="#">Master</a> 
	   <ul>
    <li class=""><a href='new_unit1.php'>FO Unit Update</a></li>
    <li class=""><a href=''>Add Unit</a></li>
	<!--
    <li class=""><a href='p_report.php'>Guard Patrolling</a></li> 
   <li class=""><a href='units_visit_report.php'>Units Visit Count</a></li> -->
	 </ul>
      
   </li>
 <?php
	 }?>
	
	
	
	
    <li><a href="Tracking_h.php">Tracking History</a></li>
      <li><a href="#">Report</a> 
	   <ul>
    <li class=""><a href='qrfencingreport.php'>FO QR Tracking</a></li>
   <!-- <li class=""><a href='Distance.php'>Master Distance</a></li>  --> 
    <li class=""><a href='p_report.php'>Guard Patrolling</a></li> 
    <li class=""><a href='monthdetailsreport.php'>Monthly/Weekly FO Visit</a></li> 
   <li class=""><a href='monthcheckinout.php'>Datewise Monthly Km</a></li> 
    <li class=""><a href='monthlydailyreport.php'>Unit Wait</a></li> 
  <li class=""><a href='units_visit_report.php'>Units Visit Count</a></li> 
  <li class=""><a href='guardpatrolling.php'>New Patrolling</a></li> 
   
	 </ul>
      
   </li>
   
   
   
   
   
   
    <li class=""><a href='update_radius.php'>Update Radius </a> </li>
     <?php
	if($val=='')
	{
		echo"<li><a href='log.php'>Login</a></li>"; 
	}
	else  
	{
		echo"<li><a href='logout.php'>Logout</a></li>";
	}
   
	?>
    
   
    </ul>
    
    
    </nav>