<?php
session_start();
error_reporting(0);
  $app=$_SESSION['Appid'];
//error_reporting(E_ALL);
//ini_set("display_errors", 1);

 $_SESSION["dt"]=$_POST['search'];
 echo $_SESSION["nm"]=$_POST['UserName'];
 
//echo "value of sdt".$sdt;
//$_SESSION["pa"]=$_GET['Appid'];
//echo $_SESSION["id"];
$aid= $_SESSION["id"];
if($aid=='')
{
	//header('location:log.php');
}
if(isset($_GET['log']))
{
  header('location:logout.php');	
}


 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Aegis QR KM Travels  - Report</title> 
<link rel="stylesheet" type="text/css" href="css_p/theme.css"/>
<link rel="stylesheet" type="text/css" href="css_p/style.css" />
<link rel="stylesheet" type="text/css" href="css_p/searchcss.css" />
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script type="text/javascript" src="jquery-1.7.min.js"></script>
    <script type="JavaScript" src="jquery.js"></SCRIPT>
  <link rel="stylesheet" href="/resources/demos/style.css">
    
  <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
  <script src="Scripts/jquery.battatech.excelexport.js"></script> 
<script>
   var StyleFile = "theme" + document.cookie.charAt(6) + ".css";
   document.writeln('<link rel="stylesheet" type="text/css" href="css_p/' + StyleFile + '">');
</script>
<script type="text/javascript">
 
$(document).ready(function()
{
	alert("hi");
  $("tr:odd").css("background-color", "#CEF6EC");
  
 
  
});
 function showbutton(sname)
{

 var dataString1 ='name'+sname;
  alert("inside function"+dataString1);
 var path ='<?php echo base_url("index.php/Report/qrreport/"); ?>/'+sname;
 alert(path);
$.ajax({
 	 type: "GET",
	  url:path,
      //data: dataString1,
	  //contentType: "application/json; charset=utf-8",
     //dataType: 'json',
  
    success: function(msg){alert(msg);},
	 
     error: function( msg ) {alert("error");
       
     }   
	    
            
  });

 }
 
 </script>
 <script>
$(document).ready(function () {
        $("#btnExport").click(function () {
		   $("#exporttbl").btechco_excelexport({
                containerid: "exporttbl"
               , datatype: $datatype.Table
            });
        });
    });
</script>
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="css/ie-sucks.css" />
<![endif]-->
</head>




<body>
                    <div id="container">
    				 <?php //include'include/header_m.php';?>
        			<div id="wrapper">
        			 <?php //include'leftpanel.php';?>
                    <div id="content">
                    <!--form starts here-->
                    <div id="box">
            
                    <h3 id="expense" align="center">Aegis QR Fencing- Report</h3>
                     <?php 
					 date_default_timezone_set("Asia/Kolkata");
					 $date1=date("Y-m-d");?>
        <form  method="POST" enctype="multipart/form-data" name="track">
	   
	   
                   
                      <fieldset id="personal">
                       <label for="Type"><b>Search By Date:</b></label> 
                       <?php if($_SESSION["dt"]=='') {?>
                      <input type="date"  name='search'  id="keyword" autocomplete="off" value="<?php echo $date1 ?>">&nbsp;&nbsp;&nbsp;&nbsp;<?php }
					  else
					  {?>
                      <input type="date"  name='search'  id="keyword" autocomplete="off" value="<?php echo $_SESSION["dt"] ?>">&nbsp;&nbsp;&nbsp;&nbsp;
                      <?php }?>
                      
                      <!--code for Supervisor Name -->
                       <b>Field Officer:</b>  <select id="UserName" name="UserName">  
              
              <option value="All">All</option>
        

<?php 
 
foreach($this->Mlivetracking->gettable() as $row)
 {
 
//$username=$row['0'];
 
 echo "<option value='$row->supervisor'>".$row->supervisor."</option>";

 }?>
</select>  
                      
                      
                      <!--End of coding Supervisor Name -->
                      
                      
                      
                      
                      <label></label>
                      
                      
                      
                      
                      &nbsp;&nbsp;&nbsp;&nbsp;
                      
                    <input type='submit' name='submit' value='Search' id="button2" > 
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       <input type="button" id="btnExport" style="background-color:# a7cb00; color:#c00; fontWeight:bold" value="Download" name="download"   /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                       


                      </fieldset>
                       </form>
 

<div class="center" > Report Detail's </div> 
<br/>

<?php
$date=date("Y-m-d");
 echo "search".$search=$_POST['search'];
