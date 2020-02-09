<!DOCTYPE html>
<html lang="en">
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
      <script src="<?php echo base_url() ?>js/main/bootstrap.bundle.min.js"></script>
      <script src="<?php echo base_url() ?>js/plugins/loaders/blockui.min.js"></script>
      <!-- /core JS files -->
      <script src="<?php echo base_url() ?>js/plugins/tables/datatables/datatables.min.js"></script>
      <script src="<?php echo base_url() ?>js/plugins/extensions/jquery_ui/interactions.min.js"></script>
      <script src="<?php echo base_url() ?>js/app.js"></script>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap-datetimepicker.min.css">
      <script src="<?php echo base_url(); ?>js/datetime/moment.min.js"></script>
      <script src="<?php echo base_url(); ?>js/datetime/bootstrap-datetimepicker.min.js"></script>
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
                           <!-- Hover rows -->
                           <div class="card">
                              <div class="card-header header-elements-inline">
                                <a href="<?php echo base_url()?>Contest/contestForm" class="btn btn-primary btn-sm ml-1">Add Contest</a>
                              </div>
                              <table class="table datatable-basic table-hover text-center" id="complaintList">
                                 <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Contest Name</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                    if($contest){
                                        $i = 1;
                                        foreach($contest as $row){ ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $row['contest_name']; ?></td>
                                                <td><?php echo date('d-m-Y',strtotime($row['start'])); ?></td>
                                                <td><?php echo date('d-m-Y',strtotime($row['end'])); ?></td>
                                                <td><?php echo $button = $row['active'] == 1 ? '<button class="btn btn-sm btn-success">Active</button>' : '<button class="btn btn-sm btn-danger">Inactive</button>' ?></td>
                                                

                                                <td><div class="list-icons">
                                                        <div class="dropdown">
                                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                                <i class="icon-menu9"></i>
                                                            </a>

                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="<?php echo base_url()?>Contest/getContestQuestionList/<?php echo $row['id']?>"  class="dropdown-item"><i class="icon-file-pencil"></i>Edit</a>
                                                                <a href="<?php echo base_url()?>Contest/getContenstantList/<?php echo $row['id']?>"  class="dropdown-item"><i class="icon-file-pencil"></i>Contenstant List</a>
                                                                <a href="<?php echo base_url()?>Contest/exportContenstantDetails/<?php echo $row['id']?>"  class="dropdown-item"><i class="icon-file-pencil"></i>Export Contenstant Data</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                    <?php 
                                        $i++;
                                        }
                                    } ?>
                                 </tbody>
                              </table>
                           </div>
                           <!-- /hover rows -->
                        </div>
                        <!-- /content area -->
                     </div>
                     <!-- /main content -->
                  </div>
                  <!-- /page content -->

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
<input type="hidden" name="base_url" value="<?php echo base_url()?>" id="base_url">
<script>
   $(document).ready(function() {
   
   
           $('#complaintList').DataTable( {
               responsive: true
           });
   
   });
   
</script>