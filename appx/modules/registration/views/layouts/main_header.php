<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Forex Trader</title>
<!--CSS-->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css" >
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/camera.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/stuck.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/font-awesome.css">
<!--JS-->
<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url();?>assets/js/superfish.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.easing.1.3.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.mobilemenu.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.ui.totop.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.equalheights.js"></script>
<script src="<?php echo base_url();?>assets/js/camera.js"></script>
<script src="<?php echo base_url();?>assets/js/tmstickup.js"></script>
<script src="<?php echo base_url();?>assets/js/TMForm.js"></script>
<script>
    $(document).ready(function(){
        jQuery('.camera_wrap').camera();
    });
</script>
<!--[if (gt IE 9)|!(IE)]><!-->
      <script src="<?php echo base_url();?>assets/js/jquery.mobile.customized.min.js"></script>
<!--<![endif]-->
<!--[if lt IE 9]>
    <div style='text-align:center'><a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." /></a></div>  
  <![endif]-->
  <!--[if lt IE 9]><script src="../docs-assets/<?php echo base_url();?>assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.<?php echo base_url();?>assets/js/1.3.0/respond.min.js"></script>
  <![endif]-->
</head>
<body>
<!--header--> 
<header>
    <div id="stuck_container">
        <div class="menuBox" style="">   
            <div class="container"> 
                <nav class="navbar navbar-default navbar-static-top tm_navbar clearfix" role="navigation">
                    <ul class="nav sf-menu clearfix" style="overflow: hidden; margin-top: 11px;">
                        <li <?php $class = ''; if(strcmp($this->uri->segment(1), '') == 0): echo 'class="$class"';endif; ?>><a href="<?php echo base_url(); ?>" style="width: 35px;">Home</a></li>
                        <li <?php echo $class='';if(strcmp($this->uri->segment(1), 'Vision') == 0): echo 'class="active"';endif; ?>><a href="<?php echo base_url() ?>Vision" style="width: 80px;">User Registration</a></li>
                        <li <?php if(strcmp($this->uri->segment(1), 'Corporate') == 0): echo 'class="active"';endif; ?>><a href="<?php echo base_url() ?>Corporate" style="padding-left:10px;
  padding-right:30px; width: 175px;">Admin Login</a></li>
                        <li <?php if(strcmp($this->uri->segment(1), 'Principal') == 0): echo 'class="active"';endif; ?>><a href="<?php echo base_url() ?>Principal" style="padding-left:10px;
  padding-right:30px; width: 145px;"></a></li>
                        <li <?php if(strcmp($this->uri->segment(1), 'Clients') == 0): echo 'class="active"';endif; ?>><a href="<?php echo base_url() ?>Clients" style="width: 70px;">Our Clients</a></li>
                        <li <?php if(strcmp($this->uri->segment(1), 'Team') == 0): echo 'class="active"';endif; ?>><a href="<?php echo base_url() ?>Team" style="width: 70px;">Our Team</a></li>
                        <li <?php if(strcmp($this->uri->segment(1), 'Contact') == 0): echo 'class="active"';endif; ?>><a href="<?php echo base_url() ?>Contact" style="width: 70px;">Contact Us</a></li>
                        <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
                            
                        </ul> 
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <style type="text/css">
        a:hover { 
            background: yellow;
        }

        .nav > li > a:hover,
        .nav > li > a:focus {
                      text-decoration: none;
                      background-color: #153744;
                    }

        .list2 li a:hover {
                      text-decoration: none;
                      background-color: #fff;
                    }

        a:hover {
             background: none; 
             color: #fff; 
        }

    </style>
</header>
<div class="global indent">