echo "useer name ".$supname=$_POST['UserName'];
//echo "value".$_GET['search'];
//echo"<br>";
//echo "value".$_GET['UserName'];
 ?>
    
	
	
	
	  <!--code for individual search-->
    
    
    <?php
	
	if($search!=''&& $supname!='All')
	{
	$sqlit=mysql_query("SELECT userid FROM `vehicleno_imei_mapping` WHERE supervisor='$supname'  and isActive='Y' ");
		
		//$sqlit=mysql_query("SELECT `imeino` FROM `vehicleno_imei_mapping` WHERE `vehicleno`='$supname'");
		if($row=mysql_fetch_array($sqlit))
		{
			//$sup=$row['imeino'];
			$sup=$row['userid'];
			
	echo "<table id='exporttbl' width='100%' style=table-layout: fixed>"; 
    echo"<th align='center'>Units</th>";
	echo"<th align='center'>Date</th>";
	echo"<th align='center'>In Time</th>";
	echo"<th align='center'>Out Time</th>";
	echo"<th align='center'>Authorised Unit</th>";
	echo"<th align='center'>Dist. in Km</th>";
	echo"<th align='center'>Tot.Km</th>";
	
	
	
 $query2="SELECT * FROM aegis_geofence where userid='$sup'  and tdate='$search' order by itime ";
  
 
   $result=mysql_query($query2);
    
		while($row=mysql_fetch_array($result))
		{ 
		$date=$row['tdate'];
		$new_date = date('d-M-Y', strtotime($date));
			echo "<tr>";
			echo "<td align='center' valign='middle' >".$row['location']."</td>";
	    	echo "<td align='center' valign='middle' >".$new_date."</td>";
			echo "<td align='center' valign='middle' >".$row['itime']."</td>";
			echo "<td align='center' valign='middle' >".$row['otime']."</td>";
			echo "<td align='center' valign='middle' >".$row['authorised_unit']."</td>";
			echo "<td align='center' valign='middle' >".$row['idistance']."</td>";
	    	echo "<td align='center' valign='middle' >".$row['distance']."</td>";
	    	 
	    	echo "</tr>";
			 
			}
			 ?>
              <tr>
             <th colspan="7" align="center"><font color="#FF4500" size="3">Unvisited Units List For The Day</font></th>	</tr>
              
             <?php
			
			//Below code for unvisit Display
			 
			

//$sql2=mysql_query("SELECT * FROM aegis_geofence_fo_new_mapping WHERE `imeino`='$sup' and TRIM(unit) not in (Select TRIM(location) from aegis_geofence where tdate='$search'  )"); 

$sql2=mysql_query("SELECT * FROM aegis_geofence_fo_new_mapping WHERE `userid`='$sup' and TRIM(unit) not in (Select TRIM(location) from aegis_geofence where tdate='$search'  )"); 

		 
		    while($row=mysql_fetch_array($sql2))
		{ 
		//$date=$row['tdate'];
		$new_date = date('d-M-Y', strtotime($search));
			echo "<tr>";
			echo "<td align='center' valign='middle' >".$row['unit']."</td>";
	    	echo "<td align='center' valign='middle' >".$new_date."</td>";
			echo "<td align='center' valign='middle' ><font color='#FF0000'><b>-</b></font></td>";
			echo "<td align='center' valign='middle' ><font color='#FF0000'><b>-</b></font></td>";
	    	echo "<td align='center' valign='middle' ><font color='#FF0000'><b>-</b></font></td>";
	    	echo "<td align='center' valign='middle' ><font color='#FF0000'><b>-</b></font></td>";
	    	echo "<td align='center' valign='middle' ><font color='#FF0000'><b>-</b></font></td>";
	    	echo "</tr>";
			} 
			
			
			//End of Display code of Absent sup 
			
			
		}
		 
	}
	
   
	
	?>
    
	
	
    <!-- code for Default search-->
    
    
    
    <?php
$date=date("Y-m-d");
 if($search=='')
 {
  
   
   echo "<table id='exporttbl' width='100%'>"; 
    echo"<th align='center'>Field Officer</th>";
	echo"<th align='center'>Date</th>";
	echo"<th align='center'>Time</th>";
	echo"<th align='center'>Dist. in Km</th>";
	echo"<th align='center'>Tot. Km</th>";
	
	 
		foreach($this->Mlivetracking->qrreport() as $row)
		{ 
		 
		$date=$row->tdate;
		$new_date = date('d-M-Y', strtotime($date));
			echo "<tr>";
			echo "<td align='center' valign='middle' >".$row->supervisor ."</td>";
	    	echo "<td align='center' valign='middle' >".$new_date."</td>";
			echo "<td align='center' valign='middle' >".$row->itime ."</td>";
			echo "<td align='center' valign='middle' ><font color='#FF0000'><b>-</b></font></td>";
	    	echo "<td align='center' valign='middle' >".$row->dis ."</td>";
	    	 
	    	echo "</tr>";
			 
			}
			
			//Below code for Absent Super Display
			 
			
			$sql2=mysql_query("SELECT supervisor FROM vehicleno_imei_mapping where  application_id='$app' and       and isActive='Y' and      userid not in (Select userid from aegis_geofence where tdate='$date'  GROUP BY imeino order by location )");  
		 
		   foreach($this->Mlivetracking->qrreportabsent() as $row)
		{ 
		//$date=$row['tdate'];
		$new_date = date('d-M-Y', strtotime($date));
			echo "<tr>";
			echo "<td align='center' valign='middle' >".$row->supervisor ."</td>";
	    	echo "<td align='center' valign='middle' >".$new_date."</td>";
			echo "<td align='center' valign='middle' ><font color='#FF0000'><b>-</b></font></td>";
	    	echo "<td align='center' valign='middle' ><font color='#FF0000'><b>-</b></font></td>";
			echo "<td align='center' valign='middle' ><font color='#FF0000'><b>-</b></font></td>";
	    	 
	    	echo "</tr>";
			 
			}
			
			  
			//End of Display code of Absent sup 
		 
 }
	
?>	  
  	</table>
 	</body>
	</html>
	
	 
 
