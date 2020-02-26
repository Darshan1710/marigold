<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from ygamin.bitbucket.io/groggery/1.1.0/index_default.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 May 2019 05:27:35 GMT -->
<head>
	    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/favicon/favicon_Groggery.ico">

    <title><?php echo TITLE; ?> | Bar & Restaurant</title>


    <!-- CSS Global -->
    <link href="<?php echo base_url()?>css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/bootstrap_limitless.min.css" rel="stylesheet">
    <script src="<?php echo base_url()?>plugins/jquery/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url()?>bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>js/bootstrap-datepicker.min.js"></script>
	<script src="<?php echo base_url()?>js/bootstrap.bundle.min.js"></script>

    <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url() ?>">
    <!-- hello -->
    <!-- jay -->

  </head>
  <body data-spy="scroll" data-target=".navbar" data-offset="70">

    <!-- TO THE TOP BUTTON
    ================================================== -->
<!--     <a id="back-to-top" href="#section_welcome" class="btn btn-primary back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left">
      <i class="ion-android-arrow-up"></i>
    </a> -->

    <!-- PRELOADER
    ================================================== -->
    <div class="loader">
	<center>
	 <img class="loading-image" src="<?php echo base_url()?>img/loader.gif" alt="loading..">
	</center>
	</div>



    <!-- section welcome -->
    <section class="section_welcome" id="section_welcome">
      <div class="container mt-4">
        <div class="row">
          	<div class="col-sm-8 logo-row text-center">

	            <div class="welcome_content">
	              <h1 class="welcome_content_heading mt-10"><img src="<?php echo base_url()?>img/logo1.png" class="col-md-6 text-center center-block img-responsive"></h1>
	              <!-- <p class="welcome_content_subheading mb-5">Bar & Restro Lounge</p> -->
<!-- 	              <ul class="welcome_content_logo">
	                <li><i class="icon ion-ios-minus-empty"></i></li>
	                <li><i class="icon ion-fork"></i></li>
	                <li><i class="icon ion-wineglass"></i></li>
	                <li><i class="icon ion-knife"></i></li>
	                <li><i class="icon ion-ios-minus-empty"></i></li>
	              </ul> -->
	           <!--    <h6 class="welcome_content_caption">Thank you for chossing us to have your food & drinks !!</h6> -->
	            </div> <!-- .welcome_content -->
          	</div>
        	<div class="col-sm-4 vcenter">

            <div class="welcome_content">
	          	<form id="customerForm" action="#" method="post">
				  
				  <!-- Table -->
				  <div class="form-group">
				    <label for="name" class="label">Table No *</label>
				    <select class="select-form-control" name="table" id="table">
				    	<option value="">Please Select Table</option>
				    	<?php foreach($table as $row){?>
				    	<option value="<?php echo $row['id']; ?>"><?php echo $row['name']?></option>
				    	<?php } ?>
				    </select>
				  </div>

				  <!-- Name -->
				  <div class="form-group">
				    <label for="name" class="label">Name *</label>
				    <input type="text" name="name" class="customer-form-control" id="name" placeholder="Enter your name">
				  </div>

				  <!-- Message -->
				  <div class="form-group">
				    <label for="mobile" class="label">Mobile *</label>
				    <input type="number"  name="mobile" class="customer-form-control" id="mobile"  placeholder="Enter your mobile"  minlength="10" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" id="mobile">
				  </div>


				  <!-- Email -->
				  <div class="form-group">
				    <label for="date" class="label">Birth Date</label>
				    <input type='text' class="birthdate customer-form-control"  name="birthdate" placeholder="dd-mm-yyyy" id="birthdate" readonly/>
				  </div>

				  <!-- Email -->
				  <div class="form-group">
				    <label for="anniversary_date" class="label">Anniversary Date</label>
				    <input type='text' class="anniversary_date customer-form-control"  name="anniversary_date" placeholder="dd-mm-yyyy" id="anniversary_date" readonly/>
				  </div>

				  <!-- Email -->
				  <div class="form-group">
				    <label for="email" class="label">Email address</label>
				    <input type="email" name="email" class="customer-form-control" id="email" placeholder="Enter your email address">
				  </div>

				  <!-- Submit -->
				  <button type="submit" class="btn btn-default col-sm-12 customer-submit">
				    SUBMIT
				  </button>

				</form>   	
              
          	</div>
        	</div> 
      	</div> <!-- .row -->
  	  </div><!-- .container -->
      <div class="welcome_bg"></div>
    </section>


    <!-- Inline form modal -->
	<div id="family_registration" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-full">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Family Registration Form</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-header">
					<div class="error_message">
					</div>
				</div>
				<form action="#" class="form-inline justify-content-center" id="family_registration_form">
				<div class="modal-body">
				
								<div class="form-row mb-3">

								<div class="col-md-2">
									<input type="text" name="name_1" id="name_1" placeholder="Your username" class="form-control mb-2 mr-sm-2 ml-sm-2 mb-sm-0">
								</div>

								<div class="col-md-2">
									<input type="text" name="mobile_1" id="mobile_1" placeholder="Your mobile" class="form-control mb-2 mr-sm-2 ml-sm-2 mb-sm-0" minlength="10" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
								</div>

								<div class="col-md-2">
									<input type="text" name="email_1" id="email_1" placeholder="Your email" class="form-control mb-2 mr-sm-2 ml-sm-2 mb-sm-0">
								</div>

								<div class="col-md-2">
									<input type="text" name="birthdate_1" id="birthdate_1" placeholder="Your birthdate" class="birthdate form-control mb-2 mr-sm-2 ml-sm-2 mb-sm-0" readonly>
								</div>

								<div class="col-md-2">
									<input type="text" name="anniversary_date_1" id="anniversary_date_1" placeholder="Your anniversary date" class="anniversary_date form-control mb-2 mr-sm-2 ml-sm-2 mb-sm-0" readonly>
								</div>
								<input type="hidden" name="count" id="count" value="1">
								<div class="col-md-2">
									<button type="button" class="btn bg-primary ml-sm-2 mb-sm-0 add_more"><i class="icon-plus22"></i> Add More</button>
								</div>	
								
									</div>
					</div>
					<div class="modal-footer">
						<a href="<?php echo base_url()?>Admin/feedback" class="btn btn-link">Skip</a>
						<button type="submit" class="btn bg-primary">Submit form</button>
					</div>
					</form>
			</div>
		</div>
	</div>
	<!-- /inline form modal -->

    
    <script src="<?php echo base_url()?>js/custom.js"></script>

  </body>

</html>
