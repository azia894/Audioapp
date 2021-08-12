<div class="content-page">
	<!-- Start content -->
	<div class="content">
		<div class="container">
			<!-- Page-Title -->
			<div class="row">
				<div class="col-sm-12">
					<?php
					$id = $this->uri->segment('3');
					$this->load->model('books_model');
					$md = $this->books_model->getbName($id);
					$m_name = $md['bk_name'];
					?>
					<h4 class="page-title">
						<p class="thicker"><?= ucwords($m_name); ?> Book</p>/Chapters List
					</h4>
					<ol class="breadcrumb">
						<li>
							<a href="<?= base_url('dashboard') ?>">Dashboard</a>
						</li>
						<li class="active">
							Chapters List
						</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<a style=" text-decoration: none; color:white" href="<?= base_url('chapter/add/' . $this->uri->segment('3')) ?>"><button type="button" class="btn btn-primary"> Add Chapters </a></button>
					<br></br>

					<?php
					if ($this->session->flashdata('success')) {
					?>
						<div class="alert alert-success alert-dismissible fade in" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">�</span></button>
							<strong><?= $this->session->flashdata('success') ?></strong>
						</div>
					<?php
					}
					if ($this->session->flashdata('invalid')) {
					?>
						<div class="alert alert-danger alert-dismissible fade in" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">�</span></button>
							<strong><?= $this->session->flashdata('invalid') ?></strong>
						</div>
					<?php
					}
					?>
					<div class="card-box table-responsive">

						<h4 class="m-t-0 header-title"><b>Chapters</b></h4>

						<p class="text-muted font-13 m-b-30">

						</p>

						<table class="table table-striped table-bordered dt-responsive" data-page-length="25" id="example" data-order="[[ 1, &quot;asc&quot; ]]">
							<thead>
								<tr>

									<th>Chapter Name</th>
									<th>Audio</th>
									<th>No.of times Listened</th>
									<th>Created On</th>
									<th>Status</th>
									<th>Actions</th>
									<th>Delete</th>
								</tr>
							</thead>

							<tbody>
								<?php
								if ($ch_view == NULL) {
								?>
									<tr align="center">
										<td colspan="4">No Data to display</td>
									</tr>
									<?php
								} else {
									foreach ($ch_view as $row) {
									?>
										<tr>

											<td><?php echo $row->ch_name; ?></td>
											<td><audio controls>
													<source src="<?php echo $row->ch_audio ?>" type="audio/ogg">
													<source src="<?php echo $row->ch_audio ?>" type="audio/mpeg">
													Your browser does not support the audio element.
												</audio></td>
											<td><?php echo $row->count; ?></td>
											<td><?php echo $row->created_on; ?></td>
											<td>
												<?php if ($row->ch_status == '1') { ?>
													<a href="<?= base_url('chapter/deactivech/' . $row->bid . '/' . $row->id) ?>"><span class="label label-success">Active</span></a>
												<?php } else { ?>
													<a href="<?= base_url('chapter/activech/' . $row->bid . '/' . $row->id) ?>"><span class="label label-pink">In-Active</span></a>
												<?php 	}
												?>
											</td>
											<td><a href="<?= base_url('chapter/edit/' . $row->bid . '/' . $row->id) ?>" class="label label-info" md-ink-ripple="">Edit</a></td>
											<td><a id="delete" class="label label-danger" md-ink-ripple="">Delete</a></td>
											<!-- href="<?= base_url('chapter/chdel/' . $row->bid . '/' . $row->id) ?>"  -->
										</tr>
								<?php
									}
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div> <!-- container -->
	</div> <!-- content -->
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
	$(document).ready(function() {
		$('#example').DataTable();
		$("#example #delete").click(function() {
			if(confirm("confirm to delete")){
				console.log('delete');
				window.location.href = "<?= base_url('chapter/chdel/' . $row->bid . '/' . $row->id) ?>"
			} else {
			}
		})
	});
</script>