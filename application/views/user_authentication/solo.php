    <link rel="stylesheet" href="<?= base_url();?>assets/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url();?>assets/webrtc-as-rtmp-republishing.css">
    <script type="text/javascript" src="<?= base_url();?>assets/flashphoner.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url();?>assets/utils.js"></script>
    <script type="text/javascript" src="<?= base_url();?>assets/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= base_url();?>assets/swfobject.js"></script>
    <script type="text/javascript" src="<?= base_url();?>assets/webrtc-as-rtmp-republishing.js"></script>
    
	
	<style>
	.menubar li > a{color:#fff !important;}
#background {
    position: fixed;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    background: #fff;
	z-index:-1;
}
#background img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.fp-Video {
	border: 1px double #d4d4d4;
	width: 80%;
	height: 100%;
	max-width:600px;
	padding: 30px;
	background: transparent;
}
.content img {
	width: 216px;
	margin-bottom: 20px;
}
.content h2 {
    color: #189c8e;
    font-weight: 500;
    font-size: 50px;
}
.btn-content {
    text-align: center;
}
.btn-content .btn-color{
		background: #189c8e;
}

.btn-content .btn-primary {
	font-weight: 500;
	text-shadow: none;
	border-radius: 5px !important;
	margin-bottom: 0px;
	padding: 10px 20px;
	font-size: 20px;
}

.main-head1{color:#fff;}
</style>
	
	<div class="container">
        <div class="row">
            <h2 class="text-center main-head1">WebRTC as RTMP re-publishing</h2>
        </div>
        <div class="row row-space">
		<div id="background"><img src="<?= base_url();?>assets/img/smooth_bg.png"></div>
            <div class="col-sm-6">
                <div class="text-center text-muted">Local</div>
                <div class="fp-Video">
                    <div id="localVideo" class="display">
						<div class="content">
							<img src="<?= base_url();?>assets/img/icon_camera.png" alt="camera icon">
							<h2>Q&amp;A</h2>
							<!--button type="button" class="btn btn-primary">Connect Camera</button-->
						</div>
					</div>
                </div>
                <div id="streamerForm" class="input-group col-sm-10" style="margin: 10px auto 0 auto;">
                    <input class="form-control" type="text" id="url">
                    <div class="input-group-btn btn-content">
						<button class="btn btn-primary btn-color" id="liveButton">Connect Camera</button>
                        <button id="publishBtn" type="button" class="btn btn-primary" style="margin: 0 auto;">Start</button>

                    </div>
                </div>
                <div class="text-center" style="margin-top: 20px">
                    <div id="status"></div>
                </div>
            </div>

            <div class="col-sm-6 text-center" style="display:none;">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">RTMP Target Details</legend>
                    <form id="formRTMP" class="form-horizontal" role="form">
                        <div id="rtmpUrlForm" class="form-group">
                            <label class="control-label col-sm-3" for="rtmpUrl">RTMP URL</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="rtmpUrl" value=""/>
                            </div>
                        </div>
                        <div id="rtmpStreamForm" class="form-group">
                            <label class="control-label col-sm-3" for="streamName">Stream</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="streamName"/>
                            </div>
                        </div>
                    </form>
                </fieldset>
                <h3>RTMP Player</h3>
                <div class="text-center">
                    <div id="player"></div>
                </div>
            </div>
        </div>
    </div>

<script>
document.getElementById('liveButton').onclick = function() {
	 document.getElementById("publishBtn").style.display = "block";
	 document.getElementById("liveButton").style.display = "none";
  FB.ui({
    display: 'popup',
    method: 'live_broadcast',
    phase: 'create',
}, function(response) {
    if (!response.id) {
      alert('dialog canceled');
      return;
    }
	 document.getElementById('rtmpUrl').value=response.stream_url;
	 
	 //alert('stream url:' + response.stream_url);
    //alert('stream url:' + response.secure_stream_url);
	// var fields = response.secure_stream_url.split('&');

// var firstargument = fields[0];
// var secondargument = fields[1];
// var thirdargument = fields[2];
    // posttofb(firstargument,secondargument,thirdargument);
	
    FB.ui({
      display: 'popup',
      method: 'live_broadcast',
      phase: 'publish',
      broadcast_data: response,
    }, function(responsee) {
    alert("video status: \n" + responsee.status);
    });
  });
};

// $(document).ready(function(){
	// $('#liveButton').click(function(){
		// function posttofb(first,second,third) {
    // $.ajax({
        // url: 'callshell.php',
        // data: {firstargument:first,secondargument:second,thirdargument:third},
        // type: "POST",
      // }).success(function(data2){

    // //john_doe(data2);
// });
// }
	// })
// })
</script>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '115849155760622',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v2.10'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>