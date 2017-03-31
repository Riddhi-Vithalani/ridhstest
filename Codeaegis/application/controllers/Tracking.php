<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tracking extends CI_Controller {
	 
	function __construct()
   {
      parent::__construct();
	   $this->load->helper('url');
	   $this->load->helper('form');
	   $this->load->model('Mlivetracking','',TRUE);
	   error_reporting(E_ALL & ~E_NOTICE);
   }
   
   function index(){
	    $this->load->view("headerview/main_header");
	    $this->load->view("livetracking/trackingview");
	    //$this->load->view("admin/qrfencing_report");
   }
    
   //Function for getting live Position of all Security from two table  vehicleno_imei_mapping table and aegis_geofence
   
   function vehiclelist()
   { 
    
       $output[]=Array();
	   $output1[]=Array();
  
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
       ->where("vim.isActive='Y' and application_id='3LGB6U2' and in_latitude >'0'  and ag.imeino=vim.imeino and ag.id IN ($subQuery)", NULL, FALSE)->get();
	   
	   //Query For getting unite all name
	    $query1=$this->db->select(" qr_latitude as in_latitude,qr_longitude as in_longitude,qr_address as address,`comment`,`tdate` as date,type")->from("ageis_check_in_out as chk")->where("type='3' and chk.isActive='Y' and application_id='3LGB6U2'")->get();
		
		
		 $output=$query->result();
		 $output1=$query1->result();
		 $finaloutput=(array_merge($output,$output1));
         echo json_encode($finaloutput);  
     
   }
   
   
    //Function for getting Today route of one Security from two table  vehicleno_imei_mapping table and aegis_geofence
   
   function securitytodayroute($name)
   {    
    
		   $query2 = $this->db->query("SELECT imeino FROM vehicleno_imei_mapping where supervisor='$name'");
           $row = $query2->row();
           $imino= $row->imeino;

    
     
       // Main Query
        $query=$this->db->select('*')->from('aegis_geofence as ag,vehicleno_imei_mapping as vim')
       ->where("vim.isActive='Y' and ag.imeino=vim.imeino and in_latitude >'0' and tdate='2015-07-29' and ag.imeino='$imino' and application_id='3LGB6U2' group by in_latitude,in_longitude  order by ag.id")
	   ->get();
	   //echo $this->db->last_query();
        echo json_encode($query->result());   
       
   
   }
   
     // Function For update dynamic left panel security list
     function dynamiclistview()
     {
	    $this->load->view("livetracking/vehiclelistview");
	  
     }
   
   
   
}
?>