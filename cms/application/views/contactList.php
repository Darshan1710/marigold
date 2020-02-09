
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
    <script src="<?php echo base_url() ?>js/plugins/forms/selects/select2.min.js"></script>

    <script src="<?php echo base_url() ?>js/plugins/extensions/jquery_ui/interactions.min.js"></script>
    <script src="<?php echo base_url() ?>js/plugins/forms/selects/select2.min.js"></script>

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
                        <h5 class="card-title">Contacts</h5>
                        <div class="row">
                        <div class="col-md-12">
                            <span class="form-text text-muted">Created at</span>
                            <input type="text" class="form-control" id="created_at">
                            
                            </div>
                        </div>
                        <div class="header-elements">

                            <button class="btn btn-primary btn-sm mr-1" data-toggle="modal" data-target="#add_contact">Add Contact</button>
                            <a class="btn btn-primary btn-sm" href="<?php echo base_url()?>Admin/importContactForm"><i class="icon-file-plus" aria-hidden="true"></i> Import Contacts</a>
                            <button class="btn btn-primary btn-sm ml-1" id="message_to_send">Message To Send</button>
                        </div>
                    </div>


                    <table class="table table-hover text-center" id="contacts">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Sr. No.</th>
                                <th>Mobile</th>
                                <th>Filter</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             
                        </tbody>
                        </form>
                    </table>
                </div>
                <!-- /hover rows -->


            </div>
            <!-- /content area -->



        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->


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

<div id="add_contact" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Contacts</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="#" method="post" id="contacts_form">
                <div class="modal-body">
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold"></legend>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Filter</label>
                            <div class="col-lg-10">
                                <input type="text" name="filter" class="form-control" id="filter">
                            
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Contact Numbers</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" name="contacts_numbers" id="contacts_numbers"></textarea>
                            </div>
                        </div>

                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn bg-primary" id="send_message">Submit</button>  
                </div>
            </form>
        </div>
    </div>
</div>

<div id="edit_modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Contacts</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="#" method="post" id="updateContact">
                <input type="hidden" name="id" class="id">
                <div class="modal-body">
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold"></legend>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Filter</label>
                            <div class="col-lg-10">
                                <input type="text" name="filter" class="form-control filter" >
                            
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Contact Number</label>
                            <div class="col-lg-10">
                                <textarea class="form-control mobile" name="mobile"></textarea>
                            </div>
                        </div>

                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn bg-primary" id="send_message">Submit</button>  
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

<!-- Mirrored from demo.interface.club/limitless/demo/bs4/Template/layout_1/LTR/default/full/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 May 2019 06:58:13 GMT -->
</html>
<input type="hidden" name="base_url" value="<?php echo base_url()?>" id="base_url">


<!-- /Edit modal -->

