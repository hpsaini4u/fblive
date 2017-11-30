   <script>
        if(!location.hash.replace('#', '').length) {
            location.href = location.href.split('#')[0] + '#' + (Math.random() * 100).toString().replace('.', '');
            location.reload();
        }
    </script>
<link rel="stylesheet" href="https://cdn.webrtc-experiment.com/style.css">
    <style>
        video {
            width: 45%;
        }
        button {
            padding: 4px 12px;
            margin: 5px 10px;
        }

#openRoom {
    background: #04cac7;
    border: 1px solid #ededed;
}
#joinRoom {
	  background: #f08169;
    border: 1px solid #ededed;
}
#shareScreen:active {
    background: #f08169;
    border: 1px solid #ededed;
    color: #fff;
}
#recordAudioVideo:active {
    background: #f08169;
    border: 1px solid #ededed;
    color: #fff;
}
    </style>
<!--style>
    audio,
    video {
        -moz-transition: all 1s ease;
        -ms-transition: all 1s ease;
        -o-transition: all 1s ease;
        -webkit-transition: all 1s ease;
        transition: all 1s ease;
        vertical-align: top;
    }
    
    input {
        border: 1px solid #d9d9d9;
        border-radius: 1px;
        font-size: 2em;
        margin: .2em;
        width: 30%;
    }
    
    .setup {
        border-bottom-left-radius: 0;
        border-top-left-radius: 0;
        font-size:24px;
        position:relative;
		background:#04cac7;
        border: 1px solid #c1c1c1; 
		color:#fff;
		padding:5px 10px;
    }
    
   
	.experimnt-sec {
    text-align: center;
    margin-bottom: 15px;
}
.brand-share-link {
    display: inline-block;
	padding:0 20px;
}

#conference-name {
    display: none;
}
video {
    margin-right: 10px;
}
.join {
    background: #f98169;
    border: 1px solid #ededed;
    padding: 5px 40px;
    color: #fff;
    font-size: 24px;
    margin-top: 0px;
}
.video-table {
    display: inline-block;
    vertical-align: bottom;
}
    </style--> 

	<?php 
		// echo $ss = $this->uri->uri_string();
		 
    ?>
    <!--div id="videos-box-container">
	   <section class="web-cam">
      <div class="container-fluid">
	    <div class="row">
		  <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
		     <div class="invite-section">
			   <div class="web-cam-sec">
			    <h5>Broadcast Section</h5>
				<div class="row">
				
				<div class="commun-section">
			   
			      <div class="col-md-12">
				   <div class="invite-guest-section">
			       <h6>invite your guest</h6>
				   <p>With this link, your guest can join the broadcast and you will see their video here:</p>
				   
				      <section class="experiment">
						<section class="experimnt-sec">
							<span class="brand-share-link">
								Private ??
								<a href="" target="_blank" title="Open this link in new tab. Then your room will be private!">
									<code>
										<strong id="unique-token">#123456789</strong>
									</code>
								</a>
							</span>

							<input type="text" id="conference-name">
							
							<button id="setup-new-conference" class="setup">Setup New Conference</button>
							<div class="video-table">
							<table style="width:80%;" id="rooms-list"></table>
							</div>
						</section>

			 <div id="videos-container"></div>

            
        </section>
                  
				  </div> 
			    </div>
				 
			</div>	
				</div>
			
				</div>
				
			   </div>
		
			 </div>
		  </div>
		  
		  
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
		  </div>
		
		</div>
	  </div--><!--end-container-->
  
<div id="videos-box-container">
	   <section class="web-cam">
      <div class="container-fluid">
	    <div class="row">  
  <section class="experiment">
            <div style="text-align:center;">
                <button id="openRoom">Connect Camera</button>
                <button id="joinRoom">Join Room</button>

                

                <button id="shareScreen" disabled>Share Screen</button>

                
                <button id="recordAudioVideo" disabled>Record Audio+Video+Screen</button>
				
				<button id="share-btn">Share This Link</button>

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
   </section>
	</div>
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

  <script src="https://cdn.webrtc-experiment.com/commits.js" async></script>