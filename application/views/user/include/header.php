<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Live Stream</title>
		
	<script src="<?php echo base_url(); ?>assets/front/js/jquery-2.2.2.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/front/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Lato|Montserrat" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/index.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/font-awesome-4.7.0/css/font-awesome.min.css">
	
	<style>
	.host-modal {
    width:110%;
	}
	.broad-modes h5
	{
	font-size:35px;
	font-weight:600;
	color:#04cac7;
	text-align:center;
	}
	.broad-modes p {
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    line-height: 37px;
	margin-top:10px;	
	}
	.footer-text p
	{
	text-align:center;
	font-size:14px;
	}
	.modal-footer {
    border-top:0px;
    }
 
 .solo {
    background: #ededed;
    width: 32%;
    float: left;
    margin-right: 6px;
    padding: 10px;
    height: 255px;
}
   .solo h5{
   color:#04cac7;
   font-size:20px;
   text-align:center;
   padding:10px 0;
   }
   .interview
   {
   background: #ededed;
    width: 32%;
    float: left;
    margin-right: 6px;
    padding: 10px;
    height: 255px;
   }
   .interview h5{
   color:#04cac7;
   font-size:20px;
   text-align:center;
   padding:10px 0;
   }
   .talk-show
   {
  background: #ededed;
    width: 32%;
    float: left;
    margin-right: 6px;
    padding: 10px;
    height: 255px;
   }
   .talk-show h5{
   color:#04cac7;
   font-size:20px;
   text-align:center;
   padding:10px 0;
   }
   .modal-header {
    border-bottom:0px;
}
.solo img
{
width: 100%;
}
.solo p {
    font-size: 12px;
    text-align: center;
    padding: 49px 0;
    font-weight: bold;
}
.solo img:hover
{
display:none;
}
.interview img
{
width: 100%;
}
.interview p {
    font-size: 12px;
    text-align: center;
    padding: 49px 0;
    font-weight: bold;
}
.interview img:hover
{
display:none;
}
.talk-show img
{
width: 100%;
}
.talk-show p {
    font-size: 12px;
    text-align: center;
    padding: 49px 0;
    font-weight: bold;
}
.talk-show img:hover
{
display:none;
}






	.host-broadcast, .back-arrow
	{
	display:inline-block;
	font-size:35px;
	font-weight:600;
	color:#04cac7;
	}
	.host-broadcast {
    padding-left: 22px;
     }
	 .top-head{
	 text-align:center;
	 }
    .modal-header {
      border-bottom:0;
	  padding-top:30px;
	  }
	.top-head h5
	{
	font-size:35px;
	font-weight:600;
	color:#04cac7;
	text-align:center;
	}

	.top-head p {
    text-align: center;
    line-height: 45px;
    font-size: 14px;
    margin-right: -52px;
}
    .broadcast-btn
	{
	  display:inline-block;
	}
	.add-brand-btn, .create-broad-btn
	{
    display: inline-block;
      }
	  .add-brand-btn a
	  {
	  border:#04cac7 1px solid;
	  padding:10px 50px;
	  border-radius:15px;
	  }
	  .create-broad-btn a
	  {
	  padding:10px 50px;
	  border-radius:15px;
	  background:#04cac7;
	  color:#fff;
	  }
	 .timeline {
        padding: 10px;
        font-size: 15px;
        width: 70%;
       }
	   .optional-text
	   {
        padding:20px 0;
       }
	   .optional {
         padding: 10px;
         width: 70%;
         }
		 .email-area
		 {
		 padding:20px 0;
		 }
		 .email-text {
         width: 70%;
         padding: 10px;
         }
		 .email-area p
		 {
		 padding-top:10px;
		 }
		 .brand-body-text
		 {
		 text-align:center;
		 }
		 .brand-body-text p{
		 font-weight:bold;
		 margin-right:13px;
		 }
		.checked {
          margin-left: -20px;
        }
	  .footer-brand-btns
	  {
	  border-top:0;
	  text-align:center;
	  padding-bottom:40px;
	  }
	.create-add-host
	{
	width:89%;
	}
	

div#innermodal {
   
    margin: 0 auto;
	text-align:center;
	}
	
	#innermodal .tab-content {
    text-align: left;
    padding-top: 20px;
}
.nav > li > a
{
font-size:9px;
}
.btnmodalred{
    background-color: #04cac7;
    color: #fff;
    font-size: 18px !important;
	border-radius:15px;
}
.navbor{
    border: 1px solid #eee;}
	
	 
    
#innermodal h3 {
    color: #04cac7;
    font-weight: 500;
	font-size:35px;
	}
	#innermodal h4 {
    font-size: 19px;
    color: #333333;
    margin-top: 0px;
	margin-bottom:38px;
	}
   
	  iframe {
    width: 100%;
	height:auto;
}
#innermodal .input-lg {
    height: 37px !important;
    margin-bottom: 10px;
}

.modal-content {
    padding:0;
	width:100%;
	border-radius:10px;
}
.fb-modal
{
	padding:80px 10px;
}
	
	.fb-link img{
	 margin-left: 116px;
	 padding-top:10px;
	}	
	.modal-content h4{
	font-size:24px;
	font-weight:600;
	text-align:center;
	}
	.profile-settings {
    float: right !important;
    width: 30px;
    height: 30px;
}
.profile-settings img {
    width: 100%;
    margin-top: 22px;
    margin-left: 20px;
}
.basic-form1 {
    background-color: #dddddd;
    right: 20px;
    padding: 15px;
    position: absolute;
    top: 55;
    width: 400px;
    background: #f7fbfd;
    border: 2px solid #ededed;
    border-radius: 10px;
}
.form-horizontal {
    padding: 4px 10px;
}
.user-name {
    padding: 10px;
}
.emil-id-link {
    padding: 10px;
}
.profile-btns {
    text-align: center;
    padding-top: 23px;
}
.brand-profile-btns {
    padding: 5px 10px;
    color: #000;
    font-weight: bold;
    font-size: 20px;
	border:2px solid #04cac7;
}
.brand-logout-btns {
    padding: 5px 10px;
    font-size: 20px;
    font-weight: bold;
    color:#000;
	border:2px solid #04cac7;
}

