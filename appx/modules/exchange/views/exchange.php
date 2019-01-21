<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!--page content-->
<div class="global indent">
    <div class="formBox">
        <div class="container">
          <div class="row">
      <div class="col-sm-12 wrap-buttons text-center">
        <a href="<?php echo base_url(); ?>exchange/rate/get_rates" class="btn-default btn1" target="_blank">Update Exchange Rates</a>
        <hr>
            </div>
    </div>
        <div class="row"> 
            <div class="col-lg-2 col-md-2 col-sm-2">&nbsp;</div>
            <div class="col-lg-8 col-md-8 col-sm-8">
                <h3 class="indent">Forex Order Details<br><span></span></h3>
                 <h4 id="successMsg"></h4>
                 <p id="msg">You will be redirected shortly to view order details...</p>
               <form data-fw-form-id="forexForm" method="post" action="" class="fw_form_fw_form" data-fw-ext-forms-type="contact-forms" id="forexForm">
                <input type="hidden" id="exchangeRate" name="exchangeRate" value="">
                <div class="wrap-forms">
  <div class="row"></div>
  <section id="mainForm">
  <div class="row"><div class="col-xs-12 col-md-6 form-builder-item color1">
  <div class="form-group has-placeholder">
      <input class="form-control" type="text" name="baseCurrencyAmount" placeholder="Enter Amount" value="" id="baseCurrencyAmount" required="required"  onkeyup="NumAndTwoDecimals(event , this);">
      </div>
</div><div class="col-xs-12 col-md-6 form-builder-item color1">
  <div class="form-group has-placeholder">
    <label>South African Rand (ZAR)</label>
        
      </div>
</div></div>
<div class="row"><div class="col-xs-12 col-md-6 form-builder-item color1">
  <div class="form-group has-placeholder">
     <input class="form-control" type="text" name="foreignCurrencyAmt" placeholder="Enter Amount" value="" id="foreignCurrencyAmt" required="required"  onkeyup="NumAndTwoDecimals(event , this);">
      </div>
</div><div class="col`-xs-12 col-md-6 form-builder-item color1">
  <div class="form-group has-placeholder">
      <select class="form-control" name="foreignCurrency" id="foreignCurrency" required="required">
        <option value="">Select Foreign Currency</option>
      <?php foreach($foreign_currencies as $key => $fx): ?>
        <option value="<?php echo $fx->fc_abbreviation; ?>" id="<?php echo $fx->fc_id; ?>"><?php echo ucwords($fx->fc_name)." - ".ucwords($fx->fc_abbreviation); ?></option>
      <?php endforeach; ?>
      </select>
</div></div>
<div class="row"></div></div><div class="wrap-forms wrap-forms-buttons topmargin_30" id="submitBtns">
    <div class="row">
      <div class="col-sm-12 wrap-buttons text-center">
        <input class="btn-default btn1" type="submit" value="Purchase" />
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
  $( document ).ready(function() {
      $('#msg').hide();
  });
</script>
<script type="text/javascript">
  //get all the exchange rates 
  $('#foreignCurrency').change(function() {
    
      if(!$('#baseCurrencyAmount').val() && !$('#foreignCurrencyAmt').val()){
        alert('Enter the base currency amount or the foreign currency amount to proceed');
      }

      var data = "";
      if($(this).val()){//only fetch rates if user has chosen a foreign currency
        $.ajax({
          type:"GET",
          url : "<?php echo base_url(); ?>exchange/API/rateByID",
          data : "currency_id="+$(this).children(":selected").attr("id"),
          success : function(response) {
              //get the exchange rate from the api response
              $.each(response[0], function(key, value){
                  rate = value;
                  $('input[name=exchangeRate]').val(rate);

              });

              if($('#baseCurrencyAmount').val()){//if user enters the base currency amt
                forex_amt = parseFloat($('#baseCurrencyAmount').val() * rate).toFixed(2);
                $('#foreignCurrencyAmt').val(forex_amt);
              }
              if($('#foreignCurrencyAmt').val()){
                base_currency_amt = parseFloat(($('#foreignCurrencyAmt').val() / rate)).toFixed(2);
                $('#baseCurrencyAmount').val(base_currency_amt); 
              }

          },
          error: function() {
              alert('Error occured');
          }
      });
      }
  });

  $('#resetBtn').click(function(){
  })

  //toggle enable base currency and forex inputs 
  $(function() {
      $('#baseCurrencyAmount').focus(function(){
        $('#foreignCurrencyAmt').prop('disabled', 'disabled');
        $('#foreignCurrencyAmt').val('');
      }).blur(function(){
       $('#foreignCurrencyAmt').prop('disabled', '');
       $('#foreignCurrencyAmt').val('');
      });$('#foreignCurrencyAmt')
      
      $('#foreignCurrencyAmt').focus(function(){
        $('#baseCurrencyAmount').prop('disabled', 'disabled');
        $('#baseCurrencyAmount').val('');
      }).blur(function(){
       $('#baseCurrencyAmount').prop('disabled', '');
       $('#baseCurrencyAmount').val('');
      });
  });

  // make order code
  $(function(){
       $("#forexForm").submit(function(){
         dataString = $("#forexForm").serialize();
         $.ajax({
           type: "POST",
           url: "<?php echo base_url(); ?>exchange/API/addOrder",
           data: dataString,
 
           success: function(data){
               $('#forexForm').remove();
               $('#successMsg').html('Your Order Has been successfully placed!');
               $('#msg').show();

               //redirect to the order confirmation page
               window.setTimeout(function() {
                window.location.href = '<?php echo site_url(); ?>exchange/Orders';
            }, 5000);
               
           }
 
         });
 
         return false;  //stop the actual form post !important!
 
      });
   });

  // restrict input to numbers and decimals only
  function NumAndTwoDecimals(e , field) {
      var val = field.value;
      var re = /^([0-9]+[\.]?[0-9]?[0-9]?|[0-9]+)$/g;
      var re1 = /^([0-9]+[\.]?[0-9]?[0-9]?|[0-9]+)/g;
      if (re.test(val)) {
          //do something here

      } else {
          val = re1.exec(val);
          if (val) {
              field.value = val[0];
          } else {
              field.value = "";
          }
      }
  }

</script>