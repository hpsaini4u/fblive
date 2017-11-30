 <style>
	.modal-content {
    padding: 100px 0;
	width:75%;
	border-radius:10px;
}
	
	.fb-link img{
	 margin-left: 50px;
	 padding-top:10px;
	}	
	.modal-content h4{
	font-size:24px;
	font-weight:600;
	text-align:center;
	}
form#pay2 {
    position: relative;
}
input#paynow {
    position: absolute;
    left: -83px;
top: -13px;}
@media (max-width: 767px){  
  .fb-link img 
  {
    margin-left: 12px;
    width: 93%;
  } 
  .modal-content{
  width:100%;
  }
  .modal-content h4
  {
  font-size:18px;
  }
 }

	</style>
 <!--pricing Section-->
	  <div id="main-area">
	     <div class="princing">
		    <div class="title">
		      Pricing Packages
		   </div>
		    <div class="sub-title">
			Be gives 20 minutes broadcast, twice a week for FREE
			<br>
			Upgrade your package and get even more
			</div>
          </div>	

   <div class="table-section">
     <div class="table-top">
	   Get 14 days of FREE trial now. All of the best of BeLive is waiting for you.
	 </div>
	
		 <!-- BEGIN EXAMPLE TABLE PORTLET-->
								
                                <div class="portlet light bordered">
                        		
								<div class="portlet-body">
									<table class="table table-striped table-bordered table-hover order-column" id="sample_1">
									  <thead>
									    <tr>
										   <th>Annual Billing
										   </th>
										   <?php
										   foreach($getPlan as $rowPlan)
										   {
											   $percentage = $rowPlan['discount_percentage'];
											   $planPrice = $rowPlan['plan_price'];
											   $percentagePrice = $planPrice * $percentage / 100 ;
											   $actualPrice = $planPrice - $percentagePrice;
											  
											?>
										   <th  class="heading">
											 <p><?php echo $rowPlan['plan_name'];?></p>
											 <div class="discount-rate">
											 <!--span class="dollar">$</span>
											 <span class="rate"><?php //echo $percentagePrice;?></span-->
											 <span class="discount"><?php echo $rowPlan['discount_percentage'];?>% discount</span>
											 </div>
											 
											 <small>Billed</small>
											 <span class="dollar">$</span>
											 <span class="yearly-rate"><strike><?php echo $rowPlan['plan_price'];?></strike><span>  <?php echo $actualPrice;?></span> yearly</span>
											</th>
										   <?php } ?>
								            									   
										</tr>
										</thead>
										<tbody>
										 <tr>
										 <td>Share Photos</td>
										 <td><i class="fa fa-check" aria-hidden="true"></i>
                                         </td>
										 <td><i class="fa fa-check" aria-hidden="true"></i>
                                           </td>
										 <td><i class="fa fa-check" aria-hidden="true"></i>
                                        </td>
										 </tr>
										  <tr>
										 <td>Custom Logo</td>
										 <td><i class="fa fa-check" aria-hidden="true"></i>
                                         </td>
										 <td><i class="fa fa-check" aria-hidden="true"></i>
                                           </td>
										 <td><i class="fa fa-check" aria-hidden="true"></i>
                                        </td>
										 </tr>
										 
										  <tr>
										 <td>Branded Colors</td>
										 <td><i class="fa fa-check" aria-hidden="true"></i>
                                         </td>
										 <td><i class="fa fa-check" aria-hidden="true"></i>
                                           </td>
										 <td><i class="fa fa-check" aria-hidden="true"></i>
                                        </td>
										 </tr>
										 
										  <tr>
										 <td>Talk Show Format</td>
										 <td><i class="fa fa-check" aria-hidden="true"></i>
                                         </td>
										 <td><i class="fa fa-check" aria-hidden="true"></i>
                                           </td>
										 <td><i class="fa fa-check" aria-hidden="true"></i>
                                        </td>
										 </tr>
										 
										  <tr>
										 <td>Broadcasts per month</td>
										 <td><i class="fa fa-check" aria-hidden="true"></i>
                                         </td>
										 <td><i class="fa fa-check" aria-hidden="true"></i>
                                           </td>
										 <td><i class="fa fa-check" aria-hidden="true"></i>
                                        </td>
										 </tr>
										 
										  <tr>
										 <td>Support</td>
										 <td>
                                         </td>
										 <td><i class="fa fa-check" aria-hidden="true"></i>
                                           </td>
										 <td><i class="fa fa-check" aria-hidden="true"></i>
                                        </td>
										 </tr>
										 <tr>
										 <td>Screen Sharing</td>
										 <td>
                                         </td>
										 <td>
                                           </td>
										 <td><i class="fa fa-check" aria-hidden="true"></i>
                                        </td>
										 </tr>
										 
										 <tr>
										 <td>Custom Branded Frames</td>
										 <td>
                                         </td>
										 <td>
                                           </td>
										 <td><i class="fa fa-check" aria-hidden="true"></i>
                                        </td>
										 </tr>
										 
										 <tr>
										 <td>Early Access to New Features</td>
										 <td>
                                         </td>
										 <td>
                                           </td>
										 <td><i class="fa fa-check" aria-hidden="true"></i>
                                        </td>
										 </tr>
										 
										 <tr>
										 <td>&nbsp;</td>
										 <td>
										 <?php 
											 $paypalURL = "https://www.sandbox.paypal.com/cgi-bin/webscr";
											 $paypalID = "hardeep.humrobo-facilitator@gmail.com"; 
											
											 $percentage = $getPlan['0']['discount_percentage'];
											 $planPrice = $getPlan['0']['plan_price'];
											 $percentagePrice = $planPrice * $percentage / 100 ;
											 $actualPrice = $planPrice - $percentagePrice;
											 
											 $percentage2 = $getPlan['1']['discount_percentage'];
											 $planPrice2 = $getPlan['1']['plan_price'];
											 $percentagePrice2 = $planPrice2 * $percentage2 / 100 ;
											 $actualPrice2 = $planPrice2 - $percentagePrice2;
											   
											?>
										 <form action="<?php echo $paypalURL; ?>" id="pay" method="post">
										<!-- Identify your business so that you can collect the payments. -->
										<input type="hidden" name="business" value="<?php echo $paypalID; ?>">
										
										<!-- Specify a Buy Now button. -->
										<input type="hidden" name="cmd" value="_xclick">
										<input type="hidden" name="email" value="<?php if(isset($_SESSION['userData'])) { echo $_SESSION['userData']['email']; }?>">
										<!-- Specify details about the item that buyers will purchase. -->
										<input type="hidden" name="item_name" value="<?php echo $getPlan['0']['plan_name'];?>">
										<input type="hidden" name="item_number" value="1">
										<input type="hidden" name="amount" value="<?php echo $actualPrice;?>">
										<input type="hidden" name="currency_code" value="USD">
										
										<!-- Specify URLs -->
										<input type='hidden' name='cancel_return' value='<?php echo base_url(); ?>packages'>
										<input type='hidden' name='return' value='<?php echo base_url(); ?>packages/success'>
										<?php 
											if(isset($_SESSION['userData']))
											{	
											?>	
										  <input type="submit" class="contact-btn" id="paynow2" value="Pay Now"/>
										  <?php
											}
											else
											{	
											?>
										  <a href="" id="lite" class="contact-btn" data-toggle="modal" data-target="#myModal">Start For Free</a>
										  <?php
											} 
											?>
										<!-- Display the payment button. -->
									   </form>
										
										 </td>
										 <td>
										 <form id="pay2" action="<?php echo $paypalURL; ?>" method="post">
											<!-- Identify your business so that you can collect the payments. -->
											<input type="hidden" name="business" value="<?php echo $paypalID; ?>">
											<input type="hidden" name="email" value="<?php if(isset($_SESSION['userData'])) { echo $_SESSION['userData']['email']; }?>">
											<!-- Specify a Buy Now button. -->
											<input type="hidden" name="cmd" value="_xclick">
											
											<!-- Specify details about the item that buyers will purchase. -->
											<input type="hidden" name="item_name" value="<?php echo $getPlan['1']['plan_name'];?>">
											<input type="hidden" name="item_number" value="1">
											<input type="hidden" name="amount" value="<?php echo $actualPrice2;?>">
											<input type="hidden" name="currency_code" value="USD">
											
											<!-- Specify URLs -->
											
											<input type='hidden' name='cancel_return' value='<?php echo base_url(); ?>packages'>
											<input type='hidden' name='return' value='<?php echo base_url(); ?>packages/success'>
											
											<?php 
											if(isset($_SESSION['userData']))
											{	
											?>	
											<input type="submit" id="paynow1" class="contact-btn" value="Pay Now"/>
											<?php
											}
											else
											{	
											?>
											<a href="" id="standard" class="contact-btn" data-toggle="modal" data-target="#myModal">Start For Free</a>
											<?php
											} 
											?>
											<!-- Display the payment button. -->
										   </form>
										 </td>
										 <td>
										 <a href="mailto:exmple@live.com" class="contact-btn" >Contact Us</a>
										 </td>
										 </tr>
										 
										 
										</tbody>
									  
									  </table>
									</div>  
	
	 </div>
    </div>   <!--table-section-->
	  </div><!--main-area-->
	  
	   <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        
        <h4>To start your free trial, please</h4>
		<div class="fb-link">
		 <a href="" onclick="OpenWindow();"><img src="<?php echo base_url(); ?>assets/front/images/fb-icon.png"></a>
		</div>
        
      </div>
      
    </div>
  </div>

  <script>
  function OpenWindow() {
        window.open('<?php echo base_url(); ?>user_authentication','', 'width = 400, height = 400');
    }
	
/*jQuery(document).ready(function(){
    $("#pay").hide();
    $("#pay2").hide();
    $('#standard').click(function(){
        $(this).hide();
        $('#pay2').hide();
        $("#pay").show();
        $("#lite").show();
    });
	$('#lite').click(function(){
        $(this).hide();
		 $("#pay").hide();
        $("#standard").show();
        $("#pay2").show();
    });
 
});*/
</script>