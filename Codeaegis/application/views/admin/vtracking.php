<?php 
$this->load->helper('url');
 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="admin-themes-lab">
    <meta name="author" content="themes-lab">
    <link rel="shortcut icon" href="<?php echo base_url();?>/assets/images/favicon.png" type="image/png">
    <title>Make Admin Template &amp; Builder</title>
    <link href="<?php echo base_url();?>/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/assets/css/theme.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/assets/css/ui.css" rel="stylesheet">
    <script src="<?php echo base_url();?>/assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	<script src="<?php echo base_url();?>/assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  
  <!-- BEGIN BODY -->
  <?php
$var="All";
 //error_reporting(E_ALL);
 //ini_set('display_errors', 1); 
session_start();
	 ini_set('max_execution_time', 0);
//$app=$_SESSION['Appid'];
//echo"value of session variable". $app;
 
			 if($app=='')
			 {
				 //header('location:log.php');
			 }
//echo"appid".$_SESSION['Appid'];
		if($_POST['UserName']=='')
			{
				//echo"i am inside if";
				$var="All";
				//echo"if inside var:".$var;
			}
			else
			{    //echo"i am inside else";
				$var=$_SESSION['value'] = $_POST['UserName'];
				//echo"else inside var:".$var;
			}
 
				 
			 
//echo"$var";
 
?>
<style type="text/css">

div#googleMap {
	margin-top:60px;
    height: 700px;
	width:100%;
    background: black;
}
 
</style>
  <body class="fixed-topbar sidebar-top theme-sdtd color-green">
    <!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <section>
      <!-- BEGIN SIDEBAR -->
      <?php include'header_menu.php'?>
      <!-- END SIDEBAR -->
      <div class="main-content">
        <!-- BEGIN TOPBAR -->
        <?php include'topbar.php';?>
        <!-- END TOPBAR -->
        <!-- BEGIN PAGE CONTENT -->
		<form name="submit" method="POST" enctype="multipart/form-data" name="track">
        <div class="page-content page-sidebar-top">
          <div class="header panel">
           <div class="row">
                          <div class="col-md-5">
                            <div class="form-group">
                              <label class="col-sm-3 control-label">Supervisor Name</label>
                              <div class="col-sm-9">
                                <input class="form-control form-white" type="text" readonly id="tno"  value="<?php echo"$var"?>">
                              </div>
                            </div>
                          
                          </div>
                          <div class="col-md-5">
                            <div class="form-group">
                              <label class="col-sm-3 control-label">Select Supervisor</label>
                              <div class="col-sm-9">
							  <select autoselect id="UserName" name="UserName" class="select2-chosen col-sm-9">
							  <option value="All">All</option>
							  <?php 
							  foreach($this->Mlivetracking->vehiclelist() as $row){ 
							  echo "<option value='{$row->supervisor}'>{$row->supervisor}</option>";
							  }
							  ?>
							  </select>
                               
                              </div>
                            </div>
                           
                          </div>
						  <div class="col-md-2">
                          <button type="submit" name="submit" value="Show"  class="btn btn-embossed btn-primary m-r-20">Show Tracking</button>
						  </div>
                        </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="panel">
                <div class="panel-content p-t-0">
                  <div class="row">
                    <div class="col-md-4">
                      <h3><strong>Sidebar left / right</strong></h3>
                      <div class="panel">
                      <div class="panel-content">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Supervisor Name</th>
                        <th>Address</th>
                        <th>Time</th>
                      </tr>
                    </thead>
					<tbody>
			<?php
				$sr=0;
				foreach($this->Mlivetracking->vehiclelist() as $rows){ 
				$sr++;
			?>
					<tr>
                        <td><?php echo $sr;?></td>
                        <td><?php echo $rows->supervisor;?></td>
                        <td><?php echo $rows->location;?></td>
                        <td><?php echo date("d/m/Y",strtotime($rows->tdate)) . " " .$rows->otime;?></td>
                    </tr>
                      
                    
			<?php }?>
			</tbody>
                  </table>
                </div>
              </div>
                      <p class="m-t-5"><small class="rtl-txt">current layout: <strong>sidebar on left / RTL disable</strong></small></p>
                    </div>
                    <div class="col-md-8">
                      <div id="googleMap" ></div>
                    </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <?php include'footer.php';?>
        </div>
		<?php
 if(isset($_POST['submit']))
		  {
		  
		  $username=$_POST['UserName'];
		   $c=0;
		  
		  echo '<script>showbutton("'.$username.'");</script>';
		  
		  }
		 
 ?>       
		</form>
        <!-- END PAGE CONTENT -->
      </div>
      <!-- END MAIN CONTENT -->
    </section>
    
    <!-- BEGIN PRELOADER -->
    <div class="loader-overlay">
      <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
      </div>
    </div>
    <!-- END PRELOADER -->

