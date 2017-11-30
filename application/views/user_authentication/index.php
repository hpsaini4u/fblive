<?php
if(!empty($authUrl)) {
	header("location:".$authUrl);
   // echo '<a href="'.$authUrl.'"><img src="'.base_url().'assets/images/flogin.png" alt=""/></a>';
}else{
	
?>

<script>
window.opener.location.href = "<?php echo base_url(); ?>user_authentication";
window.close();
</script>

 <div id="main-area">
	     <div class="princing">
		    <div class="title">
		     User Profile
		   </div>
		    
          </div>	
<style>
.stepwizard{display:none;}

.btn-btn-create-broad a {
    background: #f08169;
    padding: 5px 10px;
    text-decoration: none;
    color: #fff;
    font-size: 20px;
}
.btn-btn-create-broad
{
	text-align:center;
}
.brand-profile {
    border: 1px solid #04cac7;
    padding: 20px 10px;
    background: #fff;
	margin-bottom:10px;
}
.my-broad {
    float: right;
    color: #f08169;
    font-weight: bold;
}
.btn-btn-create-broad {
    text-align: center;
    margin-top: 30px;
}
.live-info1 {
    background: #f7fbfd;
    text-align: center;
    padding: 10px 0;
    font-size: 18px;
    font-weight: bold;
	margin-bottom:10px;
}
.live-info2 {
    background: #f7fbfd;
    text-align: center;
    padding: 10px 0;
    font-size: 18px;
    font-weight: bold;
	margin-bottom:10px;
}
.live-info3 {
    background: #f7fbfd;
    text-align: center;
    padding: 10px 0;
    font-size: 18px;
    font-weight: bold;
}
.live-info4 {
    background: #f7fbfd;
    text-align: center;
    padding: 10px 0;
    font-size: 18px;
    font-weight: bold;
}
.change-settings {
    float: right;
    margin-top: -35px;
}
.current-plan {
    border-bottom: 5px solid #ededed;
}
</style>
   <div class="table-section">
     <div class="table-top">
	   Welcome <b><?php echo $userData['first_name']; ?>
	 </div>
	
		 <!-- BEGIN EXAMPLE TABLE PORTLET-->
								
                                <div class="portlet light bordered">
                        		
								<div class="portlet-body">
									<table class="table table-striped table-bordered table-hover order-column" id="sample_1">
									  
										<tbody>
										 <tr>
										 <td>Profle Photo</td>
										 <td><img src="<?php echo $userData['picture_url']; ?>" alt="" width="100" height="80"/></td>
										 </tr>
										 
										 <tr>
										 <td>Facebook ID : </td>
										 <td><?php echo $userData['oauth_uid']; ?>
                                         </td>
										 </tr>
										 
										 <tr>
										 <td>Name</td>
										 <td><?php echo $userData['first_name'].' '.$userData['last_name']; ?>
                                         </td>
										 </tr>
										 
										  <tr>
										 <td>Email</td>
										 <td><?php echo $userData['email']; ?>
                                         </td>
										 </tr>
										 
										  <tr>
										 <td>Gender</td>
										 <td><?php echo $userData['email']; ?>
                                         </td>
										 </tr>

										<tr>
										 <td>Locale</td>
										 <td><?php echo $userData['locale']; ?>
                                         </td>
										 </tr>

										<tr>
										 <td>Click to Visit Facebook Page</td>
										 <td><a href="<?php echo $userData['profile_url']; ?>" target="_blank">Click Here</a>
                                         </td>
										 </tr>
										
										<tr>
										 <td>Logout</td>
										 <td><a href="<?php echo $logoutUrl; ?>">Logout</a>
                                         </td>
										 </tr>										 
										 
										</tbody>
									  
									  </table>
									</div>  
	
	 </div>
    </div>   <!--table-section-->
	
<?php
//print_r($userData); 
//$created_date = $userData['created'];

//echo $today = date("Y-m-d H:i:s"); 
?>
	<div class="container">
		<div class="row">
		<div class="col-md-12">
		   <div class="user-profile-section">
		    
				 <div class="brand-profile">
				  
					  <p><img src="" alt="" class="user-image"><span class="msgs-text">Hello <?php echo $userData['first_name']; ?></span></p>
					  <hr>
					  <div class="my-broadcast">
					   <h5>User since <?php //echo $userData['created']; ?> September 14, 2017 <a href="#" ><span class="my-broad">My Broadcast</span></a></h5>
					  </div>
					 <div class="btn-btn-create-broad">
				   <!--a href="<?php //echo base_url(); ?>broadcast">Create New Broadcast</a-->
				   <a href="#" data-toggle="modal" data-target="#myModal">Create New Broadcast</a>
				 </div> 
				 
				 </div>
				 
					
				 <div class="brand-profile">
				 <div class="row">
				  <div class="col-md-6">
				   <div class="live-info1">
				     <p>0</p>
					 <p>Number of live broadcasts</p>
				  </div>
				  </div>
				  
				 <div class="col-md-6">
				 <div class=" live-info2">
				   <p>2</p>
				   <p>Max number of concurrent live viewers</p>
				  </div>
				 </div>
				 
				  <div class="col-md-6">
				  <div class="live-info3">
				    <p>0</p>
					<p>Total comments received</p>
				  </div>
				  </div>
				  
				   <div class="col-md-6">
				   <div class="live-info4">
				    <p>0</p>
					<p>Total likes and reactions received</p>
				  </div>
				  </div>
				 </div>
				 
		   </div>
		   
		   <div class="brand-profile">
				  
					  <div class="current-plan">
					     <p>Current Plan: <strong>Free</strong></p>
						 <div class="change-settings">
						   <a href="#">Change</a>
						 </div>
						 
						 <p>Plan use: 0 out of the weekly limit of 2</p>
						
                       </div>					  
				 
				 </div>
				 				 
		   </div><!--row-->
		   
		   
		   
		   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
	  
      <div class="modal-content">
		 
         <div class="modal-body">


<div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
            <p>Step 1</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
            <p>Step 2</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
            <p>Step 3</p>
        </div>
    </div>
</div>
<style>
.container-modal {
  position: relative;
}
.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 100%;
  opacity: 0;
  transition: .5s ease;
  background-color: #ededed;
}

