    <script>
        if(!location.hash.replace('#', '').length) {
            location.href = location.href.split('#')[0] + '#' + (Math.random() * 100).toString().replace('.', '');
            location.reload();
        }
    </script>
<style>
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
    
    p {
        padding: 1em;
    }
    
    li {
        border-bottom: 1px solid rgb(189, 189, 189);
        border-left: 1px solid rgb(189, 189, 189);
        padding: .5em;
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
    </style> 
<script src="https://cdn.webrtc-experiment.com/socket.io.js"></script>
    <script src="https://cdn.webrtc-experiment.com/RTCMultiConnection.js"></script>
	
    <div id="videos-box-container">
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
				
                <button id="setup-new-conference" class="setup" style="display:none;">Setup New Conference</button>
				<div class="video-table">
				<table style="width:80%;" id="rooms-list"></table>
				</div>
            </section>
			<!-- list of all available broadcasting rooms -->
           <div id="videos-container"></div>

            <!-- local/remote videos container -->
        </section>
                  
				  </div> 
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
	
	<script>
   
        var connection = new RTCMultiConnection();
        // https://github.com/muaz-khan/WebRTC-Experiment/tree/master/socketio-over-nodejs
        var SIGNALING_SERVER = 'https://webrtcweb.com:9559/';
        connection.openSignalingChannel = function(config) {
            var channel = config.channel || connection.channel || 'default-namespace';
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
        connection.session = {
            audio: true,
            video: true
        };
        connection.onstream = function(e) {
            e.mediaElement.width = 600;
            videosContainer.insertBefore(e.mediaElement, videosContainer.firstChild);
            rotateVideo(e.mediaElement);
            scaleVideos();
        };
        function rotateVideo(mediaElement) {
            mediaElement.style[navigator.mozGetUserMedia ? 'transform' : '-webkit-transform'] = 'rotate(0deg)';
            setTimeout(function() {
                mediaElement.style[navigator.mozGetUserMedia ? 'transform' : '-webkit-transform'] = 'rotate(360deg)';
            }, 1000);
        }
        connection.onstreamended = function(e) {
            e.mediaElement.style.opacity = 0;
            rotateVideo(e.mediaElement);
            setTimeout(function() {
                if (e.mediaElement.parentNode) {
                    e.mediaElement.parentNode.removeChild(e.mediaElement);
                }
                scaleVideos();
            }, 1000);
        };
        var sessions = {};
        connection.onNewSession = function(session) {
            if (sessions[session.sessionid]) return;
            sessions[session.sessionid] = session;
            var tr = document.createElement('tr');
            tr.innerHTML = '<td></td>' +
                '<td><button class="join">Join</button></td>';
            roomsList.insertBefore(tr, roomsList.firstChild);
            var joinRoomButton = tr.querySelector('.join');
            joinRoomButton.setAttribute('data-sessionid', session.sessionid);
            joinRoomButton.onclick = function() {
                this.disabled = true;
                var sessionid = this.getAttribute('data-sessionid');
                session = sessions[sessionid];
                if (!session) throw 'No such session exists.';
                connection.join(session);
            };
        };
        var videosContainer = document.getElementById('videos-container') || document.body;
        var roomsList = document.getElementById('rooms-list');
        document.getElementById('setup-new-conference').onclick = function() {
            this.disabled = true;
            connection.open(document.getElementById('conference-name').value || 'Anonymous');
        };
        // setup signaling to search existing sessions
        connection.connect();
        (function() {
            var uniqueToken = document.getElementById('unique-token');
            if (uniqueToken)
                if (location.hash.length > 2) uniqueToken.parentNode.parentNode.parentNode.innerHTML = '<h2 style="text-align:center;"><a href="' + location.href + '" target="_blank">Share this link</a></h2>';
                else uniqueToken.innerHTML = uniqueToken.parentNode.parentNode.href = '#' + (Math.random() * new Date().getTime()).toString(36).toUpperCase().replace(/\./g, '-');
        })();
        function scaleVideos() {
            var videos = document.querySelectorAll('video'),
                length = videos.length,
                video;
            var minus = 130;
            var windowHeight = 700;
            var windowWidth = 600;
            var windowAspectRatio = windowWidth / windowHeight;
            var videoAspectRatio = 4 / 3;
            var blockAspectRatio;
            var tempVideoWidth = 0;
            var maxVideoWidth = 0;
            for (var i = length; i > 0; i--) {
                blockAspectRatio = i * videoAspectRatio / Math.ceil(length / i);
                if (blockAspectRatio <= windowAspectRatio) {
                    tempVideoWidth = videoAspectRatio * windowHeight / Math.ceil(length / i);
                } else {
                    tempVideoWidth = windowWidth / i;
                }
                if (tempVideoWidth > maxVideoWidth)
                    maxVideoWidth = tempVideoWidth;
            }
            for (var i = 0; i < length; i++) {
                video = videos[i];
                if (video)
                    video.width = maxVideoWidth - minus;
            }
        }
        window.onresize = scaleVideos;
        </script>

  <script src="https://cdn.webrtc-experiment.com/commits.js" async></script>