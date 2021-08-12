<div class="content-page">
	<!-- Start content -->
	<div class="content">
		<div class="container">
			<!-- Page-Title -->
			<div class="row">
				<div class="col-sm-12">
					<h4 class="page-title">Chapters</h4>
					<ol class="breadcrumb">
						<li>
							<a href="<?= base_url('dashboard') ?>">Dashboard</a>
						</li>
						<li>
							<a href="<?= base_url('chapter') ?>">Chapters List</a>
						</li>
						<li class="active">
							Edit
						</li>
					</ol>
				</div>
			</div>			
			<div class="row">
				<div class="col-sm-12">
					<div id="edit_chapters_msg"></div>
					<form id="edit_chapters_form" role="form" action="<?= base_url("chapter/modify/" . $record['bid'] . '/' . $record['id']) ?>" method="post" enctype="multipart/form-data">
						<div class="card-box">
							<h4 class="m-t-0 header-title"><b>Edit Chapter</b></h4></br></br>
							<div class="row">
								<div class="col-lg-6">
									<input type="hidden" id="bid" name="bid" value="<?= $this->uri->segment('3') ?>">
									<div class="form-group">
										<label>Narrators</label>
										<select name="nar_id" id="nar_id" class="form-control">
											<option value="">Select Narrator</option>
											<?php
											if ($get_data['num'] > 0) {
												foreach ($get_data['data'] as $c) {
											?>
													<option <?= ($record['nar_id'] == $c->id ? 'selected' : '') ?> value="<?= $c->id ?>"><?= $c->nar_name ?></option>
											<?php
												}
											}
											?>

										</select>
									</div>
									<div class="form-group">
										<label>Chapter Title</label>
										<input class="form-control" id="ch_name" name="ch_name" value="<?= $record['ch_name'] ?>" maxlength="50">
									</div>
									<div class="form-group row">
										<div class="col-md-6">
											<label>Upload Audio</label>
											<input type="file" name="upload_audio" id="upload_audio" accept="audio/*">
											<input type="hidden" name="ch_audio" id="ch_audio" value="<?= $record['ch_audio']?>" >
										</div>
										<p id="uploadError" style="color:red"></p>
										<div class="col-md-6" style="padding-top: 18px; padding-left: 20px">
											<button type="button" id="uploadBtn" disabled class="btn btn-primary" onClick="new_chaper()">Upload file</button>
										</div>
									</div>
									<div class="row">
										<div class="progress" style="background-color: transparent; height: 20px;">
											<div class="progress-bar progress-bar-striped progress-bar-animate" role="progressbar" id="upload_progress" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0">
												<p id="progress" style="font-size: 12px;"></p>
											</div>
										</div>
										<!-- <button id='cancel_btn' class="btn btn-cancel">Cancel</button> -->
									</div>
									<button type="submit" class="btn btn-primary" id='submit_btn'>Submit</button>
								</div>
								<br />
								<div class="col-lg-6">
									<?php if ($record['ch_audio'] != "") { ?>
										<audio controls>
											<source src="<?php echo $record['ch_audio'] ?>" type="audio/ogg">
											<source src="<?php echo $record['ch_audio'] ?>" type="audio/mpeg">
											Your browser does not support the audio element.
										</audio>
									<?php
									}
									?>
								</div>

							</div>
						</div>
					</form>
					</form>
				</div>
			</div>
		</div> <!-- container -->
	</div> <!-- content -->
	<script src="https://www.gstatic.com/firebasejs/8.6.3/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.6.3/firebase-analytics.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.6.3/firebase-storage.js"></script>
	<script>
		var firebaseConfig = {
			apiKey: "AIzaSyBIJvdVBLPx7eSBLs3Y_tAu7wvsTTO39Ds",
			authDomain: "dilkiawaz-6854d.firebaseapp.com",
			databaseURL: "https://dilkiawaz-6854d-default-rtdb.firebaseio.com",
			projectId: "dilkiawaz-6854d",
			storageBucket: "dilkiawaz-6854d.appspot.com",
			messagingSenderId: "800531980880",
			appId: "1:800531980880:web:ec42f97c62f95d91baa755",
			measurementId: "G-MRQJ04PQZM"
		};


		// Initialize Firebase
		firebase.initializeApp(firebaseConfig);
		console.log('success');
		firebase.analytics();
		//   firebase.storage();
		var storage = firebase.storage();

		var storageRef = storage.ref();

		var ch_duration;

		function new_chaper() {
			console.log('inside new_chapert()', this.ch_duration);
			var file = document.getElementById('upload_audio').files[0];
			var filename = document.getElementById('upload_audio').value;
			const extension = filename.split('.').pop();
			var bid = document.getElementById('bid').value;
			var chapterName = Math.floor(Math.random() * 100000) + '.' + extension;

			if (this.ch_duration > '59.59') {
				document.getElementById('uploadError').innerHTML = "Audio should be less than 60 mins";
				$('#uploadBtn').prop('disabled', true);
			} else if (file && this.ch_duration < '59.59') {
				document.getElementById('uploadError').innerHTML = "";
				$('#uploadBtn').prop('disabled', true);

				// Create the file metadata
				var metadata = {
					contentType: 'audio/mpeg'
				};
				// Upload file and metadata to the object 'images/mountains.jpg'
				var uploadTask = storageRef.child('/audio/' + bid + '/' + chapterName).put(file, metadata);

				// // Listen for state changes, errors, and completion of the upload.
				uploadTask.on(firebase.storage.TaskEvent.STATE_CHANGED, // or 'state_changed'
					(snapshot) => {
						// // Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
						var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
						// console.log('Upload is ' + Math.round(progress) + '% done');
						document.getElementById('progress').innerHTML = Math.round(progress) + '%';
						document.getElementById("upload_progress").style.width = Math.round(progress) + '%';
						switch (snapshot.state) {
							case firebase.storage.TaskState.PAUSED: // or 'paused'
								console.log('Upload is paused');
								break;
							case firebase.storage.TaskState.RUNNING: // or 'running'
								console.log('Upload is running');
								break;
						}
					},
					(error) => {

						// // A full list of error codes is available at
						// // https://firebase.google.com/docs/storage/web/handle-errors
						switch (error.code) {
							case 'storage/unauthorized':
								// User doesn't have permission to access the object
								break;
							case 'storage/canceled':
								// User canceled the upload
								break;
								// ...
							case 'storage/unknown':
								// Unknown error occurred, inspect error.serverResponse
								break;
						}
					},
					() => {
						// Upload completed successfully, now we can get the download URL
						uploadTask.snapshot.ref.getDownloadURL().then((downloadURL) => {
							console.log('File available at', downloadURL);
							document.getElementById("ch_audio").value = downloadURL;

							$('#submit_btn').prop('disabled', false);
							// document.getElementById("add_chapter_form").submit();
						});
					}
				);
				console.log('less');
			}
		}

		var audio = document.createElement('audio');

		// Add a change event listener to the file input
		document.getElementById("upload_audio").addEventListener('change', function(event) {
			var target = event.currentTarget;
			var file = target.files[0];
			var reader = new FileReader();

			if (target.files && file) {
				var reader = new FileReader();

				reader.onload = function(e) {
					audio.src = e.target.result;
					audio.addEventListener('loadedmetadata', function() {
						// Obtain the duration in seconds of the audio file (with milliseconds as well, a float value)
						var duration = audio.duration;
						document.getElementById('uploadError').innerHTML = "";
						// 			var duration = buffer.duration;
						var hrs = ~~(duration / 3600);
						var mins = ~~((duration % 3600) / 60);
						var secs = ~~duration % 60;

						// Output like "1:01" or "4:03:59" or "123:03:59"
						var ret = "";

						if (hrs > 0) {
							ret += "" + hrs + ":" + (mins < 10 ? "0" : "");
						}

						ret += "" + mins + ":" + (secs < 10 ? "0" : "");
						ret += "" + secs;
						ch_duration = ret;
						if (ret) {
							$('#uploadBtn').prop('disabled', false);
							$('#submit_btn').prop('disabled', true);
						}
						console.log("The duration of the song is of: " + ret + " seconds");
					}, false);
				};

				reader.readAsDataURL(file);
			}
		}, false);
	</script>