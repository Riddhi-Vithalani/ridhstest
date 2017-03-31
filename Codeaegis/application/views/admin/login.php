<?php $this->load->helper('url');?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Themes Lab - Creative Laborator</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="" name="description" />
        <meta content="themes-lab" name="author" />
        <link rel="shortcut icon" href="<?php echo base_url();?>/assets/img/favicon.png">
        <link href="<?php echo base_url();?>/assets/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url();?>/assets/css/ui.css" rel="stylesheet">
        <link href="<?php echo base_url();?>/assets/plugins/bootstrap-loading/lada.min.css" rel="stylesheet">
    </head>
    <body class="account2" data-page="login">
        <!-- BEGIN LOGIN BOX -->
        <div class="container" id="login-block">
            <i class="user-img icons-faces-users-03"></i>
            <div class="account-info">
                <a href="dashboard.html" class="logo"></a> 
                <!-- <h3>ECS Tracking</h3> -->
                <ul>
                    <li><i class="icon-magic-wand"></i>Live Tracking</li>
                    <li><i class="icon-layers"></i> Tracking Reports</li>
                    <li><i class="icon-arrow-right"></i> View Maps</li>
                    <li><i class="icon-drop"></i>Speed Notifications</li>
                </ul>
            </div>
            <div class="account-form">
                <?php 
          $attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform");
          echo form_open("login/index", $attributes);?>
		  <?php echo $this->session->flashdata('msg'); ?>
                    <h3><strong>Sign in</strong> to your account</h3>
                    <div class="append-icon">
                        <input type="text" name="txt_username" id="txt_username" value="<?php echo set_value('txt_username'); ?>" class="form-control form-white username" placeholder="Username">
						 <span class="text-danger"><?php echo form_error('txt_username'); ?></span>
                        <i class="icon-user"></i>
                    </div>
                    <div class="append-icon m-b-20">
                        <input type="password" value="<?php echo set_value('txt_password'); ?>" id="txt_password" name="txt_password" class="form-control form-white password" placeholder="Password">
						<span class="text-danger"><?php echo form_error('txt_password'); ?></span>
                        <i class="icon-lock"></i>
                    </div>
                    <input type="submit" id="btn_login" name="btn_login" class="btn btn-lg btn-dark btn-rounded ladda-button" value="Login">
					<?php echo $this->db->last_query();?>
                    <span class="forgot-password"><a id="password" href="account-forgot-password.html">Forgot password?</a></span>
                    <!--<div class="form-footer">
                        <div class="social-btn">
                            <button type="button" class="btn-fb btn btn-lg btn-block btn-square"><i class="fa fa-facebook pull-left"></i>Connect with Facebook</button>
                            <button type="button" class="btn btn-lg btn-block btn-blue btn-square"><i class="fa fa-twitter pull-left"></i>Login with Twitter</button>
                        </div>
                        <div class="clearfix">
                            <p class="new-here"><a href="user-signup-v2.html">New here? Sign up</a></p>
                        </div>
                    </div>-->
                <?php echo form_close(); ?>
          
                <form class="form-password" role="form">
                    <h3><strong>Reset</strong> your password</h3>
                    <div class="append-icon m-b-20">
                        <input type="password" name="password" class="form-control form-white password" placeholder="Password" required>
                        <i class="icon-lock"></i>
                    </div>
                    <button type="submit" id="submit-password" class="btn btn-lg btn-danger btn-block ladda-button" data-style="expand-left">Send Password Reset Link</button>
                    <div class="clearfix m-t-60">
                        <p class="pull-left m-t-20 m-b-0"><a id="login" href="#">Have an account? Sign In</a></p>
                        <p class="pull-right m-t-20 m-b-0"><a href="user-signup2.html">New here? Sign up</a></p>
                    </div>
                </form>
            </div>
            <!--<div id="account-builder">
                <form class="form-horizontal" role="form">
                    <div class="row">
                        <div class="col-md-12">
                            <i class="fa fa-spin fa-gear"></i> 
                            <h3><strong>Customize</strong> Login Page</h3>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-xs-8 control-label">Social Login</label>
                                <div class="col-xs-4">
                                    <label class="switch m-r-20">
                                    <input id="social-cb" type="checkbox" class="switch-input" checked>
                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                    <span class="switch-handle"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-xs-8 control-label">Background Image</label>
                                <div class="col-xs-4">
                                    <label class="switch m-r-20">
                                    <input id="image-cb" type="checkbox" class="switch-input" checked>
                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                    <span class="switch-handle"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-xs-8 control-label">Background Slides</label>
                                <div class="col-xs-4">
                                    <label class="switch m-r-20">
                                    <input id="slide-cb" type="checkbox" class="switch-input">
                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                    <span class="switch-handle"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-xs-8 control-label">User Image</label>
                                <div class="col-xs-4">
                                    <label class="switch m-r-20">
                                    <input id="user-cb" type="checkbox" class="switch-input">
                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                    <span class="switch-handle"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>-->
        </div>
        <!-- END LOCKSCREEN BOX -->
        <p class="account-copyright">
            <span>Copyright © 2015 </span><span>Force Tracker.</span>.<span>All rights reserved.</span>
        </p>
        <script src="<?php echo base_url();?>/assets/plugins/jquery/jquery-1.11.1.min.js"></script>
        <script src="<?php echo base_url();?>/assets/plugins/jquery/jquery-migrate-1.2.1.min.js"></script>
        <script src="<?php echo base_url();?>/assets/plugins/gsap/main-gsap.min.js"></script>
        <script src="<?php echo base_url();?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>/assets/plugins/backstretch/backstretch.min.js"></script>
        <script src="<?php echo base_url();?>/assets/plugins/bootstrap-loading/lada.min.js"></script>
        <script src="<?php echo base_url();?>/assets/js/pages/login-v2.js"></script>
    </body>
</html>