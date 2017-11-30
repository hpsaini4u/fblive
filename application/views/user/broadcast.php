   <link rel="stylesheet" href="<?= base_url(); ?>assets/broadcast/stylesheet.css">
  <script src="<?= base_url(); ?>assets/broadcast/menu.js"></script>
  
  <style>
  .main-video-section {
    background-color: #edf2f9;
	padding:50px 20px;
}
.main-video-inner {
    border: 2px solid #40cac7;
    padding: 30px 20px;
}
.invite-guest-section {
    border: 1px solid #c1c1c1;
    padding: 40px 10px;
    background: #fff;
}
input#room-id {
    height: 36px;
}
  </style>
  
  <div class="main-video-section">
  <div class="row">
  <div class="col-md-12">
  <div class="main-video-inner">
  <div class="row">
  <div class="col-md-8">
  <div class="invite-guest-section">
  <h6>invite your guest</h6>
  <p>With this link, your guest can join the broadcast and you will see their video here:</p>
  <section class="make-center experiment">
  
  <div style="text-align:center;">
    <input type="text" id="room-id" value="<?php echo md5(rand()); ?>" autocorrect=off autocapitalize=off size=20>
    <button id="open-room">Connect Camea</button>
    <button id="join-room" style="display:none;">Join Room</button>
    <button id="open-or-join-room" style="display:none;">Auto Open Or Join Room</button>
							<a onclick="get_streaming_id()" ><button id="share-btn" >Share This Link</button></a>
 <input type="text" style="display:none;" id="input-text-chat" placeholder="Enter Text Chat" disabled>
    <button id="share-file"  style="display:none;" disabled>Share File</button>
    <button id="btn-leave-room" style="display:none;" disabled>Leave /or close the room</button>
</div>
    <!--div id="room-urls" style="text-align: center;display: none;background: #F1EDED;margin: 15px -10px;border: 1px solid rgb(189, 189, 189);border-left: 0;border-right: 0;"></div-->

    <div id="chat-container">
        <div id="file-container"></div>
        <div class="chat-output"></div>
    </div>
    <div id="videos-container"></div>
  </section>
  </div><!-- invite-guest-section-->
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
					   <input type="text" placeholder="URL Link" value="" name="broadcast_url" id="broadcast_url" class="link-url">
				   </div>
				   
				   <div class="send-brnd-btn">
				   <button type="submit" class="btn green" id="send_br">SEND</button>
				   </div>

			    </div>
				</form>
			
			   </div>
</div>
</div>
</div>
</div>
</div><!--main-video-section-->
			   
			   <script src="<?= base_url(); ?>assets/broadcast/RTCMultiConnection.min.js"></script>
<script src="<?= base_url(); ?>assets/broadcast/adapter.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>

<!-- custom layout for HTML5 audio/video elements -->
<link rel="stylesheet" href="<?= base_url(); ?>assets/broadcast/getHTMLMediaElement.css">
<script src="<?= base_url(); ?>assets/broadcast/getHTMLMediaElement.js"></script>

<script src="<?= base_url(); ?>assets/broadcast/FileBufferReader.js"></script>
<script>
window.enableAdapter = true; // enable adapter.js

// ......................................................
// .......................UI Code........................
// ......................................................
document.getElementById('open-room').onclick = function() {
    disableInputButtons();
    connection.open(document.getElementById('room-id').value, function() {
        showRoomURL(connection.sessionid);

		
    });
};

document.getElementById('join-room').onclick = function() {
    disableInputButtons();
    connection.join(document.getElementById('room-id').value);
};

document.getElementById('open-or-join-room').onclick = function() {
    disableInputButtons();
    connection.openOrJoin(document.getElementById('room-id').value, function(isRoomExists, roomid) {
        if (!isRoomExists) {
            showRoomURL(roomid);
        }
    });
};

document.getElementById('btn-leave-room').onclick = function() {
    this.disabled = true;

    if (connection.isInitiator) {
        // use this method if you did NOT set "autoCloseEntireSession===true"
        // for more info: https://github.com/muaz-khan/RTCMultiConnection#closeentiresession
        connection.closeEntireSession(function() {
            document.querySelector('h1').innerHTML = 'Entire session has been closed.';
        });
    } else {
        connection.leave();
    }
};

// ......................................................
// ................FileSharing/TextChat Code.............
// ......................................................
document.getElementById('share-file').onclick = function() {
    var fileSelector = new FileSelector();
    fileSelector.selectSingleFile(function(file) {
        connection.send(file);
    });
};

document.getElementById('input-text-chat').onkeyup = function(e) {
    if (e.keyCode != 13) return;

    // removing trailing/leading whitespace
    this.value = this.value.replace(/^\s+|\s+$/g, '');
    if (!this.value.length) return;

    connection.send(this.value);
    appendDIV(this.value);
    this.value = '';
};

var chatContainer = document.querySelector('.chat-output');

function appendDIV(event) {
    var div = document.createElement('div');
    div.innerHTML = event.data || event;
    chatContainer.insertBefore(div, chatContainer.firstChild);
    div.tabIndex = 0;
    div.focus();

    document.getElementById('input-text-chat').focus();
}

// ......................................................
// ..................RTCMultiConnection Code.............
// ......................................................

var connection = new RTCMultiConnection();

// by default, socket.io server is assumed to be deployed on your own URL
connection.socketURL = 'https://rtcmulticonnection.herokuapp.com:443/';

// comment-out below line if you do not have your own socket.io server
// connection.socketURL = 'https://rtcmulticonnection.herokuapp.com:443/';

connection.socketMessageEvent = 'audio-video-file-chat-demo';

connection.enableFileSharing = true; // by default, it is "false".

connection.session = {
    audio: true,
    video: true,
    data: true
};

