
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title><?php echo TITLE; ?></title>

   <!-- Global stylesheets -->
   <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url()?>css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url()?>css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url()?>css/layout.min.css" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url()?>css/components.min.css" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url()?>css/colors.min.css" rel="stylesheet" type="text/css">
   <!-- /global stylesheets -->

   <!-- Core JS files -->
   <script src="<?php echo base_url()?>js/main/jquery.min.js"></script>
   <script src="<?php echo base_url()?>js/main/bootstrap.bundle.min.js"></script>
   <script src="<?php echo base_url()?>js/plugins/loaders/blockui.min.js"></script>
   <!-- /core JS files -->

</head>

<body class="bg-slate-800">

   <!-- Page content -->
   <div class="page-content">

      <!-- Main content -->
      <div class="content-wrapper">

         <!-- Content area -->
         <div class="content d-flex justify-content-center align-items-center">

            <!-- Login card -->
            <form class="login-form" action="<?php echo base_url('Admin/login')?>" method="post">
               <div class="card mb-0">
                  <div class="card-body">
                     <div class="text-center mb-3">
                        <i class="icon-people icon-2x text-warning-400 border-warning-400 border-3 rounded-round p-3 mb-3 mt-1"></i>
                        <h5 class="mb-0">Login to your account</h5>
                        <span class="d-block text-muted">Your credentials</span>
                     </div>

                     <div class="form-group form-group-feedback form-group-feedback-left">
                        <div class="form-control-feedback">
                           <i class="icon-user text-muted"></i>
                        </div>
                        <input type="text" class="form-control" placeholder="Username" value="<?php echo set_value('username');?>" name="username">
                        <?php echo form_error('username');?>
                     </div>

                     <div class="form-group form-group-feedback form-group-feedback-left">
                        <div class="form-control-feedback">
                           <i class="icon-lock2 text-muted"></i>
                        </div>
                        <input type="password" class="form-control" placeholder="Password" value="<?php echo set_value('password')?>" name="password">
                        <?php echo form_error('password');?>
                     </div>


                     <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 ml-2"></i></button>
                     </div>

                  </div>
               </div>
            </form>
            <!-- /login card -->

         </div>
         <!-- /content area -->

      </div>
      <!-- /main content -->

   </div>
   <!-- /page content -->

</body>

<!-- Mirrored from demo.interface.club/limitless/demo/bs4/Template/layout_1/LTR/default/full/login_background.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 May 2019 07:14:40 GMT -->
</html>

<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Restro</title>

   <!-- Global stylesheets -->
   <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url()?>css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url()?>css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url()?>css/layout.min.css" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url()?>css/components.min.css" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url()?>css/colors.min.css" rel="stylesheet" type="text/css">
   <!-- /global stylesheets -->

   <!-- Core JS files -->
   <script src="<?php echo base_url()?>js/main/jquery.min.js"></script>
   <script src="<?php echo base_url()?>js/main/bootstrap.bundle.min.js"></script>
   <script src="<?php echo base_url()?>js/plugins/loaders/blockui.min.js"></script>
   <!-- /core JS files -->

</head>

<body class="bg-slate-800">

   <!-- Page content -->
   <div class="page-content">

      <!-- Main content -->
      <div class="content-wrapper">

         <!-- Content area -->
         <div class="content d-flex justify-content-center align-items-center">

            <!-- Login card -->
            <form class="login-form" action="<?php echo base_url('Admin/login')?>" method="post">
               <div class="card mb-0">
                  <div class="card-body">

                     <div class="form-group form-group-feedback form-group-feedback-left">
                        <div class="form-control-feedback">
                           <i class="icon-user text-muted"></i>
                        </div>
                        <input type="text" class="form-control" placeholder="Username" value="<?php echo set_value('username');?>" name="username">
                        <?php echo form_error('username');?>
                     </div>


                     <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 ml-2"></i></button>
                     </div>

                  </div>
               </div>
            </form>
            <!-- /login card -->

         </div>
         <!-- /content area -->

      </div>
      <!-- /main content -->

   </div>
   <!-- /page content -->

</body>


</html>
