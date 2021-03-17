<div class="content-page">
				<!-- Start content -->
				<div class="content">
					<div class="container">

						<!-- Page-Title -->
						<div class="row">
							<div class="col-sm-12">
								<h4 class="page-title">Coffee Details</h4>
								<ol class="breadcrumb">
									<li>
										<a href="<?=base_url('dashboard')?>">Dashboard</a>
									</li>
									<li>
										<a href="<?=base_url('coffee')?>">Coffee List</a>
									</li>									
									<li class="active">
										Details
									</li>
								</ol>
							</div>
						</div>

						<!-- Row start -->
						<div class="row">
							<div class="col-md-12">
								<div class="">
									<div class="card-box">
										<div class="row">
										<div class="col-lg-6">
									  
										   
											<div class="form-group">
												<label>Coffee Name: </label>
												<?=$record['coffee_name']?>
											</div>
											
											<div class="form-group">
												<label>Coffee Price: </label>
												<?=$record['coffee_price']?>
											</div>
											
											<div class="form-group">
												<label>Coffee Description: </label>
												<?=$record['coffee_desc']?>
											</div>

											<div class="form-group">
												<label>Status : </label>
												<?=($record['coffee_status']=='1')?'<span class="label label-success">Active</span>':'<span class="label label-warning">In-Active</span>'?>
											</div>
											
										   
											
									</div>
									<!-- /.col-lg-6 (nested) -->
									<div class="col-lg-6">
										<?php
											if($record['coffee_image']!=""){
										?>	
											<img src="<?=base_url('assets/coffee/'.$record['coffee_image'])?>" class="img-thumbnail" />
										<?php			
											}
										?>											
									</div>
											
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
						<!-- End of Row -->

						<!-- Row start -->
						</div>
					<!-- container -->

				</div>
				<!-- content -->

				