.container-modal:hover .overlay {
  opacity: 1;
}
</style>
		 <div class="broadcast-modal setup-content" id="step-1"> 
		   <div class="broad-modes">
		   <h5>Host a Broadcast</h5>
		   <p>Choose broadcasting mode:</p>
		  </div>
		 
		   <div class="three-body-btn">
		    <div class="solo nextBtn">
			   <h5>Solo</h5>
				<a href="<?php echo base_url(); ?>user_authentication/solo">
				<div class="container-modal">
				<img src="<?php echo base_url(); ?>assets/front/images/solo.png">
				
					<div class="overlay">
						<div class="text"><p>Create an engaging solo Q&A live broadcast in 2 simple clicks!<br>
					   This format will be able to show Facebook comments on the screen, along with our awesome features</p></div>
					</div>   
				</div>   
				   
				</a>
				   
				 
			</div>
			
			 <div class="interview">
			 <h5>Interview</h5>
			<a href="<?php echo base_url(); ?>broadcast">
			<div class="container-modal">
				<img src="<?php echo base_url(); ?>assets/front/images/inter.png">
					<div class="overlay">
						<div class="text"><p> Create an interview with fans, guests or friends in 2 simple clicks!
              A guest will be able to join from their computer or mobile phone</p></div>
					</div>
			</div>
			</a>
			</div>
			
			 <div class="talk-show">
			  <h5>Talk-Show</h5>
			  <a href="<?php echo base_url(); ?>groupcast">
				<div class="container-modal">
				<img src="<?php echo base_url(); ?>assets/front/images/inter.png">
					<div class="overlay">
						<div class="text"><p>Create a multi-person show with your fans, guests, or friends in just 2 clicks! It’s fast & simple! Up to three people can be on the screen, and up to ten guests can join into a Lobby</p></div>
					</div>
				</div>
			  </a>
			  
			</div>
	       </div>
		   
		   <div class="footer-text">
		   <p>Select a mode above to continue</p>
		  </div>
		  </div>
		 
		  
		   
		<!--div class="brand-body-text setup-content" id="step-2">
		<div id="message"></div>
		<form action="javascript:schedule_mail();" id="scheduleMailForm" method="post">
			 <div class="top-head">
		   <div class="back-arrow">
		  <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
		  </div>
		  <div class="host-broadcast">
           Host a Broadcast
		   </div>
		  
			<p>Broadcast an Interview through Facebook Live:</p>
		  </div>
		   
		    <div class="timeline-options">
				<select class="timeline" name="share_type" >
					 <option value="timeline">On your own timeline</option>
					 <option value="page">On a page you manage</option>
					 <option value="group">On a group you manage</option>
					 <option value="event">On an event</option>
					 <option value="testing">Testing Only - Do not post</option>
				</select>
			</div>
				 
			<div class="optional-text">
				<input type="text" placeholder="Text to share with the broadcast (optional)" name="message" class="optional" required >
			</div>
			
            <div class="email-area">
				<input type="text" placeholder="Your Email" name="broadcast_email" class="email-text" required>
				
			</div>
				 
		    <div class="footer-brand-btns">
				<div class="broadcast-btn">
					<div class="add-brand-btn">
					  
					</div>
		   
					<div class="create-broad-btn">
					<button type="submit" class="btn green">Create Broadcast</button>
						
					</div> 
		        </div>
			</div>
		</form>
		
		</div-->

