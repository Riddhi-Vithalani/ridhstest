<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mlivetracking extends  CI_Model{

	function __construct()
   {
      parent::__construct();
   }
   // Function for fetch all tha data from vehicleno_imei_mapping table
   function gettable()
   {    $this->db->where("application_id='3LGB6U2'");
	    $query=$this->db->get('vehicleno_imei_mapping');
	    return  $query->result();  
   }
   
   //Function for getting live Position of all Security from two table  vehicleno_imei_mapping table and aegis_geofence
   
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
   
   //Function for getting Today route of one Security from two table  vehicleno_imei_mapping table and aegis_geofence
   
   function securitytodayroute()
   { 
       
       // Main Query
       $query=$this->db->select('*')->from('aegis_geofence as ag,vehicleno_imei_mapping as vim')
       ->where("vim.isActive='Y' and ag.imeino=vim.imeino and in_latitude >'0' and tdate='2015-07-29' and ag.imeino='352840061303064' and application_id='3LGB6U2' group by in_latitude,in_longitude  order by ag.id")
	   ->get();
         
       return $query->result();
  
   }
   
   //Function for getting search result for qrreport
   
        function qrreport()
        { 
        $query=$this->db->select('*')->from('aegis_geofence as ag,vehicleno_imei_mapping as vim')
		->where("ag.userid = vim.userid and application_id='3LGB6U2' and isActive='Y' and tdate='2015-07-29'  GROUP BY ag.userid")
	   ->get();
         
       return $query->result();
		 
       }
	   
	   
	   //Function for getting search result for qrreport
   
        function qrreportabsent()
        { 
        $query=$this->db->select('*')->from('vehicleno_imei_mapping as vim')
		->where("application_id='3LGB6U2' and isActive='Y'  and userid not in (Select userid from aegis_geofence where tdate='2015-07-29'  GROUP BY imeino order by location )  ")
	   ->get();
         
       return $query->result();
		 
       }
   
   
   }
   ?>