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
      <script src="<?php echo base_url() ?>js/plugins/forms/selects/select2.min.js"></script>
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
                  <!-- Page content -->
                  <div class="page-content">
                     <!-- Main content -->
                     <div class="content-wrapper">
                        <!-- Content area -->
                        <div class="content">
                           <!-- Hover rows -->
                           <div class="card">
                              <div class="card-header header-elements-inline">
                              </div>
                              <table class="table datatable-basic table-hover text-center" id="familyList">
                                 <thead>
                                    <tr>
                                       <th>Sr. No.</th>
                                       <th>Name</th>
                                       <th>Mobile</th>
                                       <th>Email</th>
                                       <th>Birthdate</th>
                                       <th>Anniversary Date</th>
                                       <th>Created At</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                       if(isset($result)){
                                       $i = 1;
                                       foreach($result as $row){?>
                                    <tr>
                                       <td><?php echo $i; ?></td>
                                       <td><?php echo $row['name']; ?></td>
                                       <td><?php echo $row['mobile'];  ?></td>
                                       <td><?php echo $row['email'];  ?></td>
                                       <td><?php echo date('d-m-Y',strtotime($row['birthdate']));  ?></td>
                                       <td><?php echo date('d-m-Y',strtotime($row['anniversary_date']));  ?></td>
                                       <td><?php echo $row['created_at'];  ?></td>
                                       <td>
                                          <div class="list-icons">
                                             <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                   <a href="#" data-toggle="modal" data-target="#edit_modal" class="dropdown-item editFamily" id="<?php echo $row['id']?>"><i class="icon-file-pencil"></i>Edit</a>
                                                </div>
                                             </div>
                                          </div>
                                       </td>
                                    </tr>
                                    <?php } 
                                       $i++;
                                       }else { ?>
                                    <tr>
                                       <td>No data available</td>
                                    </tr>
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
                  <!-- /page content -->
   </body>
</html>
<!-- Edit modal -->
<div id="edit_modal" class="modal fade" tabindex="-1">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-center">Family Member</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <form action="#" id="updateFamilyMember">
            <div class="modal-body">
               <input type="hidden" name="id" id="id">
               <div class="form-group">
                  <div class="row">
                     <div class="col-sm-6">
                        <label>Name</label>
                        <input type="text" placeholder="name" class="form-control" id="name" name="name">
                     </div>
                     <div class="col-sm-6">
                        <label>Mobile</label>
                        <input type="number" placeholder="mobile" class="form-control" id="mobile" name="mobile">
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col-sm-6">
                        <label>Email</label>
                        <input type="text" placeholder="Email" class="form-control" id="email" name="email">
                     </div>
                     <div class="col-sm-6">
                        <label>Birthdate</label>
                        <input type="date" placeholder="birthdate" class="form-control" id="birthdate" name="birthdate">
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col-sm-6">
                        <label>Anniversary Date</label>
                        <input type="date" placeholder="Anniversary Date" class="form-control" id="anniversary_date" name="anniversary_date">
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
<div id="message_model" class="modal fade" tabindex="-1">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Send Message</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <form action="#" method="post" id="messageForm">
            <div class="modal-body">
               <fieldset class="mb-3">
                  <legend class="text-uppercase font-size-sm font-weight-bold"></legend>
                  <div class="form-group row">
                     <label class="col-form-label col-lg-2">Message</label>
                     <div class="col-lg-10">
                        <textarea class="form-control" name="message" id="message"><?php echo set_value('message')?></textarea>
                        <?php echo form_error('file')?>
                     </div>
                  </div>
               </fieldset>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn bg-primary" id="send_message">Send Message</button>    
            </div>
         </form>
      </div>
   </div>
</div>
<!-- /Edit modal -->
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
   
       $('#familyList').DataTable({
           responsive: true
       });
   
   
   
   
       $('#send_message').on('click', function(e) {
           e.preventDefault();
           var base_url = $('#base_url').val();
           var selectedIds = table.columns().checkboxes.selected()[0];
           var ids = selectedIds.toString();
           var msg = $('#message').val();
   
           $.ajax({
               type: 'post',
               data: {
                   ids: ids,
                   msg: msg
               },
               url: base_url + 'Admin/sendMessage',
               success: function(data) {
                   alert('success');
                   $('#message_model').modal('hide');
                   $("input[type=checkbox]").prop("checked", false);
                   table.state.clear();
                   window.location.reload();
               }
   
           });
   
       });
   
   
       $('#message_to_send').on('click', function() {
           var selectedIds = table.columns().checkboxes.selected()[0];
           if (selectedIds != '') {
               $('#messageForm')[0].reset();
               $('#message_model').modal('show');
           } else {
               alert('Please Select At least one contact number');
           }
   
       });
   
   
   
   
   });
   
   
   
   $(document).on('click', '.editFamily', function() {
       var base_url = $('#base_url').val();
       var id = $(this).attr('id');
       $.ajax({
           type: 'post',
           data: {
               id: id
           },
           url: base_url + 'Admin/editFamily',
           success: function(data) {
               var obj = $.parseJSON(data);
               if (obj.errCode == -1) {
                   $('#id').val(obj.data.id);
                   $('#name').val(obj.data.name);
                   $('#mobile').val(obj.data.mobile);
                   $('#email').val(obj.data.email);
                   $('#birthdate').val(obj.data.birthdate);
                   $('#anniversary_date').val(obj.data.anniversary_date);
               } else {
                   alert('Error occur');
               }
   
           }
   
       });
   });
   
   $('#updateFamilyMember').submit(function(e) {
       e.preventDefault();
       var form_data = new FormData($(this)[0]);
       var base_url = $('#base_url').val();
       $.ajax({
               type: 'post',
               data: form_data,
               processData: false,
               contentType: false,
               url: base_url + 'Admin/updateFamilyMember',
               success: function(data) {
                   var obj = $.parseJSON(data);
                   if (obj.errCode == -1) {
                       //console.log(obj.message);
                       alert(obj.message);
                       location.reload();
                   } else if (obj.errCode == 2) {
                       alert(obj.message);
                   } else if (obj.errCode == 3) {
                       $('.error').remove();
                       $.each(obj.messages, function(key, value) {
   
                           var element = $('#' + key);
                           element.closest('.form-control').after(value);
                       });
                   }
   
               }
   
           });
   
       });
</script>