.contact-user-area {
    background-color: #e9f3fc;
    position: absolute;
    top: 80px;
    width: 400px;
    right: 107px;
}
.contact-btn-area {
    width: 100%;
    padding: 10px 5px;
    margin-bottom: 5px;	
	}
	.center-area {
    padding: 10px;
}
.contact-head {
    background: #04cac7;
    padding: 10px;
    color: #fff;
	}
	.contact-head h1 {
    margin: 0px;
	text-align: center;
}
.your-msg {
    width: 100%;
    padding: 10px;
}
.snd-contact-btn a {
    text-align: center;
    width: 1000%;
    background: #f08169;
    color: #fff;
    padding: 5px 10px;
    font-weight: bold;
    font-size: 18px;
}
.snd-contact-btn
{
float:right;
padding: 10px;
}



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
	  <script>
  function OpenWindow() {
        window.open('<?php echo base_url(); ?>user_authentication','', 'width = 400, height = 400');
    }
	
	$(document).ready(function() {
        $('#profile-link').click(function() {
                $('.basic-form1').slideToggle("slow");
        });
    });
	$(document).ready(function() {
        $('#cont-act-us').click(function() {
                $('.contact-user-area').slideToggle("fast");
        });
    });

</script>
</head>
<body>
	<div id="container">
		<!--Header-->
		<header class="clearfix">
			<div class="menubar">
				<div class="container">
					<div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">
						<div class="navbar-brand">
							<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/front/images/s1.png" alt=""></a>
						</div>
					</div>
					<div class="col-md-9 col-sm-9 col-lg-9 col-xs-12">
						<div class="menu">
							<nav class="navbar navbar-default">
								<div class="navbar-header">
								    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
									    <span class="sr-only">Toggle navigation</span>
									    <span class="icon-bar"></span>
									    <span class="icon-bar"></span>
										<span class="icon-bar"></span>
								    </button>	
		    					</div>

		    					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<?php 
									if(isset($_SESSION['userData']))
									{	
									?>
								   <div class="profile-settings">
								    <a href="javascript:void(0);">
									<img src="<?php echo $_SESSION['userData']['picture_url']; ?>" alt=""id="profile-link"></a>
									
									<div class="basic-form1" style="display: none;">
					                         <div class="user-name">
											 <?php echo $_SESSION['userData']['first_name']." ".$_SESSION['userData']['last_name'] ; ?>
											</div>
											<div class="emil-id-link">
											<?php echo $_SESSION['userData']['email'];?>
											</div>
											<div class="profile-btns">
											  <a href="<?php echo base_url(); ?>user_authentication" class="brand-profile-btns">My Profile</a>
											  <a href="<?php echo $_SESSION['userData']['logoutUrl']; ?>" class="brand-logout-btns">Log out</a>
											</div>
                                    
									</div>
									
								   </div>
								   <ul class="nav navbar-nav menu navbar-right">
										<li><a href="#home-section">Welcome</a></li>
										<li><a href="#features-web">Features</a></li>
										<li><a href="#case-study-area">Case Studies</a></li>
										
									</ul>
									<?php }
									else
									{		
									?>
									<ul class="nav navbar-nav menu navbar-right">
										<li><a href="#home-section">Welcome</a></li>
										<li><a href="#features-web">Features</a></li>
										<li><a href="#case-study-area">Case Studies</a></li>
										<li><a href="#" id="cont-act-us">Contact Us</a>
										
										
           
                
					<div class="contact-user-area" style="display: none;">
					   <div class="contact-us">
					     <div class="contact-head">
					       <h1>Create Contact</h1>
						  </div>
						     <div class="contact-body">
							  <div class="center-area">
							   <input class="contact-btn-area" type="text" placeholder="user name">
							   <input class="contact-btn-area" type="text" placeholder="Email-Id">
							   <input class="contact-btn-area" type="text" placeholder="Country">
							   <input class="contact-btn-area" type="text" placeholder="Link to your Facebook Page">
							   <input class="contact-btn-area" type="text" placeholder="Can you share who told you about us?">
							   <textarea class="your-msg">Your Message</textarea>
							   </div>
							   
							   
							  
							 <div class="snd-contact-btn">
							    <a href="#">Send</a>
							 </div>
							 </div>
					   </div>
					</div>

		
										
										
										<li>
										<a data-toggle="modal" data-target="#myModal11">Login</a>
										</li>
									</ul>
									<?php
									}
								?>
								</div>
								
							</nav>
						</div>
							
					</div>
				</div>
			</div>
		</header>
		<!--End Header-->
<div class="modal fade" id="myModal11" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content fb-modal">
        
        <h4>To start your free trial, please</h4>
		<div class="fb-link">
		 <a href="" onclick="OpenWindow();"><img src="<?php echo base_url(); ?>assets/front/images/fb-icon.png"></a>
		</div>
        
      </div>
      
    </div>
  </div>
  

    
	
