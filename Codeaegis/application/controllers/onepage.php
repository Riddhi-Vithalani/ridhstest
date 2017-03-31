<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Onepage extends CI_Controller {
     
    public function index() 
    {
        $this->load->view('frontend/onepage');
    }
}
?>