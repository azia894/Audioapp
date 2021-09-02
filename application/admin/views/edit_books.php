<div class="content-page">
	<!-- Start content -->
	<div class="content">
		<div class="container">

			<!-- Page-Title -->
			<div class="row">
				<div class="col-sm-12">
					<h4 class="page-title"> Edit Book - <?php echo $record['bk_name'] ?></h4>
					<ol class="breadcrumb">
						<li>
							<a href="<?= base_url('dashboard') ?>">Dashboard</a>
						</li>
						<li>
							<a href="<?= base_url('books') ?>">Books List</a>
						</li>
						<li class="active">
							Edit
						</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div id="edit_books_msg"></div>
					<form id="edit_books_form" role="form" action="<?= base_url("books/modify/" . $record['bkid']) ?>" method="post" enctype="multipart/form-data">
						<div class="card-box">
							<h4 class="m-t-0 header-title"><b>Edit Books</b></h4></br></br>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label>Title</label>
										<input class="form-control" id="bk_name" name="bk_name" value="<?= $record['bk_name'] ?>" maxlength="100">
									</div>
									<div class="form-group">
										<label>Authors</label>
										<select name="author_id" id="author_id" class="form-control">
											<option value="0">Select Author</option>
											<?php
											if ($get_data['num'] > 0) {
												foreach ($get_data['data'] as $c) {
											?>
													<option <?= ($record['author_id'] == $c->id ? 'selected' : '') ?> value="<?= $c->id ?>"><?= $c->aut_name ?></option>
											<?php
												}
											}
											?>
										</select>
									</div>
									<div class="form-group">
										<label>Year Of Publication</label>
										<input type="number" min="0" class="form-control" id="bk_year" name="bk_year" value="<?= $record['bk_year'] ?>">
									</div>
									<div class="form-group">
										<label>Genre/Subject</label>
										<select name="sub_id" id="sub_id" class="form-control">
											<option value="">Select Subject/Genre</option>
											<?php
											if ($get_sub['num'] > 0) {
												foreach ($get_sub['data'] as $s) {
											?>
													<option <?= ($record['sub_id'] == $s->id ? 'selected' : '') ?> value="<?= $s->id ?>"><?= $s->sub_name ?></option>
											<?php
												}
											}
											?>
										</select>
									</div>
									<div class="form-group">
										<label>Age</label>
										<select name="bk_age" id="bk_age" class="form-control required">
											<option value="">Select Age</option>
											<option <?= ($record['bk_age'] == "Old" ? 'selected' : '') ?> value="Old">Old people</option>
											<option <?= ($record['bk_age'] == "Adults" ? 'selected' : '') ?> value="Adults">Adult</option>
											<option <?= ($record['bk_age'] == "children" ? 'selected' : '') ?> value="children">Children</option>
										</select>
									</div>
									<div class="form-group">
										<label>Blurb</label>
										<input class="form-control" id="bk_blurb" name="bk_blurb" value="<?= $record['bk_blurb'] ?>" maxlength="100">
									</div>
									<div class="form-group">
										<label>Tags</label>
										<input class="form-control" id="bk_tags" name="bk_tags" value="<?= $record['bk_tags'] ?>" maxlength="100">
									</div>
									<div class="form-group">
										<label>Description </label>
										<textarea class="form-control" placeholder="Enter Description" name="bk_desc" id="bk_desc" maxlength="3000"><?= $record['bk_desc'] ?></textarea>
										<!--label class="error" generated="true" for="job_desc"></label-->
									</div>
									<div class="form-group row">
										<div class="col-md-6">
											<label>Image</label>
											<input type="hidden" hidden name="bk_img" id="bk_img" value="<?=$record['bk_img'] ?>">
											<input type="file" name="upload_book_img" id="upload_book_img"
											accept="Image/png,image/jpeg,image/gif" value="<?=$record['bk_img']?>">
										</div>
										<div class="col-md-6" style="padding-top: 18px; padding-left: 30px">
											<button type="button" disabled id="uploadBtn" class="btn btn-primary" onClick="new_book()">Upload image</button> 
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
									<button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
								</div>
								<br>
								<div class="col-lg-6">
									<?php
									if ($record['bk_img'] != "") {
									?>
										<img src="<?=$record['bk_img'] ?>" class="img-thumbnail" />
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

	function new_book() {
	// 	document.getElementById(
	// 'add_book_form').addEventListener('submit', add_book_form);
		var name = document.getElementById('bk_name').value;
		var file = document.getElementById('upload_book_img').files[0];
		var filename = document.getElementById('upload_book_img').value;

		const extension = filename.split('.').pop();
		var bookName = Math.floor(Math.random() * 100000) + '.' + extension;

		if(file) {
			// Create the file metadata
			var metadata = {
				contentType: 'image/jpeg'
			};
			// Upload file and metadata to the object 'images/mountains.jpg'
			var uploadTask = storageRef.child('/bookImages/'+ bookName).put(file, metadata);
			
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
						document.getElementById("bk_img").value = downloadURL;						
						$('#submitBtn').prop('disabled', false);
					});
				}
			);
			console.log('less');
		}
	}
	document.getElementById("upload_book_img").addEventListener('change', function(event) {
			var target = event.currentTarget;
			var file = target.files[0];
			var reader = new FileReader();

			if (target.files && file) {
				var reader = new FileReader();
				$('#uploadBtn').prop('disabled', false);
				$('#submitBtn').prop('disabled', true);
				reader.readAsDataURL(file);
			}
		}, false);
</script>