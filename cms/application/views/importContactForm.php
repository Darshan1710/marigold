	<!-- Page content -->
	<div class="page-content">
		<!-- Main content -->
		<div class="content-wrapper">
			<!-- Content area -->
			<div class="content">
<!-- Colors -->
            	<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Import Contacts</h5>

						<div class="header-elements">
							<a href="<?php echo base_url()?>document/contacts.csv" class="btn btn-primary btn-sm mr-1"><i class="icon-file-download" download></i>   Sample File</a>
	                	</div>
					</div>

					<div class="card-body">
						

						<form action="<?php echo base_url()?>Admin/importContactData" method="post" enctype="multipart/form-data">
							

							<fieldset class="mb-3">
								<legend class="text-uppercase font-size-sm font-weight-bold"></legend>

								<div class="form-group row">
									<label class="col-form-label col-lg-2">Contacts</label>
									<div class="col-lg-10">
										<input type="file" class="form-control h-auto" name="file">
										<?php echo form_error('file')?>
									</div>
								</div>

							</fieldset>


							<div class="text-right">
								<button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
							</div>
						</form>
					</div>
				</div>
				<!-- /colors -->
			</div>
		</div>
	</div>