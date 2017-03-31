<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class qrfencing_report extends CI_Controller {
      public function __construct()
     {
          parent::__construct();
          $this->load->helper('url');
          $this->load->database();
     }

      function index()
     {
          //load the department_model
          $this->load->model('report_model');  
          //call the model function to get the department data
          $deptresult = $this->report_model->get_data();           
          $data['deptlist'] = $deptresult;
          //load the department_view*/
          $this->load->view("admin/qrfencing_report",$data);
		  
     }
	  function dynamiclistview()
     {
		   $name=$this->input->post('name');
		   $tdate = $this->input->post('t_date');
		$this->load->model('report_model');
			if($tdate!='' && $name=='All')
			{
					$result .= "<thead>
                      <tr>"; 
					$result .= "<th align='center'>Supervisor Name</th>";
					$result .= "<th align='center'>Date</th>";
					$result .= "<th align='center'>Time</th>";
					$result .= "<th align='center'>Dist. in Km</th>";
					$result .= "<th align='center'>Tot.Km</th></tr></thead><tbody >";
	
	
	
			$sql="SELECT vehicleno,MAX(distance) as dis,time,idistance,gt.id,tdate,application_id,location FROM aegis_geofence as gt, vehicleno_imei_mapping as vim   where gt.imeino=vim.imeino and application_id='3LGB6U2' and tdate='$tdate'  GROUP BY gt.imeino ";
			$q=$this->db->query($sql);
			$res=$q->result();
		foreach($res as $row)
		 {
			$date=$row->tdate;
			$new_date = date('d-M-Y', strtotime($date));
			$result .= "<tr>";
			$result .= "<td align='center' valign='middle' >".$row->vehicleno."</td>";
	    	$result .= "<td align='center' valign='middle' >".$new_date."</td>";
			$result .= "<td align='center' valign='middle' >".$row->time."</td>";
			$result .= "<td align='center' valign='middle' ><font color='#FF0000'><b>-</b></font></td>";
	    	$result .= "<td align='center' valign='middle' >".$row->dis."</td>";
	    	 
	    	$result .= "</tr>";
			 
			}
			
			//Below code for Absent Super Display
			 
			
			$sql2="SELECT vehicleno FROM vehicleno_imei_mapping where  application_id='3LGB6U2' and imeino not in (Select imeino from aegis_geofence where tdate='$tdate'  GROUP BY imeino )"; 
		 $q1=$this->db->query($sql2);
			$res1=$q1->result();
		foreach($res1 as $row1)
		 {
		//$date=$row['tdate'];
		$new_date = date('d-M-Y', strtotime($tdate));
			$result .= "<tr>";
			$result .= "<td align='center' valign='middle' >".$row1->vehicleno."</td>";
	    	$result .= "<td align='center' valign='middle' >".$new_date."</td>";
			$result .= "<td align='center' valign='middle' ><font color='#FF0000'><b>-</b></font></td>";
			$result .= "<td align='center' valign='middle' ><font color='#FF0000'><b>-</b></font></td>";
	    	$result .= "<td align='center' valign='middle' ><font color='#FF0000'><b>-</b></font></td>";
	    	 
	    	$result .= "</tr>";
			 
			}
			
			$result .= "</tbody>";
			echo $result;
			return $result;
			}
			
		if($tdate!=''&& $name!='All')
			{
		$res=$this->report_model->displayall($name,$tdate);		 
		$result='<thead>
                      <tr>
                        <th>Units</th>
                        <th>Date</th>
                        <th>In Time</th>
						<th>Out Time</th>
                        <th>Authorised Unit</th>
                        <th>Dist. in Km</th>
						<th>Tot.Km</th>
                      </tr>
                    </thead>
                    <tbody >';
		 foreach($res as $row)
		 {
			 $date1=$row->tdate;
			 $new_date = date('d-M-Y', strtotime($date1));
			 $result .='<tr><td>'.$row->location;
			 $result .='</td><td>'.$new_date; 
			 $result .='</td><td>'.$row->itime;
			  $result .='</td><td>'.$row->otime;
			 $result .='</td><td>'.$row->authorised_unit;
			  $result .='</td><td>'.$row->idistance;
			   $result .='</td><td>'.$row->distance;
			 $result .='</td></tr>';
		 }
		$result;
		$result .='<tr><td colspan=7 align="center"><b>Unvisited Units List For The Day</b></td></tr>';
		
		$res1=$this->report_model->dispunvisited($name,$tdate);
		foreach($res1 as $row1)
		 {
			 $new_date = date('d-M-Y', strtotime($tdate));
			 $result .="<tr><td align='center' valign='middle' >".$row1->unit;
			 $result .='<td>'.$new_date; 
			 $result .="<td align='center' valign='middle' ><font color='#FF0000'><b>-</b></font></td>";
			  $result .="<td align='center' valign='middle' ><font color='#FF0000'><b>-</b></font></td>";
			 $result .="<td align='center' valign='middle' ><font color='#FF0000'><b>-</b></font></td>";
			  $result .="<td align='center' valign='middle' ><font color='#FF0000'><b>-</b></font></td>";
			   $result .="<td align='center' valign='middle' ><font color='#FF0000'><b>-</b></font></td>";
			 $result .='</tr>';
		 }
		$result .="</tbody>";
		echo $result;
		return $result;
			}
			$date=date("Y-m-d");
			
		if($tdate=='')
		 {
  
   
		    $result .="<thead>
                      <tr>"; 
			$result .="<th align='center'>Supervisor Name</th>";
			$result .="<th align='center'>Date</th>";
			$result .="<th align='center'>Time</th>";
			$result .="<th align='center'>Dist. in Km</th>";
			$result .="<th align='center'>Tot. Km</th></thead><tbody >";
	
	
	
 $query="SELECT vehicleno,MAX(distance) as dis,time,gt.id,tdate,application_id,location FROM aegis_geofence as gt, vehicleno_imei_mapping as vim   where gt.imeino=vim.imeino and application_id='3LGB6U2' and tdate='$date'  GROUP BY vim.`imeino`  ";
  
	$q=$this->db->query($query);
			$res=$q->result();
		foreach($res as $row)
		 {
   
		$date=$row['tdate'];
		$new_date = date('d-M-Y', strtotime($date));
			 $result .= "<tr>";
			 $result .= "<td align='center' valign='middle' >".$row->vehicleno."</td>";
	    	 $result .= "<td align='center' valign='middle' >".$new_date."</td>";
			 $result .= "<td align='center' valign='middle' >".$row->time."</td>";
			 $result .= "<td align='center' valign='middle' ><font color='#FF0000'><b>-</b></font></td>";
	    	 $result .= "<td align='center' valign='middle' >".$row->dis."</td>";
	    	 
	    	 $result .= "</tr>";
			 
			}
			
			//Below code for Absent Super Display
			 
			
			$sql2="SELECT vehicleno FROM vehicleno_imei_mapping where  application_id='3LGB6U2' and imeino not in (Select imeino from aegis_geofence where tdate='$date'  GROUP BY imeino order by location )"; 
		 
	$q1=$this->db->query($sql2);
			$res1=$q1->result();
		foreach($res1 as $row1)
		 {
		//$date=$row['tdate'];
		$new_date = date('d-M-Y', strtotime($date));
			 $result .="<tr>";
			 $result .= "<td align='center' valign='middle' >".$row1->vehicleno."</td>";
	    	 $result .= "<td align='center' valign='middle' >".$new_date."</td>";
			 $result .= "<td align='center' valign='middle' ><font color='#FF0000'><b>-</b></font></td>";
	    	 $result .= "<td align='center' valign='middle' ><font color='#FF0000'><b>-</b></font></td>";
			 $result .= "<td align='center' valign='middle' ><font color='#FF0000'><b>-</b></font></td>";
	    	 
	    	 $result .= "</tr>";
			 $result .= "</tbody>";
			 echo $result;
			return $result;
			 
			}
			
			  
			//End of Display code of Absent sup 
		 
 }
     }
	 function getdata_qrfencing($search)
	 {
		 echo "1";
		 $this->load->model('report_model');
		 $sdate = $search;
		 $dataresult = $this->report_model->getdata_qrfencing_bysupname($sdate); 
		 $data['datalist'] = $dataresult;
		// for ($i = 0; $i < count($deptlist); ++$i) {
		/* $return_data = '<table class="table table-hover table-dynamic filter-head">
                    <thead>
                      <tr>
                        <th>Field Officer</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Distance (KM)</th>
                        <th>Total(KM)</th>
                      </tr>
                    </thead>
                    <tbody>';
					for ($i = 0; $i < count($dataresult); ++$i) { 
                      '<tr>
                        <td>'.$dataresult[$i]->supervisor.'</td>
                        <td>'.$dataresult[$i]->tdate.'</td>
                        <td>'.$dataresult[$i]->itime.'</td>
                        <td>'.$dataresult[$i]->idistance.'</td>
                        <td>'.X.'</td>
                      </tr>';
                    }  
                   ' </tbody>
                  </table>';
		 //}*/
		 return $return_data;
		 $this->load->view("admin/qrfencing_report");
	 }
}
?>