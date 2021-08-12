<div class="content-page">
	<!-- Start content -->
	<div class="content">
		<div class="container">

			<!-- Page-Title -->
			<div class="row">
				<div class="col-sm-12">
					<h4 class="page-title">Narrator</h4>
					<ol class="breadcrumb">
						<li>
							<a href="<?= base_url('dashboard') ?>">Dashboard</a>
						</li>
						<li>
							<a href="<?= base_url('narrator') ?>">Narrator List</a>
						</li>
						<li class="active">
							Edit
						</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div id="edit_narrator_msg"></div>
					<form id="edit_narrator_form" role="form" action="<?= base_url("narrator/modify/" . $record['id']) ?>" method="post" enctype="multipart/form-data">

						<div class="card-box">
							<h4 class="m-t-0 header-title"><b>Edit Narrator</b></h4></br></br>

							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label>Narrator Name</label>
										<input class="form-control" id="nar_name" name="nar_name" value="<?= $record['nar_name'] ?>" maxlength="50">
									</div>
									<div class="form-group">
										<label>Gender</label><br>
										<input type="radio" name="gender" value="male" <?= ($record['gender'] == "male" ? 'checked' : '') ?>> Male<br>
										<input type="radio" name="gender" value="female" <?= ($record['gender'] == "female" ? 'checked' : '') ?>> Female<br>
										<input type="radio" name="gender" <?= ($record['gender'] == "other" ? 'checked' : '') ?> value="other"> Other
									</div>

									<div class="form-group">
										<label>Country</label>
										<input class="form-control" id="country" name="country" value="<?= $record['country'] ?>" maxlength="50">
									</div>
									<div class="form-group">
										<label>city</label>
										<input class="form-control" id="city" name="city" value="<?= $record['city'] ?>" maxlength="50">
									</div>


									<div class="form-group">
										<label>Notes </label>
										<textarea class="form-control" placeholder="Enter Description" name="nar_desc" id="nar_desc" maxlength="400"><?= $record['nar_desc'] ?></textarea>
										<!--label class="error" generated="true" for="job_desc"></label-->
									</div>

									<!--	<div class="form-group">
										<label>Image</label>
											<input  type="file" name="up" id="nar_img" accept="Image/png,image/jpeg,image/gif">   
									</div>-->


									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
								<br />
								<!--<div class="col-lg-6">
										<?php
										if ($record['nar_img'] != "") {
										?>	
												<img src="<?= base_url('assets/narratorimages/' . $record['nar_img']) ?>" class="img-thumbnail" />
											<?php
										}
											?>
									</div>-->

							</div>
						</div>
					</form>
					</form>
				</div>
			</div>

		</div> <!-- container -->

	</div> <!-- content -->