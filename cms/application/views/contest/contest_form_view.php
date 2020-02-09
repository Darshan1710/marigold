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
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>font-awesome/css/font-awesome.min.css">	
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/sidebar.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">   
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui.min.css">
       
    <script src="<?php echo base_url(); ?>js/jquery-3.3.1.min.js"></script>    
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>    
    <script src="<?php echo base_url(); ?>js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
    
    <style>
    	.btn-primary{
    		color: #fff;
    		background-color: #337ab7;
    		border-color: #2e6da4;
    	}

    	.btn{
    		display: inline-block;
    		padding: 6px 12px;
    		margin-bottom: 0;
    		margin-top: 10px;
    		font-size: 14px;
    		font-weight: 400;
    		line-height: 1.42857143;
    		text-align: center;
    		white-space: nowrap;
    		vertical-align: middle;
    		touch-action: manipulation;
    		cursor: pointer;
    		user-select: none;
    		background-image: none;
    		border: 1px solid transparent;
    		border-radius: 4px;
    	}
	</style>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-sm-offset-3 col-sm-6 form-box">
			<h3><?php echo $contest_name; ?></h3>
			<form method = "post" action="<?php echo 'http://destasiddhi.com/androidapp/index.php/contest/save_form_answers'?>" enctype="multipart/form-data">
				<input type="hidden" name="language" value="<?php echo $language; ?>">
			<?php 
			if(isset($form['questions']) && !empty($form['questions'])){			
			for($i=1;$i<=$num_fields;$i++){  ?>
					<div class="form-group">		
					<label for="answer_<?php echo $i ?>" style="font-size: 16px"><?php echo $i.". ". $form['questions'][$i-1]['question_text'] ?></label>
					<br>
					<?php if($form['questions'][$i-1]['answer_type'] == "text"){ ?>
							<input type="text" name="answer_<?php echo $i ?>" class="form-control" required>
					<?php } else{ 
								if($form['questions'][$i-1]['answer_type'] == 'radio'){
									$options = explode(",", $form['questions'][$i-1]['element_type']);
									for($j=0;$j<count($options);$j++){
										echo ' <label><input type="radio" name="answer_'.$i.'" value="'.$options[$j].'" required>&nbsp'.ucwords($options[$j]).' </label>&nbsp&nbsp&nbsp&nbsp' ;
									}
								}
								else{
									$options = explode(",", $form['questions'][$i-1]['element_type']);	
									echo ' <label class="checkbox-inline"><input type="checkbox" name="answer_'.$i.'" value="'.$options[$j].'" required>'.ucwords($options[$j]).' </label>' ;
								}
							} ?>
					
					
				</div>
			<?php } } ?>	
			<input type = "hidden" name='num_fields' value="<?php echo $num_fields ?>">
			<input type = "hidden" name='contest_id' value="<?php echo $contest_id ?>">
			<input type = "hidden" name='farmer_id' value="<?php echo $farmer_id ?>">
			<button type="submit" class="btn btn-primary">Submit</button>		
		</div>
	</div>
</div>
</form>
</br>
</br>
</body>