<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
 <!--<script src="Elabel.js" type="text/javascript"></script>
<script src="InfoBubble.js" type="text/javascript"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>-->
<script>



var marker;  
var map;
var markerarray=new Array();
var enabledmarkersArray = [];
var green_icon = new google.maps.MarkerImage("<?php echo base_url();?>assets/images/green_marker.png"); 
var red_icon = new google.maps.MarkerImage("<?php echo base_url();?>assets/images/unitmarker.png");  
var Black_icon = new google.maps.MarkerImage("<?php echo base_url();?>assets/images/yellow_star.png"); 
var dot_icon = new google.maps.MarkerImage("<?php echo base_url();?>assets/images/dot.png");   
var nicon;
var msg;
var msg1;
var infoBubble= null;	
var global_latitude="";
var global_longitude="";
var global_vehicleno="";
var global_Date="";
var global_Time="";
var global_Address="";
var global_Ignation="";
var global_Speed="";
var global_geocoder;

$(document).ready(function()
{ 
 
 //alert("inside document ready");
	var temp;
	var latlong=new Array();
	$(".test").mouseover(function()
		{
			//alert("inside mouse over"); 
		var $this = $(this);
		 temp=($this.attr("id"));
		 var splitted = temp.split('@');
		 //alert(sp);
		var i=0;
for (a in splitted ) {
    //splitted[a] = parseInt(temp[a], 10); // Explicitly include base as per Álvaro's comment
//document.write("I: "+i+"val: "+splitted[a]);
i++;
if(i==1)
global_latitude=splitted[a];
else if(i==2)
global_longitude=splitted[a];
else if(i==3)
global_vehicleno=splitted[a];
else if(i==4)
global_Date=splitted[a];
else if(i==5)
global_Time=splitted[a];
else if(i==6)
global_Address=splitted[a];
else if(i==7)
global_Ignation=splitted[a];
else
global_Speed=splitted[a];
 
 
}
	hovering();
	});
	 
	  
	});



function addMarkers(json){
//alert("i am inside the function");
//alert(json.length);
  // alert('Marker Length: '+markerarray.length);
	var bounds = new google.maps.LatLngBounds();
    var infowindow = new google.maps.InfoWindow();
	 
     if (enabledmarkersArray) {
     for(var i=0; i < enabledmarkersArray.length; i++){
        enabledmarkersArray[i].setMap(null);
     }
        enabledmarkersArray.length = 0;
    }
	
	//var i=0;
	var latitude,longitude,vehicleno,address,time,date,itime,ignition;
	
	for (var i=0;i<json.length;++i)
    {
		//alert(i);
	 
		
		 
     latitude =json[i].in_latitude;
    longitude =json[i].in_longitude;
   vehicleno =json[i].supervisor;
    address =json[i].address;
    time =json[i].time;
     date=json[i].date;
    // speed=json[i].speed;
     distance=json[i].distance;
	  itime=json[i].itime;
	 
	  if(time!='00:00:00')  
	 {
	 
	 msg1="Supervisor Name: "+vehicleno+"\n Address: "+address+"\n Date: "+date+"\n Time: "+time+"\n Distance: "+distance ;
	 }
	 else
	 {
	 
	 msg1="Supervisor Name: "+vehicleno+"\n Address: "+address+"\n Date: "+date+"\n Time: "+itime+"\n Distance: "+distance;
	 }
	 
	 //alert(latitude);

     //var info=vehicleno.concat(address,date,time);
	 
     var EndIcon = new google.maps.MarkerImage('green.png');
     
     var latlng=new google.maps.LatLng (latitude, longitude);
     bounds.extend(latlng);
     markerarray[i] = latlng;
           
           if(i==0)
           {
			 
                 marker = new google.maps.Marker({
                 position: latlng,
                 map: map,
                 icon:Black_icon,
                 title: msg1
                 });
                 enabledmarkersArray.push(marker);
                 //alert(marker);
           }
           else if(i==(json.length-1))
           {
			   //alert("ignition"+ignition+"speed"+speed);
			   
				  // alert("i am inside if");
                 marker = new google.maps.Marker({
                 position: latlng,
                 map: map,
				 icon:green_icon,
				 animation:google.maps.Animation.BOUNCE,
                 title:msg1 
           
                   //infowindow.setContent(this.title);
                  // infowindow.open(map, this);
           });
		   
           		//enabledmarkersArray.push(marker);
			 
				 
				 
				
				enabledmarkersArray.push(marker);
				
           }
		   else
           {
			  // alert("inside");
           	     marker = new google.maps.Marker({
                 position: latlng,
                 map: map,
                 icon:dot_icon,
                 title: msg1
                 });
                 
                 enabledmarkersArray.push(marker);
           }
		   
	 
    
        google.maps.event.addListener(marker, 'click', function(e) {
			 
              infowindow.setContent(this.title);
              infowindow.open(map, this);
            //alert('Latitude: '+e.latLng.lat().toFixed(4)+'Longitude'+e.latLng.lng().toFixed(4));
            var geo_latitude=e.latLng.lat().toFixed(4);
            var geo_longitude=e.latLng.lng().toFixed(4);
			//alert("0:"+geo_longitude+"1:"+geo_latitude+"TITLE: "+this.title);
	         
		    
        });
       }
         map.fitBounds(bounds);
    
    var flightPath = new google.maps.Polyline({
  path: markerarray,
  geodesic: true,
  strokeColor: '#FF0000',
  strokeOpacity: 1.0,
  strokeWeight: 1
});

flightPath.setMap(map);
}

 
  
