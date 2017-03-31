<?php
error_reporting(0); 
include_once'includes/functions.php';
include_once'includes/config.php';
 if(!isset($_SESSION['roharsh']['id']))
{
	header("location:index.php?msg=Please Login to continue.");  
}

 $q3=mysql_query("select * from tbl_permissions where user_id='".$_SESSION['roharsh']['emp_id']."' and access='yes' and pcode='mc' and application_id='".$_SESSION['application_id']."'");
 
if( mysql_num_rows($q3)<1)
{
	echo '<script type="text/javascript">'; 
	echo 'alert("SOrry you dont have permission to access this page.");'; 
	echo 'window.location.href = "index.php?msg=Please login again to continue";';
	echo '</script>';
} 
 
//echo "value of session variable".$created_name=$_SESSION['emp_name']; 
if($created_name=='');
{
	//header("Location: index.php");
}
 
if(isset($_POST['submit']))
{
	 
	$str=$_POST['datese'];
	 
	// Query to check whether salary processed for particular month(22/01/2015)
//$processed_query=mysql_query("select * from tbl_employee_monthly_salary_temp where is_processed='Y' and month_year='$str'");
$not_processed_query=mysql_query("select * from tbl_tds_deduction where  month_year='$str' and application_id='".$_SESSION['application_id']."'");
	 
}
// echo $prevmonth;
// echo $newformated;
?>
<?php

 /*
 if($monthval!='')
 {
 $queryholiday=mysql_query("select totalholidays from tbl_holidays where month like '%$monthval%'");
  
 $tempholiday=mysql_fetch_array($queryholiday);
 $holiday=$tempholiday[totalholidays];
 
 }
 */
?>
 <html>
 <head>
  <?php include_once'header.php';?>
   
 <script type="text/javascript">
  
						 
                $(document).ready(function(){
					 
					 
					 $(".quantity").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
         
        //$(".errmsg").html("Digits Only").show().fadeOut("slow");
		alert("Digits Only");
               return false;
    }
   });
   
   
   $(".quantity").bind("paste", function (e) {
                return false;
            });
            $(".quantity").bind("drop", function (e) {
                return false;
            });
			
			 $(".quantity").focusout(function (e) {
				 var valu=$(this).val();
				 if(valu<0)
				 {
					 alert("The amount must be greater than zero! or zero"); 
					 return false;  
				 }
				
			 });
				 
					$("#calcarrval").click(function(){
						
						var r = confirm("Are you sure to calculate the Others ?");
						 if (r == true) {
						//alert("hi inside click");
						//alert('Value : '+$("#calcarrval").val());
						 var namem=$("#mname").val();
						 
					 	 
					 
					 var other = document.getElementsByName('otherarr[]');
						var other_array = new Array();
						for (i=0; i<other.length; i++)
			         {
						 other_array[i]=other[i].value;
					 }
					 
					 //alert(mobile_array);
					 
					    
						 var empidarr = document.getElementsByName('eid1[]');
						var empidarr_array = new Array();
						for (i=0; i<empidarr.length; i++)
			         {
						 empidarr_array[i]=empidarr[i].value; 
					 } 
					 //alert(empidarr_array);
					 //alert(namem);
						 
					//alert(" MObile : "+mobile_array.length+"month :"+namem+"empid"+empidarr_array.length); 
 
					 $('#loadingmessage').show();
					 
                    $.ajax
                    ({
                     type: "POST", 
                     url: "ajax_others_calculation.php",
                     data: {other_id1:other_array,month_name:namem,emp_id:empidarr_array},
                     cache: false,
					/* beforeSend: function(){
							$("#load").dialog('open').html("<p>Please Wait While Calculating...</p>");
							},*/
					 //dataType: "json",
                     success: function(html)
                     {
						 //alert (html);
						  $('#loadingmessage').hide();
	                  alert("Recalculate Others Calculating successfully......");
                       $("#tableresponse").html(html);
					   //$("#tableresponse").hide();
					      //$(".ci").html(html); 
                       } 
                        });
						
						
						
						 }
					});
					
					//End code of Recalculate salary
					
					
					
					 
					
					
					
					
					
					
					//End code of Save salary
					
					
				 
    $(function() {
        $('#datepicker25').datepicker( {
            changeMonth: true,
            changeYear: true,
            //showButtonPanel: true,
            dateFormat: 'MM yy',
            onClose: function(dateText, inst) { 
                var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                $(this).datepicker('setDate', new Date(year, month, 1));
            },
            beforeShow : function(input, inst) {
                var datestr;
                if ((datestr = $(this).val()).length > 0) {
                    year = datestr.substring(datestr.length-4, datestr.length);
                    month = jQuery.inArray(datestr.substring(0, datestr.length-5), $(this).datepicker('option', 'monthNamesShort'));
                    $(this).datepicker('option', 'defaultDate', new Date(year, month, 1));
                    $(this).datepicker('setDate', new Date(year, month, 1));
                }
            }
        });
    });
	
	$("#sub").click(function(){
		
		var montyernm=$("#datepicker25").val();
		
		if(montyernm=='')
		{
			alert("Please select month name......");
			return false;
		}
		else
		{
			$('#loadingmessage').show();
		}
	});
     
					 
                });
        </script>
		 

 

