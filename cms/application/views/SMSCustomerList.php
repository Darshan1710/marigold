
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
                    <form method="post" action="<?php echo base_url() ?>Admin/createBulkSMS">
                    
                    <input type="hidden" name="type" value="<?php echo $type; ?>">
                    <div class="card-header header-elements-inline">
                        <div class="row">
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="created_at">
                            <span class="form-text text-muted text-right" >Created At</span>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-sm ml-1" id="message_to_send" disabled>Message To Send</button>
                    </div>

                    
                    <table class="table datatable-basic table-hover text-center" id="birthdayList">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Sr. No.</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Feedback Count</th>
                                <th>Family</th>
                               <!--  <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($customer)){ 
                                $i = 0;
                                foreach($customer as $row){ ?>
                                <tr>
                                    <td><input type="checkbox" name="mobile[]" value="<?php echo $row['mobile']; ?>" class="myCheckBox"></td>
                                    <td><?php echo ++$i; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['mobile']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo date('Y-m--d',strtotime($row['created_at'])); ?></td>
                                    <td><?php echo $row['feedback_count']; ?></td>
                                    <td><?php if($row['family_id']){ echo "1"; } ?></td>
                                    <!-- <td><?php  ?></td> -->

                                </tr>
                            <?php } }  ?>
                        </tbody>
                    </table>
                    </form>
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

<div id="modal_scrollable" class="modal fade show" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header pb-3">
                <h5 class="modal-title">Feedback</h5>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <div class="modal-body py-0">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody class="feedback_body">
                        
                    </tbody>
                </table>
            </div>

            <div class="modal-footer pt-3">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- /vertical form modal -->

 <!-- Edit modal -->
<div id="edit_modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Customer</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="#" id="updateCustomer">
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

<script>
$(document).ready(function() {

    var checkBoxes = $('tbody .myCheckBox');
    checkBoxes.change(function () {
        $('#message_to_send').prop('disabled', checkBoxes.filter(':checked').length < 1);
    });
    checkBoxes.change();

    var table = $('#birthdayList').DataTable({
        "pagingType": "numbers",
        // Initial no order.
        "order": [],
        // Load data from an Ajax source
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        "dom": 'Blfrtip',
        "buttons": [{
                "extend": 'excelHtml5',
                "title": 'Customer',
                "exportOptions": {
                    columns: [0, ':visible']
                }
            },
            {
                "extend": 'csv',
                "title": 'Customer',
                "exportOptions": {
                    columns: [0, ':visible']
                }
            },
            {
                "extend": 'pdfHtml5',
                "title": 'Customer',
                "exportOptions": {
                    columns: [0, ':visible']
                }
            },
            {
                "extend": 'print',
                "title": 'Customer',
                "exportOptions": {
                    columns: [0, ':visible']
                }
            }
        ],
        //Set column definition initialisation properties
        "columnDefs": [
            {
                "name": "sr_no",
                "targets": 1
            },
            {
                "name": "c.name",
                "targets": 2
            },
            {
                "name": "c.mobile",
                "targets": 3
            },
            {
                "name": "c.email",
                "targets": 4
            },
            {
                "name": "c.created_at",
                "targets": 5
            },
            {
                "name": "feedback_count",
                "targets": 6
            },

        ]
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



    //tooltip




    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#birthdate').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
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


    $('#created_at').on('change', function() {
        var created_at = $('#created_at').val();

        if (created_at) {
            $('#customerList').DataTable().destroy();
            fetch_data('yes', created_at, 'c.created_at');
        } else {
            alert('Date is required');
        }
    });

});

$(document).on('click', '.getDates', function() {
    var base_url = $('#base_url').val();
    var id = $(this).attr('id');
    $.ajax({
        type: 'post',
        data: {
            id: id
        },
        url: base_url + 'Admin/getCustomerFeedbackDates',
        success: function(data) {
            var obj = $.parseJSON(data);
            if (obj.errCode == -1) {
                $('.feedback_body').empty();
                $('.feedback_body').append(obj.data);
            } else if (obj.errCode == 2) {
                alert(obj.data);
            } else {
                alert(obj.messages);
            }
        }

    });
});

$(document).on('click', '.editCustomer', function() {
    var base_url = $('#base_url').val();
    var id = $(this).attr('id');
    $.ajax({
        type: 'post',
        data: {
            id: id
        },
        url: base_url + 'Admin/editCustomer',
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

$('#updateCustomer').submit(function(e) {
    e.preventDefault();
    var form_data = new FormData($(this)[0]);
    var base_url = $('#base_url').val();
    $.ajax({
        type: 'post',
        data: form_data,
        processData: false,
        contentType: false,
        url: base_url + 'Admin/updateCustomer',
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

</script>

