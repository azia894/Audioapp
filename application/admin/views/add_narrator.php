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
							<a href="<?= base_url('narrator') ?>">Narrator List</a>
						</li>
						<li class="active">
							Add
						</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-9">
					<div id="add_narrator_msg"></div>
					<form id="add_narrator_form" name="add_narrator_form" role="form" action="<?= base_url('narrator/create') ?>" method="post" enctype="multipart/form-data">
						<div class="card-box">
							<h4 class="m-t-0 header-title"><b>Add Narrator</b></h4></br></br>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label>Narrator Name</label>
										<input class="form-control" id="nar_name" name="nar_name" maxlength="50">
									</div>
									<div class="form-group">
										<label>Gender</label><br />
										  <input type="radio" id="male" name="gender" value="male">
										  <label for="male">Male</label><br>
										  <input type="radio" id="female" name="gender" value="female">
										  <label for="female">Female</label><br>
										  <input type="radio" id="other" name="gender" value="other">
										  <label for="other">Other</label>
									</div>
									<div class="form-group">
										<label>Country</label>
										<input class="form-control" id="country" name="country" maxlength="50">
									</div>
									<div class="form-group">
										<label>city</label>
										<input class="form-control" id="city" name="city" maxlength="50">
									</div>
									<div class="form-group">
										<label>Description </label>
										<textarea class="form-control" placeholder="Enter Description" name="nar_desc" id="nar_desc" maxlength="2000"></textarea>
										<!-- <label class="error" generated="true" for="job_desc">EROORR</label> -->
									</div>
									<!--	<div class="form-group">
										<label>Image</label>
											<input  type="file" name="up" id="nar_img" accept="Image/png,image/jpeg,image/gif">   
									</div>-->
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div> <!-- container -->
	</div> <!-- content -->
	<style>
		#gender-error{
			float: right;
		}
	</style>