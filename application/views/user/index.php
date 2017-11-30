<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
.stepwizard{display:none;}
</style>	
	
<div class="container">
  <!-- Trigger the modal with a button -->
 
  <!-- Modal -->
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

		 <div class="broadcast-modal setup-content" id="step-1"> 
		   <div class="broad-modes">
		   <h5>Host a Broadcast</h5>
		   <p>Choose broadcasting mode:</p>
		  </div>
		 
		   <div class="three-body-btn">
		    <div class="solo nextBtn">
			   <h5>Solo</h5>
				<img src="<?php echo base_url(); ?>assets/front/images/solo.png">
				<p>Create an engaging solo Q&A live broadcast in 2 simple clicks!<br>
                   This format will be able to show Facebook comments on the screen, along with our awesome features</p>
			</div>
			
			 <div class="interview nextBtn">
			 <h5>Interview</h5>
			 <a href="<?php echo base_url(); ?>broadcast"><img src="<?php echo base_url(); ?>assets/front/images/inter.png">
			<p> Create an interview with fans, guests or friends in 2 simple clicks!
              A guest will be able to join from their computer or mobile phone</p></a>
			</div>
			
			 <div class="talk-show nextBtn">
			  <h5>Talk-Show</h5>
			  <a href="<?php echo base_url(); ?>groupcast"><img src="<?php echo base_url(); ?>assets/front/images/inter.png">
			  <p>Create a multi-person show with your fans, guests, or friends in just 2 clicks! It’s fast & simple! Up to three people can be on the screen, and up to ten guests can join into a Lobby</p></a>
			  
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
				<input type="text" placeholder="Text to share with the broadcast (optional)" name="message" class="optional">
			</div>
			<div class="fb-live">
				<h5> <span class="checked"> <input type="checkbox"></span>&nbsp; &nbsp;Create a scheduled Facebook Live broadcast</h5>
			</div>
				
            <div class="email-area">
				<input type="text" placeholder="Your Email" name="broadcast_email" class="email-text" >
				<p> Receive broadcast details on Messenger</p>
			</div>
				 
		    <div class="footer-brand-btns">
				<div class="broadcast-btn">
					<div class="add-brand-btn">
					  <a class="nextBtn" href="#">Add Your Brand</a>
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
	<!--Banner-section-->
		<section id="home-section">
				<div class="banner-container">
					<div class="container">
						<div class="banner-content">
							<h3>Visibility, Leads &amp; sales For Your Business</h3>
							<p>We are a Digital Marketing Agency focused on strong, measurable ROI.</p>
							<?php //print_r($_SESSION['userData']); 
							if(isset($_SESSION['userData'])){ ?>
							<div class="button-one text-center"><a href="#" data-toggle="modal" data-target="#myModal">Get Started</a></div>
							<?php } else{ ?>
							<div class="button-one text-center"><a href="<?php echo base_url(); ?>packages" >Get Started</a></div> 
							<?php } ?>
						</div>
					</div>
				</div>
		</section>
		<!--End Banner section-->

		<!--Money making-section-->
		<section class="imp-section section-green" id="features-web">
			<div class="container">
				<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
				 <div class="feature-area">
				  <h2>FEATURES</h2>
				 </div>
					<div class="col-md-6 col-sm-6">
					 <div class="features-section">
					  <div class="col-md-3">
					    <div class="icon-img">
					    <img src="<?php echo base_url(); ?>assets/front/images/q-a-img.png" alt=""> 
					   </div>
					  </div>
					 <div class="col-md-9">
			           <div class="text-area">
					    <h5>Questions & Answers</h5>
						<p>Show audience questions on the broadcast. Your viewers will know what question you are answering, and will love to participate!</p>
					   </div>
					</div>
				</div>	
				
				
				
				<div class="features-section">
					  <div class="col-md-3">
					    <div class="icon-img">
					    <img src="<?php echo base_url(); ?>assets/front/images/broadcast.png" alt=""> 
					   </div>
					  </div>
					 <div class="col-md-9">
			           <div class="text-area">
					    <h5>Broadcast from Anywhere</h5>
						<p>Bring a remote guest into your broadcast. You don't need to be in the same room to have an interview!</p>
					   </div>
					</div>
				</div>	
				
				<div class="features-section">
					  <div class="col-md-3">
					    <div class="icon-img">
					    <img src="<?php echo base_url(); ?>assets/front/images/updates.png" alt=""> 
					   </div>
					  </div>
					 <div class="col-md-9">
			           <div class="text-area">
					    <h5>On Screen Updates</h5>
						<p>A live broadcast is more than just video. Use text and graphics to give your viewers the most complete picture.</p>
					   </div>
					</div>
				</div>	
				</div>	
				
					<div class="col-md-6 col-sm-6">
					<div class="features-section">
					  <div class="col-md-3">
					    <div class="icon-img">
					    <img src="<?php echo base_url(); ?>assets/front/images/face-face.png" alt=""> 
					   </div>
					  </div>
					 <div class="col-md-9">
			           <div class="text-area">
					    <h5>Face to Face</h5>
						<p>Host a live interview with a remote guest, and broadcast your face to face talk to the world. Use split screen, picture in picture, or let your guest have the whole frame!</p>
					   </div>
					</div>
				</div>	
				
				<div class="features-section">
					  <div class="col-md-3">
					    <div class="icon-img">
					    <img src="<?php echo base_url(); ?>assets/front/images/mobile-support.png" alt=""> 
					   </div>
					  </div>
					 <div class="col-md-9">
			           <div class="text-area">
					    <h5>Mobile Support</h5>
						<p>BeLive works on Desktop and on Mobile. Anyone with a smartphone can be part of your show!</p>
					   </div>
					</div>
				</div>	
				
				<div class="features-section">
					  <div class="col-md-3">
					    <div class="icon-img">
					    <img src="<?php echo base_url(); ?>assets/front/images/collaborate.png" alt=""> 
					   </div>
					  </div>
					 <div class="col-md-9">
			           <div class="text-area">
					    <h5>Collaborate</h5>
						<p>Your whole team can contribute to the broadcast's success. Plan the show's outline together, or give a hand as a remote operator.</p> 
					   </div>
					</div>
				</div>	
					</div>
				</div>
			</div>
		</section>
		<!--End Money making-section-->
		
		<!--case-studies section-->
		<section class="case-study-section" id="case-study-area">
			<div class="container">
				<div class="row">
				<div class="col-md-12">
					<div class="title">
						<h4>Case Studies</h4>
					</div>
						<div class="col-md-6 video-area">
						  <iframe width="560" height="315" src="https://www.youtube.com/embed/mipkQOH12kE" frameborder="0" allowfullscreen></iframe>
						</div>
						
						<div class="col-md-6 study-text">
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
						</div>
					
			    </div>
			 </div>
		   </div>	 
		</section>
		<style>
		
		</style>