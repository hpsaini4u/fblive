<script>
        if(!location.hash.replace('#', '').length) {
            location.href = location.href.split('#')[0] + '#' + (Math.random() * 100).toString().replace('.', '');
            location.reload();
        }
		
		
		function get_streaming_id()
		{
		var url2 = window.location.href; 
		var words = url2.split('#');
		var word0 = words[0];
		var word1 = words[1];
		var broadcasURL = "<?php echo base_url(); ?>broadcasts#" + word1;	
		$("#broadcast_url").val(broadcasURL);
		}
				
	//alert(word0);
    </script>
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/cast.css">

    <div id="videos-container1">
	   <section class="web-cam">
      <div class="container-fluid">
	    <div class="row">
		  <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
		     <div class="invite-section">
			   <div class="web-cam-sec">
			    <h5>Broadcast Section</h5>
				<div class="row">
				<div id="message"></div>
				<div class="commun-section">
			   
			      <div class="col-md-8">
				   <div class="invite-guest-section">
			       <h6>invite your guest</h6>
				   <p>With this link, your guest can join the broadcast and you will see their video here:</p>
				   
				    <section class="experiment">
						<div style="text-align:center;">
							<button id="openRoom">Connect Camera</button>
							<button id="joinRoom" >Join Room</button>

							<button id="shareScreen" disabled>Share Screen</button>
							
							<button id="recordAudioVideo" disabled>Record Audio+Video+Screen</button>
							
							<a onclick="get_streaming_id()" ><button id="share-btn">Share This Link</button></a>

						</div>

					  
						<h2 style="border:0;padding-left:10px;">Recorded Videos</h2><br>
						<div id="recorded-videos"></div>
						
						<hr>
						<h2 style="border:0;padding-left:10px;">Live Videos</h2><br>
						<div id="videos-container"></div>

						<br><br>
					</section>
                  
				  </div> 
			    </div>
				
				
			     <div class="col-md-4">
				 <form action="javascript:schedule_mail();" id="scheduleMailForm" method="post" class="form-horizontal">
				  <div class="mail-section">
				   <div class="drop-down-timeline">
				  <select class="time-line-brand" name="share_type">
				  <option value="timeline">On your own timeline</option>
					 <option value="page">On a page you manage</option>
					 <option value="group">On a group you manage</option>
					 <option value="event">On an event</option>
					 <option value="testing">Testing Only - Do not post</option>
				  </select>
				 </div>
				  
				  <div class="email-sec">
					  <input type="text" placeholder="Enter Your Email" name="broadcast_email" id="broadcast_email" class="user-mail"> 
					</div>
					<div class="urllink-sec">
					   <input type="text" placeholder="URL Link" name="broadcast_url" id="broadcast_url" class="link-url">
				   </div>
				   
				   <div class="send-brnd-btn">
				   <button type="submit" class="btn green" id="send_br">SEND</button>
				     <!--a href="#">SEND</a-->
				   </div>
				
				     <!--div class="agenda-show">
						 <div class="agenda-btn" id="agenda-area">
						   <a href="#">Agenda</a>
						   
						   <div class="agenda-form" style="display: none;">
					<form class="form-horizontal" role="form">
					<div class="create-new-agenda">
					      <div class="top-icon-add">
						  <div class="add-icon">
						  <i class="fa fa-plus-circle" aria-hidden="true"></i>
						  </div>
						  <div class="cross-icon">
						  <i class="fa fa-times" aria-hidden="true"></i>
                            </div>
						  </div>
						  <div class="agenda-broad-create">
						   <h5>Plan ahead for your broadcast</h5>
                          <p>  Create an Agenda to keep track of conversation topics</p>
                             <p>You can use agenda item titles as On Screen Updates with a click on "Show"</p>
						  </div>
						  </div>
						  
						  <div class="create-agenda-form">
						   <div class="cross-icon">
						  <i class="fa fa-times" aria-hidden="true"></i>
                            </div>
						    <input class="agenda-titles" type="text" placeholder="Title">
							<textarea class="agenda-des">Description</textarea>
							<div class="add-agenda-btn">
							 <a href="#">add agenda item</a>
							</div>
						  </div>
                                            
                                        </form>
					</div>
						 </div>
						   <div class="hr-line">
						   </div>
						 <div class="show-btn">
						   <a href="#">show</a>
						 </div>
			         </div>
				   
				   <div class="live-comments">
				       <h5>Live Comments</h5>
					   </div>
					   <div class="show-comments">
					       <h5>Heading</h5>
						   <p>Commments from the facebook.</p>
						   <a href="#">Show</a>
					   </div-->
					 
					
			    </div>
				</form>
			
			   </div>
				
				 
			</div>	
				</div>
			
				 
				 
				</div>
				
				 
	
			   </div>
			 
			 </div>
		  </div><!--col-->
		  
		  
		  <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
		    <div class="live-preview">
			   <h5>Live Broadcast Preview</h5>
			    <div class="who's connected">
				  
				  <div class="col-md-6">
				    <div class="guest-connected">
				       <p>You are not connected</p>
				  </div>
				  </div>
				  <div class="col-md-6">
				     <div class="you-connected">
					 <p>Guest are not connected</p>
					 </div>
				  </div>
				  
				 </div>
				 
				  <div class="start-broad-btn">
				  <a id="join-room" style="cursor:pointer;display:none;">Join Broadcast</a>
				  </div>
			   <div class="preview-text">
			    <p>You will be able to start your LIVE broadcast once both Host and Guest are connected</p>
			   </div>
			   <div class="agenda-show">
					 <div class="agenda-btn">
					   <a href="#">Agenda</a>
					 </div>
					 <div class="show-btn">
					  <a href="#">Show</a>
					 </div>
			   </div>
			   
			</div>
		  </div><!--col-->
		
		</div><!--row-->
	  </div><!--end-container-->
     
  
  </section>
  <style>
  video{
	  top:620px;
	  left:110px;
	  width:45%;
  }
 .agenda-form {
    background: #ededed;
    padding: 12px 10px;
    width: 80%;
	left: -80%;
}
.add-icon {
    display: inline-block;
}
.cross-icon {
    display: inline-block;
    float: right;
}
.agenda-broad-create h5 {
    font-size: 14px;
    text-align: center;
    padding: 10px;
}
.agenda-broad-create p {
    font-weight: bold;
}
.agenda-titles {
    width: 100%;
    height: 40px;
    margin-bottom: 10px;
    font-size: 14px;
    padding-left: 10px;
	margin-top: 10px;
}
.add-agenda-btn {
    text-align: center;
    padding: 20px 0;
}
.create-agenda-form {
    padding: 0px 10px;
}
.add-agenda-btn a {
    font-weight: bold;
    padding: 10px;
}
.agenda-des {
    width: 100%;
    padding: 10px;
}
  </style>
	
	<script>
	
	
	function schedule_mail()
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

				/*window.setTimeout(function(){
        					window.location.href='<?php echo base_url().'admin/brand'; ?>';
    						}, 1500);*/
			}
			$('#scheduleMailForm').trigger('reset');
		}
	});		
}
	
	</script>

 <script src="https://cdn.webrtc-experiment.com/RTCMultiConnection.js"></script>
        <!-- for p2p streaming -->
        <script src="https://www.webrtc-experiment.com/RecordRTC.js"></script>
        <!-- for recording -->
        <script src="https://cdn.webrtc-experiment.com/socket.io.js"></script>
