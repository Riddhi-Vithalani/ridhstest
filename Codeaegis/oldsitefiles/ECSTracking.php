<!DOCTYPE html>
<html>
<head>
<title>Tracking</title>
<link rel="stylesheet" type="text/css" href="css/1629.css" />
<link rel='stylesheet' type='text/css' href="cssmenu/cssmenu/menu_source/styles.css" />
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
<!--<meta http-equiv="refresh" content="60" >--> 
 
 
</head>
 
<?php
 //error_reporting(E_ALL);
 //ini_set('display_errors', 1); 
session_start();
	 ini_set('max_execution_time', 0);
$app=$_SESSION['Appid'];
//echo $app;
 
			 if($app=='')
			 {
				 header('location:log.php');
			 }
//echo"appid".$_SESSION['Appid'];
if($_POST['UserName']=='')
			{
				//echo"i am inside if";
				$var=$_SESSION['value'];
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
.label {
	clear:left;
	display:block;
	float:left;
	width:70px;
	height:7px;
	text-align:center;
	margin-bottom:3px;
	color:#000000;
	padding:0px;
	font-size:9px;

}

.labels {
     color: #F09;
     background-color: #CFF;
     font-family: "Lucida Grande", "Arial", sans-serif;
     font-size: 10px;
     font-weight: bold;
     text-align: center;
     width: 80px;     
     white-space: nowrap;
   }
   .lab {
     color: #CC66FF;
	 font-family:"Times New Roman", Times, serif;
	 font-size:14px;
   }
    
</style>
<style type="text/css">
section {
    width: 1150px;
    height: 570px;
    padding: 0px;
	overflow:hidden;
}
div#sidebar {
    width: 250px;
    background:#AAE3F4;
	height: 570px;
    float: left;
	color:purple;
	 
	 
}
div#googleMap {
    height: 570px;
	width:900px;
    background: black;
	
	 
	
	
}
 
</style>

<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="Elabel.js" type="text/javascript"></script>
<script src="InfoBubble.js" type="text/javascript"></script>
 <!--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>-->
<script>



var marker;  
var map;
var markerarray=new Array();
var enabledmarkersArray = [];
var green_icon = new google.maps.MarkerImage('green_marker.png'); 
var red_icon = new google.maps.MarkerImage('unitmarker.png');  
var Black_icon = new google.maps.MarkerImage('yellow_star.png');  
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
			alert("inside mouse over"); 
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
                 icon: 'dot.png',
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

