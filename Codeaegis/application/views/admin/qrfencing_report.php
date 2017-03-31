
<?php $this->load->helper('url');?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="admin-themes-lab">
    <meta name="author" content="themes-lab">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">
    <title>Make Admin Template &amp; Builder</title>
    <link href="<?php echo base_url();?>/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/assets/css/theme.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/assets/css/ui.css" rel="stylesheet">
	<link href="<?php echo base_url();?>/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/assets/plugins/rateit/rateit.css" rel="stylesheet">
    <script src="<?php echo base_url();?>/assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <!-- LAYOUT: Apply "submenu-hover" class to body element to have sidebar submenu show on mouse hover -->
  <!-- LAYOUT: Apply "sidebar-collapsed" class to body element to have collapsed sidebar -->
  <!-- LAYOUT: Apply "sidebar-top" class to body element to have sidebar on top of the page -->
  <!-- LAYOUT: Apply "sidebar-hover" class to body element to show sidebar only when your mouse is on left / right corner -->
  <!-- LAYOUT: Apply "submenu-hover" class to body element to show sidebar submenu on mouse hover -->
  <!-- LAYOUT: Apply "fixed-sidebar" class to body to have fixed sidebar -->
  <!-- LAYOUT: Apply "fixed-topbar" class to body to have fixed topbar -->
  <!-- LAYOUT: Apply "rtl" class to body to put the sidebar on the right side -->
  <!-- LAYOUT: Apply "boxed" class to body to have your page with 1200px max width -->
  
  <!-- THEME STYLE: Apply "theme-sdtl" for Sidebar Dark / Topbar Light -->
  <!-- THEME STYLE: Apply  "theme sdtd" for Sidebar Dark / Topbar Dark -->
  <!-- THEME STYLE: Apply "theme sltd" for Sidebar Light / Topbar Dark -->
  <!-- THEME STYLE: Apply "theme sltl" for Sidebar Light / Topbar Light -->
  
  <!-- THEME COLOR: Apply "color-default" for dark color: #2B2E33 -->
  <!-- THEME COLOR: Apply "color-primary" for primary color: #319DB5 -->
  <!-- THEME COLOR: Apply "color-red" for red color: #C9625F -->
  <!-- THEME COLOR: Apply "color-green" for green color: #18A689 -->
  <!-- THEME COLOR: Apply "color-orange" for orange color: #B66D39 -->
  <!-- THEME COLOR: Apply "color-purple" for purple color: #6E62B5 -->
  <!-- THEME COLOR: Apply "color-blue" for blue color: #4A89DC -->
  <!-- BEGIN BODY -->
 
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
        <?php include'topbar.php'?>
        <!-- END TOPBAR -->
        <!-- BEGIN PAGE CONTENT -->
        <div class="page-content">
          <div class="header">
            <h2>Tables <strong>Dynamic</strong></h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="dashboard.html">Make</a>
                </li>
                <li><a href="tables.html">Tables</a>
                </li>
                <li class="active">Tables Filter</li>
              </ol>
            </div>
          </div>
		<div class="header panel">
           <div class="row">
                          <div class="col-md-5">
                            <div class="form-group">
                              <label class="col-sm-3 control-label">Date</label>
                              <div class="col-sm-9">
                                
								<input type="text" name="timepicker" id="tdate" class="b-datepicker form-control" placeholder="Select a date...">
								
                              </div>
                            </div>
                          
                          </div>
                          <div class="col-md-5">
                            <div class="form-group">
                              <label class="col-sm-3 control-label">Select Supervisor</label>
                              <div class="col-sm-9">
							  <select id="sup" name="UserName" class="select2-chosen col-sm-9">
							  <option value="All">All</option>
							 
							  <?php 
							   $this->load->model('report_model'); 
							  foreach($this->report_model->vehiclelist() as $row){ 
							  echo "<option value='{$row->supervisor}'>{$row->supervisor}</option>";
							  }
							  ?>
							  </select>
                               
                              </div>
                            </div>
                           
                          </div>
						  <div class="col-md-2"> 
                          <button type="submit" name="submit" id="sup1" value="Show" onclick="disp();" class="btn btn-embossed btn-primary m-r-20">Show Tracking</button>
						  </div>
                        </div>
          </div>

 
<div id="ajax-content-container">
  