<script>
            // http://www.rtcmulticonnection.org/docs/constructor/
            var rmc = new RTCMultiConnection();
            // https://github.com/muaz-khan/WebRTC-Experiment/tree/master/socketio-over-nodejs
            var SIGNALING_SERVER = 'https://webrtcweb.com:9559/';
            rmc.openSignalingChannel = function(config) {
                var channel = config.channel || rmc.channel || 'default-namespace';
                var sender = Math.round(Math.random() * 9999999999) + 9999999999;
                io.connect(SIGNALING_SERVER).emit('new-channel', {
                    channel: channel,
                    sender: sender
                });
                var socket = io.connect(SIGNALING_SERVER + channel);
                socket.channel = channel;
                socket.on('connect', function() {
                    if (config.callback) config.callback(socket);
                });
                socket.send = function(message) {
                    socket.emit('message', {
                        sender: sender,
                        data: message
                    });
                };
                socket.on('message', config.onmessage);
            };
            rmc.body = document.getElementById('videos-container');
            // http://www.rtcmulticonnection.org/docs/#getExternalIceServers
            rmc.getExternalIceServers = false;
            document.getElementById('openRoom').onclick = function() {
                this.disabled = true;
                // http://www.rtcmulticonnection.org/docs/open/
                rmc.open();
            };
            document.getElementById('joinRoom').onclick = function() {
                this.disabled = true;
                // http://www.rtcmulticonnection.org/docs/connect/
                rmc.connect();
            };
            window.onbeforeunload = function() {
                // Firefox
                document.getElementById('openRoom').disabled = false;
                document.getElementById('joinRoom').disabled = false;
            };
            rmc.onMediaCaptured = function() {
                document.getElementById('openRoom').disabled = true;
                document.getElementById('joinRoom').disabled = true;
            };
            rmc.onstream = function(event) {
                rmc.body.appendChild(event.mediaElement);
                if(event.type === 'remote' && !recorders.length) {
                    document.getElementById('shareScreen').disabled = false;
                    document.getElementById('recordAudioVideo').disabled = false;
                }
            };
            document.getElementById('shareScreen').onclick = function() {
                this.disabled = true;
                // http://www.rtcmulticonnection.org/docs/addStream/
                rmc.addStream({
                    screen: true,
                    oneway: true
                });
            };
            var recorders = [];
            document.getElementById('recordAudioVideo').onclick = function() {
                var streams = rmc.streams.selectAll({
                    local: true
                });
                streams = streams.concat(rmc.streams.selectAll({
                    remote: true
                }));
                var button = this;
                if (button.innerHTML == 'Record Audio+Video+Screen') {
                    button.disabled = true;
                    streams.forEach(function(streamEvent) {
                        var recorder = RecordRTC(streamEvent.stream, {
                            type: 'video'
                        });
                        recorder.startRecording();
                        recorders.push(recorder);
                    });
                    setTimeout(function() {
                        button.innerHTML = 'Stop Recording Audio/Video';
                        button.disabled = false;
                    }, 3000);
                } else if (button.innerHTML == 'Stop Recording Audio/Video') {
                    recorders.forEach(function(recorder) {
                        recorder.stopRecording(function() {
                            appendRecordedVideo(recorder.blob);
                        });
                    });
                    recorders = [];
                    button.innerHTML = 'Record Audio+Video+Screen';
                }
            };
            var recordedVideos = document.getElementById('recorded-videos');
            function appendRecordedVideo(blob) {
                if(blob.video) {
                    blob = blob.video;
                }
                var video = document.createElement('video');
                video.controls = true;
                video.src = URL.createObjectURL(blob);
                recordedVideos.appendChild(video);
            }
        </script>
		<script>
$(document).ready(function(){
    $('#agenda-area').click(function(){
        $('.agenda-form').toggle();
    });
});
</script>

  <script src="https://cdn.webrtc-experiment.com/commits.js" async></script>