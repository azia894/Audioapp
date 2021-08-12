<div class="content-page">
<!-- Start content -->
	<div class="content">
		<div class="container">

			<!-- Page-Title -->
			<div class="row">
				<div class="col-sm-12">
					<h4 class="page-title">Author</h4>
					<ol class="breadcrumb">
						<li>
							<a href="<?= base_url('author') ?>">Author List</a>
						</li>
						<li class="active">
							Add
						</li>
					</ol>
				</div>
			</div>


			<div class="row">
				<div class="col-sm-9">
					<div id="add_author_msg"></div>
					<form id="add_Author_form" name="add_Author_form" role="form" action="<?= base_url('author/create') ?>" method="post" enctype="multipart/form-data">
						<div class="card-box">
							<h4 class="m-t-0 header-title"><b>Add Author</b></h4></br></br>

							<div class="row">
								<div class="col-lg-6">


									<div class="form-group">
										<label>Author Name</label>
										<input class="form-control" placeholder="Enter author name" id="aut_name" name="aut_name" maxlength="50">
									</div>

									<div class="form-group">
										<label>Description </label>
										<textarea class="form-control" placeholder="Enter Description" name="aut_desc" id="aut_desc" maxlength="2000"></textarea>
										<!--label class="error" generated="true" for="job_desc"></label-->
									</div>

									<div class="form-group row">
										<div class="col-md-6">
											<label>Image</label>
											<input type="hidden" name="aut_img" id="aut_img">
											<input type="file" name="upload_aut_img" id="upload_aut_img" accept="Image/png,image/jpeg">
										</div>
										<div class="col-md-6" style="padding-top: 18px; padding-left: 30px">
											<button type="button" class="btn btn-primary" onClick="new_author()">Upload image</button>
										</div>
									</div>
									<div class="row">
										<div class="progress" style="height: 18px; background-color: transparent;">
											<div class="progress-bar progress-bar-striped progress-bar-animate" role="progressbar"
												id="upload_progress" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0">
												<p id="progress" style="font-size: 12px;"></p>
											</div>
										</div>
									</div>
									<!-- <button type="submit" class="btn btn-primary" onClick="new_author()">Submit</button> -->
									<button type="submit" class="btn btn-primary" disabled id="submit">Submit</button>
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
	// firebase config
	// start
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

	function new_author() {
		document.getElementById(
			'add_Author_form').addEventListener('submit', add_Author_form);
		var name = document.getElementById('aut_name').value;
		var file = document.getElementById('upload_aut_img').files[0];
		var filename = document.getElementById('upload_aut_img').value;

		const extension = filename.split('.').pop();
		var authorName = Math.floor(Math.random() * 100000) + '.' + extension;
		if (!file) {
			console.log('more');
			// document.getElementById('alert').innerHTML = '<div class="alert alert-warning">' +
			// 	'<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' +
			// 	'<strong>Audio should be less than 60 mins</strong>' +
			// 	'</div>'
		} else {
			// Create the file metadata
			var metadata = {
				contentType: 'image/jpeg'
			};
			// Upload file and metadata to the object 'images/mountains.jpg'
			var uploadTask = storageRef.child('/authorImages/' + authorName).put(file, metadata);

			// document.getElementById("cancel_btn").addEventListener('click', function() {
			// 	console.log('cancel pressed');
			// 	uploadTask.cancel();
			// })

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
						document.getElementById("aut_img").value = downloadURL;
						$('#submit').prop('disabled', false);
						//document.getElementById("add_Author_form").submit();
					});
				}
			);
			console.log('less');
		}
		// document.getElementById("add_Author_form").submit();
	}
</script>