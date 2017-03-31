<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class monthly_report_model extends CI_Model{
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
	  function get_fieldO()
     {
          $sql = "SELECT supervisor from vehicleno_imei_mapping where isActive='Y'";
          $query = $this->db->query($sql);
          $result = $query->result();
          return $result;
     }
	 
	 
	 function getdata_qrfencing_bysupname($sdate)
     {
         
          $query = $this->db->query($sql);
          $result = $query->result();
          return $result;
     }
}