</head>					 
 
    <body>
     
       <!--<div class="headerwrapper">
                <div class="header-left">
                    <a href="dashboard.php" class="logo">
                        <img src="images/logo.png" alt="" /> 
                    </a>
                    <div class="pull-right">
                        <a href="" class="menu-collapse">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                </div><!-- header-left -->
                
                <!--<div class="header-right">
                    
                    <div class="pull-right">
                        
                        <form class="form form-search" action="search-results.html">
                            <input type="search" class="form-control" placeholder="Search" />
                        </form>
                        
                       
                        
                        <div class="btn-group btn-group-option">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                              <i class="fa fa-caret-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                              <li><a href="#"><i class="glyphicon glyphicon-user"></i> My Profile</a></li>
                              <?php 							 // include'includes/config.php';														  $username = mysql_fetch_array(mysql_query("select * from tbl_admin where id='".$_SESSION['roharsh']['id']."'"));							  if($username['username'] =='admin'){							 echo "<li><a href='permission.php'><i class='glyphicon glyphicon-star'></i> Set Permission</a></li>";							 							  }								?>
                              <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Account Settings</a></li>
                              <li><a href="#"><i class="glyphicon glyphicon-question-sign"></i> Help</a></li>
                              <li class="divider"></li>
                              <li><a href="http://roharsh.com/logout.php"><i class="glyphicon glyphicon-log-out"></i>Sign Out</a></li>
                            </ul>
                        </div><!-- btn-group -->
                        
                    <!--</div><!-- pull-right -->
					<!--</header>
                    
                </div><!-- header-right -->
                
           <!-- </div>-->
        <section>
            <div class="mainwrapper">
               <!-- leftpanel -->
                <?php include_once'leftpanel.php';?>
                <div class="mainpanel" style="margin-left:240px;">
                    <!--<div class="pageheader">
                        <div class="media">
                            <div class="pageicon pull-left">
                                <i class="fa fa-automobile"></i>
                            </div>
                          <!--  <div class="media-body">
                       
                       <h4>Salary Details</h4>
                            </div>-->
                        <!--</div><!-- media -->
                   <!-- </div><!-- pageheader -->
                    
                    <div class="contentpanel">
                        <div >
                            <div >
                                <h4 class="panel-title">Others Calculation</h4>
                                
                            </div><!-- panel-heading -->
							<form method="post" enctype="multipart/formdata">
                            <div class="panel-body">
							 
							</div>
                          
							
								<div class="row">
                                     <div class="col-md-3"></div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                                <label class="col-sm-4 control-label">Select Month<span class="asterisk"></span></label>
                                                <div class="col-sm-8">
												<input type="text" id="datepicker25" class="form-control" name="datese">
                                                     <!--<textarea class="form-control" cols="3"  name="desc"> </textarea>-->
                                                </div>
							
                                            </div>
                                    </div><!-- col-md-6 -->
									<div class="col-md-4">
                                        <div class="form-group">
										    <button type="submit" id="sub" name="submit" class="btn btn-primary mr5">Submit</button>
                                          <div class="col-sm-8">
                                               
                                                </div>
                                            </div>
                                    </div><!-- col-md-6 -->
									
									
									
									
                                </div><!-- row -->
							 
								 
							
							 
                                    
                                     
								</div>
								 <div align="center" id='loadingmessage' style='display:none'>
                                     <img src='loading-animation.gif'/>
                                      </div>
							    </form>
								<!--<div id="mydiv">-->
								<?php
								  if($_POST['datese']!='' && mysql_num_rows($not_processed_query)>0)
								{
									$query = mysql_query("select * from tbl_tds_deduction where  month_year='$str' and application_id='".$_SESSION['application_id']."' order by id");
									
									//echo"existing". "select * from tbl_tds_deduction where  month_year='$str'";
								?>
								
								        <form method="post" >
							   
				<div class="row"><input type="button" value="Calculate & Save" name="calcval" id="calcarrval" class="btn btn-primary mr5" >
				<!--<input type="button" value="Save" name="save" id="savesal" class="btn btn-primary mr5" onClick="return confirm('Are you sure you want to save Salary ?')">--></div>
							   
							 
									<!--<div style="width:1070px;overflow-x:scroll;border:1px solid #ddd;overflow-y:scroll;height:500px;">-->
                              <div id="shTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
							  <table  class="table table-striped table-bordered" id="tableresponse">
                                <thead class="">
								 
                                    <tr>
									     <th width='4'>SNo</th>
                                        <th>ID</th>
										 <th>Name</th>
										 <th>Branch</th>
										 <th>Month/Year</th>
										 
										    <th>Others.</th>
										 
                                        
                                    </tr>
									 
                                </thead><tbody>
                         <?php 
						
						//$query = mysql_query("select * from tbl_employee_details where is_active='Y'");
						 
						$sr=0;
						$totalearn=0;
						 while($data = mysql_fetch_array($query))
						 { 
					  $sr++;
					       
							 
						     ?>
                                 
									<tr>
						<input size="30" type="hidden" name="month1[]" id="mname" value="<?php echo $data['month_year']; ?>" readonly="readonly"> 			           <input size="5" type="hidden" name="eid1[]" value="<?php echo $data['emp_id'];?>" readonly="readonly">                  
								  
					 <td><?php echo $sr;?></td> 
				   <td><?php echo $data['emp_id'];?></td>
                    <td><?php echo $data['emp_name'];?></td>
                   <td><?php echo $data['branch'];?></td>
                    <td><?php echo $data['month_year']; ?></td>
					   
					  <td><input size="5" class="quantity" title="Others of <?php echo $data['emp_name'];?>" type="text" name="otherarr[]" value="<?php echo $data['other'];?>"></td>  
						
           
                    				
                                    </tr>
                                    


                              
								<?php } ?></tbody>
                            </table>
							
							
							
							
							
						<!--	</div>-->
                                
                               </div> 
                                	                            </form>
                                
                                
                                
                             <!-- End code of -->
                        
                   <!-- </div><!-- contentpanel -->
                <!--</div><!-- mainpanel -->
            <!--</div><!-- mainwrapper -->
		
								
								
								
								
								
								
								
								<?php
									
								}
								else if($_POST['datese']!='')//default
								{
									?>
									
                               <form method="post" >
							   
				<div class="row"><input type="button" value="Calculate & Save" name="calcval" id="calcarrval" class="btn btn-primary mr5" >
				<!--<input type="button" value="Save" name="save" id="savesal" class="btn btn-primary mr5" onClick="return confirm('Are you sure you want to save Salary ?')">--></div>
							   
							 
									<!--<div style="width:1070px;overflow-x:scroll;border:1px solid #ddd;overflow-y:scroll;height:500px;">-->
                              <div id="shTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
							  <table  class="table table-striped table-bordered" id="tableresponse">
                                <thead class="">
								 
                                    <tr>
									     <th width='4'>SNo</th>
                                        <th>ID</th>
										 <th>Name</th>
										 <th>Branch</th>
										  <th>Month/Year</th>
										 
										    <th>Others.</th>
                                         
                                        
                                    </tr>
									 
                                </thead><tbody>
                         <?php 
						
						$query = mysql_query("select * from tbl_employee_details where is_active='Y' and application_id='".$_SESSION['application_id']."'  order by emp_id limit 2 ");
						  
						$sr=0;
						$totalearn=0;
						 while($data = mysql_fetch_array($query))
						 { 
					       $sr++;
						   
							 
						     ?>
                                 
									<tr>
					<input size="5" title="Emp ID , <?php echo $data['emp_name'];?>" type="hidden" name="eid1[]" value="<?php echo $data['emp_id'];?>" readonly="readonly">				                     <input size="30" type="hidden" name="month1[]" id="mname" value="<?php echo $str ?>" readonly="readonly">
							   
					 <td><?php echo $sr;?></td> 
				   <td><?php echo $data['emp_id'];?></td>
                    <td><?php echo $data['emp_name'];?></td>
                   <td><?php echo $data['officebranch'];?></td>
                    <td><?php echo $str ?></td>
					  
					  <td><input size="5" class="quantity" title="Others of <?php echo $data['emp_name'];?>" type="text" name="otherarr[]" value="<?php echo $data['other'];?>"></td>  
				 
                                    </tr>
                                    

                              
								<?php } ?></tbody>
                            </table>
							
							
							
							
							
						<!--	</div>-->
                                
                               </div> 
                                
                                </form>
                                
                                
                             <!-- End code of -->
                        
                    </div><!-- contentpanel -->
                </div><!-- mainpanel -->
            </div><!-- mainwrapper -->
			
			<!--</div>-->
			<!--<table class="ci" id="myTable" align="center" > -->
								<?php }?>
        </section>
  

    </body>
</html>
