<script>
        if(!location.hash.replace('#', '').length) {
            location.href = location.href.split('#')[0] + '#' + (Math.random() * 100).toString().replace('.', '');
            location.reload();
        }
    </script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/cast.css">

    <div id="videos-container">
	   <section class="web-cam">
      <div class="container-fluid">
	   
		 
		  <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
		    <div class="live-preview-section">
			   <h5>Live Broadcast Preview</h5>
			    <div class="who's connected">
				  
				  <div class="col-md-6">
				    <div class="guest-connected">
				       <p>Please wait you are connecting</p>
				  </div>
				  </div>
				  <div class="col-md-6">
				     <div class="guest-connected">
					 <p>Guest are connected soon</p>
					 </div>
				  </div>
				  <p style="text-align:center;">Please wait you are connecting auto, if not connected then press Join Broadcast button.</p>
				 </div>
				 
				  <section class="experiment">
            <div style="text-align:center;">
                <button id="openRoom"  >Connect Camera</button>
                <button id="joinRoom" >Join Room</button>

                <button id="shareScreen" disabled>Share Screen</button>

                
                <button id="recordAudioVideo" disabled>Record Audio+Video+Screen</button>
				
				
				<a href="#" target="_blank" ><button id="share-btn">Share This Link</button></a>

            </div>

          
            <h2 style="border:0;padding-left:10px;">Recorded Videos</h2><br>
            <div id="recorded-videos"></div>
            
            <hr>
            <h2 style="border:0;padding-left:10px;">Live Videos</h2><br>
            <div id="videos-container"></div>

            <br><br>
        </section>
			   
			</div>
		  </div><!--col-->
		
		</div><!--row-->
	  </div><!--end-container-->
    
  
  </section>
	
	</div>
  </section>

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