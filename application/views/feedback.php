	<!DOCTYPE html>
	<html lang="en">
	  

	<head>
	      <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/favicon/favicon_Groggery.ico">

    <title><?php echo TITLE; ?> | Bar & Restaurant </title>


    <!-- CSS Global -->
    <link href="<?php echo base_url()?>css/styles.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <script src="<?php echo base_url()?>plugins/jquery/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url()?>bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>js/bootstrap-datepicker.min.js"></script>
    <!-- hello -->

    <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url() ?>">
    <!-- jay -->

	  </head>
	  <body data-spy="scroll" data-target=".navbar" data-offset="70">

	    <!-- TO THE TOP BUTTON
	    ================================================== -->
	    <a id="back-to-top" href="#section_welcome" class="btn btn-primary back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left">
	      <i class="ion-android-arrow-up"></i>
	    </a>

	    <!-- PRELOADER
	    ================================================== -->
	    <div class="loader">
		<center>
		 <img class="loading-image" src="<?php echo base_url()?>img/loader.gif" alt="loading..">
		</center>
		</div>



	     <section class="section_review">
	      <div class="container">
	        <div class="row">
	          <div class="col-sm-4">
	            <h2 class="section_review_title">A few words about us...</h2>
	          </div>
	          <div class="col-sm-8">
	            <form id="form_sendemail" action="#" method="post" autocomplete="off">

					  <!-- Name -->
					<!--  <div class="form-group">
					    <label for="name" class="fsr-only">1. Which Banquet Hall your event was held at  ?</label>
					    <div class="row">
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_1" value="Mimosa">Mimosa</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_1" value="Blossom-2">Blossom-2</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_1" value="Magnolia">Magnolia</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_1" value="Lilium">Lilium</label>
						    </div>
						</div>

						<div class="row">
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_1" value="Goldenrod">Goldenrod</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_1" value="Zinnia">Zinnia</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_1" value="Waterlily">Waterlily</label>
						    </div>
						    

						  </div>

					</div> -->
					 <!-- <div class="form-group">
					    <label for="name" class="fsr-only">2. When was your event held at ?</label>
					    <div class="row">
						    <div class="col-md-12">
						      <input type="text" name="question_2" class="form-control">
						    </div>						   
						  </div>

					</div> -->
					<!--  <div class="form-group">
					    <label for="name" class="fsr-only">3. How did you hear about our venue ?</label>
					    <div class="row">
						    
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_3" value="News Paper Add">News Paper Add</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_3" value="Hoarding">Hoarding</label>
						    </div>

						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_3" value="Word of mouth">Word of mouth</label>
						    </div>
						    
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_3" value="Reference">Reference</label>
						    </div>
						</div>

						<div class="row">
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_3" value="Just Dial">Just Dial</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_3" value="Walk-In">Walk-In</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_3" value="Online Search Platforms">Online Search Platforms</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_3" value="Sales Representative">Sales Representative</label>
						    </div>
						    
						  </div>

					</div>
				
					 <div class="form-group">
					    <label for="name" class="fsr-only">4. You chose this venue because of  ?</label>
					    <div class="row">
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_4" value="Brand Image">Brand Image</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_4" value="Value for money">Value for money</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_4" value="Location">Location</label>
						    </div>

						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_4" value="Infrastructure">Infrastructure</label>
						    </div>
						</div>


						<div class="row">
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_4" value="Facilities">Facilities</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_4" value="Recommendation">Recommendation</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_4" value="Services">Services</label>
						    </div>
						    
						  </div>

					</div> -->


					<div class="form-group">
					    <label for="name" class="fsr-only">1. Knowledge & Professionalism of the Sales Representative ?</label>
					    <div class="row">
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_1" value="5">Execellent</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_1" value="4">Good</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_1" value="3">Average</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_1" value="2">Below Average</label>
						    </div>
						</div>

						<div class="row">
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_1" value="1">Not applicable</label>
						    </div>
						    
						  </div>

					</div>
					<div class="form-group">
					    <label for="name" class="fsr-only">2. Booking Process ?</label>
					    <div class="row">
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_2" value="3">Execellent</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_2" value="2">Good</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_2" value="1">Average</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_2" value="1">Below Average</label>
						    </div>
						</div>

						<div class="row">
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_2" value="1">Not applicable</label>
						    </div>
						  </div>

					</div>

					<div class="form-group">
					    <label for="name" class="fsr-only">3. Quality & presentation of Food ?</label>
					    <div class="row">
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_3" value="5">Execellent</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_3" value="4">Good</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_3" value="3">Average</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_3" value="2">Below Average</label>
						    </div>
						</div>
						<div class="row">
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_3" value="1">Not applicable</label>
						    </div>
						  </div>

					</div>

					<div class="form-group">
					    <label for="name" class="fsr-only">4. Courtesy and helpfulness of the F&B Staff ?</label>
					    <div class="row">
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_4" value="5">Execellent</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_4" value="4">Good</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_4" value="3">Average</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_4" value="2">Below Average</label>
						    </div>
						</div>

						<div class="row">
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_4" value="1">Not applicable</label>
						    </div>
						  </div>

					</div>


					<div class="form-group">
					    <label for="name" class="fsr-only">5. Billing Proces ?</label>
					    <div class="row">
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_5" value="5">Execellent</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_5" value="4">Good</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_5" value="3">Average</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_5" value="2">Below Average</label>
						    </div>
						</div>

						<div class="row">
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_5" value="1">Not applicable</label>
						    </div>
						  </div>

					</div>

					<div class="form-group">
					    <label for="name" class="fsr-only">6. Guestrooms (if used) ?</label>
					    <div class="row">
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_6" value="5">Execellent</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_6" value="4">Good</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_6" value="3">Average</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_6" value="2">Below Average</label>
						    </div>
						</div>

						<div class="row">
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_6" value="1">Not applicable</label>
						    </div>
						  </div>

					</div>

					<div class="form-group">
					    <label for="name" class="fsr-only">7. Staff Courtesy and Efficiency ?</label>
					    <div class="row">
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_7" value="5">Execellent</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_7" value="4">Good</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_7" value="3">Average</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_7" value="2">Below Average</label>
						    </div>
						</div>

						<div class="row">
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_7" value="1">Not applicable</label>
						    </div>
						  </div>

					</div>

					<div class="form-group">
					    <label for="name" class="fsr-only">8.Cleanliness & Hygiene ?</label>
					    <div class="row">
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_8" value="5">Execellent</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_8" value="4">Good</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_8" value="3">Average</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_8" value="2">Below Average</label>
						    </div>
						</div>

						<div class="row">
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_8" value="1">Not applicable</label>
						    </div>
						  </div>

					</div>

					<div class="form-group">
					    <label for="name" class="fsr-only">9. Overall Experience ?</label>
					    <div class="row">
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_9" value="5">Execellent</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_9" value="4">Good</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_9" value="3">Average</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_9" value="2">Below Average</label>
						    </div>
						</div>

						<div class="row">
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_9" value="1">Not applicable</label>
						    </div>
						  </div>

					</div>

					<!-- <div class="form-group">
					    <label for="name" class="fsr-only">14. Would you recommend us to your contacts ?</label>
					    <div class="row">
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_14" value="3">Yes</label>
						    </div>
						    <div class="radio radio-inline col-md-3">
						      <label><input type="radio" name="question_14" value="2">No</label>
						    </div>
						  </div>
						  <br>
						  <div class="row">
						  <div class="col-md-12">
						  <label for="name" class="fsr-only">If yes, please specify their names and Phone Numbers</label>
						  <input type="text" name="referrer_name" class="form-control col-md-12" placeholder="Enter Name">
						  <input type="text" name="referrer_mobile" class="form-control col-md-12" placeholder="Enter Mobile">
							</div>	
					      </div>
					</div> -->

					<!-- <div class="form-group">
					    <label for="name" class="fsr-only">15. A staff you would highly recommend and why?  ?</label>
					    <div class="row">
						  <div class="col-md-12">
						  <input type="text" name="question_15" class="form-control col-md-12">
							</div>	
					      </div>
					</div> -->

					<div class="form-group">
					    <label for="name" class="fsr-only">16. Any other Comments & Suggestions :</label>
					    <div class="row">
					    	<div class="col-sm-12">
						    	<textarea class="form-control" rows="5" placeholder="Please Enter your comment....." name="comment"></textarea>
							</div>
						  </div>

					</div>

				<!-- 	<div class="form-group">
					    <label for="name" class="fsr-only">17. Overall Experience</label>
					    <div class="row">
					    	<div class="col-sm-12">
						    	<textarea class="form-control" rows="5" placeholder="Please Enter your comment....." name="question_17"></textarea>
							</div>
						  </div>

					</div> -->


					  
					  <!-- Submit -->
					  <button type="submit" class="btn btn-default col-sm-12">
					    Submit
					  </button>

					</form>   
	          </div>
	        </div> <!-- .row -->
	      </div> <!-- .container -->
	    </section>

	    <script src="<?php echo base_url()?>js/custom.js"></script>

	  </body>

	</html>