<div class="content-page">
	<!-- Start content -->
	<div class="content">
		<div class="container">
			<!-- Page-Title -->
			<div class="row">
				<div class="col-sm-12">
					<?php
                $id=$this->uri->segment('3');
                $this->load->model('books_model');
                $md = $this->books_model->getbName($id);
                $m_name = $md['bk_name'];
                ?>
					<h4 class="page-title"><?=ucwords($m_name);?>
						Book/Chapters</h4>
					<ol class="breadcrumb">
						<li>
							<a
								href="<?=base_url('author')?>">Chapters
								List</a>
						</li>
						<li class="active">
							Add
						</li>
					</ol>
				</div>
			</div>
			<!-- progress bar for upload -->
			<div class="row">
				<div class="progress">
					<div class="progress-bar progress-bar-striped progress-bar-animate" role="progressbar"
						id="upload_progress" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0">
						<p id="progress"></p>
					</div>
				</div>
				<button id='cancel_btn' class="btn btn-cancel">Cancel</button>
			</div>
			<div id="alert"></div>
			<div class="row">
				<div class="col-sm-9">
					<div id="add_chapter_msg"></div>
					<form id="add_chapter_form" name="add_chapter_form" role="form"
						action="<?=base_url('chapter/create')?>"
						method="post" enctype="multipart/form-data">
						<!-- <form id="add_chapter_form" name="add_chapter_form" role="form"  enctype="multipart/form-data"> -->
						<div class="card-box">
							<h4 class="m-t-0 header-title"><b>Add Chapters</b></h4></br></br>

							<div class="row">
								<div class="col-lg-6">
									<!-- <div class="form-group">
										<label>Books</label>
										<select name="bid" id="bid" class="form-control">
                                        <option value="">Select Books</option>
                                        <?php
                                        if ($get_sub['num']>0) {
                                            foreach ($get_sub['data'] as $s) {
                                                ?>
									<option value="<?=$s->id?>">
										<?=$s->bk_name?>
									</option>
									<?php
                                            }
                                        }
                                               ?>
									</select>
								</div>-->

								<div class="form-group">
									<label>Narrators</label>
									<select name="nar_id" id="nar_id" class="form-control">
										<option value="">Select Narrator</option>
										<?php
                                        if ($get_data['num']>0) {
                                            foreach ($get_data['data'] as $c) {
                                                ?>
										<option value="<?=$c->id?>">
											<?=$c->nar_name?>
										</option>
										<?php
                                            }
                                        }
                                               ?>

									</select>
								</div>
								<span>
									<input type="hidden" id="bid" name="bid"
										value="<?=$this->uri->segment('3')?>">
									<input type="hidden" name="ch_audio_duration" id="ch_audio_duration" value="0.00">
								</span>
								<div class="form-group">
									<label>Chapter Name</label>
									<input class="form-control" id="ch_name" name="ch_name">
								</div>

								<div class="form-group">
									<label>Upload Audio</label>
									<input type="file" name="upload_audio" id="upload_audio" accept="audio/*">
									<input type="hidden" name="ch_audio" id="ch_audio">
									
								</div>
								<button type="button" class="btn btn-primary" onclick="new_chaper()"
									id='submit_btn'>Submit</button>
							</div>
						</div>
				</div>
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

	// audio file event listner
	document.getElementById("upload_audio").addEventListener('change', function() {

		// Obtain the uploaded file, you can change the logic if you are working with multiupload
		var file = this.files[0];

		// Create instance of FileReader
		var reader = new FileReader();

		// When the file has been succesfully read
		reader.onload = function(event) {

			// Create an instance of AudioContext
			var audioContext = new(window.AudioContext || window.webkitAudioContext)();

			// Asynchronously decode audio file data contained in an ArrayBuffer.
			audioContext.decodeAudioData(event.target.result, function(buffer) {
				// Obtain the duration in seconds of the audio file (with milliseconds as well, a float value)
				var duration = buffer.duration;
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
				this.ch_duration = ret;
				// example 12.3234 seconds
				console.log("The duration of the song is of: " + ret + " seconds",this.ch_duration);
				document.getElementById("ch_audio_duration").value = ret;
				// document.getElementById("ch_audio").value = downloadURL;


				if (ret > '59.59') {
					console.log('more');
					document.getElementById('alert').innerHTML = '<div class="alert alert-warning">' +
						'<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' +
						'<strong>Audio should be less than 60 mins</strong>' +
						'</div>'
				} else {
					console.log('less');
				}
				// Alternatively, just display the integer value with
				// parseInt(duration)
				// 12 seconds
			});
		};

		// In case that the file couldn't be read
		reader.onerror = function(event) {
			console.error("An error ocurred reading the file: ", event);
		};

		// Read file as an ArrayBuffer, important !
		reader.readAsArrayBuffer(file);
	}, false);

	// Your web app's Firebase configuration
	// For Firebase JS SDK v7.20.0 and later, measurementId is optional

	function new_chaper() {
		var file = document.getElementById('upload_audio').files[0];
		var filename = document.getElementById('upload_audio').value;

		const extension = filename.split('.').pop();
		var bid = document.getElementById('bid').value;
		var chapterName = document.getElementById('ch_name').value + '.' + extension;

		if (this.ch_duration > '59.59') {
			console.log('more');
			document.getElementById('alert').innerHTML = '<div class="alert alert-warning">' +
				'<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' +
				'<strong>Audio should be less than 60 mins</strong>' +
				'</div>'
		} else {
			// Create the file metadata
			var metadata = {
				contentType: 'audio/mpeg'
			};
			// Upload file and metadata to the object 'images/mountains.jpg'
			var uploadTask = storageRef.child('/audio/' + bid + '/' + chapterName).put(file, metadata);
			
			document.getElementById("cancel_btn").addEventListener('click', function() {
				console.log('cancel pressed');
				uploadTask.cancel();
			})

			// // Listen for state changes, errors, and completion of the upload.
			uploadTask.on(firebase.storage.TaskEvent.STATE_CHANGED, // or 'state_changed'
				(snapshot) => {
					// // Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
					var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
					console.log('Upload is ' + Math.round(progress) + '% done');
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

						document.getElementById("add_chapter_form").submit();
					});
				}
			);
			console.log('less');
		}
	}
	//   var storage = firebase.storage("gs://dilkiawaz-6854d.appspot.com");
</script>