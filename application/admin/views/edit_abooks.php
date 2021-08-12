<div class="content-page">
	<!-- Start content -->
	<div class="content">
		<div class="container">
			<!-- Page-Title -->
			<div class="row">
				<div class="col-sm-12">
					<h4 class="page-title">Age Filter Books</h4>
					<ol class="breadcrumb">
						<li>
							<a href="<?= base_url('dashboard') ?>">Dashboard</a>
						</li>
						<li>
							<a href="<?= base_url('books') ?>">Age Filter Books List</a>
						</li>
						<li class="active">
							Edit
						</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div id="edit_abooks_msg"></div>
					<form id="edit_abooks_form" role="form" action="<?= base_url("abooks/modify/" . $record['bkid']) ?>" method="post" enctype="multipart/form-data">
						<div class="card-box">
							<h4 class="m-t-0 header-title"><b>Edit Books</b></h4></br></br>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label>Age Filter</label>
										<select name="bk_age" id="bk_age" class="form-control required">
											<option value="">Select Age</option>
											<option value="Old">Old people</option>
											<option value="Adults">Adult</option>
											<option value="children">Children</option>
										</select>
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
										<label>Book Name</label>
										<input class="form-control" id="bk_name" name="bk_name" value="<?= $record['bk_name'] ?>">
									</div>
									<div class="form-group">
										<label>Description </label>
										<textarea class="form-control" placeholder="Enter Description" name="bk_desc" id="bk_desc"><?= $record['bk_desc'] ?></textarea>
										<!--label class="error" generated="true" for="job_desc"></label-->
									</div>
									<div class="form-group">
										<label>Image</label>
										<input type="file" name="up" id="bk_img" accept="Image/png,image/jpeg,image/gif">
									</div>
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
								<br>
								<div class="col-lg-6">
									<?php
									if ($record['bk_img'] != "") {
									?>
										<img src="<?= base_url('assets/bookimages/' . $record['bk_img']) ?>" class="img-thumbnail" />
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