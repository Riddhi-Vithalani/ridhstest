<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class report_model extends CI_Model{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

     //read the department list from db
     function get_data()
     {
          $sql = "SELECT supervisor,MAX(distance) as dis,itime,idistance,gt.id,tdate,application_id,location FROM aegis_geofence as gt, vehicleno_imei_mapping as vim   where gt.userid = vim.userid and application_id='3LGB6U2' and isActive='Y' GROUP BY gt.userid";
          $query = $this->db->query($sql);
          $result = $query->result(); 
          return $result;
     }
	  function vehiclelist()
   { 
   
       // Sub Query2
       $this->db->select('imeino')->from('vehicleno_imei_mapping as vim');  
       $subQuery2 =  $this->db->get_compiled_select();

       // Sub Query1
       $this->db->select('max(ag1.id) as id,ag1.imeino')->from('aegis_geofence as ag1')->where("ag1.imeino IN ($subQuery2)", NULL, FALSE);
       $this->db->group_by('ag1.imeino'); 
       $subQuery1 =  $this->db->get_compiled_select();

       // Sub Query
       $this->db->select('id')->from("($subQuery1) as z", NULL, FALSE);
       $subQuery =  $this->db->get_compiled_select();
 
       // Main Query
       $query=$this->db->select('*')->from('aegis_geofence as ag,vehicleno_imei_mapping as vim')
       ->where("vim.isActive='Y' and application_id='3LGB6U2' and in_latitude >'0' and ag.imeino=vim.imeino and ag.id IN ($subQuery)", NULL, FALSE)->get();
         
       return $query->result();
  
   }
   function dispunvisited($name,$tdate)
   {
	    $sqlit="SELECT `imeino` FROM `vehicleno_imei_mapping` WHERE `supervisor`='$name' and isActive='Y' ";
		 $query = $this->db->query($sqlit);
			
			$res=$query->result();
			
			 foreach($res as $row)
				 {
					 $sup=$row->imeino;
				 }
	    $sql="SELECT * FROM aegis_geofence_fo_mapping WHERE `imeino`='$sup' and TRIM(unit) not in (Select TRIM(location) from aegis_geofence where tdate='$tdate'  )";
	    $q=$this->db->query($sql);
	    return $res1=$q->result();
	   
   }
	  function displayall($name,$tdate)
	 {
		 $tdate=date('Y-m-d', strtotime($tdate));
		 if($tdate!='' && $name=='All')
			{
				$query="SELECT vehicleno,MAX(distance) as dis,time,idistance,gt.id,tdate,application_id,location FROM aegis_geofence as gt, vehicleno_imei_mapping as vim   where gt.imeino=vim.imeino and application_id='3LGB6U2' and tdate='$tdate'  GROUP BY gt.imeino ";
			
			}
		  if($name=='All')
		 {
			 $qq=$this->db->select('supervisor,MAX(distance) as dis,itime,idistance,gt.id,tdate,application_id,location')->from('aegis_geofence as gt, vehicleno_imei_mapping as vim')
       ->where("gt.userid = vim.userid and application_id='3LGB6U2' and isActive='Y' GROUP BY gt.userid", NULL, FALSE)->get();
         
       return $qq->result();
			
		 }
		 if($tdate!=''&& $name!='All')
			{
		$sqlit="SELECT `imeino` FROM `vehicleno_imei_mapping` WHERE `supervisor`='$name' and isActive='Y' ";
		 $query = $this->db->query($sqlit);
			
			$res=$query->result();
			
			 foreach($res as $row)
				 {
					 $sup=$row->imeino;
				 }
		$tdate=date('Y-m-d', strtotime($tdate));
			echo $sql2="SELECT * FROM aegis_geofence where imeino='$sup' and tdate='$tdate'";
			 $query2 = $this->db->query($sql2);
			
			$result=$query2->result();
			return $result;
			}		
		
		 
	 }

	 function getdata_qrfencing_bysupname($sdate)
     {
          echo $sql = "SELECT supervisor,MAX(distance) as dis,itime,idistance,gt.id,tdate,application_id,location FROM aegis_geofence as gt, vehicleno_imei_mapping as vim   where gt.userid = vim.userid and application_id='3LGB6U2' and isActive='Y' GROUP BY gt.userid";
          $query = $this->db->query($sql);
          $result = $query->result();
          return $result;
     }
}