<?php
session_start();
error_reporting(0);
 
//error_reporting(E_ALL);
//ini_set("display_errors", 1);

 $_SESSION["dt"]=$_GET['search'];
 $_SESSION["nm"]=$_GET['UserName'];
 
//echo "value of sdt".$sdt;
//$_SESSION["pa"]=$_GET['Appid'];
//echo $_SESSION["id"];
$aid= $_SESSION["id"];
if($aid=='')
{
	header('location:log.php');
}
if(isset($_GET['log']))
{
  header('location:logout.php');	
}

//$page->setTitle('My first HTML page');
//echo" $_SESSION[username]";
//$test=$_SESSION['username'];
 $link = mysql_connect('notificationprod.db.9788120.hostedresource.com','notificationprod','Wipro123@') OR die('Couldnot connect to mysql server');
                mysql_select_db('notificationprod') OR die('Couldnot connect to database classified');
 //Time in words(Added on 17/07/2014) 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Aegis KM Travels  - Report</title> 
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
  $("tr:odd").css("background-color", "#CEF6EC");
});
 
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
            
                    <h3 id="expense" align="center">Aegis Fencing- Report</h3>
                     <?php 
					 date_default_timezone_set("Asia/Kolkata");
					 $date1=date("Y-m-d");?>
                     <form   method='GET' form id="form">
                   
                      <fieldset id="personal">
                       <label for="Type"><b>Search By Date:</b></label> 
                       <?php if($_SESSION["dt"]=='') {?>
                      <input type="date"  name='search'  id="keyword" autocomplete="off" value="<?php echo $date1 ?>">&nbsp;&nbsp;&nbsp;&nbsp;<?php }
					  else
					  {?>
                      <input type="date"  name='search'  id="keyword" autocomplete="off" value="<?php echo $_SESSION["dt"] ?>">&nbsp;&nbsp;&nbsp;&nbsp;
                      <?php }?>
                      
                      <!--code for Supervisor Name -->
                       <b>Supervisor Name:</b>  <select id="UserName" name="UserName">  
              <!--<option value="">--Select Supervisor--</option>-->
              <?php if($_SESSION["nm"]=='') {?>
              <option value="All">All</option>
        <?php } else{?>
        <option value="<?php echo $_SESSION["nm"] ?>"><?php echo $_SESSION["nm"] ?></option>
        <option value="All">All</option>
        <?php } ?>
<?php 
 
//$sql1="select vehicleno,application_id from  vehicleno_imei_mapping where application_id='3LGB6U2'";
//$sql1="SELECT * FROM vehicleno_imei_mapping as vim ,ageis_check_in_out as aio  WHERE vim.`imeino`=aio.`imeino` and type='3' group by  vim.`imeino`";
$sql1="SELECT distinct vehicleno FROM vehicleno_imei_mapping as vim ,aegis_geofence_fo_mapping as aio  WHERE vim.`imeino`=aio.`imeino` and isActive='Y' order by vehicleno  asc";// changed on 10/01/2015
echo $sql1;
 
//print_r($sql1);
//exit;
$result=mysql_query($sql1);

