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
                              <div class="card-header header-elements-inline">
   
                                       <a class="btn btn-primary btn-sm" href="<?php echo base_url()?>Admin/importFeedbackForm"><i class="icon-file-plus" aria-hidden="true"></i> Import Feedback</a>
                     
                                 <button class="btn btn-primary btn-sm ml-1" id="message_to_send">Message To Send</button>
                              </div>
                              <table class="table datatable-basic table-hover text-center" id="rating">
                                 <thead>
                                    <tr>
                                       <th></th>
                                       <th>Sr. No.</th>
                                       <th>Name</th>
                                       <th>Mobile</th>
                                       <th>Email</th>
                                       <th>Professionalism </th>
                                       <th>Booking Process </th>
                                       <th>Quality </th>
                                       <th>Helpfulness </th>
                                       <th>Billing Process </th>
                                       <th>Guestrooms </th>
                                       <th>Staff Courtesy </th>
                                       <th>Cleanliness </th>
                                       <th>Overall Experience </th>
                                       <th>Comment </th>
                                       <th>Table</th>
                                       <th>Created At</th>
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

      <!-- Footer -->
      <?php $this->load->view('common/footer'); ?>
      <!-- /footer -->

      </body>

      </html>

<input type="hidden" name="base_url" value="<?php echo base_url()?>" id="base_url">
<!-- /Edit modal -->
<script type="text/javascript">
   $(document).ready(function() {

           

       $('#rating thead th').each(function () {
                           var i = 0;
                           var title = $(this).text();
                           if(title == 'Sr. No.' || title == 'Action' ){
   
                           }else if(title == 'Created At'){
                                $(this).html(title + '<input type="text" class="col-search-input" id="created_at_picker">');
                           }else{
                               $(this).html(title+'<input type="text" class="col-search-input" />');
                           }
                       });
   
   
                   var table = $('#rating').DataTable({
                       "autoWidth": true,
                       "scrollY": '50vh',
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
                           "url": "<?php echo base_url('Admin/getRatingDetails/'); ?>",
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
                                       {
                                           "targets": 0,
                                           "checkboxes": {
                                               'selectRow': true
                                           }
                                       },
                                       { "name": "sr_no",   "targets": 1 },
                                       { "name": "c.name",  "targets": 2 },
                                       { "name": "mobile", "targets": 3 },
                                       { "name": "email",  "targets": 4 },
                                       { "name": "question_1",    "targets": 5 },
                                       { "name": "question_2",    "targets": 6 },
                                       { "name": "question_3",    "targets": 7 },
                                       { "name": "question_4",    "targets": 8 },
                                       { "name": "question_5",    "targets": 9 },
                                       { "name": "question_6",    "targets": 10 },
                                       { "name": "question_7",    "targets": 11 },
                                       { "name": "question_8",    "targets": 12 },
                                       { "name": "question_9",    "targets": 13 },
                                       { "name": "comment",    "targets": 14 },
                                       { "name": "table_name",    "targets": 15 },
                                       { "name": "r.created_at",    "targets": 16 },
   
                                      ]
                       });
   
                    
   
                       //draw table
                       table.columns().every(function() {
                           var table = this;
                           $('input', this.header()).on('keyup change', function() {
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
           
       });
   
</script>