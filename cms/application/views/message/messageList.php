
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.interface.club/limitless/demo/bs4/Template/layout_1/LTR/default/full/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 May 2019 06:40:16 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
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
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="<?php echo base_url() ?>js/main/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>js/main/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <link href="<?php echo base_url()?>css/daterangepicker.css" rel="stylesheet">
    <script src="<?php echo base_url()?>js/moment.min.js"></script>
    <script src="<?php echo base_url()?>js/daterangepicker.js"></script>
    
    <script src="<?php echo base_url() ?>js/plugins/tables/datatables/datatables.min.js"></script>
    <script src="<?php echo base_url() ?>js/plugins/forms/selects/select2.full.min.js"></script>

    <script src="<?php echo base_url() ?>js/plugins/extensions/jquery_ui/interactions.min.js"></script>

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

        <!-- Main sidebar -->
        <?php $this->load->view('common/sidebar'); ?>
        <!-- /main sidebar -->


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

                <!-- Main charts -->
                <div class="row">
                        <!-- Page content -->
                <div class="page-content">
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Content area -->
            <div class="content">
                <!-- Hover rows -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Message</h5>

                        <div class="header-elements">
                            <a class="btn btn-primary btn-sm" href="<?php echo base_url()?>Admin/messageForm"><i class="icon-plus3" aria-hidden="true"></i> Add Message</a>
                        </div>
                    </div>


                    <table class="table datatable-basic table-hover text-center" id="message_list">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Message</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php if($message){ ?>
                                
                                    <?php 
                                    $i = 1;
                                    foreach($message as $row){?>
                                        <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['message']; ?></td>
                                        <td><?php echo date('d-m-Y h:i A',strtotime($row['created_at'])); ?></td>
                                        <td>
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="<?php echo base_url() ?>Admin/editMessage/<?php echo $row['id']?>" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                                    <a href="#"  class="dropdown-item delete_message" id="<?php echo $row['id'] ?>"d><i class="icon-trash"></i> Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                        </td>
                                        </tr>
                                    <?php 

                                    $i++;
                                    } ?>
                                
                             <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /hover rows -->


            </div>
            <!-- /content area -->



        </div>
        <!-- /main content -->

    </div>

</body>

</html>
<input type="hidden" name="base_url" value="<?php echo base_url()?>" id="base_url">


<!-- /Edit modal -->

<script>
$('#message_list    ').DataTable( {
        responsive: true
    });

</script>

