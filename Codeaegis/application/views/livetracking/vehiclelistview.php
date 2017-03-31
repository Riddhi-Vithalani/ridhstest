<!-- start code -->
<div style="overflow: auto; max-height: 570px;">
   <?php
    
echo"<table border='1' width='100%' style='border-collapse:collapse;'>";
echo"<th width='15%' align='center'>Supervisor Name</th><th width='60%' align='center'>Address</th><th width='25%' align='center'>Time</th> ";
$stop=0;
 $running=0;
 $Ideal=0;
  
  foreach($this->Mlivetracking->vehiclelist() as $row)
				{
			 	$trno=$row->supervisor;
				$add=$row->location;
				$Ti=$row->otime;
				$da=$row->tdate;
				$ig=$row->imeino;
				$sp=$row->imeino;
				$lat=$row->in_latitude;
				$lon=$row->in_longitude;
				$iti=$row->itime;
				//$add=$ime[7];
				if($Ti!='00:00:00')
				$dati=$da." ".$Ti;
			    else
			    $dati=$da." ".$iti;
					
				
				$state;
				//echo $add;
				$final=$lat.'@'.$lon.'@'.$trno.'@'.$da.'@'.$Ti.'@'.$add.'@'.$ig.'@'.$sp;
				//echo $final."<br/>";
				if($ig==0 && $sp<5)
				{
					$stop=$stop+1;
					$url="red_c.png";
					$state='STOP';
				}
				elseif($ig==1 && $sp<5)
				{
					$Ideal=$Ideal+1;
					$url="black.png";
					$state='IDLE';
				}
				 
				else 
				{
					
					$running=$running+1;
					$url="green_c.png";
					$state='RUNNING';
				}
				
				//echo"image url".$url;

				//echo"ig".$ig;echo"<br/>";echo $sp;
    

     echo"<tr>";
	//echo"<tr style='height:10px'><td></td></tr>";
    echo"<td width='15%' align='center'><label for=trno  class='test' id='$final'>$trno</label></td><td width='60%' align='center'>$add</td><td width='25%' align='center'>$dati</td>";
    echo"</tr>";
	 
 
				}
				echo" </table>";
 //echo $stop;echo"<br/>";echo $running;
 ?>
 </div>
  


 
 
 <!-- End code-->