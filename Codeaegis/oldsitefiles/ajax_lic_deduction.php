<?php
 
include_once'includes/functions.php';
include_once'includes/config.php';

//echo "value of session variable".$created_name=$_SESSION['emp_name']; 
if($created_name=='');
{
	//header("Location: index.php");
}
 $tds=$_REQUEST['tds_id1']; 
 $other=$_REQUEST['other_id1']; 
	 
	 $monname=$_REQUEST['month_name'];
	 $eno=$_REQUEST['emp_id'];
	 //print_r($eno);
	//echo"<br>";
	 
	   
	 
   ?>
    
                            <form method="post">
							 
                                <!--cose for display checklist -->
                                 <div id="shTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><table class="table table-striped table-bordered" id="tableresponse">
                                <thead class="">
                                     <tr>
									     <th width='4'>SNo</th>
                                        <th>ID</th>
										 <th>Name</th>
										 <th>Branch</th>
										 <th>Month/Year</th>
										   
                                          <th>Other.</th>   
                                        
                         
                                        
                                    </tr>
                                </thead><tbody> 
                         <?php 
						  //$query = mysql_query("select * from biometric_gprs_employee_registration LIMIT 10 ");
				$query = mysql_query("select * from tbl_employee_details where is_active='Y' and application_id='".$_SESSION['application_id']."' order by emp_id ");
			        	$sr=0;
						$c=-1;
						$totalearn=0;
						//$newpresentday=31;
						 while($data = mysql_fetch_array($query))
						 { 
					       
					       $c++;
					       $sr++;
$sqlquery = mysql_query("select * from tbl_employee_details where is_active='Y'  and emp_id='$eno[$c]' and application_id='".$_SESSION['application_id']."'");
 
			    $fetchdata=mysql_fetch_array($sqlquery);
					 	    
						   
					 	    
                              date_default_timezone_set("Asia/Kolkata"); 
                              $timestamp= date('Y-m-d H:i:s');
							     
						   
						   $check_existing_query=mysql_query("Select * from tbl_tds_deduction where emp_id='".$eno[$c]."' and month_year='".$monname."' and application_id='".$_SESSION['application_id']."'");
						    
						   if(mysql_num_rows($check_existing_query)==0)
						   {
						   //echo "insert";
						    $insert_query="insert into tbl_tds_deduction (`emp_id`,emp_name,branch,`month_year`,`other`, `created_by`, `created_time`,application_id)values('".$eno[$c]."','".$data['emp_name']."','".$data['officebranch']."','$monname','$other[$c]','".$_SESSION['emp_name']."','$timestamp','".$_SESSION['application_id']."')";
						  
						  mysql_query($insert_query);
						   
						   }else
						   {
						
							//echo "update";
$update_query=mysql_query("update tbl_tds_deduction set other='$other[$c]',updated_by='".$_SESSION['emp_name']."', updated_time='$timestamp' where emp_id='".$eno[$c]."' and application_id='".$_SESSION['application_id']."'");
//echo	"update tbl_tds_deduction set mobile_bill='$mobile[$c]', mobile_limit='".$data['mobilelimit']."', mobile_deduction='$finalmobi',updated_by='Rushi', updated_time='$timestamp' where emp_id='".$eno[$c]."'";													
							   
						   }
						  
							 
						     ?>
 
                                     
									<tr>  
			<input size="3" readonly="readonly" type="hidden" name="eid1[]" value="<?php echo $data['emp_id'];?>"><input size="30" readonly="readonly" type="hidden" name="month1[]" id="mname" value="<?php echo $monname ?>">						 
								  
					 <td><?php echo $sr;?></td> 
				 <td><?php echo $data['emp_id'];?> </td>
            <td><?php echo $data['emp_name'];?></td>
        <td><?php echo $data['officebranch'];?></td>
       <td><?php echo $monname ?></td>
					
	 
	<td><input title="deduction amt of <?php echo $data['emp_name'];?>" size="5"  class="quantity" readonly="readonly" type="text" name="otherarr[]" value="<?php echo $other[$c]; ?>"></td>
	
	  		 
                     
                                    </tr>
                                     


                              
								<?php } ?></tbody>
                            </table>
							
							 
							
							
							
							</div>
                                
                                
                                
                                
                                
                                
                             <!-- End code of -->
                        
                    </div><!-- contentpanel -->
                </div><!-- mainpanel -->
            </div><!-- mainwrapper -->
			</form> 