<script>
/*function schedule_mail()
{
	var form_data = new FormData($("#scheduleMailForm")[0]);
	console.log(form_data);
	$.ajax({
		url: "<?php echo base_url(); ?>welcome/schedule_mail", 
		type: "post", 
		data: form_data,     
		cache: false,
		contentType: false,
		processData: false,
		success: function (htmlStr)
		{
			//alert(htmlStr);
			$('#message').html('');
			if(htmlStr == 'false')
			{
				$('#message').html('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Danger!</strong> broadcast not schedule.</div>');

				$('html').animate({scrollTop:0}, 'slow');//IE, FF
			    $('body').animate({scrollTop:0}, 'slow');//chrome, don't know if Safari works
			}
			else
			{
				$('#message').html('<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> broadcast schedule successfully.</div>');

				$('html').animate({scrollTop:0}, 'slow');//IE, FF
			    $('body').animate({scrollTop:0}, 'slow');//chrome, don't know if Safari works

				
			}
			$('#scheduleMailForm').trigger('reset');
		}
	});		
}*/
</script>	

		<!--div class="dasdfsdf setup-content" id="step-3">
        
               <div class="containerop">
<div id="innermodal">
<div class="top-head">
		   <div class="back-arrow">
		  <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
		  </div>
		  <div class="host-broadcast">
           Host a Broadcast
		   </div>
		 </div> 
<h4>Personalize your branding</h4>

<div class="col-md-6 navbor">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Logo</a></li>
    <li><a data-toggle="tab" href="#menu1">Brand colors</a></li>
    <li><a data-toggle="tab" href="#menu2">Designed Frames</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <p>Choose one for the broadcast:</p>
	  <p>Optimal format:150X150 transparent PNG</p>
    </div>
    <div id="menu1" class="tab-pane fade">
  <div class="col-md-6">
      <p>Background color</p>
	  </div>
	    <div class="col-md-6">
      <input class="form-control input-lg" id="inputlg" placeholder="#000" type="text">
	  </div>
	  <div class="col-md-6">
      <p>Background color</p>
	  </div>
	    <div class="col-md-6">
      <input class="form-control input-lg" id="inputlg" placeholder="#000" type="text">
	  </div>
    </div>
    <div id="menu2" class="tab-pane fade">
      <p>Optimal format designed transparent PNG</p>
    </div>
  </div>
  </div>
  <div class="col-md-6">
  <iframe width="560" height="315" src="https://www.youtube.com/embed/ZnuwB35GYMY" frameborder="0" allowfullscreen></iframe>
  </div>
  <div class="row">
  <button type="button" class="btnmodalred">Save branding</button>
  </div>
</div>
</div>
		
            
    </div-->
		

		</div>  
      </div>
	
  
  </div><!--mymodal-->
  </div><!--dialog-->
		   
		   
	 </div><!--container-->
	
	  </div><!--main-area-->

<?php } ?>