function showAllTruckUpdates(json){
//alert("i am inside the function");
//alert(json.length);
  // alert('Marker Length: '+markerarray.length);
  
	var bounds = new google.maps.LatLngBounds();
    var infowindow = new google.maps.InfoWindow();
	 
     if (enabledmarkersArray) {
     for(var i=0; i < enabledmarkersArray.length; i++){
        enabledmarkersArray[i].setMap(null);
     }
        enabledmarkersArray.length = 0;
    }
	
	var i=0;
	var latitude,longitude,vehicleno,address,time,date,itime,ignition,type;
	 
	//alert(json.length);
	//alert(json[2].in_latitude);
	//alert(json[0].longitude);
	for (var i=0;i<json.length;++i)
    {
	 latitude =json[i].in_latitude;
     longitude =json[i].in_longitude;
     vehicleno =json[i].supervisor;
     type =json[i].type;
     comment =json[i].comment;
     date=json[i].date;
     address=json[i].address;
	 time =json[i].time;
	  itime=json[i].itime;
     //ignition=json[i].ignition;
//alert(latitude);
     //var info=vehicleno.concat(address,date,time);
	 if(type!='3')
	 {
	 nicon=green_icon;
	 if(time!='00:00:00')
	 msg="Supervisor: "+vehicleno+"\n Address: "+address+"\n Date: "+date+"\n Time: "+time ;
     else
      msg="Supervisor: "+vehicleno+"\n Address: "+address+"\n Date: "+date+"\n Time: "+itime ;
	 }
	 else
	 {
	 nicon=red_icon;
	 msg="Unit: "+comment+"\n Address : "+address;
	 }
     var EndIcon = new google.maps.MarkerImage('green.png');
     
     var latlng=new google.maps.LatLng (latitude, longitude);
	// alert(latlng);
     bounds.extend(latlng);
     markerarray[i] = latlng;
          
                 marker = new google.maps.Marker({
                 position: latlng,
                 map: map,
                 icon:nicon,
                 title:msg   
                 });
                 enabledmarkersArray.push(marker);
                 //alert(marker);
            
           
    
        google.maps.event.addListener(marker, 'click', function(e) {
            infowindow.setContent(this.title);
            infowindow.open(map, this);
            //alert('Latitude: '+e.latLng.lat().toFixed(4)+'Longitude'+e.latLng.lng().toFixed(4));
            var geo_latitude=e.latLng.lat().toFixed(4);
            var geo_longitude=e.latLng.lng().toFixed(4);
			//alert("0:"+geo_longitude+"1:"+geo_latitude+"TITLE: "+this.title);
	         
		     }); 
       
       }
         map.fitBounds(bounds);
    
}
 
 function autoRefresh_div()
  {
	  //alert("inside refresh");
	  var dataString1 ='x';
	  var path ='<?php echo base_url("index.php/Tracking/dynamiclistview"); ?>';
	  $.ajax
({
type: "POST",
url:path,
data: dataString1,
cache: false,
success: function(html)
{
$("#sidebar").html(html);
} 
});
setInterval('autoRefresh_div()', 60000);
  }
 
 
