<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!--page content-->
<div class="global indent">
    <div class="formBox">
        <div class="container">
        <div class="row"> 
            <div class="col-lg-2 col-md-2 col-sm-2">&nbsp;</div>
            <div class="col-lg-8 col-md-8 col-sm-8">
                <h3 class="indent">User Registration<br><span></span></h3>
               <form data-fw-form-id="registerUser" method="post" action="" class="fw_form_fw_form" data-fw-ext-forms-type="contact-forms" id="registerUser"><div class="wrap-forms">
  <div class="row"></div>
  <section id="mainForm">
  <div class="row"><div class="col-xs-12 col-md-6 form-builder-item color1">
  <div class="form-group has-placeholder">
      <input class="form-control" type="text" name="fullName" placeholder="Full Name" value="" id="fullName" required="required">
      </div>
</div><div class="col-xs-12 col-md-6 form-builder-item">
  <div class="form-group has-placeholder">
        <input class="form-control" type="email" name="emailAdd" placeholder="Email Address" value="" id="emailAdd" required="required">
      </div>
</div></div><div class="row"><div class="col-xs-12 col-md-6 form-builder-item color1">
  <div class="form-group has-placeholder">
        <input class="form-control" type="text" name="phoneNum" placeholder="Phone number" value="" id="id-2">
      </div>
</div><div class="col`-xs-12 col-md-6 form-builder-item color1">
  <div class="form-group has-placeholder">
      <input class="form-control" type="password" name="password" placeholder="Password" value="" id="password">
      </div>
</div></div>

<div class="row">
</div>


<div class="row"></div></div><div class="wrap-forms wrap-forms-buttons topmargin_30" id="submitBtns">
    <div class="row">
      <div class="col-sm-12 wrap-buttons text-center">
        <input class="btn-default btn1" type="submit" value="Register" />
                <input class="btn-default btn1" type="reset" value="Clear" />
            </div>
    </div>
</div>
</section>
<span id="buyForex">
<div class="row" style="padding-top: 30px;"><div class="col-xs-12 form-builder-item">
  <div class="form-group has-placeholder">
      <label><strong>Please Enter Registration Code That Was Sent To Your Email</strong></label>
      <input class="form-control" type="text" name="regCode" placeholder="Registration Code" value="" id="regCode">
      </div>
</div>
</div>
</span>

<div class="row"></div></div><div class="wrap-forms wrap-forms-buttons topmargin_30">
    <div class="row">
      <div class="col-sm-12 wrap-buttons text-center">
        <input class="btn-default btn1" type="button" value="Buy Forex" id="buyFrxBtn" />
            </div>
    </div>
</div>



</form>

               
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2">&nbsp;</div>
        </div>
        </div>
    </div>

<script type="text/javascript">
  $( document ).ready(function() {
      $('#buyForex').hide();
      $('#buyFrxBtn').hide();
  });
</script>
<script type="text/javascript">
   $(function(){
       $("#registerUser").submit(function(){
         dataString = $("#registerUser").serialize();
         $.ajax({
           type: "POST",
           url: "<?php echo base_url(); ?>registration/authentication/registration",
           data: dataString,
 
           success: function(data){
              //redirect user to the foreign exchange page
              window.location.href = '<?php echo site_url(); ?>exchange';
           }
 
         });
 
         return false; 
 
      });
   });
</script>