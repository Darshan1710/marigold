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
      <script src="<?php echo base_url() ?>js/main/bootstrap.bundle.min.js"></script>
      <script src="<?php echo base_url() ?>js/plugins/loaders/blockui.min.js"></script>
      <!-- /core JS files -->

      <script src="<?php echo base_url() ?>js/plugins/ui/moment/moment.min.js"></script>
      <script src="<?php echo base_url() ?>js/plugins/pickers/pickadate/picker.js"></script>
      <script src="<?php echo base_url() ?>js/plugins/pickers/pickadate/picker.date.js"></script>

      <script src="<?php echo base_url() ?>js/plugins/tables/datatables/datatables.min.js"></script>
      <script src="<?php echo base_url() ?>js/plugins/forms/selects/select2.min.js"></script>
      <script src="<?php echo base_url() ?>js/plugins/extensions/jquery_ui/interactions.min.js"></script>
      <script src="<?php echo base_url() ?>js/plugins/forms/selects/select2.full.min.js"></script>
      <script src="<?php echo base_url() ?>js/app.js"></script>
      <script src="<?php echo base_url() ?>js/demo_pages/form_select2.js"></script>
      <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css">
      <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
      <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
      <script src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>
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
                                 <a class="btn btn-primary btn-sm ml-1" href="<?php echo base_url()?>Rewards/rewardsMasterForm">Add Rewards Master</a>
                              </div>
                              <table class="table datatable-basic table-hover text-center" id="rewards_master_list">
                                 <thead>
                                    <tr>
                                       <th>Sr. No.</th>
                                       <th>Min Points</th>
                                       <th>Max Points</th>
                                       <th>Points Value</th>
                                       <th>Start Date</th>
                                       <th>End Date</th>
                                       <th>Active</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 	<?php 
                                 	$i = 1;
                                 	foreach($rewards as $row){?>
                                 		<tr>
                                 			<td><?php echo $i; ?></td>
                                 			<td><?php echo $row['min_points']; ?></td>
                                 			<td><?php echo $row['max_points']; ?></td>
                                 			<td><?php echo $row['points_value']; ?></td>
                                      <td><?php echo date('Y-m-d',strtotime($row['start_date'])); ?></td>
                                      <td><?php echo date('Y-m-d',strtotime($row['end_date'])); ?></td>
                                 			<td><?php if($row['status'] == 1){ 
                                 				echo '<button class="btn btn-success">Active</button>';
                                 				}else{
                                 				echo '<button class="btn btn-danger">Expired</button>';
                                 				} ?></td>
                                 			<td><div class="list-icons">
                                                                <div class="dropdown">
                                                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                                        <i class="icon-menu9"></i>
                                                                    </a>

                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a href="#" data-toggle="modal" data-target="#edit_modal" class="dropdown-item editRewards" id="<?php echo $row['id']?>"><i class="icon-file-pencil"></i>Edit</a>
                                                                        
                                                                    
                                                                    </div>
                                                                </div>
                                                            </div></td>
                                 		</tr>
                                 	<?php $i++;} ?>
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
   </body>
</html>
<!-- Edit modal -->
<div id="edit_modal" class="modal fade" tabindex="-1">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-center">Rewards Master</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <form action="#" id="updateRewards">
            <div class="modal-body">
               <input type="hidden" name="id" id="id">
               <div class="form-group">
                  <div class="row">
                     <div class="col-sm-6">
                        <label>Min Points</label>
                        <input type="number" placeholder="Min Points" class="form-control" id="min_points" name="min_points">
                     </div>
                     <div class="col-sm-6">
                        <label>Max Points</label>
                        <input type="text" placeholder="Max Points" class="form-control" id="max_points" name="max_points">
                     </div>
                     
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col-sm-6">
                        <label>Start Date</label>
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-calendar5"></i></span>
                            </span>
                            <input type="text" class="form-control" placeholder="start_date&hellip;" name="start_date" id="start_date">
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <label>End Date</label> 
                        <div class="input-group">
                              <span class="input-group-prepend">
                                  <span class="input-group-text"><i class="icon-calendar5"></i></span>
                              </span>
                              <input type="text" class="form-control" placeholder="End Date&hellip;" name="end_date" id="end_date">
                          </div>
                     </div>
                     
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col-sm-6">
                        <label>Points Value</label>
                        <input type="text" placeholder="Points Value" class="form-control" id="points_value" name="points_value">
                     </div>
                     <div class="col-sm-6">
                        <label>Status</label>
                        <div class="input-group">
                        <select class="form-control select" name="status" id="status">
                        	<option value="">Please Select Status</option>
                        	<option value="1">Active</option>
                        	<option value="0">Inactive</option>
                        </select>
                      </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn bg-primary">Submit</button>
            </div>
         </form>
      </div>
   </div>
</div>
</div>
<!-- /main charts -->
</div>
<!-- /content area -->
<!-- Footer -->
<?php $this->load->view('common/footer'); ?>
<!-- /footer -->
</div>
<!-- /main content -->
</div>
<!-- /page content -->
</body>
</html>
<input type="hidden" name="base_url" value="<?php echo base_url()?>" id="base_url">
<!-- /Edit modal -->
<script>
   $(document).ready(function() {
    
    $('#start_date').pickadate({
        });

      $('#end_date').pickadate({
        });

   	$('#rewards_master_list').DataTable( {
       	responsive: {
           	details: false
       	}
   	});
   
   $(document).on('click', '.editRewards', function() {
       var base_url = $('#base_url').val();
       var id = $(this).attr('id');
       $.ajax({
           type: 'post',
           data: {
               id: id
           },
           url: base_url + 'Rewards/editRewardsMaster',
           success: function(data) {
               var obj = $.parseJSON(data);
               if (obj.errCode == -1) {
                   $('#id').val(obj.data.id);
                   $('#max_points').val(obj.data.max_points);
                   $('#min_points').val(obj.data.min_points);
                   $('#points_value').val(obj.data.points_value);
                   $('#start_date').val(obj.data.start_date);
                   $('#end_date').val(obj.data.end_date);
                   $('#status').val(obj.data.status);
               } else {
                   alert('Error occur');
               }
   
           }
   
       });
   });
   
   $('#updateRewards').submit(function(e) {
       e.preventDefault();
       var form_data = new FormData($(this)[0]);
       var base_url = $('#base_url').val();
       $.ajax({
           type: 'post',
           data: form_data,
           processData: false,
           contentType: false,
           url: base_url + 'Rewards/updateRewardsMaster',
           success: function(data) {
               var obj = $.parseJSON(data);
               if (obj.errCode == -1) {
                   alert(obj.message);
                   location.reload();
               }else if(obj.errCode == 2){
                   alert(obj.message);
               } else if(obj.errCode == 3){
                   $('.error').remove();
                   $.each(obj.message,function(key,value){
                       
                       var element = $('.'+key);
                       element.closest('.form-control').after(value);
                   });
               }
   
           }
   
       });
   
   });
   
   });
</script>