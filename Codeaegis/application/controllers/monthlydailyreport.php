<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class monthlydailyreport extends CI_Controller {
      function __construct()
     {
          parent::__construct();
          $this->load->helper('url');
          $this->load->database();
     }

      function index()
     {
          //load the department_model
          $this->load->model('monthly_report_model');  
          //call the model function to get the department data
          $fieldofficer = $this->monthly_report_model->get_fieldO();           
          $data['fieldofficer'] = $fieldofficer;
          //load the department_view*/
          $this->load->view("admin/monthlydailyreport",$data);
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