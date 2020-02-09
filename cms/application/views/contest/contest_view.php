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
      <link href="http://localhost/restro/cms/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
      <link href="http://localhost/restro/cms/css/bootstrap.min.css" rel="stylesheet" type="text/css">
      <link href="http://localhost/restro/cms/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
      <link href="http://localhost/restro/cms/css/layout.min.css" rel="stylesheet" type="text/css">
      <link href="http://localhost/restro/cms/css/components.min.css" rel="stylesheet" type="text/css">
      <link href="http://localhost/restro/cms/css/colors.min.css" rel="stylesheet" type="text/css">
      <link href="http://localhost/restro/cms/css/custom.css" rel="stylesheet" type="text/css">
      <!-- /global stylesheets -->
      <!-- Core JS files -->
      <script src="http://localhost/restro/cms/js/main/jquery.min.js"></script>
      <script src="http://localhost/restro/cms/js/plugins/forms/styling/uniform.min.js"></script>
      <script src="http://localhost/restro/cms/js/main/bootstrap.bundle.min.js"></script>
      <script src="http://localhost/restro/cms/js/plugins/loaders/blockui.min.js"></script>
      <script src="http://localhost/restro/cms/js/demo_pages/form_checkboxes_radios.js"></script>
      <!-- /core JS files -->
      <!-- Theme JS files -->
      <script src="http://localhost/restro/cms/js/plugins/extensions/jquery_ui/interactions.min.js"></script>
      <script src="http://localhost/restro/cms/js/plugins/forms/selects/select2.full.min.js"></script>
      <script src="http://localhost/restro/cms/js/app.js"></script>
      <script src="http://localhost/restro/cms/js/demo_pages/form_select2.js"></script>
      <!-- /theme JS files -->
   </head>
   <body>
      <!-- Main navbar -->
      <!-- Main navbar -->

      <!-- /main navbar -->
      <input type="hidden" name="base_url" id="base_url" value="http://localhost/restro/cms/">    <!-- /main navbar -->
      <!-- Page content -->
      <div class="page-content">

         <!-- Main content -->
         <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">
               <!-- Main charts -->
               <div class="row">
                  <!-- Page content -->
                  <div class="page-content">
                     <!-- Main content -->
                     <div class="content-wrapper">
                        <!-- Content area -->
                        <div class="content">
                           <!-- Colors -->
                           <div class="card col-md-8 offset-2">

                              <div class="card-body">
                                 <form method="post" id="contest" action="<?php echo base_url() ?>Contest/addAnswer">
                                 <div class="row">
                                    <?php 
                                    $i = 1;
                                    foreach($contest_details as $row){?>
                                    <div class="col-md-12 question-row">
                                       <div class="form-group mb-3 mb-md-2">
                                          <label class="font-weight-semibold"><?php echo $i. '. '.$row['question_text'] ?></label>
                                          <div class="row checkbox-row">
                                             <?php 
                                             $answers = explode(',',$row['element_text']);

                                             if($row['element_type'] == 'radio'){
                                                foreach($answers as $a_row){ ?>
                                                   <div class="form-check col-md-4">
                                                      <label class="form-check-label">
                                                      <input type="radio" name="answer_<?php echo $i; ?>" class="form-check-input-styled-success" data-fouc>
                                                      <?php echo $a_row; ?>
                                                      </label>
                                                   </div>
                                             <?php } }else if($row['element_type'] == 'checkbox'){ 
                                                foreach($answers as $a_row){ ?>
                                                   <div class="form-check col-md-4">
                                                      <label class="form-check-label">
                                                      <input type="checkbox" name="answer_<?php echo $i; ?>" class="form-check-input-styled-success" data-fouc>
                                                      <?php echo $a_row; ?>
                                                      </label>
                                                   </div> 

                                             <?php } }else if($row['element_type'] == 'select'){
                                                 ?>
                                                   <div class="form-check col-md-4">
                                                      <select class="form-control select" name="answer_<?php echo $i; ?>">
                                                         <option value="">Please Select Answer</option>
                                                         <?php foreach($answers as $a_row){ ?>
                                                         <option value="<?php echo $a_row; ?>"><?php echo $a_row; ?></option>
                                                      <?php } ?>
                                                      </select>
                                                   </div>
                                             
                                             <?php  }else if($row['element_type'] == 'text'){ ?>
                                                   <input type="text" name="answer_<?php echo $i; ?>" class="form-control" value="<?php echo set_value('answer_')?>">
                                             <?php }  ?>

                                             
                                          </div>
                                          <?php echo form_error('question_'.$i); ?>
                                       </div>
                                    </div>
                                    <?php $i++; } ?>
                                    
                                 </div>
                                 <input type="hidden" name="num_fields" value="<?php echo  COUNT($contest_details)?>">
                                 <input type="submit" value="Submit"  class="btn btn-primary">
                              </form>
                              </div>
                           </div>
                           <!-- /colors -->
                        </div>
                     </div>
                  </div>
               </div>
               <!-- /main charts -->
            </div>
            <!-- /content area -->
            <!-- Footer -->
            <!-- Footer -->
               <div class="navbar navbar-expand-lg navbar-light">
                   <div class="text-center d-lg-none w-100">
                       <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
                           <i class="icon-unfold mr-2"></i>
                           Footer
                       </button>
                   </div>

                   <div class="navbar-collapse collapse" id="navbar-footer">
                       <span class="navbar-text text-center">
                           &copy; 2018 - <?php echo date('Y')?>. <a href="#">Alphacore.in</a> All rights reserved
                       </span>

                       
                   </div>
               </div>
               <!-- /footer -->
            <!-- /footer -->
         </div>
         <!-- /main content -->
      </div>
      <!-- /page content -->
   </body>

</html>
