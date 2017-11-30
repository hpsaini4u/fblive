<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
   <section class="banner-section">
            <img src="<?php echo base_url(); ?>assets/front/images/banner.png" alt="">
        </section>

		

		<section class="resources">
			<div class="container">
				<div class="row">
					
						<div class="features-points">
							<div class="col-md-12 col-sm-12 col-xs-12 no-pade">
								
										<div class="resource-info">
											<div class="col-md-12 col-sm-12 col-xs-12">
												<h3>Signup</h3>
												
												    <!--div class="container"-->

											<form class="well form-horizontal" action="<?php echo base_url(); ?>welcome/admin_register" method="post" id="signup_form">
												<?php 
													if($_SERVER['REMOTE_ADDR'])
													{	
														$ipaddress = $_SERVER['REMOTE_ADDR'];
													}	
												?>
												<input type="hidden" name="ip_address" value="<?php echo $ipaddress;?>" />
											<fieldset>

											<!-- Form Name -->

											<!-- Text input-->

											<div class="col-md-6 form-group">
											  <label class="col-md-4 control-label">Store Name</label>  
											  <div class="col-md-8 inputGroupContainer">
											  <div class="input-group">
											  <input name="store_name" placeholder="Store Name" class="form-control"  type="text">
												</div>
											  </div>
											</div>

											<!-- Text input-->
											<div class="col-md-6 form-group">
											  <label class="col-md-4 control-label">Private Web Address</label>  
											  <div class="col-md-8 inputGroupContainer email1">
											  <div class="input-group">
											  <input name="private_web_address" placeholder="Private Web Address " class="form-control"  type="text"><span>.caposgt.com</span>
												</div>
											  </div>
											</div>
												
												

											<div class="col-md-6 form-group">
											  <label class="col-md-4 control-label">First Name</label>  
											  <div class="col-md-8 inputGroupContainer">
											  <div class="input-group">
											  <input  name="first_name" placeholder="First Name" class="form-control"  type="text">
												</div>
											  </div>
											</div>

											<!-- Text input-->

											<div class="col-md-6 form-group">
											  <label class="col-md-4 control-label" >Last Name</label> 
												<div class="col-md-8 inputGroupContainer">
												<div class="input-group">
											  <input name="last_name" placeholder="Last Name" class="form-control"  type="text">
												</div>
											  </div>
											</div>
												
											<!-- Text input-->
											<div class="col-md-6 form-group">
											  <label class="col-md-4 control-label">E-Mail</label>  
												<div class="col-md-8 inputGroupContainer">
												<div class="input-group">
											  <input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
												</div>
											  </div>
											</div>	
												
												<div class="col-md-6 form-group">
											  <label class="col-md-4 control-label" >Password</label> 
												<div class="col-md-8 inputGroupContainer">
												<div class="input-group">
											  <input name="password" placeholder="Password" class="form-control"  type="password">
												</div>
											  </div>
											</div>

											<!-- Text input-->

											<!--div class="form-group">
											  <label class="col-md-4 control-label" >Confirm Password</label> 
												<div class="col-md-4 inputGroupContainer">
												<div class="input-group">
											  <input name="confirm_password" placeholder="Confirm Password" class="form-control"  type="password">
												</div>
											  </div>
											</div-->
												
												
											<div class="col-md-6 form-group">
											  <label class="col-md-4 control-label">City</label>  
											  <div class="col-md-8 inputGroupContainer">
											  <div class="input-group">
											  <input name="city" placeholder="City" class="form-control"  type="text">
												</div>
											  </div>
											</div>

											<!-- Text input-->

											<div class="col-md-6 form-group">
											  <label class="col-md-4 control-label">Phone</label>  
												<div class="col-md-8 inputGroupContainer">
												<div class="input-group">
											  <input name="phone" placeholder="Phone" maxlength="15" class="form-control" type="text">
												</div>
											  </div>
											</div>

												

											  <div class="col-md-6 form-group"> 
											  <label class="col-md-4 control-label">Currency</label>
												<div class="col-md-8 selectContainer">
												<div class="input-group">
													<?php //echo "<pre>";print_r($countries);exit;?>
												<select name="currency_code" class="form-control selectpicker">
												  <option value="">Select your currency</option>
												<?php
													//echo "<pre>";print_r($countriesList);exit;
													foreach($countries as $rowCountry)
													{
													?>
												  <option value="<?php echo $rowCountry['currencyCode'];?>"><?php echo $rowCountry['currencyCode'];?></option>
													<?php
													}
													?>
												</select>
											  </div>
											</div>
											</div>

											<!-- Text input-->

											<!-- Select Basic -->

											<!-- Success message -->
											<div class="alert alert-success" role="alert" id="success_message" style="display:none;">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>

											<!-- Button -->
											<div class="col-md-12 form-group">
											  <label class="col-md-4 control-label"></label>
											  <div class="col-md-4 text-center"><br>
												<button type="submit" class="btn btn-warning submit-btn" >SUBMIT <span class="glyphicon glyphicon-send"></span></button>
											  </div>
											</div>

											</fieldset>
											</form>
											<!--/div-->
												</div><!-- /.container -->
											
											</div><!--colspan -->
										
									
									
								</div>	
				
							</div>
								
						</div><!--features-points-->
				</div><!--row -->
			</div><!--container -->
		</section>