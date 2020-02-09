	<!-- Page content -->
	<div class="page-content">
		<!-- Main content -->
		<div class="content-wrapper">
			<!-- Content area -->
			<div class="content">
<!-- Colors -->
            	<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Message</h5>
					</div>

					<div class="card-body">
						

						<form action="<?php echo base_url()?>Admin/updateMessage" method="post" id="edit_message">
							
							<input type="hidden" name="id" value="<?php echo $id = set_value('id') == false ? $message_details['id'] : set_value('id'); ?>">

							<fieldset class="mb-3">
								<legend class="text-uppercase font-size-sm font-weight-bold"></legend>

								<div class="form-group row">
									<label class="col-form-label col-lg-2">Message</label>
									<div class="col-lg-10">
										<input type="text" class="form-control h-auto" name="message" value="<?php echo $message = set_value('message') == false ? $message_details['message'] : set_value('message'); ?>">
										<?php echo form_error('message')?>
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