</div>
		    <div class="row">
            <div class="col-md-12 portlets">
              <div class="panel">
                <div class="panel-header panel-controls">
                  <h3><i class="icon-bulb"></i> <strong>Filtering </strong> with <strong>Text</strong> Inputs in <strong>Header</strong></h3>
                </div>
                <div class="panel-content">
                  <table   id="responsecontainer" class="table table-hover table-dynamic filter-head">
                    <thead>
                      <tr>
                        <th>Field Officer</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Distance (KM)</th>
                        <th>Total(KM)</th>
                      </tr>
                    </thead>
                    <tbody >
					<?php for ($i = 0; $i < count($deptlist); ++$i) { ?> 
                      <tr>
                        <td><?php echo $deptlist[$i]->supervisor?></td>
                        <td><?php echo $deptlist[$i]->tdate?></td>
                        <td><?php echo $deptlist[$i]->itime?></td>
                        <td><?php echo $deptlist[$i]->idistance?></td>
                        <td>X</td>
                      </tr>
                    <?php }?>  
                    </tbody>
                  </table>
				 
                </div>
              </div>
            </div>
            
            
          </div>
          <div class="footer">
            <div class="copyright">
              <p class="pull-left sm-pull-reset">
                <span>Copyright <span class="copyright">©</span> 2015 </span>
                <span>THEMES LAB</span>.
                <span>All rights reserved. </span>
              </p>
              <p class="pull-right sm-pull-reset">
                <span><a href="#" class="m-r-10">Support</a> | <a href="#" class="m-l-10 m-r-10">Terms of use</a> | <a href="#" class="m-l-10">Privacy Policy</a></span>
              </p>
            </div>
          </div>
        </div>
        <!-- END PAGE CONTENT -->
      </div>
      <!-- END MAIN CONTENT -->
      
    </section>
    <!-- BEGIN QUICKVIEW SIDEBAR -->
    <
    <!-- END QUICKVIEW SIDEBAR -->
    <!-- BEGIN SEARCH -->
    <div id="morphsearch" class="morphsearch">
      <form class="morphsearch-form">
        <input class="morphsearch-input" type="search" placeholder="Search..."/>
        <button class="morphsearch-submit" type="submit">Search</button>
      </form>
      <div class="morphsearch-content withScroll">
        <div class="dummy-column user-column">
          <h2>Users</h2>
          <a class="dummy-media-object" href="#">
            <img src="<?php echo base_url();?>/assets/images/avatars/avatar1_big.png" alt="Avatar 1"/>
            <h3>John Smith</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="<?php echo base_url();?>/assets/images/avatars/avatar2_big.png" alt="Avatar 2"/>
            <h3>Bod Dylan</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="<?php echo base_url();?>/assets/images/avatars/avatar3_big.png" alt="Avatar 3"/>
            <h3>Jenny Finlan</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="<?php echo base_url();?>/assets/images/avatars/avatar4_big.png" alt="Avatar 4"/>
            <h3>Harold Fox</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="<?php echo base_url();?>/assets/images/avatars/avatar5_big.png" alt="Avatar 5"/>
            <h3>Martin Hendrix</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="<?php echo base_url();?>/assets/images/avatars/avatar6_big.png" alt="Avatar 6"/>
            <h3>Paul Ferguson</h3>
          </a>
        </div>
        <div class="dummy-column">
          <h2>Articles</h2>
          <a class="dummy-media-object" href="#">
            <img src="<?php echo base_url();?>/assets/images/gallery/1.jpg" alt="1"/>
            <h3>How to change webdesign?</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="<?php echo base_url();?>/assets/images/gallery/2.jpg" alt="2"/>
            <h3>News From the sky</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="<?php echo base_url();?>/assets/images/gallery/3.jpg" alt="3"/>
            <h3>Where is the cat?</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="<?php echo base_url();?>/assets/images/gallery/4.jpg" alt="4"/>
            <h3>Just another funny story</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="<?php echo base_url();?>/assets/images/gallery/5.jpg" alt="5"/>
            <h3>How many water we drink every day?</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="<?php echo base_url();?>/assets/images/gallery/6.jpg" alt="6"/>
            <h3>Drag and drop tutorials</h3>
          </a>
        </div>
        <div class="dummy-column">
          <h2>Recent</h2>
          <a class="dummy-media-object" href="#">
            <img src="<?php echo base_url();?>/assets/images/gallery/7.jpg" alt="7"/>
            <h3>Design Inspiration</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="<?php echo base_url();?>/assets/images/gallery/8.jpg" alt="8"/>
            <h3>Animals drawing</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="<?php echo base_url();?>/assets/images/gallery/9.jpg" alt="9"/>
            <h3>Cup of tea please</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="<?php echo base_url();?>/assets/images/gallery/10.jpg" alt="10"/>
            <h3>New application arrive</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="<?php echo base_url();?>/assets/images/gallery/11.jpg" alt="11"/>
            <h3>Notification prettify</h3>
          </a>
          <a class="dummy-media-object" href="#">
            <img src="<?php echo base_url();?>/assets/images/gallery/12.jpg" alt="12"/>
            <h3>My article is the last recent</h3>
          </a>
        </div>
      </div>
      <!-- /morphsearch-content -->
      <span class="morphsearch-close"></span>
    </div>
    <!-- END SEARCH -->
    <!-- BEGIN PRELOADER -->
    <div class="loader-overlay">
      <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
      </div>
    </div>
    <!-- END PRELOADER -->
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
    <script src="<?php echo base_url();?>/assets/plugins/datatables/jquery.dataTables.min.js"></script> <!-- Tables Filtering, Sorting & Editing --><script src="<?php echo base_url();?>/assets/js/pages/table_dynamic.js"></script>
	<script src="<?php echo base_url();?>/assets/plugins/timepicker/jquery-ui-timepicker-addon.min.js"></script> <!-- Time Picker -->
    <script src="<?php echo base_url();?>/assets/plugins/multidatepicker/multidatespicker.min.js"></script> <!-- Multi dates Picker -->
    <script src="<?php echo base_url();?>/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> <!-- >Bootstrap Date Picker -->
    <script src="<?php echo base_url();?>/assets/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js"></script> <!-- >Bootstrap Date Picker in Spanish (can be removed if not use) -->
    <!-- BEGIN PAGE SCRIPT -->
  </body>
</html>

<script type="text/javascript">
function disp() {
  alert("hi");
  var a=document.getElementById("sup").value;
  var tdate=document.getElementById("tdate").value;
  alert(a);
    $.ajax({
	  type: "POST",
      url: "<?php echo base_url("index.php/qrfencing_report/dynamiclistview"); ?>", 
      data: {'name':a,'t_date':tdate}, 
      success: function(data) {
        $('#responsecontainer').html(data);
		 alert("hi");
      }
    });
}


</script>
<style>
  .table.filter-head>thead>tr>th {min-width: 180px;}
</style>