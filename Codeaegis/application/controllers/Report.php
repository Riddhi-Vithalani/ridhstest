<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
	 
	function __construct()
   {
      parent::__construct();
	   $this->load->helper('url');
	   $this->load->helper('form');
	   $this->load->model('Mlivetracking','',TRUE);
	   error_reporting(E_ALL & ~E_NOTICE);
   }
   
   function index(){
	    $this->load->view("Report/KM_qr_report");
	    
   }
   
   Function qrsearch()
   {
	    $search_this=$this->input->post('UserName');
        $this->load->model('Mlivetracking');
        $searchmember=$this->Mlivetracking->qrreport($search_this);
        $data['searchmember'] = $searchmember;
        //var_dump($searchmember);
		print_r($data);
        $this->load->view('Report/KM_qr_report',$data);
   }
    
   
    
   
   
}
?>