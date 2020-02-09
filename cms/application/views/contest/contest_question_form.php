<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo TITLE; ?></title>
<!--
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
-->
	<meta name="description" content="Desta Siddhi: Only Farmer app which has thousands of products & attractive schemes.">
	<meta name="keywords" content="Club Factory"><title>Desta Siddhi</title>
	<meta property="og:site_name" content="Desta Siddhi">
	<meta property="og:title" content="Desta Siddhi" />
	<meta property="og:description" content="Desta Siddhi: Only Farmer app which has thousands of products & attractive schemes." />
	<meta property="og:image" itemprop="image" content="<?php echo base_url(); ?>uploads/siddhi_app_logo.png">
	<meta property="og:type" content="website" />
    <!--<link rel="stylesheet" href="<?php echo base_url(); ?>css/form-elements.css">-->    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>font-awesome/css/font-awesome.min.css">	
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/sidebar.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">   
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
       
    <!-- <script src="<?php echo base_url(); ?>js/jquery-3.3.1.min.js"></script>   -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>js/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>js/owl.carousel.min.js"></script>


    <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>">
</head>
<body>
 	


				<div class="col-md-offset-3 col-md-6">
					<div class="col-sm-12">
					<?php if(isset($gift)){?>
						<?php foreach($gift as $g_row){?>
							<div class="col-sm-4 gift-section" >
								<img src="<?php echo $g_row['image'] ?>" class="rounded-circle" width="50px" height="50px">
								<div class="gift-name"><b><?php echo $g_row['name']?></b></div>
							</div>
						<?php } ?>
					<?php } ?>
					</div>
					<div class="col-sm-12">
					<div class="question-section">
					<form action="<?php echo base_url() ?>index.php/Contest/addAnswer" method="post">
					<?php if(isset($error)) {?><p class="text-center"><?php echo $error; ?></p><?php } ?>
					
					
						<?php 
						if(isset($question) && !empty($question)){
						foreach($question as $row){ ?>
									<div class="form-group">		
										  <p><b>Q. <?php echo $row['question_text']?></b> </p>
									
									<?php if($row['element_type'] == "text"){ ?>
											<input type="text" name="answer" class="form-control">
									<?php } else if($row['element_type'] == 'radio'){ 
											$options = explode(',',$row['element_text']);
											foreach ($options as $value) { ?>
 											<label class="radio-inline"><input type="radio" name="answer" value="<?php echo $value; ?>"><?php echo $value; ?></label>
									<?php } }else if($row['element_type'] == 'checkbox'){
											$options = explode(',', $row['element_text']);
											foreach ($options as $value) { ?>
											<label class="checkbox-inline"><input type="checkbox" name="answer[]" value="<?php echo $value; ?>"><?php echo $value; ?></label>
									<?php } }else if($row['element_type'] == 'select'){ 
											$options = explode(',',$row['element_text']);
											
											?> 
											<select class="form-control">
									<?php 	foreach($options as $value){?>
											<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
									<?php   } ?>
											</select>		
									<?php 	} ?>
										<p class="error"><?php echo form_error('answer'); ?></p>
								</div>
							<?php } } ?>

							<?php if(isset($contest) && isset($question) && !empty($contest) && !empty($question)){?>
								<input type="hidden" name="question_id" value="<?php echo $question[0]['question_id']; ?>">
								<input type="hidden" name="element_type" value="<?php echo $question[0]['element_type']; ?>">
								<input type="hidden" name="contest_id" value="<?php echo $contest['id']; ?>">
								<input type="hidden" name="farmer_id" value="<?php echo $farmer_id; ?>">
								<input type="submit" value="submit" class="btn btn-primary">
							<?php } ?>
							</form>
						</div>
						</div>
						<div class="col-sm-12">
							<?php if(isset($deep_link)){
								echo $deep_link;
							 } ?>
						</div>
				</div>				


</body>

</html>
	