connection.sdpConstraints.mandatory = {
    OfferToReceiveAudio: true,
    OfferToReceiveVideo: true
};

connection.videosContainer = document.getElementById('videos-container');
connection.onstream = function(event) {
    event.mediaElement.removeAttribute('src');
    event.mediaElement.removeAttribute('srcObject');

    var video = document.createElement('video');
    video.controls = true;
    if(event.type === 'local') {
        video.muted = true;
    }
    video.srcObject = event.stream;

    var width = parseInt(connection.videosContainer.clientWidth / 2) - 20;
    var mediaElement = getHTMLMediaElement(video, {
        title: event.userid,
        buttons: ['full-screen'],
        width: width,
        showOnMouseEnter: false
    });

    connection.videosContainer.appendChild(mediaElement);

    setTimeout(function() {
        mediaElement.media.play();
    }, 5000);
var numItems = $('.media-container').length
if(numItems < 2)
{
    mediaElement.id = event.streamid;
}
};

connection.onstreamended = function(event) {
    var mediaElement = document.getElementById(event.streamid);
    if (mediaElement) {
        mediaElement.parentNode.removeChild(mediaElement);
    }
};

connection.onmessage = appendDIV;
connection.filesContainer = document.getElementById('file-container');

connection.onopen = function() {
    document.getElementById('share-file').disabled = false;
    document.getElementById('input-text-chat').disabled = false;
    document.getElementById('btn-leave-room').disabled = false;

    document.querySelector('h1').innerHTML = 'You are connected with: ' + connection.getAllParticipants().join(', ');
};

connection.onclose = function() {
    if (connection.getAllParticipants().length) {
        document.querySelector('h1').innerHTML = 'You are still connected with: ' + connection.getAllParticipants().join(', ');
    } else {
        document.querySelector('h1').innerHTML = 'Seems session has been closed or all participants left.';
    }
};

connection.onEntireSessionClosed = function(event) {
    document.getElementById('share-file').disabled = true;
    document.getElementById('input-text-chat').disabled = true;
    document.getElementById('btn-leave-room').disabled = true;

    document.getElementById('open-or-join-room').disabled = false;
    document.getElementById('open-room').disabled = false;
    document.getElementById('join-room').disabled = false;
    document.getElementById('room-id').disabled = false;

    connection.attachStreams.forEach(function(stream) {
        stream.stop();
    });

    // don't display alert for moderator
    if (connection.userid === event.userid) return;
    document.querySelector('h1').innerHTML = 'Entire session has been closed by the moderator: ' + event.userid;
};

connection.onUserIdAlreadyTaken = function(useridAlreadyTaken, yourNewUserId) {
    // seems room is already opened
    connection.join(useridAlreadyTaken);
};

function disableInputButtons() {
    document.getElementById('open-or-join-room').disabled = true;
    document.getElementById('open-room').disabled = true;
    document.getElementById('join-room').disabled = true;
    document.getElementById('room-id').disabled = true;
}

// ......................................................
// ......................Handling Room-ID................
// ......................................................

function showRoomURL(roomid) {
    var roomHashURL = '#' + roomid;
    var roomQueryStringURL = '?roomid=' + roomid;

    var html = '<h2>Unique URL for your room:</h2><br>';

    html += 'Hash URL: <a href="' + roomHashURL + '" target="_blank">' + roomHashURL + '</a>';
    html += '<br>';
    html += 'QueryString URL: <a href="' + roomQueryStringURL + '" target="_blank">' + roomQueryStringURL + '</a>';
	
    var roomURLsDiv = document.getElementById('room-urls');
    roomURLsDiv.innerHTML = html;

    roomURLsDiv.style.display = 'block';
}

(function() {
    var params = {},
        r = /([^&=]+)=?([^&]*)/g;

    function d(s) {
        return decodeURIComponent(s.replace(/\+/g, ' '));
    }
    var match, search = window.location.search;
    while (match = r.exec(search.substring(1)))
        params[d(match[1])] = d(match[2]);
    window.params = params;
})();

var roomid = '';
if (localStorage.getItem(connection.socketMessageEvent)) {
    roomid = localStorage.getItem(connection.socketMessageEvent);
} else {
    roomid = connection.token();
}
document.getElementById('room-id').value = roomid;
document.getElementById('room-id').onkeyup = function() {
    localStorage.setItem(connection.socketMessageEvent, this.value);
};

var hashString = location.hash.replace('#', '');
if (hashString.length && hashString.indexOf('comment-') == 0) {
    hashString = '';
}

var roomid = params.roomid;
if (!roomid && hashString.length) {
    roomid = hashString;
}

if (roomid && roomid.length) {
    document.getElementById('room-id').value = roomid;
    localStorage.setItem(connection.socketMessageEvent, roomid);

    // auto-join-room
    (function reCheckRoomPresence() {
        connection.checkPresence(roomid, function(isRoomExists) {
            if (isRoomExists) {
                connection.join(roomid);
                return;
            }

            setTimeout(reCheckRoomPresence, 5000);
        });
    })();

    disableInputButtons();
}

	
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
	function get_streaming_id()
		{
			
			    var roomQueryStringURL = '?roomid=' + document.getElementById('room-id').value;

		  var proto;
    var port;
    if (window.location.protocol == "http:") {
        proto = "http://";
        port = "9091";
    } else {
        proto = "https://";
        port = "8888";
    }

    var url = proto + window.location.hostname + '/webrtc/many/live_stream/broadcast' + roomQueryStringURL;
    document.getElementById('broadcast_url').value = url;

		}
</script>



  <footer>
  				<div id="message"></div>
    <small id="send-message"></small>
  </footer>

  <script src="https://cdn.webrtc-experiment.com/common.js"></script>