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
      <!-- Theme JS files -->
      <link href="<?php echo base_url()?>css/daterangepicker.css" rel="stylesheet">
      <script src="<?php echo base_url()?>js/moment.min.js"></script>
      <script src="<?php echo base_url()?>js/daterangepicker.js"></script>
      <script src="<?php echo base_url() ?>js/plugins/tables/datatables/datatables.min.js"></script>
      <script src="<?php echo base_url() ?>js/plugins/forms/selects/select2.full.min.js"></script>
      <script src="<?php echo base_url() ?>js/plugins/extensions/jquery_ui/interactions.min.js"></script>

      <script src="<?php echo base_url() ?>js/app.js"></script>
      <script src="<?php echo base_url() ?>js/demo_pages/form_select2.js"></script>
      <link href="<?php echo base_url()?>css/dataTables.checkboxes.css" rel="stylesheet">
      <script src="<?php echo base_url()?>js/dataTables.checkboxes.min.js"></script>

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
                  <!-- Page content -->
                  <div class="page-content">
                     <!-- Main content -->
                     <div class="content-wrapper">
                        <!-- Content area -->
                        <div class="content">
                           <!-- Hover rows -->
                           <div class="card">
                              <div class="card-header">
                                 <div class="row">
                                    <div class="col-md-6">
                                      <a class="btn btn-primary btn-sm" href="<?php echo base_url() ?>Admin/exportComplaint"><i class="icon-file-excel" aria-hidden="true"></i> Export</a>

                                       <a class="btn btn-primary btn-sm" href="<?php echo base_url() ?>Admin/complaintListView"><i class="icon-list" aria-hidden="true"></i>&nbsp;Complaint Details View</a>
                                    </div>
                                 </div>
                                 
                              </div>
                              <table class="table datatable-basic table-hover text-center" id="complaintList">
                                 <thead>
                                    <tr>
                                       <th>Sr. No.</th>
                                        <th>Complaint Id</th>
                                        <th>Customer Name</th>
                                        <th>Issue</th>
                                        <th>Manager</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 </tbody>
                              </table>
                           </div>
                           <!-- /hover rows -->
                        </div>
                        <!-- /content area -->
                     </div>
                     <!-- /main content -->
                  </div>
              </div>
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

<div id="edit_modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Complaint</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="#" id="updateComplaint">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Action Time</label>
                                     <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-calendar3"></i></span>
                                        </span>
                                        <input type="text" class="form-control" id="action_time" name="action_time">
                                        <p class="error"><?php echo form_error('action_time'); ?></p> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Issue</label>
                                    <textarea class="form-control" name="issue" id="issue" placeholder="Enter Issue"></textarea>
                                </div>
                            
                                <div class="form-group">
                                    <label>Action Taken</label>
                                    <textarea class="form-control" name="action_taken" id="action_taken" placeholder="Enter action taken"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Manager</label>
                                    <select class="form-control" name="manager" id="manager">
                                            <option value="">Please Select Manager</option>
                                            <?php 
                                            if(isset($manager) && !empty($manager)){
                                            foreach($manager as $row){?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                            <?php } } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="">Please Select Status</option>
                                        <option value="0">Pending</option>
                                        <option value="1">In process</option>
                                        <option value="2">Resolved</option>
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

      <!-- Footer -->
      <?php $this->load->view('common/footer'); ?>
      <!-- /footer -->

      </body>

      </html>

