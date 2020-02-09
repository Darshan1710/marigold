
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
 	
		<div class="container">
			<div class="row">
				<div class="col-md-offset-3 col-md-6">
					<p style="text-align: justify;">
						<?php if($language == 'english') {?>
						<div><?php echo $data['terms_and_condition']; ?></div>
						<?php }else if($language == 'marathi'){?>
							<div class="text-center"><?php echo $data['terms_and_condition']; ?></div>
						<?php } ?>
					</p>
				</div>				
			</div>
		</div>
</body>

</html>
	