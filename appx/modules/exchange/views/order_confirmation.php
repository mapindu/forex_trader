<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// echo "<pre>", print_r($last_order_details); exit;
?>
<!--page content-->
<div class="global indent">
    <div class="formBox">
        <div class="container">
        <div class="row"> 
            <div class="col-lg-1 col-md-1 col-sm-1">&nbsp;</div>
            <div class="col-lg-10 col-md-10 col-sm-10">
                <h3 class="indent">Order Confirmation<br><span></span></h3>
                 <h4 id="successMsg">Order Details</h4>
                  <table class="table" id="orderSummary">
                    <thead>
                      <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Foreign Currency</th>
                        <th scope="col">Amt Purchased</th>
                        <th scope="col">Exchange Rate</th>
                        <th scope="col">Surcharge %</th>
                        <th scope="col">Surcharge Amt</th>
                        <th scope="col">ZAR Amt</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td id="oDate"><?php echo $last_order_details->or_date; ?></td>
                        <td id="oFrx"><?php echo $last_order_details->fc_name; ?></td>
                        <td id="oAmtFrx"><?php echo number_format($last_order_details->or_foreign_currency,2); ?></td>
                        <td id="oRate"><?php echo $last_order_details->er_rate; ?></td>
                        <td id="oSurPerc"><?php echo $last_order_details->or_surcharge_percentage."%"; ?></td>
                        <td id="oSur"><?php echo 'R'. number_format($last_order_details->or_surcharge_amount,2); ?></td>
                        <td id="oZAR"><?php echo 'R'. number_format($last_order_details->or_domestic_currency,2); ?></td>
                      </tr>
                      <tr>
                        <td><a href="<?php echo base_url(); ?>exchange" class="btn-default btn1">Done</a></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2"> </div>
        </div>
        </div>
    </div>
