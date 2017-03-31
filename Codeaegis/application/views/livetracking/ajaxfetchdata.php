<?php
             session_start();
			 ini_set('max_execution_time', 0);
			 $app=$_SESSION['Appid'];
			  
			if($_GET['id']=='')
			{
				 
				$var=$_SESSION['UserName'];
				//echo"var".$var;
			}
			else
			{
				$var=$_SESSION['UserName'] = $_GET['id'];
			}
			
			//echo $var;
		 
			date_default_timezone_set('Asia/Calcutta');
                $current_date = date('Y-m-d');		
				$sub_day = strtotime($current_date);
				$sub_day = date('Y-m-d', $sub_day);	
			
			$link = mysql_connect('ageis.db.9788120.hostedresource.com','ageis','Wipro123@#') OR die('Couldnot connect to mysql server');
                mysql_select_db('ageis') OR die('Couldnot connect to database classified');
				
				$imiquery=("select imeino from vehicleno_imei_mapping where supervisor='$var'");
				$result=mysql_query($imiquery);
			//echo $imiquery;
    	        
    	        while($row=mysql_fetch_array($result))
				{
				$ime=$row['imeino'];
				  //echo $ime;
				}
				
		       //echo "value of var".$var;
			   //echo"<br>";
				
			  if($var=='All')
			  
			  {
			  
			  $query="SELECT qr_latitude as in_latitude,qr_longitude as in_longitude,qr_address as address,`comment`,`tdate` as date,type FROM ageis_check_in_out as chk  where type='3' and chk.isActive='Y' and application_id='$app'";
			 	 
				
				
				$query1="SELECT in_latitude,in_longitude,distance,tdate as date,otime as time,application_id,location as address,supervisor,itime FROM aegis_geofence as ag, vehicleno_imei_mapping as vim   where ag.imeino=vim.imeino and application_id='$app' and in_latitude>'0' and vim.isActive='Y' and  ag.id in (select id from  ( select max(ag1.id) as id,ag1.imeino from aegis_geofence  as ag1 where ag1.imeino in (select imeino from vehicleno_imei_mapping as vim) group by ag1.imeino) as z )";
				
			  }
			  
 		  if($ime!='')
			 { 
				   $query="SELECT in_latitude,in_longitude,distance,tdate as date,location as address,supervisor,otime as time,itime FROM aegis_geofence as ag , vehicleno_imei_mapping as vim   where ag.imeino=vim.imeino and application_id='$app' and in_latitude>'0' and vim.isActive='Y' and tdate='$current_date' and ag.imeino='$ime' group by in_latitude,in_longitude  order by ag.id";  



                  //$query="SELECT in_latitude,in_longitude,distance,tdate,application_id,location FROM aegis_geofence as ag,  where application_id='$app' and in_latitude>'0' and tdate='$current_date' and ag.imeino='$ime'  group by`location` order by ag.id";


				   
				 //$query ="SELECT * FROM aegis_geofence where imeino='$ime' and tdate='$current_date' ";
				 
			 }
			
			
			 
			 
		        //echo $query1; 
    	        $result=mysql_query($query);
				$result1=mysql_query($query1);
    	        
    	        while($row=mysql_fetch_array($result))
				$output[]=$row;
				if($var=='All')
				{
				  while($row1=mysql_fetch_array($result1)) 
    	       	  $output[]=$row1;
				    
				}
				echo json_encode($output);
				//print_r($output);
				
				 
?>