while($row=mysql_fetch_array($result))
{
 
$username=$row['vehicleno'];
 echo "<option value='$username'>".$username."</option>";

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
$search=$_GET['search'];
$supname=$_GET['UserName'];
//echo "value".$_GET['search'];
//echo"<br>";
//echo "value".$_GET['UserName'];
if($search!='' && $supname=='All')
{
   echo "<table id='exporttbl' width='100%' style=table-layout: fixed>"; 
    echo"<th align='center'>Supervisor Name</th>";
	echo"<th align='center'>Date</th>";
	echo"<th align='center'>Time</th>";
	echo"<th align='center'>Dist. in Km</th>";
	echo"<th align='center'>Tot.Km</th>";
	
	
	
 $query="SELECT vehicleno,MAX(distance) as dis,time,idistance,gt.id,tdate,application_id,location FROM aegis_geofence as gt, vehicleno_imei_mapping as vim   where gt.imeino=vim.imeino and application_id='3LGB6U2' and tdate='$search'  GROUP BY gt.imeino ";
 
 
   $result=mysql_query($query);
    
		while($row=mysql_fetch_array($result))
		{ 
		$date=$row['tdate'];
		$new_date = date('d-M-Y', strtotime($date));
			echo "<tr>";
			echo "<td align='center' valign='middle' >".$row['vehicleno']."</td>";
	    	echo "<td align='center' valign='middle' >".$new_date."</td>";
			echo "<td align='center' valign='middle' >".$row['time']."</td>";
			echo "<td align='center' valign='middle' ><font color='#FF0000'><b>-</b></font></td>";
	    	echo "<td align='center' valign='middle' >".$row['dis']."</td>";
	    	 
	    	echo "</tr>";
			 
			}
			
			//Below code for Absent Super Display
			 
			
			$sql2=mysql_query("SELECT vehicleno FROM vehicleno_imei_mapping where  application_id='3LGB6U2' and imeino not in (Select imeino from aegis_geofence where tdate='$search'  GROUP BY imeino )"); 
		 
		    while($row=mysql_fetch_array($sql2))
		{ 
		//$date=$row['tdate'];
		$new_date = date('d-M-Y', strtotime($search));
			echo "<tr>";
			echo "<td align='center' valign='middle' >".$row['vehicleno']."</td>";
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
    
    
    <!--code for individual search-->
    
    
    <?php
	
	if($search!=''&& $supname!='All')
	{
		$sqlit=mysql_query("SELECT `imeino` FROM `vehicleno_imei_mapping` WHERE `vehicleno`='$supname'");
		if($row=mysql_fetch_array($sqlit))
		{
			$sup=$row['imeino'];
			
			
	echo "<table id='exporttbl' width='100%' style=table-layout: fixed>"; 
    echo"<th align='center'>Units</th>";
	echo"<th align='center'>Date</th>";
	echo"<th align='center'>In Time</th>";
	echo"<th align='center'>Out Time</th>";
	echo"<th align='center'>Authorised Unit</th>";
	echo"<th align='center'>Dist. in Km</th>";
	echo"<th align='center'>Tot.Km</th>";
	
	
	
 $query2="SELECT * FROM aegis_geofence where imeino='$sup' and tdate='$search' ";
  
 
   $result=mysql_query($query2);
    
		while($row=mysql_fetch_array($result))
		{ 
		$date=$row['tdate'];
		$new_date = date('d-M-Y', strtotime($date));
			echo "<tr>";
			echo "<td align='center' valign='middle' >".$row['location']."</td>";
	    	echo "<td align='center' valign='middle' >".$new_date."</td>";
			echo "<td align='center' valign='middle' >".$row['time']."</td>";
			echo "<td align='center' valign='middle' >".$row['otime']."</td>";
			echo "<td align='center' valign='middle' >".$row['authorised_unit']."</td>";
			echo "<td align='center' valign='middle' >".$row['idistance']."</td>";
	    	echo "<td align='center' valign='middle' >".$row['distance']."</td>";
	    	 
	    	echo "</tr>";
			 
			}
			 ?>
              <tr>
             <th colspan="5" align="center"><font color="#FF4500" size="3">Unvisited Units List For The Day</font></th>	</tr>
              
             <?php
			
			//Below code for unvisit Display
			 
			
// $sql2=mysql_query("SELECT * FROM `ageis_check_in_out` WHERE `imeino`='$sup' and type='3' and TRIM(comment) not in (Select TRIM(location) from aegis_geofence where tdate='$search'  )"); 
$sql2=mysql_query("SELECT * FROM aegis_geofence_fo_mapping WHERE `imeino`='$sup' and TRIM(unit) not in (Select TRIM(location) from aegis_geofence where tdate='$search'  )"); 
		 
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
  
   
   echo "<table id='exporttbl' width='100%' style=table-layout: fixed>"; 
    echo"<th align='center'>Supervisor Name</th>";
	echo"<th align='center'>Date</th>";
	echo"<th align='center'>Time</th>";
	echo"<th align='center'>Dist. in Km</th>";
	echo"<th align='center'>Tot. Km</th>";
	
	
	
 $query="SELECT vehicleno,MAX(distance) as dis,time,gt.id,tdate,application_id,location FROM aegis_geofence as gt, vehicleno_imei_mapping as vim   where gt.imeino=vim.imeino and application_id='3LGB6U2' and tdate='$date'  GROUP BY vim.`imeino`  ";
  
 
   $result=mysql_query($query);
    
		while($row=mysql_fetch_array($result))
		{ 
		$date=$row['tdate'];
		$new_date = date('d-M-Y', strtotime($date));
			echo "<tr>";
			echo "<td align='center' valign='middle' >".$row['vehicleno']."</td>";
	    	echo "<td align='center' valign='middle' >".$new_date."</td>";
			echo "<td align='center' valign='middle' >".$row['time']."</td>";
			echo "<td align='center' valign='middle' ><font color='#FF0000'><b>-</b></font></td>";
	    	echo "<td align='center' valign='middle' >".$row['dis']."</td>";
	    	 
	    	echo "</tr>";
			 
			}
			
			//Below code for Absent Super Display
			 
			
			$sql2=mysql_query("SELECT vehicleno FROM vehicleno_imei_mapping where  application_id='3LGB6U2' and            imeino not in (Select imeino from aegis_geofence where tdate='$date'  GROUP BY imeino order by location )"); 
		 
		    while($row=mysql_fetch_array($sql2))
		{ 
		//$date=$row['tdate'];
		$new_date = date('d-M-Y', strtotime($date));
			echo "<tr>";
			echo "<td align='center' valign='middle' >".$row['vehicleno']."</td>";
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
 
