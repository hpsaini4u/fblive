<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

		<!--Footer section-->
		<footer class="footer col-md-12">
			<div class="container">
				<div class="col-md-12">
				   <div class="footer-links">
					<div class="col-md-4 col-xs-4">
				     <a href="<?php echo base_url(); ?>packages">Pricing Plans</a>
				     <a href="#">Tv Blog</a>
				     <a href="#">Frequently Asked Questions</a>
				     <a href="#">Terms & Conditions</a>
				     <a href="#">Privacy Policy</a>
					 
					
					</div>
					
				 </div>
			       <div class="social-links">		
					<div class="col-md-4 col-xs-4">
					<h5><i class="fa fa-facebook-square social-icon" aria-hidden="true"></i><span class="link-name">Facebook</span></h5>
					<h5><i class="fa fa-instagram social-icon" aria-hidden="true"></i></i><span class="link-name">Instagram</span></h5>
                   <h5><i class="fa fa-twitter-square social-icon" aria-hidden="true"></i></i><span class="link-name">Twitter</span></h5>
                   <h5><i class="fa fa-youtube-square social-icon" aria-hidden="true"></i></i><span class="link-name">You Tube</span></h5>
					</div>
				</div>	
					<div class="col-md-4 col-xs-4">
					 <div class="app-links">
					<a href="#"><img src="<?php echo base_url(); ?>assets/front/images/google-play.png"></a>
					<a href="#"><img src="<?php echo base_url(); ?>assets/front/images/app-store.png"></a>
					 <div class="message-us">
					  <h5> <a href="#"><i class="fa fa-commenting" aria-hidden="true"></i>
                      <span class="chat-area">Chat With Us</span></a></h5>
					</div>
					</div>
					</div>
					
				</div>
			</div>
		</footer>
		<!--End Footer section-->
	</div>
	
	

<script>
/*$(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});*/

</script>
	
</body>
</html>	
	