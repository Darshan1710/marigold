
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
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
    <script src="<?php echo base_url() ?>js/main/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>js/plugins/loaders/blockui.min.js"></script>
    <script src="<?php echo base_url() ?>js/plugins/editors/ckeditor/ckeditor.js"></script> 


     <script src="<?php echo base_url() ?>js/plugins/ui/moment/moment.min.js"></script>
    <script src="<?php echo base_url() ?>js/plugins/pickers/pickadate/picker.js"></script>
    <script src="<?php echo base_url() ?>js/plugins/pickers/pickadate/picker.date.js"></script>
    <!-- /core JS files -->
    
    <script src="<?php echo base_url() ?>js/plugins/forms/selects/select2.min.js"></script>

    <script src="<?php echo base_url() ?>js/plugins/extensions/jquery_ui/interactions.min.js"></script>
    <script src="<?php echo base_url() ?>js/plugins/forms/selects/select2.full.min.js"></script>

    <script src="<?php echo base_url() ?>js/app.js"></script>
    <script src="<?php echo base_url() ?>js/demo_pages/form_select2.js"></script>

</head>

<body>

    
    <?php $this->load->view('common/navbar'); ?>


    <!-- Page content -->
    <div class="page-content">

        <?php $this->load->view('common/sidebar'); ?>


        <!-- Main content -->
        <div class="content-wrapper"  >

            <!-- Page header -->
            <div class="page-header page-header-light">

                <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                    <div class="d-flex">
                        <div class="breadcrumb">
                            <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                            <span class="breadcrumb-item active">Dashboard</span>
                        </div>

                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>

                </div>
            </div>
            <!-- /page header -->


            <!-- Content area -->
            <div class="content">

                <!-- Main charts -->
                <div class="row">
                        <!-- Page content -->
                            <div class="page-content">
                                <!-- Main content -->
                                <div class="content-wrapper" style="overflow: visible !important;">
                                    <!-- Content area -->
                                    <div class="content">
                                    <!-- Colors -->
                                        <div class="card">
                                            <div class="card-header header-elements-inline">
                                                <h6 class="card-title">Rewards Form</h6>
                                            </div>

                                            <div class="card-body">
                                                <form action="<?php echo base_url()?>Rewards/addRewardsMaster" enctype="multipart/form-data" method="post">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>Min Points</label>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Min Points" id="min_points" value="<?php echo set_value('min_points') ?>" name="min_points">
                                                                <p class="error"><?php echo form_error('min_points'); ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Max Points</label>
                                                            <div class="form-group">
                                                                <input type="type" class="form-control" placeholder="Max Points" name="max_points" value="<?php echo set_value('max_points');?>">
                                                                <p class="error"><?php echo form_error('max_points'); ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Points Value</label>
                                                            <div class="form-group">
                                                                <input type="type" class="form-control" placeholder="Points Value" name="points_value" value="<?php echo set_value('points_value');?>">
                                                                <p class="error"><?php echo form_error('points_value'); ?></p>
                                                            </div>
                                                        </div>
                                                            
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>Start Date</label>
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                  <span class="input-group-prepend">
                                                                      <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                                                  </span>
                                                                  <input type="text" class="form-control" placeholder="Start Date&hellip;" name="start_date" id="start_date" value="<?php echo set_value('start_date')?>">
                                                                </div>
                                                                <p class="error"><?php echo form_error('start_date'); ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>End Date</label>
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                  <span class="input-group-prepend">
                                                                      <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                                                  </span>
                                                                  <input type="text" class="form-control" placeholder="Start Date&hellip;" name="end_date" id="end_date" value="<?php echo set_value('end_date')?>">
                                                                </div>
                                                                <p class="error"><?php echo form_error('end_date'); ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Status</label>
                                                            <div class="form-group">
                                                                <select class="form-control select" name="status">
                                                                    <option value="">Please Select Status</option>
                                                                    <option value="1" <?php echo set_select('status',1,set_value('status') == 1 ? true : false )?>>Active</option>
                                                                    <option value="0" <?php echo set_select('status',0,set_value('status') == 0 ? true : false )?>>Inactive</option>
                                                                </select>
                                                                <p class="error"><?php echo form_error('status'); ?></p>
                                                            </div>
                                                        </div>
                                                            
                                                    </div>


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


                </div>
                <!-- /main charts -->




            </div>
            <!-- /content area -->


            <?php $this->load->view('common/footer'); ?>

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</body>

</html>
<script type="text/javascript">
    $(document).ready(function() {
        
                $('#start_date').pickadate({
                    formatSubmit: 'yyyy/mm/dd'
                });

              $('#end_date').pickadate({
                    formatSubmit: 'yyyy/mm/dd'
                });
    });
</script>