<script type="text/javascript">
    $(document).ready(function() {

                    $("input[type=checkbox]").prop("checked", false);

                    $('#contacts thead th').each(function () {
                            var title = $(this).text();

                            if(title == 'Sr. No.' || title == 'Created At' || title == 'Action'){

                            }else{
                                $(this).html(title+'<input type="text" class="col-search-input" />');
                            }
                        });


                    var table = $('#contacts').DataTable({
                        "autoWidth": true,
                        "scrollY": '50vh',
                        "scrollX": true,
                        "pagingType": "numbers",
                        // Processing indicator
                        "processing": true,
                        // DataTables server-side processing mode
                        "serverSide": true,
                        // Initial no order.
                        "order": [[1,"asc"]],
                        // "bStateSave":true,
                        // Load data from an Ajax source
                        "ajax": {
                            "url": "<?php echo base_url('Admin/getContactList/'); ?>",
                            "type": "POST"
                        },
                        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                        "dom" : 'Blfrtip',
                         "buttons": [
                               {
                                   "extend": 'excelHtml5',
                                   "title" : 'Contact List _'
                               },
                               {
                                   "extend": 'csv',
                                   "title" : 'Contact List _'
                               },
                               {
                                   "extend": 'pdfHtml5',
                                   "title" : 'Contact List'
                               },
                               {
                                 "extend"  : 'print',
                                 "title"   : 'Contact list'
                               },
                         ],
                        //Set column definition initialisation properties
                        "columnDefs": [{  "targets": 0,"checkboxes":{'selectRow':true} },
                                        { "name": "sr_no",  "targets": 1 },
                                        { "name": "mobile", "targets": 2 },
                                        { "name": "filter",  "targets": 3 },
                                        { "name": "created_at",    "targets": 4 },
                                        ],
                                       'select':{
                                        'style':'multi'
                                       }
                                   
                                
                        });



                        //draw table
                        table.columns().every(function () {
                            var table = this;
                            $('input', this.header()).on('keyup change', function () {
                                if (table.search() !== this.value) {
                                       table.search( '' )
                                       table.columns().search( '' )
                                       table.search(this.value).draw();
                                }
                            });
                        });

                        $('#send_message').on('click', function(e){
                          e.preventDefault();
                          var base_url = $('#base_url').val();
                          var selectedIds = table.columns().checkboxes.selected()[0];
                          var ids = selectedIds.toString();
                          var msg = $('#message').val();
                          
                          $.ajax({
                                type:'post',
                                data:{ids:ids,msg:msg},
                                url: base_url+'Admin/sendMessage',
                                success:function(data){
                                    alert('success');
                                    $('#message_model').modal('hide');
                                    $("input[type=checkbox]").prop("checked", false);
                                    table.state.clear();
                                    window.location.reload();
                                }

                            });
                          
                       });
                    

                        $('#message_to_send').on('click',function(){
                             var selectedIds = table.columns().checkboxes.selected()[0];
                             if(selectedIds != ''){
                                $('#messageForm')[0].reset();
                                $('#message_model').modal('show');  
                             }else{
                                alert('Please Select At least one contact number');
                             }
                            
                        });


            //tooltip
                    
                    //submit contact form
                    $('#contacts_form').submit(function(e){
                        e.preventDefault();
                        var base_url = $('#base_url').val();
                        var formData = new FormData($(this)[0]);
                         $.ajax({
                                type:'post',
                                data:formData,
                                url: base_url+'Admin/addContactData',
                                processData: false,
                                contentType: false,
                                success:function(data){
                                    var obj = $.parseJSON(data);
                                    if(obj.errCode == -1){
                                        alert('Contacts Added Successfully');
                                        window.location.reload();
                                    }else if(obj.errCode == 2){
                                        alert('Error Occur');
                                    }else{
                                        $('.error').remove();
                                        $.each(obj.message,function(key,value){
                                            
                                            var element = $('#'+key);
                                            element.closest('.form-control').after(value);
                                        });
                                    }
                                }

                            });
                    });

                    var start = moment().subtract(29, 'days');
                    var end = moment();

                    function cb(start, end) {
                        $('#created_at').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                    }


                      $('#created_at').daterangepicker({
                        startDate: start,
                        endDate: end,
                        ranges: {
                           'Today': [moment(), moment()],
                           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                           'This Month': [moment().startOf('month'), moment().endOf('month')]
                        }
                    }, cb);

                    cb(start, end);

                        

                        function fetch_data(is_date_search,date,type){
                    
                            var dataTable = $('#contacts').DataTable({
                                "processing":true,
                                "serverSide": true,
                                "order" :[],
                                "ajax": {
                                    "url": "<?php echo base_url('Admin/getContactList/'); ?>",
                                    "type": "POST",
                                    "data":{
                                            is_date_search:is_date_search,
                                            date:date,
                                            type:type
                                    }
                                }
                            });
                        }


                        $('#created_at').on('change',function(){
                            var created_at = $('#created_at').val();
                            alert();
                                if(created_at){
                                    $('#contacts').DataTable().destroy(); 
                                    fetch_data('yes',created_at,'c.created_at');
                                }else{
                                    alert('Date is required');
                                }
                        });

                    $(document).on('click', '.editContact', function() {
                        var base_url = $('#base_url').val();
                        var id = $(this).attr('id');
                        $.ajax({
                            type: 'post',
                            data: {
                                id: id
                            },
                            url: base_url + 'Admin/editContact',
                            success: function(data) {
                                var obj = $.parseJSON(data);
                                if (obj.errCode == -1) {
                                    $('.id').val(obj.data.id);
                                    $('.mobile').val(obj.data.mobile);
                                    $('.filter').val(obj.data.filter);
                                } else if(obj.errCode == 2){
                                    alert(obj.data);
                                }else if(obj.errCode == 3){
                                    alert('Inputs are not valid');
                                }

                            }

                        });
                        });

                        $('#updateContact').submit(function(e) {
                        e.preventDefault();
                        var form_data = new FormData($(this)[0]);
                        var base_url = $('#base_url').val();
                        $.ajax({
                            type: 'post',
                            data: form_data,
                            processData: false,
                            contentType: false,
                            url: base_url + 'Admin/updateContact',
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