function hovering()
{
	alert("inside hovering function");
	alert('Inside hovering Hover lat:'+global_latitude+'Hover long: '+global_longitude);
	var bounds = new google.maps.LatLngBounds();
//    var infowindow = new google.maps.InfoWindow();
	
	 
     if (enabledmarkersArray) {
     for(var i=0; i < enabledmarkersArray.length; i++){
        enabledmarkersArray[i].setMap(null);
     }
        enabledmarkersArray.length = 0;
    }
	//if(global_Address!='')
	//{
		//codeLatLng(global_latitude, global_longitude);
	//}
	
	 var latlng=new google.maps.LatLng (global_latitude, global_longitude);
     bounds.extend(latlng);
           if(global_Ignation==0 && global_Speed<5)
		   {
      marker = new MarkerWithLabel({
       position: latlng,
	   icon:red_icon,
	   map: map,
       labelContent: global_vehicleno,
       labelAnchor: new google.maps.Point(-10,13),
       labelClass: "labels" // the CSS class for the label
       //labelStyle: {opacity: 0.75}
     });
		   }
		   else if(global_Ignation==1 &&global_Speed<5)
		   {
	  marker = new MarkerWithLabel({
       position: latlng,
	   icon: Black_icon,
	   map: map,
       //labelContent: global_vehicleno,
       labelAnchor: new google.maps.Point(-10,13),
       labelClass: "labels" // the CSS class for the label
       //labelStyle: {opacity: 0.75}
     });
		   }
		    
			else  
		   {
	  marker = new MarkerWithLabel({
       position: latlng,
	   icon:green_icon,
	   map: map,
       //labelContent: global_vehicleno,
       labelAnchor: new google.maps.Point(-10,13),
       labelClass: "labels" // the CSS class for the label
       //labelStyle: {opacity: 0.75}
     });
		   }
	 
	 
	 // var infowindow = new google.maps.InfoWindow({content:'<label for="no" class="label">'+global_vehicleno+'</label>' });
	    
	  if(global_Ignation==0 && global_Speed<5)
	 {
	  global_Ignation='OFF';
	 }
	 else  
	 {
	  global_Ignation='ON';
	  } 
	 
	  var infoBubble=new InfoBubble(
        {
		  content:'<label for="no" class="lab">'+"Supervisor Name: "+global_vehicleno+" <br>"+"Address: "+global_Address+" <br>"+"Date: "+global_Date+"  <br>"+"Time: "+global_Time+'</label>',
         //   shadowStyle: 4,
		    padding: 7,
            backgroundColor: '#FFFFFF',
            borderRadius: 15,
            arrowSize: 12,
            borderWidth: 1,
			borderColor: '#2c2c2c',
			maxWidth:250,
            disableAutoPan: true,
            hideCloseButton: true,
            arrowPosition: 50,
            //backgroundClassName: 'infoBubbleBackground',
            arrowStyle: 2

        });
		 
    infoBubble.open(map, marker);
	 
		google.maps.event.addListener(map, "click", function(){
  infoBubble.close();
}); 
     
          map.fitBounds(bounds);
		 
    
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
	  $.ajax
({
type: "POST",
url: "vehicle_list.php",
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
	//alert("inside div autoupdate function");
	//alert($("#tno").val());
	 
 $.ajax({
 	 type: "GET",
    url: 'trackingupdates.php',
	/* success: function(html)
{
$(".ci").html(html);
}  */
    contentType: "application/json; charset=utf-8",
    dataType: 'json',
	//success: function(data){if($("#tno").val()=='All') { showAllTruckUpdates(data);} 
	//else {addMarkers(data);}},
    //success: function(data){alert(data);if(($("#tno").val()=='All')||($("#tno").val()=='')){ showAllTruckUpdates(data);} 
	success: function(data){if(($("#tno").val()=='All')||($("#tno").val()=='')){ showAllTruckUpdates(data);} 
	else {addMarkers(data);}},
	  error: function( data ) {
       
    }
  });
  
  setTimeout(autoupdate, 60000);
 }
 function showbutton(a)
{
//alert("inside showbutton a:"+a );
$.ajax({
 	 type: "GET",
	 
    url: 'trackingupdates.php?id='+a,
	/* success: function(html)
{
$(".ci").html(html);
}  */
	  contentType: "application/json; charset=utf-8",
     dataType: 'json',
  
    success: function(msg){if($("#tno").val()=='All')  { showAllTruckUpdates(msg);} else{addMarkers(msg);}},
	 
     error: function( msg ) {
       
     }   
	    
            
  });

 }
 
function initialize()
{
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
 
  
<div id="content">
       <form name="submit" method="POST" enctype="multipart/form-data" name="track">
            
          <div style="width:100%">
          <table height="15"  bgcolor="#AAE3F4" width="1150px">
           
          <tr><td width="45%"><marquee behavior="Left"><b><font color="#F660AB">Track Location</font>
          </b></marquee></td>
          <td width="25%"><label><b>Supervisor Name:</b></label><input type="text" readonly id="tno"  value="<?php echo"$var"?>"><td/>    <td width="20%"> <select id="UserName" name="UserName">  
              <option value="">--Select Supervisor--</option>
              <option value="All">All</option>
        

<?php 
//$link = mysql_connect('ageis.db.9788120.hostedresource.com','ageis','Wipro123@#') OR die('Couldnot connect to mysql server');
                //mysql_select_db('ageis') OR die('Couldnot connect to database classified');

include_once('notificationprod.php');
 //if($app=='ecstech')	 
//$sql1="select vehicleno,application_id from  vehicleno_imei_mapping ";
//else
 $sql1="select supervisor,application_id from  vehicleno_imei_mapping where isActive='Y' and application_id='$app'";
//$sql1="SELECT * FROM `Demo_vehicleno_imei_mapping` as vim ,ageis_check_in_out as aio  WHERE vim.`imeino`=aio.`imeino` and type='3' group by  vim.`imeino`";
echo $sql1;
 
//print_r($sql1);
//exit;
$result=mysql_query($sql1);

while($row=mysql_fetch_array($result))    
{
 
$username=$row['0'];
 echo "<option value='$username'>".$username."</option>";

 }?>
</select> 

          </td><td width="10%"><input type="submit" name="submit" value="Show" class="showbutton" >&nbsp;&nbsp;
          </td></tr>
          </table>
           </div>
          <div>
                        <table class="ci" id="distable" >
                               
                       </table>
                       
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
          <!--code end of generating result-->
      </div>


<body>
<section>

<div id="sidebar">
 
  
    
        
</div>

<div id="googleMap" ></div>

 </section>
 
</body>
</html>