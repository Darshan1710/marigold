
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
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <link href="<?php echo base_url()?>css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <script src="<?php echo base_url()?>js/moment.min.js"></script>
    <script src="<?php echo base_url()?>js/bootstrap-datetimepicker.min.js"></script>
    
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
        <div class="content-wrapper">

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
                                <div class="content-wrapper">
                                    <!-- Content area -->
                                    <div class="content">
                                    <!-- Colors -->
                                        <div class="card">
                                            <div class="card-header header-elements-inline">
                                                <h6 class="card-title">Winner Form</h6>
                                            </div>

                                            <div class="card-body">
                                                <form action="<?php echo base_url()?>contest/updateWinner" enctype="multipart/form-data" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $winner['id']?>">
                                                    <div class="row">
                                                        
                                                        <div class="col-md-4">
                                                            <label>Contest</label>
                                                            <div class="form-group">
                                                               <select name="contest_id" class="form-control select" id="contest_id">  
                                                                    <option value="">Please Select Contest</option>
                                                                    <?php foreach($contest as $c_row){?>
                                                                    <option value="<?php echo $c_row['id']; ?>" <?php echo set_select('contest_id', $c_row['id'], $c_row['id'] == $winner['contest_id'] ? TRUE :FALSE); ?>><?php echo $c_row['contest_name']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <p class="error"><?php echo form_error('contest_id'); ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Customer</label>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="customer_id" placeholder="Enter Customer Mobile" name="customer_id" value="<?php echo $customer_id = set_value('customer_id',isset($winner['customer_id']) ? $winner['customer_id'] : '')?>">
                                                                <?php echo form_error('customer_id'); ?>          
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Points</label>
                                                            <div class="form-group">
                                                                <select name="gift_id" class="form-control select" id="gift_id">  
                                                                    <option value="">Please Select Gift</option>
                                                                    <?php foreach($gift as $g_row){?>
                                                                        <option value="<?php echo $g_row['id']; ?>" <?php echo set_select('gift_id',$g_row['id'], $g_row['id'] == $winner['gift_id'] ? TRUE : FALSE ); ?>><?php echo $g_row['name']; ?></option>
                                                                    <?php } ?> 
                                                                </select>
                                                                <p class="error"><?php echo form_error('gift_id'); ?></p>
                                                            </div>
                                                        </div>
                                                            
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>Winning Date</label>
                                                            <div class="form-group">
                                                                <div class='input-group winning_date' id='winning_date'>
                                                                  <input type="date" name="winning_date" class="form-control" value="<?php echo $name = set_value('name',isset($winner['winning_date']) ? $winner['winning_date'] : '')?>">
                                                                </div>
                                                                <p class="error"><?php echo form_error('start'); ?></p>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-4">
                                                            <label>Status</label>
                                                            <div class="form-group">
                                                                
                                                                <select name="status" class="form-control select">
                                                                    <option value="">Please Select Status</option>
                                                                    <option value="0" <?php echo set_select('status','0', $winner['status'] == '0' ? TRUE : FALSE ); ?>>Pending</option>
                                                                    <option value="1" <?php echo set_select('status','1', $winner['status'] == '1' ? TRUE : FALSE); ?>>Approved</option>
                                                                    <option value="2" <?php echo set_select('status','2', $winner['status'] == '2' ? TRUE : FALSE); ?>>Done</option>
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