function autoupdate()
{ 
	if(($("#tno").val()=='All')||($("#tno").val()==''))
	{
	 var path ='<?php echo base_url("index.php/Tracking/vehiclelist"); ?>';
	}
	else
	{
		var sname=$("#tno").val()
		var path ='<?php echo base_url("index.php/Tracking/securitytodayroute"); ?>/'+sname;
	}
	 //alert(path);
	 
 $.ajax({
 	 type: "GET",
	 url:path,
     contentType: "application/json; charset=utf-8",
     dataType: 'json',
	 success: function(data){if(($("#tno").val()=='All')||($("#tno").val()=='')){ showAllTruckUpdates(data);} 
	 else {addMarkers(data);}},
	  error: function(xhr, status, error ) {
		   alert(xhr.responseText);
       
    }
  });
  
  setTimeout(autoupdate, 60000);
 }
 function showbutton(sname)
{
 
 var dataString1 ='name'+a;
 var path ='<?php echo base_url("index.php/Tracking/securitytodayroute/"); ?>/'+sname;
 //alert(path);
$.ajax({
 	 type: "GET",
	  url:path,
      data: dataString1,
	  contentType: "application/json; charset=utf-8",
     dataType: 'json',
  
    success: function(msg){if($("#tno").val()=='All')  { showAllTruckUpdates(msg);} else{addMarkers(msg);}},
	 
     error: function( msg ) {
       
     }   
	    
            
  });

 }
 
function initialize()
{
	//alert("hi");
var mapProp = {
  zoom:15,
  mapTypeId:google.maps.MapTypeId.HYBRID
  };

 map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
 //alert('init');
autoupdate();
autoRefresh_div();
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
    <a href="#" class="scrollup"><i class="fa fa-angle-up"></i></a> 
    <script src="<?php echo base_url();?>/assets/plugins/jquery/jquery-1.11.1.min.js"></script>
    <script src="<?php echo base_url();?>/assets/plugins/jquery/jquery-migrate-1.2.1.min.js"></script>
    <script src="<?php echo base_url();?>/assets/plugins/jquery-ui/jquery-ui-1.11.2.min.js"></script>
    <script src="<?php echo base_url();?>/assets/plugins/gsap/main-gsap.min.js"></script>
    <script src="<?php echo base_url();?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>/assets/plugins/jquery-cookies/jquery.cookies.min.js"></script> <!-- Jquery Cookies, for theme -->
    <script src="<?php echo base_url();?>/assets/plugins/jquery-block-ui/jquery.blockUI.min.js"></script> <!-- simulate synchronous behavior when using AJAX -->
    <script src="<?php echo base_url();?>/assets/plugins/translate/jqueryTranslator.min.js"></script> <!-- Translate Plugin with JSON data -->
    <script src="<?php echo base_url();?>/assets/plugins/bootbox/bootbox.min.js"></script> <!-- Modal with Validation -->
    <script src="<?php echo base_url();?>/assets/plugins/mcustom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script> <!-- Custom Scrollbar sidebar -->
    <script src="<?php echo base_url();?>/assets/plugins/bootstrap-dropdown/bootstrap-hover-dropdown.min.js"></script> <!-- Show Dropdown on Mouseover -->
    <script src="<?php echo base_url();?>/assets/plugins/charts-sparkline/sparkline.min.js"></script> <!-- Charts Sparkline -->
    <script src="<?php echo base_url();?>/assets/plugins/retina/retina.min.js"></script> <!-- Retina Display -->
    <script src="<?php echo base_url();?>/assets/plugins/select2/select2.min.js"></script> <!-- Select Inputs -->
    <script src="<?php echo base_url();?>/assets/plugins/icheck/icheck.min.js"></script> <!-- Checkbox & Radio Inputs -->
    <script src="<?php echo base_url();?>/assets/plugins/backstretch/backstretch.min.js"></script> <!-- Background Image -->
    <script src="<?php echo base_url();?>/assets/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script> <!-- Animated Progress Bar -->
    <script src="<?php echo base_url();?>/assets/plugins/charts-chartjs/Chart.min.js"></script>
    <script src="<?php echo base_url();?>/assets/js/builder.js"></script> <!-- Theme Builder -->
    <script src="<?php echo base_url();?>/assets/js/sidebar_hover.js"></script> <!-- Sidebar on Hover -->
    <script src="<?php echo base_url();?>/assets/js/application.js"></script> <!-- Main Application Script -->
    <script src="<?php echo base_url();?>/assets/js/plugins.js"></script> <!-- Main Plugin Initialization Script -->
    <script src="<?php echo base_url();?>/assets/js/widgets/notes.js"></script> <!-- Notes Widget -->
    <script src="<?php echo base_url();?>/assets/js/quickview.js"></script> <!-- Chat Script -->
    <script src="<?php echo base_url();?>/assets/js/pages/search.js"></script> <!-- Search Script -->
    <!-- BEGIN PAGE SCRIPT -->
    <script src="<?php echo base_url();?>/assets/js/pages/layouts_api.js"></script>
    <!-- END PAGE SCRIPT -->
  </body>
</html>