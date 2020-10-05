<html lang="en">
    <head>
		<title>Ponny - Live Stream</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="js/AgoraRTCSDK-3.1.1.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" rel="stylesheet">
		<link type="image/x-icon" href="{{ asset('img/icon.ico') }}" rel="shortcut icon" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="{{ asset('agora/assets/style.css') }}"/>
    </head>
    <body>
			<div class="container-fluid p-0">
				<div id="main-container">
					<div id="screen-share-btn-container" class="col-2 float-right text-right mt-2">
						<button id="screen-share-btn"  type="button" class="btn btn-lg">
							<i id="screen-share-icon" class="fab fa-slideshare"></i>
						</button>
					</div>
					<div id="buttons-container" class="row justify-content-center mt-3">
						<div id="audio-controls" class="col-md-2 text-center btn-group">
							<button id="mic-btn" type="button" class="btn btn-block btn-dark btn-lg">
								<i id="mic-icon" class="fas fa-microphone"></i>
							</button>
							<button id="mic-dropdown" type="button" class="btn btn-lg btn-dark dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div id="mic-list" class="dropdown-menu dropdown-menu-right">
								</div>
						</div>
						<div id="video-controls" class="col-md-2 text-center btn-group">
							<button id="video-btn"  type="button" class="btn btn-block btn-dark btn-lg">
								<i id="video-icon" class="fas fa-video"></i>
							</button>
							<button id="cam-dropdown" type="button" class="btn btn-lg btn-dark dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
							</button>
							<div id="camera-list" class="dropdown-menu dropdown-menu-right">
							</div>
						</div>
						<div class="col-md-2 text-center">
							<button id="exit-btn"  type="button" class="btn btn-block btn-danger btn-lg">
								<i id="exit-icon" class="fas fa-phone-slash"></i>
							</button>
						</div>
					</div>
					<div id="full-screen-video"></div>
					<div id="lower-ui-bar" class="row fixed-bottom mb-1">
						<div id="rtmp-btn-container" class="col ml-3 mb-2">
							<button id="rtmp-config-btn"  type="button" class="btn btn-primary btn-lg row rtmp-btn" data-toggle="modal" data-target="#addRtmpConfigModal">
								<i id="rtmp-config-icon" class="fas fa-rotate-270 fa-sign-out-alt"></i>
							</button>
							<button id="add-rtmp-btn"  type="button" class="btn btn-secondary btn-lg row rtmp-btn" data-toggle="modal" data-target="#add-external-source-modal">
								<i id="add-rtmp-icon" class="fas fa-plug"></i>
							</button>
						</div>
						<div id="external-broadcasts-container" class="container col-flex">
							<div id="rtmp-controlers" class="col">
								<!-- insert rtmp  controls -->
							</div>
						</div>
					</div>
				</div>
				<!-- RTMP Config Modal -->
				<div class="modal fade slideInLeft animated" id="addRtmpConfigModal" tabindex="-1" role="dialog" aria-labelledby="rtmpConfigLabel" aria-hidden="true" data-keyboard=true>
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="rtmpConfigLabel"><i class="fas fa-sliders-h"></i></h5>
								<button type="button" class="close" data-dismiss="modal" data-reset="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form id="rtmp-config">
										<div class="form-group">
											<input id="rtmp-url" type="text" class="form-control" placeholder="URL *"/>
										</div>
										<div class="form-group">
												<label for="window-scale">Video Scale</label>
												<input id="window-scale-width" type="number" value="640" min="1" max="1000" step="1"/> (w)&nbsp;
												<input id="window-scale-height" type="number" value="360" min="1" max="1000" step="1"/> (h) 
										</div>
										<div class="form-group row">
												<div class="col-flex">
													<label for="audio-bitrate">Audio Bitrate</label>	
													<input id="audio-bitrate" type="number" value="48" min="1" max="128" step="2"/>	
												</div>
												<div class="col-flex ml-3">
														<label for="video-bitrate">Video Bitrate</label>
														<input id="video-bitrate" type="number" value="400" min="1" max="1000000" step="2"/>
												</div>
										</div>
										<div class="form-group row">
											<div class="col-flex">
													<label for="framerate">Frame Rate</label>
													<input id="framerate" type="number" value="15" min="1" max="10000" step="1"/>
											</div>
											<div class="col-flex ml-3">
												<label for="video-gop">Video GOP</label>
												<input id="video-gop" type="number" value="30" min="1" max="10000" step="1"/>
											</div>
										</div>
										<div class="form-group">
												<label for="video-codec-profile">Video Codec Profile </label>
												<select id="video-codec-profile" class="form-control drop-mini">
													<option value="66">Baseline</option>
													<option value="77">Main</option>
													<option value="100" selected>High (default)</option>
												</select>
										</div>
										<div class="form-group">
												<label for="audio-channels">Audio Channels </label>
												<select id="audio-channels" class="form-control drop-mini">
													<option value="1" selected>Mono (default)</option>
													<option value="2">Dual sound channels</option>
													<option value="3" disabled>Three sound channels</option>
													<option value="4" disabled>Four sound channels</option>
													<option value="5" disabled>Five sound channels</option>
												</select>
										</div>
										<div class="form-group">
												<label for="audio-sample-rate">Audio Sample Rate </label>
												<select id="audio-sample-rate" class="form-control drop-mini">
													<option value="32000">32 kHz</option>
													<option value="44100" selected>44.1 kHz (default)</option>
													<option value="48000">48 kHz</option>
												</select>
										</div>
										<div class="form-group">
												<label for="background-color-picker">Background Color </label>
												<input id="background-color-picker" type="text" class="form-control drop-mini" placeholder="(optional)" value="0xFFFFFF" />
										</div>
										<div class="form-group">
												<label for="low-latancy">Low Latency </label>
												<select id="low-latancy" class="form-control drop-mini">
													<option value="true">Low latency with unassured quality</option>
													<option value="false" selected>High latency with assured quality (default)</option>
												</select>
										</div>
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" id="start-RTMP-broadcast" class="btn btn-primary">
										<i class="fas fa-satellite-dish"></i>
								</button>
							</div>
						</div>
					</div>
				</div>
				<!-- end Modal -->
				<!-- External Injest Url Modal -->
				<div class="modal fade slideInLeft animated" id="add-external-source-modal" tabindex="-1" role="dialog" aria-labelledby="add-external-source-url-label" aria-hidden="true" data-keyboard=true>
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="add-external-source-url-label"><i class="fas fa-broadcast-tower"></i> [add external url]</i></h5>
									<button id="hide-external-url-modal" type="button" class="close" data-dismiss="modal" data-reset="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
										<form id="external-injest-config">
												<div class="form-group">
													<input id="external-url" type="text" class="form-control" placeholder="URL *"/>
												</div>
												<div class="form-group">
														<label for="external-window-scale">Video Scale</label>
														<input id="external-window-scale-width" type="number" value="640" min="1" max="1000" step="1"/> (w)&nbsp;
														<input id="external-window-scale-height" type="number" value="360" min="1" max="1000" step="1"/> (h) 
												</div>
												<div class="form-group row">
														<div class="col-flex">
															<label for="external-audio-bitrate">Audio Bitrate</label>	
															<input id="external-audio-bitrate" type="number" value="48" min="1" max="128" step="2"/>	
														</div>
														<div class="col-flex ml-3">
																<label for="external-video-bitrate">Video Bitrate</label>
																<input id="external-video-bitrate" type="number" value="400" min="1" max="1000000" step="2"/>
														</div>
												</div>
												<div class="form-group row">
													<div class="col-flex">
															<label for="external-framerate">Frame Rate</label>
															<input id="external-framerate" type="number" value="15" min="1" max="10000" step="1"/>
													</div>
													<div class="col-flex ml-3">
														<label for="external-video-gop">Video GOP</label>
														<input id="external-video-gop" type="number" value="30" min="1" max="10000" step="1"/>
													</div>
												</div>
												<div class="form-group">
														<label for="external-audio-channels">Audio Channels </label>
														<select id="external-audio-channels" class="form-control drop-mini">
															<option value="1" selected>Mono (default)</option>
															<option value="2">Dual sound channels</option>
														</select>
												</div>
												<div class="form-group">
														<label for="external-audio-sample-rate">Audio Sample Rate </label>
														<select id="external-audio-sample-rate" class="form-control drop-mini">
															<option value="32000">32 kHz</option>
															<option value="44100" selected>44.1 kHz (default)</option>
															<option value="48000">48 kHz</option>
														</select>
												</div>
										</form>
								</div>
								<div class="modal-footer">
									<button type="button" id="add-external-stream" class="btn btn-primary">
											<i id="add-rtmp-icon" class="fas fa-plug"></i>	
									</button>
								</div>
							</div>
						</div>
					</div>
					<!-- end Modal -->
			</div>
		</div>
	</body>
	<script>
		$("#mic-btn").prop("disabled", true);
		$("#video-btn").prop("disabled", true);
		$("#screen-share-btn").prop("disabled", true);
		$("#exit-btn").prop("disabled", true);
		$("#add-rtmp-btn").prop("disabled", true);
	</script>
	<script src="{{ asset('agora/AgoraRTCSDK-3.2.1.js') }}"></script>
	<script type="text/javascript">
		/**
		 * Agora Broadcast Client 
		 */

		var agoraAppId = 'b7e7f048f52b460ca825bb6901399a5e'; // set app id
		var channelName = 'broadcast'; // set channel name

		// create client instance
		var client = AgoraRTC.createClient({mode: 'live', codec: 'vp8'}); // h264 better detail at a higher motion
		var mainStreamId; // reference to main stream

		// set video profile 
		// [full list: https://docs.agora.io/en/Interactive%20Broadcast/videoProfile_web?platform=Web#video-profile-table]
		var cameraVideoProfile = '720p_6'; // 960 × 720 @ 30fps  & 750kbs

		// keep track of streams
		var localStreams = {
		  uid: '',
		  camera: {
		    camId: '',
		    micId: '',
		    stream: {}
		  }
		};

		// keep track of devices
		var devices = {
		  cameras: [],
		  mics: []
		}

		var externalBroadcastUrl = '';
		var injectedStreamURL = '';

		// default config for rtmp
		var defaultConfigRTMP = {
		  width: 640,
		  height: 360,
		  videoBitrate: 400,
		  videoFramerate: 15,
		  lowLatency: false,
		  audioSampleRate: 48000,
		  audioBitrate: 48,
		  audioChannels: 1,
		  videoGop: 30,
		  videoCodecProfile: 100,
		  userCount: 0,
		  userConfigExtraInfo: {},
		  backgroundColor: 0x000000,
		  transcodingUsers: [],
		};

		// set log level:
		// -- .DEBUG for dev 
		// -- .NONE for prod
		AgoraRTC.Logger.setLogLevel(AgoraRTC.Logger.DEBUG); 

		// init Agora SDK
		client.init(agoraAppId, function () {
		  console.log('AgoraRTC client initialized');
		  joinChannel(); // join channel upon successfull init
		}, function (err) {
		  console.log('[ERROR] : AgoraRTC client init failed', err);
		});

		// client callbacks
		client.on('stream-published', function (evt) {
		  console.log('Publish local stream successfully');
		});

		// when a remote stream is added
		client.on('stream-added', function (evt) {
		  var stream = evt.stream;
		  var streamId = stream.getId();
		  console.log("new stream added: " + streamId);
		  // Subscribe to the stream.
		  client.subscribe(stream, function (err) {
		    console.log("[ERROR] : subscribe stream failed", err);
		  });
		});

		client.on('stream-subscribed', function (evt) {
		  var remoteStream = evt.stream;
		  var remoteId = remoteStream.getId();
		  console.log("Subscribe remote stream successfully: " + remoteId);
		  if( $('#full-screen-video').is(':empty') ) { 
		    mainStreamId = remoteId;
		    remoteStream.play('full-screen-video');
		  } else {
		    addRemoteStreamMiniView(remoteStream);
		  }
		});

		client.on('stream-removed', function (evt) {
		  var stream = evt.stream;
		  stream.stop(); // stop the stream
		  stream.close(); // clean up and close the camera stream
		  console.log("Remote stream is removed " + stream.getId());
		});

		//live transcoding events..
		client.on('liveStreamingStarted', function (evt) {
		  console.log("Live streaming started");
		}); 

		client.on('liveStreamingFailed', function (evt) {
		  console.log("Live streaming failed");
		}); 

		client.on('liveStreamingStopped', function (evt) {
		  console.log("Live streaming stopped");
		});

		client.on('liveTranscodingUpdated', function (evt) {
		  console.log("Live streaming updated");
		}); 

		// ingested live stream 
		client.on('streamInjectedStatus', function (evt) {
		  console.log("Injected Steram Status Updated");
		  console.log(JSON.stringify(evt));
		}); 

		// when a remote stream leaves the channel
		client.on('peer-leave', function(evt) {
		  console.log('Remote stream has left the channel: ' + evt.stream.getId());
		});

		// show mute icon whenever a remote has muted their mic
		client.on('mute-audio', function (evt) {
		  console.log('Mute Audio for: ' + evt.uid);
		});

		client.on('unmute-audio', function (evt) {
		  console.log('Unmute Audio for: ' + evt.uid);
		});

		// show user icon whenever a remote has disabled their video
		client.on('mute-video', function (evt) {
		  console.log('Mute Video for: ' + evt.uid);
		});

		client.on('unmute-video', function (evt) {
		  console.log('Unmute Video for: ' + evt.uid);
		});

		// join a channel
		function joinChannel() {
		  var token = generateToken();
		  var userID = 0; // set to null to auto generate uid on successfull connection

		  // set the role
		  client.setClientRole('host', function() {
		    console.log('Client role set as host.');
		  }, function(e) {
		    console.log('setClientRole failed', e);
		  });
		  
		  // client.join(token, 'allThingsRTCLiveStream', 0, function(uid) {
		  client.join(token, channelName, userID, function(uid) {
		      createCameraStream(uid, {});
		      localStreams.uid = uid; // keep track of the stream uid  
		      console.log('User ' + uid + ' joined channel successfully');
		  }, function(err) {
		      console.log('[ERROR] : join channel failed', err);
		  });
		}

		// video streams for channel
		function createCameraStream(uid, deviceIds) {
		  console.log('Creating stream with sources: ' + JSON.stringify(deviceIds));

		  var localStream = AgoraRTC.createStream({
		    streamID: uid,
		    audio: true,
		    video: true,
		    screen: false
		  });
		  localStream.setVideoProfile(cameraVideoProfile);

		  // The user has granted access to the camera and mic.
		  localStream.on("accessAllowed", function() {
		    if(devices.cameras.length === 0 && devices.mics.length === 0) {
		      console.log('[DEBUG] : checking for cameras & mics');
		      getCameraDevices();
		      getMicDevices();
		    }
		    console.log("accessAllowed");
		  });
		  // The user has denied access to the camera and mic.
		  localStream.on("accessDenied", function() {
		    console.log("accessDenied");
		  });

		  localStream.init(function() {
		    console.log('getUserMedia successfully');
		    localStream.play('full-screen-video'); // play the local stream on the main div
		    // publish local stream

		    if($.isEmptyObject(localStreams.camera.stream)) {
		      enableUiControls(localStream); // move after testing
		    } else {
		      //reset controls
		      $("#mic-btn").prop("disabled", false);
		      $("#video-btn").prop("disabled", false);
		      $("#exit-btn").prop("disabled", false);
		    }

		    client.publish(localStream, function (err) {
		      console.log('[ERROR] : publish local stream error: ' + err);
		    });

		    localStreams.camera.stream = localStream; // keep track of the camera stream for later
		  }, function (err) {
		    console.log('[ERROR] : getUserMedia failed', err);
		  });
		}

		function leaveChannel() {

		  client.leave(function() {
		    console.log('client leaves channel');
		    localStreams.camera.stream.stop() // stop the camera stream playback
		    localStreams.camera.stream.close(); // clean up and close the camera stream
		    client.unpublish(localStreams.camera.stream); // unpublish the camera stream
		    //disable the UI elements
		    $('#mic-btn').prop('disabled', true);
		    $('#video-btn').prop('disabled', true);
		    $('#exit-btn').prop('disabled', true);
		    $("#add-rtmp-btn").prop("disabled", true);
		    $("#rtmp-config-btn").prop("disabled", true);
		  }, function(err) {
		    console.log('client leave failed ', err); //error handling
		  });
		}

		// use tokens for added security
		function generateToken() {
		  return null; // TODO: add a token generation
		}

		function changeStreamSource (deviceIndex, deviceType) {
		  console.log('Switching stream sources for: ' + deviceType);
		  var deviceId;
		  var existingStream = false;
		  
		  if (deviceType === "video") {
		    deviceId = devices.cameras[deviceIndex].deviceId
		  }

		  if(deviceType === "audio") {
		    deviceId = devices.mics[deviceIndex].deviceId;
		  }

		  localStreams.camera.stream.switchDevice(deviceType, deviceId, function(){
		    console.log('successfully switched to new device with id: ' + JSON.stringify(deviceId));
		    // set the active device ids
		    if(deviceType === "audio") {
		      localStreams.camera.micId = deviceId;
		    } else if (deviceType === "video") {
		      localStreams.camera.camId = deviceId;
		    } else {
		      console.log("unable to determine deviceType: " + deviceType);
		    }
		  }, function(){
		    console.log('failed to switch to new device with id: ' + JSON.stringify(deviceId));
		  });
		}

		// helper methods
		function getCameraDevices() {
		  console.log("Checking for Camera Devices.....")
		  client.getCameras (function(cameras) {
		    devices.cameras = cameras; // store cameras array
		    cameras.forEach(function(camera, i){
		      var name = camera.label.split('(')[0];
		      var optionId = 'camera_' + i;
		      var deviceId = camera.deviceId;
		      if(i === 0 && localStreams.camera.camId === ''){
		        localStreams.camera.camId = deviceId;
		      }
		      $('#camera-list').append('<a class="dropdown-item" id="' + optionId + '">' + name + '</a>');
		    });
		    $('#camera-list a').click(function(event) {
		      var index = event.target.id.split('_')[1];
		      changeStreamSource (index, "video");
		    });
		  });
		}

		function getMicDevices() {
		  console.log("Checking for Mic Devices.....")
		  client.getRecordingDevices(function(mics) {
		    devices.mics = mics; // store mics array
		    mics.forEach(function(mic, i){
		      var name = mic.label.split('(')[0];
		      var optionId = 'mic_' + i;
		      var deviceId = mic.deviceId;
		      if(i === 0 && localStreams.camera.micId === ''){
		        localStreams.camera.micId = deviceId;
		      }
		      if(name.split('Default - ')[1] != undefined) {
		        name = '[Default Device]' // rename the default mic - only appears on Chrome & Opera
		      }
		      $('#mic-list').append('<a class="dropdown-item" id="' + optionId + '">' + name + '</a>');
		    }); 
		    $('#mic-list a').click(function(event) {
		      var index = event.target.id.split('_')[1];
		      changeStreamSource (index, "audio");
		    });
		  });
		}

		function startLiveTranscoding() {
		  console.log("start live transcoding"); 
		  var rtmpUrl = $('#rtmp-url').val();
		  var width = parseInt($('#window-scale-width').val(), 10);
		  var height = parseInt($('#window-scale-height').val(), 10);

		  var configRtmp = {
		    width: width,
		    height: height,
		    videoBitrate: parseInt($('#video-bitrate').val(), 10),
		    videoFramerate: parseInt($('#framerate').val(), 10),
		    lowLatency: ($('#low-latancy').val() === 'true'),
		    audioSampleRate: parseInt($('#audio-sample-rate').val(), 10),
		    audioBitrate: parseInt($('#audio-bitrate').val(), 10),
		    audioChannels: parseInt($('#audio-channels').val(), 10),
		    videoGop: parseInt($('#video-gop').val(), 10),
		    videoCodecProfile: parseInt($('#video-codec-profile').val(), 10),
		    userCount: 1,
		    userConfigExtraInfo: {},
		    backgroundColor: parseInt($('#background-color-picker').val(), 16),
		    transcodingUsers: [{
		      uid: localStreams.uid,
		      alpha: 1,
		      width: width,
		      height: height,
		      x: 0,
		      y: 0,
		      zOrder: 0
		    }],
		  };

		  // set live transcoding config
		  client.setLiveTranscoding(configRtmp);
		  if(rtmpUrl !== '') {
		    client.startLiveStreaming(rtmpUrl, true)
		    externalBroadcastUrl = rtmpUrl;
		    addExternalTransmitionMiniView(rtmpUrl)
		  }
		}

		function addExternalSource() {
		  var externalUrl = $('#external-url').val();
		  var width = parseInt($('#external-window-scale-width').val(), 10);
		  var height = parseInt($('#external-window-scale-height').val(), 10);

		  var injectStreamConfig = {
		    width: width,
		    height: height,
		    videoBitrate: parseInt($('#external-video-bitrate').val(), 10),
		    videoFramerate: parseInt($('#external-framerate').val(), 10),
		    audioSampleRate: parseInt($('#external-audio-sample-rate').val(), 10),
		    audioBitrate: parseInt($('#external-audio-bitrate').val(), 10),
		    audioChannels: parseInt($('#external-audio-channels').val(), 10),
		    videoGop: parseInt($('#external-video-gop').val(), 10)
		  };

		  // set live transcoding config
		  client.addInjectStreamUrl(externalUrl, injectStreamConfig)
		  injectedStreamURL = externalUrl;
		  // TODO: ADD view for external url (similar to rtmp url)
		}

		// RTMP Connection (UI Component)
		function addExternalTransmitionMiniView(rtmpUrl){
		  var container = $('#rtmp-controlers');
		  // append the remote stream template to #remote-streams
		  container.append(
		    $('<div/>', {'id': 'rtmp-container',  'class': 'container row justify-content-end mb-2'}).append(
		      $('<div/>', {'class': 'pulse-container'}).append(
		          $('<button/>', {'id': 'rtmp-toggle', 'class': 'btn btn-lg col-flex pulse-button pulse-anim mt-2'})
		      ),
		      $('<input/>', {'id': 'rtmp-url', 'val': rtmpUrl, 'class': 'form-control col-flex" value="rtmps://live.facebook.com', 'type': 'text', 'disabled': true}),
		      $('<button/>', {'id': 'removeRtmpUrl', 'class': 'btn btn-lg col-flex close-btn'}).append(
		        $('<i/>', {'class': 'fas fa-xs fa-trash'})
		      )
		    )
		  );
		  
		  $('#rtmp-toggle').click(function() {
		    if ($(this).hasClass('pulse-anim')) {
		      client.stopLiveStreaming(externalBroadcastUrl)
		    } else {
		      client.startLiveStreaming(externalBroadcastUrl, true)
		    }
		    $(this).toggleClass('pulse-anim');
		    $(this).blur();
		  });

		  $('#removeRtmpUrl').click(function() { 
		    client.stopLiveStreaming(externalBroadcastUrl);
		    externalBroadcastUrl = '';
		    $('#rtmp-container').remove();
		  });

		}

		// REMOTE STREAMS UI
		function addRemoteStreamMiniView(remoteStream){
		  var streamId = remoteStream.getId();
		  // append the remote stream template to #remote-streams
		  $('#external-broadcasts-container').append(
		    $('<div/>', {'id': streamId + '_container',  'class': 'remote-stream-container col'}).append(
		      $('<div/>', {'id': streamId + '_mute', 'class': 'mute-overlay'}).append(
		          $('<i/>', {'class': 'fas fa-microphone-slash'})
		      ),
		      $('<div/>', {'id': streamId + '_no-video', 'class': 'no-video-overlay text-center'}).append(
		        $('<i/>', {'class': 'fas fa-user'})
		      ),
		      $('<div/>', {'id': 'agora_remote_' + streamId, 'class': 'remote-video'})
		    )
		  );
		  remoteStream.play('agora_remote_' + streamId); 

		  var containerId = '#' + streamId + '_container';
		  $(containerId).dblclick(function() {
		    client.removeInjectStreamUrl(injectedStreamURL);
		    $(containerId).remove();
		  });
		}

	</script>
	<script type="text/javascript">
	// SCREEN SHARING CLIENT
	var screenVideoProfile = '480p_2'; // 640 × 480 @ 30fps
	var screenClient = AgoraRTC.createClient({mode: 'live', codec: 'vp8'}); // use the vp8 for better detail in low motion

	function initScreenShare() {
	  screenClient.init(agoraAppId, function () {
	    console.log('AgoraRTC screenClient initialized');
	    joinChannelAsScreenShare();
	    screenShareActive = true;
	    // TODO: add logic to swap button
	  }, function (err) {
	    console.log('[ERROR] : AgoraRTC screenClient init failed', err);
	  });  
	}

	function joinChannelAsScreenShare() {
	  var token = generateToken();
	  var userID = 0; // set to null to auto generate uid on successfull connection
	  screenClient.join(token, channelName, userID, function(uid) { 
	    localStreams.screen.id = uid;  // keep track of the uid of the screen stream.
	    
	    // Create the stream for screen sharing.
	    var screenStream = AgoraRTC.createStream({
	      streamID: uid,
	      audio: false, // Set the audio attribute as false to avoid any echo during the call.
	      video: false,
	      screen: true, // screen stream
	      extensionId: 'minllpmhdgpndnkomcoccfekfegnlikg', // Google Chrome:
	      mediaSource:  'screen', // Firefox: 'screen', 'application', 'window' (select one)
	    });
	    screenStream.setScreenProfile(screenVideoProfile); // set the profile of the screen
	    screenStream.init(function(){
	      console.log('getScreen successful');
	      localStreams.screen.stream = screenStream; // keep track of the screen stream
	      $('#screen-share-btn').prop('disabled',false); // enable button
	      screenClient.publish(screenStream, function (err) {
	        console.log('[ERROR] : publish screen stream error: ' + err);
	      });
	    }, function (err) {
	      console.log('[ERROR] : getScreen failed', err);
	      localStreams.screen.id = ''; // reset screen stream id
	      localStreams.screen.stream = {}; // reset the screen stream
	      screenShareActive = false; // resest screenShare
	      toggleScreenShareBtn(); // toggle the button icon back (will appear disabled)
	    });
	  }, function(err) {
	    console.log('[ERROR] : join channel as screen-share failed', err);
	  });

	  screenClient.on('stream-published', function (evt) {
	    console.log('Publish screen stream successfully');
	    localStreams.camera.stream.disableVideo(); // disable the local video stream (will send a mute signal)
	    localStreams.camera.stream.stop(); // stop playing the local stream
	    // TODO: add logic to swap main video feed back from container
	    remoteStreams[mainStreamId].stop(); // stop the main video stream playback
	    addRemoteStreamMiniView(remoteStreams[mainStreamId]); // send the main video stream to a container
	    // localStreams.screen.stream.play('full-screen-video'); // play the screen share as full-screen-video (vortext effect?)
	    $('#video-btn').prop('disabled',true); // disable the video button (as cameara video stream is disabled)
	  });
	  
	  screenClient.on('stopScreenSharing', function (evt) {
	    console.log('screen sharing stopped', err);
	  });
	}

	function stopScreenShare() {
	  localStreams.screen.stream.disableVideo(); // disable the local video stream (will send a mute signal)
	  localStreams.screen.stream.stop(); // stop playing the local stream
	  localStreams.camera.stream.enableVideo(); // enable the camera feed
	  localStreams.camera.stream.play('local-video'); // play the camera within the full-screen-video div
	  $('#video-btn').prop('disabled',false);
	  screenClient.leave(function() {
	    screenShareActive = false; 
	    console.log('screen client leaves channel');
	    $('#screen-share-btn').prop('disabled',false); // enable button
	    screenClient.unpublish(localStreams.screen.stream); // unpublish the screen client
	    localStreams.screen.stream.close(); // close the screen client stream
	    localStreams.screen.id = ''; // reset the screen id
	    localStreams.screen.stream = {}; // reset the stream obj
	  }, function(err) {
	    console.log('client leave failed ', err); //error handling
	  }); 
	}
	</script>
	<script type="text/javascript">
		
		// UI buttons
		function enableUiControls() {

		  $("#mic-btn").prop("disabled", false);
		  $("#video-btn").prop("disabled", false);
		  $("#exit-btn").prop("disabled", false);
		  $("#add-rtmp-btn").prop("disabled", false);

		  $("#mic-btn").click(function(){
		    toggleMic();
		  });

		  $("#video-btn").click(function(){
		    toggleVideo();
		  });

		  $("#exit-btn").click(function(){
		    console.log("so sad to see you leave the channel");
		    leaveChannel(); 
		  });

		  $("#start-RTMP-broadcast").click(function(){
		    startLiveTranscoding();
		    $('#addRtmpConfigModal').modal('toggle');
		    $('#rtmp-url').val('');
		  });

		  $("#add-external-stream").click(function(){  
		    addExternalSource();
		    $('#add-external-source-modal').modal('toggle');
		  });

		  // keyboard listeners 
		  $(document).keypress(function(e) {
		    // ignore keyboard events when the modals are open
		    if (($("#addRtmpUrlModal").data('bs.modal') || {})._isShown ||
		        ($("#addRtmpConfigModal").data('bs.modal') || {})._isShown){
		      return;
		    }

		    switch (e.key) {
		      case "m":
		        console.log("squick toggle the mic");
		        toggleMic();
		        break;
		      case "v":
		        console.log("quick toggle the video");
		        toggleVideo();
		        break; 
		      case "q":
		        console.log("so sad to see you quit the channel");
		        leaveChannel(); 
		        break;   
		      default:  // do nothing
		    }
		  });
		}

		function toggleBtn(btn){
		  btn.toggleClass('btn-dark').toggleClass('btn-danger');
		}

		function toggleVisibility(elementID, visible) {
		  if (visible) {
		    $(elementID).attr("style", "display:block");
		  } else {
		    $(elementID).attr("style", "display:none");
		  }
		}

		function toggleMic() {
		  toggleBtn($("#mic-btn")); // toggle button colors
		  toggleBtn($("#mic-dropdown"));
		  $("#mic-icon").toggleClass('fa-microphone').toggleClass('fa-microphone-slash'); // toggle the mic icon
		  if ($("#mic-icon").hasClass('fa-microphone')) {
		    localStreams.camera.stream.unmuteAudio(); // enable the local mic
		  } else {
		    localStreams.camera.stream.muteAudio(); // mute the local mic
		  }
		}

		function toggleVideo() {
		  toggleBtn($("#video-btn")); // toggle button colors
		  toggleBtn($("#cam-dropdown"));
		  if ($("#video-icon").hasClass('fa-video')) {
		    localStreams.camera.stream.muteVideo(); // enable the local video
		    console.log("muteVideo");
		  } else {
		    localStreams.camera.stream.unmuteVideo(); // disable the local video
		    console.log("unMuteVideo");
		  }
		  $("#video-icon").toggleClass('fa-video').toggleClass('fa-video-slash'); // toggle the video icon
		}

		// keep the spinners honest
		$("input[type='number']").change(event, function() {
		  var maxValue = $(this).attr("max");
		  var minValue = $(this).attr("min");
		  if($(this).val() > maxValue) {
		    $(this).val(maxValue);
		  } else if($(this).val() < minValue) {
		    $(this).val(minValue);
		  }
		});

		// keep the background color as a proper hex
		$("#background-color-picker").change(event, function() {
		  // check the background color
		  var backgroundColorPicker = $(this).val();
		  if (backgroundColorPicker.split('#').length > 1){
		    backgroundColorPicker = '0x' + backgroundColorPicker.split('#')[1];
		    $('#background-color-picker').val(backgroundColorPicker);
		  } 
		});

	</script>
</html>