<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!--page content-->
<div class="global indent">
    <div class="formBox">
        <div class="container">
          <div class="row">
    </div>
        <div class="row"> 
            <div class="col-lg-2 col-md-2 col-sm-2">&nbsp;</div>
            <div class="col-lg-8 col-md-8 col-sm-8">
                <h3 class="indent">System Login<br><span></span></h3>
                 <h4 id="successMsg"></h4>
               <form data-fw-form-id="loginForm" method="post" action="" class="fw_form_fw_form" data-fw-ext-forms-type="contact-forms" id="loginForm">
                <input type="hidden" id="exchangeRate" name="exchangeRate" value="">
                <div class="wrap-forms">
  <div class="row"></div>
  <section id="mainForm">
  <div class="row"><div class="col-xs-12 col-md-6 form-builder-item color1">
  <div class="form-group has-placeholder">
      <input class="form-control" type="email" name="emailAdd" placeholder="Enter Email Address" value="" id="emailAdd" required="required">
      </div>
</div><div class="col-xs-12 col-md-6 form-builder-item color1">
  
</div></div>
<div class="row"><div class="col-xs-12 col-md-6 form-builder-item color1">
  <div class="form-group has-placeholder">
     <input class="form-control" type="password" name="password" placeholder="Enter Password" value="" id="password" required="required">
      </div>
</div><div class="col`-xs-12 col-md-6 form-builder-item color1">
  </div>
<div class="row"></div></div><div class="wrap-forms wrap-forms-buttons topmargin_30" id="submitBtns">
    <div class="row">
      <div class="col-sm-12 wrap-buttons text-left">
        <p>        <a href="<?php echo base_url(); ?>registration/register">Register</a>
        </p>
        <input class="btn-default btn1" type="submit" value="Login" />
                <input class="btn-default btn1" type="reset" value="Reset" id="resetBtn" />
            </div>
    </div>
</div>
</section>
<div class="row"></div></div> 
</form>   
 
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2">&nbsp;</div>
        </div>
        </div>
    </div>
<script type="text/javascript">
  // Login
  $(function(){
       $("#loginForm").submit(function(){
         dataString = $("#loginForm").serialize();
         $.ajax({
           type: "POST",
           url: "<?php echo base_url(); ?>registration/Authentication/login",
           data: dataString,
 
           success: function(data){
               //redirect to the landing page
                window.location.href = '<?php echo site_url(); ?>exchange/trade';
           }
 
         });
 
         return false;  //stop the actual form post !important!
 
      });
   });

</script>