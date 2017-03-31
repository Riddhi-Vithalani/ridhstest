<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class login extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('form');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->database();
          $this->load->library('form_validation');
          //load the login model
          $this->load->model('login_model');
     }

     public function index()
     {
          //get the posted values
          $username = $this->input->post("txt_username");
          $password = $this->input->post("txt_password");

          //set validations
          $this->form_validation->set_rules("txt_username", "Username", "trim|required");
          $this->form_validation->set_rules("txt_password", "Password", "trim|required");

          if ($this->form_validation->run() == FALSE)
          {
               //validation fails
               $this->load->view('admin/login');
          }
          else
          {
               //validation succeeds
               if ($this->input->post('btn_login') == "Login")
               {
                    //check if username and password is correct
                    $usr_result = $this->login_model->get_user($username, $password);
				    //$num = $usr_result->num_rows();
					$num_rocord = $this->login_model->get_user1($username,$password);
					foreach($usr_result as $rows){ 
					$app_id = $rows->application_id;
					$username = $rows->uname;
					}
                    if ($num_rocord > 0) //active user record is present
                    {
                         //set the session variables
                         $sessiondata = array(
                              'uname' => $username,
							  'app_id'=> $app_id,
                              'loginuser' => TRUE
                         );
                         $this->session->set_userdata('logged_in',$sessiondata);
						 //$this->load->view('admin/vtracking');
						 
                         redirect("vtracking");
						 
                    }
                    else
                    {
                         $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
                         redirect('login');
                    }
               }
               else
               {
                    redirect('login');
               }
          }
     }
	 
	 // Logout from admin page
public function logout() {

// Removing session data
$sess_array = array(
'username' => ''
);
$this->session->unset_userdata('logged_in', $sess_array);
$data['message_display'] = 'Successfully Logout';
$this->load->view('login_form', $data);
}
	 
	  function main(){
		$this->load->library('table');
		$this->load->helper('html');	
		$this->load->model('login_model');

		$data = $this->books_model->general();
		$data['query'] = $this->login_model->show_all_report('aegis_geofence');
	
		$this->load->view('qrfencingrpt',$data);
	}
}
?>