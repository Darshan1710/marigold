
	<!DOCTYPE html>
	<html lang="en">
	  

	<head>
	      <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/favicon/favicon_Groggery.ico">

    <title><?php echo TITLE; ?> | Bar & Restaurant</title>


    <!-- CSS Global -->
    <link href="<?php echo base_url()?>css/styles.css" rel="stylesheet">
    <link href="<?php echo base_url()?>css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url()?>cms/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <script src="<?php echo base_url()?>plugins/jquery/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url()?>bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>cms/js/bootstrap-datepicker.min.js"></script>
    <!-- hello -->
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
	    <div id="loader-wrapper">
	      <div id="loader"></div>
	    </div>



	     <section class="section_review">
	      <div class="container">
	        <div class="row">
	          <div class="col-sm-4">
	            <h2 class="section_review_title">A few words about us...</h2>
	          </div>
	          <div class="col-sm-8">
	            <form id="form_sendemail" action="<?php echo base_url('Admin/updateFeedback')?>" method="post" autocomplete="off">

					  <!-- Name -->
					 <div class="form-group">
					    <label for="name" class="fsr-only">1. Quality of food  ?</label>
					    <div class="row">
						    <div class="radio radio-inline col-md-4">
						      <label><input type="radio" name="question_1" value="3" <?php echo set_radio('question_1','3',$rating['question_1'] == 3 ? true : false)?>>Execellent</label>
						    </div>
						    <div class="radio radio-inline col-md-4">
						      <label><input type="radio" name="question_1" value="2" <?php echo set_radio('question_1','3',$rating['question_1'] == 2 ? true : false)?>>Good</label>
						    </div>
						    <div class="radio radio-inline col-md-4">
						      <label><input type="radio" name="question_1" value="1" <?php echo set_radio('question_1','3',$rating['question_1'] == 1 ? true : false)?>>Average</label>
						    </div>
						    

						  </div>

					</div>
					 <div class="form-group">
					    <label for="name" class="fsr-only">2. Cleanliness of Restaurant / Rest Room ?</label>
					    <div class="row">
						    <div class="radio radio-inline col-md-4">
						      <label><input type="radio" name="question_2" value="3" <?php echo set_radio('question_2','3',$rating['question_2'] == 3 ? true : false)?>>Execellent</label>
						    </div>
						    <div class="radio radio-inline col-md-4">
						      <label><input type="radio" name="question_2" value="2" <?php echo set_radio('question_2','3',$rating['question_2'] == 2 ? true : false)?>>Good</label>
						    </div>
						    <div class="radio radio-inline col-md-4">
						      <label><input type="radio" name="question_2" value="1" <?php echo set_radio('question_2','3',$rating['question_2'] == 1 ? true : false)?>>Average</label>
						    </div>
						   
						  </div>

					</div>
					 <div class="form-group">
					    <label for="name" class="fsr-only">3. Quality of Service ?</label>
					    <div class="row">
						    <div class="radio radio-inline col-md-4">
						      <label><input type="radio" name="question_3" value="3" <?php echo set_radio('question_3','3',$rating['question_3'] == 3 ? true : false)?>>Execellent</label>
						    </div>
						    <div class="radio radio-inline col-md-4">
						      <label><input type="radio" name="question_3" value="2" <?php echo set_radio('question_3','3',$rating['question_3'] == 2 ? true : false)?>>Good</label>
						    </div>
						    <div class="radio radio-inline col-md-4">
						      <label><input type="radio" name="question_3" value="1" <?php echo set_radio('question_3','3',$rating['question_3'] == 1 ? true : false)?>>Average</label>
						    </div>
						    
						  </div>

					</div>
					
					 <div class="form-group">
					    <label for="name" class="fsr-only">4. Friendliness of Staff ?</label>
					    <div class="row">
						    <div class="radio radio-inline col-md-4">
						      <label><input type="radio" name="question_4" value="3" <?php echo set_radio('question_4','3',$rating['question_4'] == 3 ? true : false)?>>Execellent</label>
						    </div>
						    <div class="radio radio-inline col-md-4">
						      <label><input type="radio" name="question_4" value="2" <?php echo set_radio('question_4','3',$rating['question_4'] == 2 ? true : false)?>>Good</label>
						    </div>
						    <div class="radio radio-inline col-md-4">
						      <label><input type="radio" name="question_4" value="1" <?php echo set_radio('question_4','3',$rating['question_4'] == 1 ? true : false)?>>Average</label>
						    </div>
						    
						  </div>

					</div>
					 <div class="form-group">
					    <label for="name" class="fsr-only">5. Appearance of Staff ?</label>
					    <div class="row">
						    <div class="radio radio-inline col-md-4">
						      <label><input type="radio" name="question_5" value="3" <?php echo set_radio('question_5','3',$rating['question_5'] == 3 ? true : false)?>>Execellent</label>
						    </div>
						    <div class="radio radio-inline col-md-4">
						      <label><input type="radio" name="question_5" value="2" <?php echo set_radio('question_5','3',$rating['question_5'] == 2 ? true : false)?>>Good</label>
						    </div>
						    <div class="radio radio-inline col-md-4">
						      <label><input type="radio" name="question_5" value="1" <?php echo set_radio('question_5','3',$rating['question_5'] == 1 ? true : false)?>>Average</label>
						    </div>
						    
						  </div>

					</div>

					<div class="form-group">
					    <label for="name" class="fsr-only">6. Value for Money ?</label>
					    <div class="row">
						    <div class="radio radio-inline col-md-4">
						      <label><input type="radio" name="question_6" value="3" <?php echo set_radio('question_6','3',$rating['question_6'] == 3 ? true : false)?>>Execellent</label>
						    </div>
						    <div class="radio radio-inline col-md-4">
						      <label><input type="radio" name="question_6" value="2" <?php echo set_radio('question_6','3',$rating['question_6'] == 2 ? true : false)?>>Good</label>
						    </div>
						    <div class="radio radio-inline col-md-4">
						      <label><input type="radio" name="question_6" value="1" <?php echo set_radio('question_6','3',$rating['question_6'] == 1 ? true : false)?>>Average</label>
						    </div>
						    
						  </div>

					</div>
<div class="form-group">
					    <label for="name" class="fsr-only">7. Restaurant Interior Design ?</label>
					    <div class="row">
						    <div class="radio radio-inline col-md-4">
						      <label><input type="radio" name="question_7" value="3" <?php echo set_radio('question_7','3',$rating['question_7'] == 3 ? true : false)?>>Execellent</label>
						    </div>
						    <div class="radio radio-inline col-md-4">
						      <label><input type="radio" name="question_7" value="2" <?php echo set_radio('question_7','2',$rating['question_7'] == 2 ? true : false)?>>Good</label>
						    </div>
						    <div class="radio radio-inline col-md-4">
						      <label><input type="radio" name="question_7" value="1" <?php echo set_radio('question_7','1',$rating['question_7'] == 1 ? true : false)?>>Average</label>
						    </div>
						    
						  </div>

					</div>


					<div class="form-group">
					    <label for="name" class="fsr-only">Comment</label>
					    <div class="row">
					    	<div class="col-sm-8">
						    	<textarea class="form-control" rows="5" placeholder="Please Enter your comment....." name="comment"><?php echo $comment = set_value('comment') == false ? $rating['comment'] : set_value('comment'); ?></textarea>
							</div>
						  </div>

					</div>
					<input type="hidden" name="uid" value="<?php echo $uid = set_value('uid') == false ? $rating['uid'] : set_value('uid'); ?>">

					  
					  <!-- Submit -->
					  <button type="submit" class="btn btn-default col-sm-8">
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