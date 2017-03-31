<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {
	
	function __construct()
   {
      parent::__construct();
	   $this->load->helper('url');
	  // $this->load->model('Mlivetracking','',TRUE);
	   error_reporting(E_ALL & ~E_NOTICE);
   }
   
   function index(){
	    $this->load->helper('form');
	   $this->load->helper('url');
	   $this->load->view("admin/dashboard");
	    //$this->load->view("livetracking/vehiclelistview");
	   
   }
}
?>