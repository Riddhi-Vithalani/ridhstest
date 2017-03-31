<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class report1 extends CI_Model{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

     //read the department list from db
     function get_department_list($table,$filter)
     {
          $sql = "select * from ".$table." where userid = '111'";
          $query = $this->db->query($sql);
          $result = $query->result();
          return $result;
     }
}
?>