<input type="hidden" name="base_url" value="<?php echo base_url()?>" id="base_url">
<!-- /Edit modal -->
<script type="text/javascript">
   $(document).ready(function() {

           

                    $('#complaintList thead th').each(function () {
                           var i = 0;
                           var title = $(this).text();
                           if(title == 'Sr. No.' || title == 'Action'){
   
                           }else if(title == 'Created At'){
                              $(this).html(title + '<input type="text" class="col-search-input" id="created_at_picker">');
                          }else if(title == 'Status'){
                               $(this).html(title+'<select class="col-search-input">'+
                                '<option value="">All</option>'+
                                '<option value="0">Pending</option>'+
                                '<option value="1">In progress</option>'+
                                '<option value="2">Completed</option>'+
                                '</select>');
                           }else{
                               $(this).html(title+'<input type="text" class="col-search-input" />');
                           }
                       });
   
   
                   var table = $('#complaintList').DataTable({
                       "autoWidth": true,
                       "scrollY": '50vh',
                       "scrollX": true,
                       "scrollX": true,
                       "pagingType": "numbers",
                       // Processing indicator
                       "processing": true,
                       // DataTables server-side processing mode
                       "serverSide": true,
                       // Initial no order.
                       "order": [],
                       // Load data from an Ajax source
                       "ajax": {
                           "url": "<?php echo base_url('Admin/getComplaintList/'); ?>",
                           "type": "POST"
                       },
                       "fixedHeader": {
                           "header": true,
                           "footer": true
                       },
                       "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                       "dom" : 'Blfrtip',
                        "buttons": [
                              {
                                  "extend": 'excelHtml5',
                                  "title" : 'Feedback'
                              },
                              {
                                  "extend": 'csv',
                                  "title" : 'Feedback'
                              },
                              {
                                  "extend": 'pdfHtml5',
                                  "title" : 'Feedback'
                              },
                              {
                                "extend"  : 'print',
                                "title"   : 'Feedback'
                              },
                              {
                               "extend" : 'colvis'
                              }
                        ],
                       //Set column definition initialisation properties
                       "columnDefs": [
                                      
                                       { "name": "sr_no",   "targets": 0 },
                                       { "name": "complaint_id",  "targets": 1 },
                                       { "name": "c.name", "targets": 2 },
                                       { "name": "issue",  "targets": 3 },
                                       { "name": "manager_name",    "targets": 4 },
                                       { "name": "co.status",    "targets": 5,"orderable": false },
                                       { "name": "co.created_at",    "targets": 6,"orderable": false }
   
                                      ]
                       });
   
                    
   
                       //draw table
                       table.columns().every(function() {
                      
                           var table = this;
                           $('input,select', this.header()).on('keyup change', function() {
                               if (table.search() !== this.value) {
                                   table.search('')
                                   table.columns().search('')
                                   table.search(this.value).draw();
                               }
                           });

                           $('select', this.header()).on('change', function() {
                               if (table.search() !== this.value) {
                                   table.search('')
                                   table.columns().search('')
                                   table.search(this.value).draw();
                               }
                           });

                          
                       });
           
   
   
           //tooltip
   
                //created at picker
                 $('#created_at_picker').daterangepicker({
                    autoUpdateInput: false,
                    locale: {
                        cancelLabel: 'Clear'
                    },
                    ranges: {
                      'Today': [moment(), moment()],
                      'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                      'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                      'This Month': [moment().startOf('month'), moment().endOf('month')]
                      }
                });

                $('#created_at_picker').on('apply.daterangepicker', function(ev, picker) {
                    $('#created_at_picker').daterangepicker({
                        startDate : picker.startDate.format('MM/DD/YYYY'),
                        endDate : picker.endDate.format('MM/DD/YYYY'),
                        locale: {
                            cancelLabel: 'Clear'
                          },
                        ranges: {
                          'Today': [moment(), moment()],
                          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                          'This Month': [moment().startOf('month'), moment().endOf('month')]
                          }
                    });
                });

                $('#created_at_picker').on('cancel.daterangepicker', function(ev, picker) {
                    $(this).val('');
                });
                

                //action time picker
                $('#action_time').daterangepicker({
                  timePicker: true,
                    singleDatePicker: true,
                    showDropdowns: true,
                    minYear: 1901,
                    maxYear: parseInt(moment().format('YYYY'),10)
                  }, function(start, end, label) {
                    var years = moment().diff(start, 'years');
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
                          // window.location.reload();
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

                   $(document).on('click','.editComplaint',function(){
                      var base_url = $('#base_url').val();
                      var id       = $(this).attr('id');
                      $.ajax({
                          type:'post',
                          data:{id:id},
                          url: base_url+'Admin/editComplaint',
                          success:function(data){
                              var obj = $.parseJSON(data);

                              $('#id').val(obj.data.id);
                              $('#issue').val(obj.data.issue);
                              $('#action_taken').val(obj.data.action_taken);
                              $('#manager').val(obj.data.manager_id);
            
                              $('#action_time').val(obj.data.action_taken_time);
                              $('#status').val(obj.data.status);
                          }

                      });
                  });

                  $('#updateComplaint').submit(function(e){
                      e.preventDefault();
                      var form_data = new FormData($(this)[0]);
                      var base_url = $('#base_url').val();
                      $.ajax({
                          type:'post',
                          data:form_data,
                          processData: false,
                          contentType: false,
                          url: base_url+'Admin/updateComplaint',
                          success:function(data){
                              var obj = $.parseJSON(data);
                              if(obj.errCode == -1){
                                  //console.log(obj.message);
                                  alert(obj.message);
                                  if(obj.status == 2){
                                      sendEmail(obj.id);
                                  }else{
                                     location.reload(); 
                                  }
                                  
                              }else if(obj.errCode == 2){
                                  alert(obj.message);
                              }else if(obj.errCode == 3){
                                  $('.error').remove();
                                  $.each(obj.messages,function(key,value){
                                      
                                      var element = $('#'+key);
                                      element.closest('.form-control').after(value);
                                  });
                              }
                              
                          }

                      });

                  });

                  function sendEmail(id){
                      if(confirm('Do you want send email to the customer?')){
                           var base_url = $('#base_url').val();
                          $.ajax({
                              type:'post',
                              data:{id:id},
                              url: base_url+'Admin/resendFeedbackEmail',
                              success:function(data){
                                  var obj = $.parseJSON(data);
                                  if(obj.errCode == -1){
                                      alert(obj.message);
                                      location.reload();
                                  }else if(obj.errCode == 2){
                                      alert(obj.message);
                                      location.reload();
                                  }
                                  
                              }

                          });
                      }
                  }
           
       });
   
</script>