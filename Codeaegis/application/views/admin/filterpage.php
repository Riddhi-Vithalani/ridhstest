

<!-- start code -->

   <?php
    

$this->load->model('report_model');  
  $result='<table id="responsecontainer" border=1>';
		 foreach($this->report_model->displayall() as $row)
		 {
			
			 $result .='<tr><td>'.$row->tdate; 
			 $result .='<td>'.$row->location;
			 $result .='<td>'.$row->distance;
			 $result .='<td>'.$row->idistance; 
			 $result .='<td>'.$row->created_at;
			 $result .='</tr>';
		 }
		  $result .='</table>';
  ?>

  


 
 
 <!-- End code-->