<!DOCTYPE html>
<html lang="en">
   <!-- Mirrored from demo.interface.club/limitless/demo/bs4/Template/layout_1/LTR/default/full/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 May 2019 06:40:16 GMT -->
   <!-- Added by HTTrack -->
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <!-- /Added by HTTrack -->
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title><?php echo TITLE; ?></title>
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url() ?>css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url() ?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url() ?>css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url() ?>css/layout.min.css" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url() ?>css/components.min.css" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url() ?>css/colors.min.css" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url() ?>css/custom.css" rel="stylesheet" type="text/css">
      <!-- /global stylesheets -->
      <!-- Core JS files -->
      <script src="<?php echo base_url() ?>js/main/jquery.min.js"></script>
      <script src="<?php echo base_url()?>js/plugins/forms/styling/uniform.min.js"></script>
      <script src="<?php echo base_url() ?>js/main/bootstrap.bundle.min.js"></script>
      <script src="<?php echo base_url() ?>js/plugins/loaders/blockui.min.js"></script>
      <script src="<?php echo base_url() ?>js/demo_pages/form_checkboxes_radios.js"></script>
      <!-- /core JS files -->
      <!-- Theme JS files -->
      <script src="<?php echo base_url() ?>js/plugins/extensions/jquery_ui/interactions.min.js"></script>
      <script src="<?php echo base_url() ?>js/plugins/forms/selects/select2.min.js"></script>
      <script src="<?php echo base_url() ?>js/app.js"></script>
      <script src="<?php echo base_url() ?>js/demo_pages/form_select2.js"></script>
      <!-- /theme JS files -->
   </head>
   <body>
      <!-- Main navbar -->
      <?php $this->load->view('common/navbar'); ?>
      <!-- /main navbar -->
      <!-- Page content -->
      <div class="page-content">
         <?php $this->load->view('common/sidebar'); ?>
         <!-- Main content -->
         <div class="content-wrapper">
            <!-- Page header -->
            <div class="page-header page-header-light">
               <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                  <div class="d-flex">
                     <div class="breadcrumb">
                        <a href="<?php echo base_url()?>Admin/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                        <span class="breadcrumb-item active">Dashboard</span>
                     </div>
                     <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                  </div>
               </div>
            </div>
            <!-- /page header -->
            <!-- Content area -->
            <div class="content">
              <?php if(!empty($menu)){ ?>
               <!-- Main charts -->
               <div class="row">
                  <!-- Page content -->
                  <div class="page-content">
                     <!-- Main content -->
                     <div class="content-wrapper">
                        <!-- Content area -->
                        <div class="content">
                           <!-- Colors -->
                           <div class="card">
                              
                              <div class="card-body">
                               <form method="post" action="<?php echo base_url()?>User/updatePermission">
                                 <div class="row">
                                    

                                    <?php 
                                    
                                    

                                    if($userdata){
                                       $userdata = explode(',', $userdata['permission']);
                                    }else{
                                       $userdata = array();
                                    }



                                    foreach($menu as $m){

                                    $sql = "SELECT * FROM submenu WHERE menu_id = ".$m['id'];
                                    $submenu = $this->db->query($sql)->result_array();
                                    
                                     
                                    ?>


                                    <div class="col-md-12 question-row">
                                       <div class="form-group mb-3 mb-md-2">
                                          <label class="font-weight-semibold"><?php echo  $m['menu']; ?></label>
                                          <div class="row checkbox-row">
                                             <?php 
                                             if($submenu){
                                             foreach ($submenu as $sm) {
                                             ?>
                                             <div class="form-check col-md-4">
                                                <label class="form-check-label">
                                                <input type="checkbox" name="permission[]" class="form-check-input-styled-success" <?php if(in_array($sm['id'], $userdata)){ echo 'checked';}?> data-fouc value="<?php echo $sm['id']?>">
                                                <?php echo $sm['submenu']?>
                                                </label>
                                             </div>
                                          <?php } } ?>

                                          </div>
                                       </div>
                                    </div>

                                 <?php }   ?>

                                 <div class="col-sm-12">
                                 <div class="form-group text-right">  
                                         <button type="submit" id="submit_button" class="col-sm-2 btn btn-primary pull-right">Submit <i class="icon-arrow-right14 position-right"></i></button>          
                                 </div>
                                 </div>
                                  
                                 </div>
                                 </form>
                              </div>
                           </div>
                           <!-- /colors -->
                        </div>
                     </div>
                  </div>
               </div>
               <!-- /main charts -->
             <?php }else{ ?>
              <div><h3 class="text-center">No data available</h3></div>
             <?php } ?>
            </div>
            <!-- /content area -->
            <?php $this->load->view('common/footer'); ?>
         </div>
         <!-- /main content -->
      </div>
      <!-- /page content -->
   </body>
   <!-- Mirrored from demo.interface.club/limitless/demo/bs4/Template/layout_1/LTR/default/full/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 May 2019 06:58:13 GMT -->
</html>
<input type="hidden" name="base_url" value="<?php echo base_url()?>" id="base_url">
<!-- /content area -->