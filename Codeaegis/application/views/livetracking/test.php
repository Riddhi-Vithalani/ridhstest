<?php
session_start();  
echo "session variable value". $data['item']; 
echo "<br>";
echo "Test View";
echo $this->db->last_query();
foreach($this->Mlivetracking->securitytodayroute() as $row)
				{
					echo "<br>";
				echo $row->tdate;
				echo "<br>";
				echo $row->otime;
				securitytodayroute
				
				}
?>