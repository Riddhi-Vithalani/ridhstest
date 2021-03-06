<?php 
$this->load->helper('url');
?>
<!DOCTYPE HTML>
<html lang="en-US">
  <head>
    <title>Vehicle Tracking</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/favicon.png" type="image/png">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/frontend/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/frontend/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/frontend/css/fancy-buttons.min.css" />
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:300,400,600,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:100,300,400,600,700' rel='stylesheet' type='text/css'>
    <!-- Other CSS files -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/frontend/css/animate.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/frontend/js/magnific/magnific-popup.min.css">
    <!-- Main Stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/frontend/css/style.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/frontend/css/ui.min.css" />
    <!-- Color Scheme, 5 colors are available: default, blue, red, orange and green  -->
    <link rel="stylesheet" id="theme-color" href="<?php echo base_url(); ?>/assets/frontend/css/themes/default.css" />
    <!-- [if lt IE 9]>
      <script src="http://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="http://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif] -->
  </head>
  <body>
    <!-- BEGIN PRELOADER -->
    <div class="loader-overlay">
      <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
      </div>
    </div>
    <!-- END PRELOADER -->
    <!--  Begin Topbar simple -->
    <div class="topnav fixed-topnav topnav-top">
      <div class="section">
        <div id="topbar-hold" class="nav-hold container">
          <nav class="navbar" role="navigation">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-responsive-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              </button>
              <!-- Site Name -->
              <a class="site-name navbar-brand" href="#"></a> 
            </div>
            <!-- Main Navigation menu Starts -->
            <div class="collapse navbar-collapse navbar-responsive-collapse">
              <ul class="nav navbar-nav navbar-right">
                <li class="current"><a href="#header">Home</a></li>
                <li><a href="#section-services">Services</a></li>
                <li><a href="#section-join">Join</a></li>
                <li><a href="#section-works">Projects</a></li>
                <li><a href="#section-team">Team</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="#section-pricing">Pricing</a></li>
                <li><a href="#section-contact">Contact</a></li>
              </ul>
            </div>
            <!-- Main Navigation menu ends-->
          </nav>
        </div>
      </div>
    </div>
    <!-- Top Background Slider Image -->
    <header class="bg-slider center" id="header">
      <div class="section-overlay"></div>
      <div class="container top-element">
        <div class="row">
          <!-- <p class="top-text">Welcome to</p>
          <h1 class="welcome">ECS TRACKING</h1>
          <div class="col-md-8 col-md-offset-2">
            <p class="intro-message">You can track your vehicle lively.</p>
            <div>
              <a href="#" class="fancy-button btn-line button-white vertical">
              Learn more
              <span class="icon">
              <i class="line-icon-settings"></i>
              </span>
              </a>
            </div>
            <div class="go-down">
              <i class="fa fa-angle-down"></i>
            </div>
          </div> -->
        </div>
      </div>
    </header>
    <!-- End Top Background Slider Image -->
    <!-- Begin Features 3 columns -->
    <section class="section-content" id="section-services">
      <div class="container">
        <h3 class="center p-b-30">Welcome to ECS TRACKING</h3>
        <div class="row p-b-30">
          <div class="col-md-4 center animated" data-animation="fadeInDown" data-animation-delay="300">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <img src="<?php echo base_url(); ?>/assets/frontend/images/gps.png" alt="have money" class="img-responsive img-feature">
              </div>
            </div>
            <h4 class="f-600">GPS TRACKING</h4>
            <p>ECS-VTS is the ultimate device in managing your mobile resources wherever they go. Pure Satellite GPS tracking offers detailed reporting and real-time GPS updates for companies that operate far from cellular network ranges, so that no matter where your vehicles.</p>
          </div>
          <div class="col-md-4 center animated" data-animation="fadeInDown" data-animation-delay="600">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <img src="<?php echo base_url(); ?>/assets/frontend/images/paper.png" alt="baloon" class="img-responsive img-feature">
              </div>
            </div>
            <h4 class="f-600">FEATURES</h4>
            <p>ECS-VTS offers GPS tracking for trucks and buses that paves the way for efficiency, profitability, safety and security.With Enterprise Data Services, you can have real-time tracking data flow to your in-house applications. Embed mapping of your vehicles on your website so customers can track their services online.</p>
          </div>
          <div class="col-md-4 center animated" data-animation="fadeInDown" data-animation-delay="900">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <img src="<?php echo base_url(); ?>/assets/frontend/images/support1.png" alt="baloon" class="img-responsive img-feature">
              </div>
            </div>
            <h4 class="f-600">SUPPORT</h4>
            <p>Whether you manage a fleet of school buses, delivery and pickup vehicles, or marine vessels, we can provide a tracking solution customized to meet your specific needs. The process is simple: Just give us a call, and we will help you determine the best system for your business.</p>
          </div>
          <div class="col-md-12 center p-t-60 animated" data-animation="fadeInDown" data-animation-delay="900">
           <!-- <button type="submit" class="fancy-button btn-line large ">See all Features</button> -->
          </div>
        </div>
      </div>
    </section>
    <!-- End Features 3 columns -->
    <!-- Begin Content Laptop Desk -->
    <section class="section-content bg-primary" id="section-join">
      <div class="container p-t-60">
      <div class="row">
        <div class="col-md-5 p-t-60 animated" data-animation="fadeInLeft" data-animation-delay="500">
          <img class="img-responsive" src="<?php echo base_url(); ?>/assets/frontend/images/tablet.png" alt="desk">
        </div>
        <div class="col-md-7 text-left features-list animated" data-animation="fadeInRight" data-animation-delay="500">
          <h3 class="center p-b-30">Why join us?</h3>
          <div class="row">
            <div class="col-md-6">
              <div class="media">
                <div class="pull-left icon" href="#">
                  <i class="line-icon-rocket c-primary"></i>
                </div>
                <div class="media-body">
                  <h4 class="media-heading c-primary">Reliable</h4>
                  <p>ECS-VTS products are tested and certified by leading wireless carriers, so that you know your system is guaranteed to work and keep you in compliance.</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="media">
                <div class="pull-left icon" href="#">
                  <i class="line-icon-folder-alt c-primary"></i>
                </div>
                <div class="media-body">
                  <h4 class="media-heading c-primary">Daily/Monthly Report</h4>
                  <p>User get Route Reports Per Vehicle, Daily Km Reports, Trip wise Reports, Fuel Consumption Report, Any other Customized Reports. </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="media">
                <div class="pull-left icon" href="#">
                  <i class="line-icon-call-in c-primary"></i>
                </div>
                <div class="media-body">
                  <h4 class="media-heading c-primary">Hight level support</h4>
                  <p>Our ECS-VTS systems include cellular and pure satellite. We'll even mix and match technologies for an alternative solution that best fits your needs.</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="media">
                <div class="pull-left icon" href="#">
                  <i class="line-icon-briefcase c-primary"></i>
                </div>
                <div class="media-body">
                  <h4 class="media-heading c-primary">Business Supports</h4>
                  <p> As we continue to develop new technology, we will alert you to upgrades and industry developments that can further improve your business.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
         <!-- <div class="row">
          <div class="col-md-12 center p-t-60">
            <button type="submit" class="fancy-button btn-line large button-white">Join the community Now</button>
          </div>
        </div>-->
      </div>
    </section>
    <!-- End Content Laptop Desk -->
    <!-- Begin  Projects Sortable Fullwidth -->
    <!-- <section class="section-projects clearfix" id="section-works">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 center m-b-30">
            <h3>Our Latest Works</h3>
          </div>
          <div class="col-md-12 center">
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore</p>
          </div>
          <div class="col-md-12 work-filter wow animated" data-animation="fadeInRight" data-animation-delay="200">
            <ul class="text-center">
              <li><a href="javascript:;" data-filter="all" class="active filter">All</a></li>
              <li><a href="javascript:;" data-filter=".branding" class="filter">Branding</a></li>
              <li><a href="javascript:;" data-filter=".web" class="filter">web</a></li>
              <li><a href="javascript:;" data-filter=".logo-design" class="filter">logo design</a></li>
              <li><a href="javascript:;" data-filter=".photography" class="filter">photography</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="project-wrapper">
        <figure class="mix work-item branding photography animated" data-animation="fadeIn" data-animation-delay="300">
          <img src="<?php echo base_url(); ?>/assets/frontend/images/1.jpg" alt="1">
          <figcaption class="overlay magnific" data-mfp-src="<?php echo base_url(); ?>/assets/frontend/images/1.jpg">
            <a rel="works" href="#"><i class="line-icon-eye"></i></a>
            <h4>Labore et dolore magnam</h4>
            <p>Photography</p>
          </figcaption>
        </figure>
        <figure class="mix work-item web item photography branding animated" data-animation="fadeIn" data-animation-delay="500">
          <img src="<?php echo base_url(); ?>/assets/frontend/images/2.jpg" alt="2">
          <figcaption class="overlay magnific" data-mfp-src="<?php echo base_url(); ?>/assets/frontend/images/2.jpg">
            <a rel="works" href="img/works/item-2.jpg"><i class="line-icon-eye"></i></a>
            <h4>Labore et dolore magnam</h4>
            <p>Photography</p>
          </figcaption>
        </figure>
        <figure class="mix work-item logo-design item branding animated" data-animation="fadeIn" data-animation-delay="700">
          <img src="<?php echo base_url(); ?>/assets/frontend/images/3.jpg" alt="3">
          <figcaption class="overlay magnific" data-mfp-src="<?php echo base_url(); ?>/assets/frontend/images/3.jpg">
            <a rel="works" href="img/works/item-3.jpg"><i class="line-icon-eye"></i></a>
            <h4>Labore et dolore magnam</h4>
            <p>Photography</p>
          </figcaption>
        </figure>
        <figure class="mix work-item photography animated" data-animation="fadeIn" data-animation-delay="900">
          <img src="<?php echo base_url(); ?>/assets/frontend/images/4.jpg" alt="4">
          <figcaption class="overlay magnific" data-mfp-src="<?php echo base_url(); ?>/assets/frontend/images/4.jpg">
            <a rel="works" href="img/works/item-4.jpg"><i class="line-icon-eye"></i></a>
            <h4>Labore et dolore magnam</h4>
            <p>Photography</p>
          </figcaption>
        </figure>
        <figure class="mix work-item branding web logo-design animated" data-animation="fadeIn" data-animation-delay="1100">
          <img src="<?php echo base_url(); ?>/assets/frontend/images/5.jpg" alt="5">
          <figcaption class="overlay magnific" data-mfp-src="<?php echo base_url(); ?>/assets/frontend/images/5.jpg">
            <a rel="works" href="<?php echo base_url(); ?>/assets/frontend/img/works/item-5.jpg"><i class="line-icon-eye"></i></a>
            <h4>Labore et dolore magnam</h4>
            <p>Photography</p>
          </figcaption>
        </figure>
        <figure class="mix work-item web animated" data-animation="fadeIn" data-animation-delay="1300">
          <img src="<?php echo base_url(); ?>/assets/frontend/images/6.jpg" alt="6">
          <figcaption class="overlay magnific" data-mfp-src="<?php echo base_url(); ?>/assets/frontend/images/6.jpg">
            <a rel="works" href="<?php echo base_url(); ?>/assets/frontend/img/works/item-6.jpg"><i class="line-icon-eye"></i></a>
            <h4>Labore et dolore magnam</h4>
            <p>Photography</p>
          </figcaption>
        </figure>
        <figure class="mix work-item logo-design animated" data-animation="fadeIn" data-animation-delay="1500">
          <img src="<?php echo base_url(); ?>/assets/frontend/images/7.jpg" alt="7">
          <figcaption class="overlay magnific" data-mfp-src="<?php echo base_url(); ?>/assets/frontend/images/7.jpg">
            <a rel="works" href="img/works/item-7.jpg"><i class="line-icon-eye"></i></a>
            <h4>Labore et dolore magnam</h4>
            <p>Photography</p>
          </figcaption>
        </figure>
        <figure class="mix work-item photography web logo-design animated" data-animation="fadeIn" data-animation-delay="1700">
          <img src="<?php echo base_url(); ?>/assets/frontend/images/8.jpg" alt="8">
          <figcaption class="overlay magnific" data-mfp-src="<?php echo base_url(); ?>/assets/frontend/images/8.jpg">
            <a rel="works" href="<?php echo base_url(); ?>/assets/frontend/img/works/item-8.jpg"><i class="line-icon-eye"></i></a>
            <h4>Labore et dolore magnam</h4>
            <p>Photography</p>
          </figcaption>
        </figure>
      </div>
    </section>-->
    <!-- End Projects Sortable Fullwidth -->
    <!-- Begin Team 3 columns 2 rows Square -->
    <section class="section-team" id="section-team">
      <div class="container team center">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 center m-b-30">
            <h3>Our Team</h3>
          </div>
          <div class="col-sm-6">
            <div class="member-team animated grayscale-animate" data-animation="fadeIn" data-animation-delay="300">
              <div class="row">
                <div class="col-xs-6">
                  <img src="<?php echo base_url(); ?>/assets/frontend/images/people/1.jpg" class="img-responsive" alt="team 1">
                </div>
                <div class="col-xs-6 text-left">
                  <h4>Satish Kulkarni</h4>
                  <p class="c-primary">Team Lead</p>
                  <p class="team-description">Quo cognito Constantius ultra mortalem allus tinera conaretur.</p>
                  <ul class="list-inline">
                    <li><a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="member-team animated grayscale-animate" data-animation="fadeIn" data-animation-delay="500">
              <div class="row">
                <div class="col-xs-6">
                  <img src="<?php echo base_url(); ?>/assets/frontend/images/people/2.jpg" class="img-responsive" alt="team 2">
                </div>
                <div class="col-xs-6 text-left">
                  <h4>Atul Suroshe</h4>
                  <p class="c-primary">Lead Designer</p>
                  <p class="team-description">Quo cognito Constantius ultra mortalem allus tinera conaretur.</p>
                  <ul class="list-inline">
                    <li><a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="member-team animated grayscale-animate" data-animation="fadeIn" data-animation-delay="700">
              <div class="row">
                <div class="col-xs-6 text-right">
                  <h4>Radhu Chaudhari</h4>
                  <p class="c-primary">Lead Developer</p>
                  <p class="team-description">Quo cognito Constantius ultra mortalem allus tinera conaretur.</p>
                  <ul class="list-inline">
                    <li><a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a>
                    </li>
                  </ul>
                </div>
                <div class="col-xs-6">
                  <img src="<?php echo base_url(); ?>/assets/frontend/images/people/3.jpg" class="img-responsive" alt="team 3">
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="member-team animated grayscale-animate" data-animation="fadeIn" data-animation-delay="900">
              <div class="row">
                <div class="col-xs-6 text-right">
                  <h4>Rushikesh</h4>
                  <p class="c-primary">Lead Developer</p>
                  <p class="team-description">Quo cognito Constantius ultra mortalem allus tinera conaretur.</p>
                  <ul class="list-inline">
                    <li><a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a>
                    </li>
                  </ul>
                </div>
                <div class="col-xs-6">
                  <img src="<?php echo base_url(); ?>/assets/frontend/images/people/4.jpg" class="img-responsive" alt="team 4">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Team 3 columns 2 rows Square -->
    <!-- Begin Features image left text right -->
    <section class="section-content bg-primary p-b-110" id="features">
      <div class="container">
        <h3 class="text-center p-t-60">ECS-VTS offers GPS tracking for trucks and buses that paves the way for efficiency, profitability, safety and security. </h3>
        <div class="row">
          <div class="col-md-4 p-t-60 m-t-30">
            <p class="f-600 uppercase"></p>
            <p>With Enterprise Data Services, you can have real-time tracking data flow to your in-house applications. Embed mapping of your vehicles on your website so customers can track their services online.</p>
          </div>
          <div class="col-md-4 animated" data-animation="fadeInUp" data-animation-delay="400">
            <img src="<?php echo base_url(); ?>/assets/frontend/images/map1.png" alt="have money" class="img-responsive img-feature">
          </div>
          <div class="col-md-4 p-t-60 m-t-30">
            <p class="f-600 uppercase"></p>
            <p>Premier, enhanced map data by Google Enterprise Maps span most of the U.S. and the world, with easy-to-use features and a familiar setup.</p>
            <p>ECS-VTS systems include cellular and pure satellite. We’ll even mix and match technologies for an alternative solution that best fits your needs.</p> 
          </div>
        </div>
        <div class="row">

        </div>
      </div>
    </section>
    <!-- End Features 3 columns -->
    <!-- Begin Pricing section 3 columns style 1 Fullcolor -->
    <section class="section-pricing" id="section-pricing">
      <div class="container pricing">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 center section-title">
            <h3 class="m-b-60">Plans &amp; pricing</h3>
          </div>
          <!-- Single Price Starts -->
          <div class="col-sm-4 single-pricing-wrap center animated" data-animation="bounceInLeft" data-animation-delay="500">
            <div class="single-pricing bg-dark">
              <div class="pricing-head">
                <h4 class="pricing-heading color-scheme">Basic</h4>
                <div class="price">
                  <h3>
                    <span class="dollar">$</span>
                    40
                    <span class="month">/month</span>
                  </h3>
                </div>
              </div>
              <ul class="package-features">
                <li><span class="color-scheme fa fa-check"></span>Unlimited Downloads</li>
                <li><span class="color-scheme fa fa-check"></span>Unlimited Uploads</li>
                <li><span class="color-scheme fa fa-check"></span>Unlimited Email Accounts</li>
                <li><span class="color-scheme fa fa-check"></span>Email Forwards</li>
                <li><span class="color-scheme fa fa-close"></span>Cloud Storage</li>
                <li><span class="color-scheme fa fa-close"></span>Voice call</li>
                <li><span class="color-scheme fa fa-close"></span>Screen Share</li>
              </ul>
              <div class="sign-up">
                <a href="#" class="fancy-button btn-line btn-col zoom">
                Sign up
                <span class="icon">
                <i class="fa fa-thumbs-o-up"></i>
                </span>
                </a>
              </div>
            </div>
          </div>
          <!-- Single Price Ends -->
          <!-- Single Price Starts -->
          <div class="col-sm-4 single-pricing-wrap center animated" data-animation="bounceInLeft" data-animation-delay="700">
            <div class="single-pricing bg-dark">
              <!-- this is best-pricing -->
              <div class="pricing-head">
                <h4 class="pricing-heading color-scheme">Advance</h4>
                <div class="price">
                  <h3>
                    <span class="dollar">$</span>
                    60
                    <span class="month">/month</span>
                  </h3>
                </div>
              </div>
              <ul class="package-features">
                <li><span class="color-scheme fa fa-check"></span>Unlimited Downloads</li>
                <li><span class="color-scheme fa fa-check"></span>Unlimited Uploads</li>
                <li><span class="color-scheme fa fa-check"></span>Unlimited Email Accounts</li>
                <li><span class="color-scheme fa fa-check"></span>Email Forwards</li>
                <li><span class="color-scheme fa fa-check"></span>Cloud Storage</li>
                <li><span class="color-scheme fa fa-close"></span>Voice call</li>
                <li><span class="color-scheme fa fa-close"></span>Screen Share</li>
              </ul>
              <div class="sign-up">
                <a href="#" class="fancy-button btn-line btn-col vertical">
                Sign up
                <span class="icon">
                <i class="fa fa-hand-o-up"></i>
                </span>
                </a>
              </div>
            </div>
          </div>
          <!-- Single Price Ends -->
          <!-- Single Price Starts -->
          <div class="col-sm-4 single-pricing-wrap center animated" data-animation="bounceInLeft" data-animation-delay="900">
            <div class="single-pricing bg-dark">
              <div class="pricing-head">
                <h4 class="pricing-heading color-scheme">Premium</h4>
                <div class="price">
                  <h3>
                    <span class="dollar">$</span>
                    80
                    <span class="month">/month</span>
                  </h3>
                </div>
              </div>
              <ul class="package-features">
                <li><span class="color-scheme fa fa-check"></span>Unlimited Downloads</li>
                <li><span class="color-scheme fa fa-check"></span>Unlimited Uploads</li>
                <li><span class="color-scheme fa fa-check"></span>Unlimited Email Accounts</li>
                <li><span class="color-scheme fa fa-check"></span>Email Forwards</li>
                <li><span class="color-scheme fa fa-check"></span>Cloud Storage</li>
                <li><span class="color-scheme fa fa-check"></span>Voice call</li>
                <li><span class="color-scheme fa fa-close"></span>Screen Share</li>
              </ul>
              <div class="sign-up">
                <a href="#" class="fancy-button btn-line btn-col rotate">
                Sign up
                <span class="icon">
                <i class="fa fa-thumbs-o-up"></i>
                </span>
                </a>
              </div>
            </div>
          </div>
          <!-- Single Price Ends -->
        </div>
      </div>
    </section>
    <!-- End Pricing section 3 columns style 1 FullColor -->
    <!-- Begin Contact Map Full Width Dark -->
    <section class="section-contact full-map contact-wrap bg-dark" id="section-contact">
      <div class="map-container">
        <div id="full-map"></div>
      </div>
      <div class="container contact center animated" data-animation="flipInY" data-animation-delay="1000">
        <div class="row">
          <div class="col-md-8 col-md-offset-2 center section-title">
            <h3>Leave a message</h3>
          </div>
          <div class="col-md-6">
            <div class="confirmation">
              <p><span class="fa fa-check"></span></p>
            </div>
            <form class="contact-form support-form">
              <div class="col-lg-12">
                <input id="name" class="input-field form-item field-name" type="text" required="required" name="contact-name" placeholder="Name" />
                <input id="email" class="input-field form-item field-email" type="email" required="required" name="contact-email" placeholder="Email" />
                <input id="subject" class="input-field form-item field-subject" type="text" required="required" name="contact-subject" placeholder="Subject" />
                <textarea id="message" class="textarea-field form-item field-message" rows="5" name="contact-message" placeholder="Message"></textarea>
              </div>
              <button type="submit" class="fancy-button btn-line button-white large zoom subform">
              Send message
              <span class="icon">
              <i class="fa fa-paper-plane-o"></i>
              </span>
              </button>
            </form>
          </div>
          <div class="col-md-6">
            <h3 class="text-right">Get in touch</h3>
            <h5 class="text-right"><hl>Head Office</hl></h5>
            <p class="contact-description text-right c-gray">
              ECS Technologies Pvt. Ltd.,
              Block-891-1488, <br />

              Tampines ave 8, 
              Singapore-520891 <br />
              <b>Mr. Parimal </b><br />
               Email : parimal@ecs-tech.in<br />
               Mobile : +919960796605
            </p>
            <h5 class="text-right"><hl>Branch Office</hl></h5>
            <p class="contact-description text-right c-gray">
              ECS Technologies Pvt. Ltd.,
              Shree Datta Marg,<br /> 
              Sudarshan NagarNear Golande Temple,
              Chinchwad,<br />
               Pune, Maharashtra(India)- 411014 <br />
             <b>Mr. Parag </b><br />
               Email : parag@ecs-tech.in<br />
               Mobile : +919970098844
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- End Contact Form Map Full Width Dark -->
    <!-- BEGIN FOOTER -->
    <!-- Begin Footer 3 columns Dark -->
    <div class="section-footer footer-wrap">
      <div class="container footer center">
        <div class="row">
          <div class="col-sm-4">
            <h4>Company Info</h4>
            <p>Web agency created in 2014</p>
            <p>Specialized in theme design template</p>
            <p>Contact us for custom project</p>
            <p>Make your own template with us</p>
          </div>
          <div class="col-sm-4">
            <h4>Contact Info</h4>
            <p><i class="line-icon-map"></i>Esha House, Sudarshan Nagar, Chinchwad</p>
            <p><i class="line-icon-screen-smartphone"></i> +91-9970098844 / 91-20-65110285</p>
            <p><i class="line-icon-envelope-open"></i>parag@ecs-tech.in</p>
            <p><i class="line-icon-calendar"></i>9am - 6 pm monday / saturday</p>
          </div>
          <div class="col-sm-4">
            <h4>Get In Touch</h4>
            <div class="social-icons social-square">
              <ul class="text-left">
                <li class="animated" data-animation="fadeIn" data-animation-delay="400"><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li class="animated" data-animation="fadeIn" data-animation-delay="600"><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li class="animated" data-animation="fadeIn" data-animation-delay="800"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li class="animated" data-animation="fadeIn" data-animation-delay="1000"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                <li class="animated" data-animation="fadeIn" data-animation-delay="1200"><a href="#"><i class="fa fa-flickr"></i></a></li>
                <li class="animated" data-animation="fadeIn" data-animation-delay="1400"><a href="#"><i class="fa fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Begin Footer Copyright -->
    <div class="container footer center">
      <div class="copyright">
        <p class=" center"><a href="www.ecs-tech.in" target="_blank">ECS Technologies All rights reserved &copy; 2015</a></p>
      </div>
    </div>
    <!-- End Footer Copyright -->
    <!-- End Footer 3 columns Dark -->
    <!-- END FOOTER -->
    <div id="color-switcher">
      <a class="color-toggle"><i class="line-icon-drop"></i></a>
    </div>
    <div id="color-chooser">
      <p>Choose your theme color</p>
      <div class="clearfix">
        <div class="color color-default" data-theme="default"></div>
        <div class="color color-blue" data-theme="blue"></div>
        <div class="color color-green" data-theme="green"></div>
        <div class="color color-red" data-theme="red"></div>
        <div class="color color-orange" data-theme="orange"></div>
      </div>
      <div class="close-color">close</div>
    </div>

    <!-- Js files -->
    <!-- Essential files -->
    <script src="<?php echo base_url(); ?>/assets/frontend/js/jquery-1.11.1.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/frontend/js/jquery.easing.1.3.js"></script>
    <script src="<?php echo base_url(); ?>/assets/frontend/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/frontend/js/modernizr.js"></script>
    <script src="<?php echo base_url(); ?>/assets/frontend/js/magnific/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/frontend/js/backstretch/backstretch.min.js"></script>
    <!-- Scroll and navigation plugins -->
    <script src="<?php echo base_url(); ?>/assets/frontend/js/jquery.nicescroll.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/frontend/js/jquery.nav.js"></script>
    <script src="<?php echo base_url(); ?>/assets/frontend/js/jquery.appear.js"></script>
    <!-- Google Maps -->
    <script src="//maps.google.com/maps/api/js?sensor=true"></script>
    <script src="<?php echo base_url(); ?>/assets/frontend/js/google-maps/gmaps.min.js"></script>
    <script src="https://google-maps-utility-library-v3.googlecode.com/svn-history/r391/trunk/markerwithlabel/src/markerwithlabel.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/frontend/js/map.js"></script>
    <!-- Gallery Sortable -->
    <script src="<?php echo base_url(); ?>/assets/frontend/js/jquery.mixitup.min.js"></script>
    <!-- Custom Script files -->
    <script src="<?php echo base_url(); ?>/assets/frontend/js/custom.js"></script>
  </body>
</html>