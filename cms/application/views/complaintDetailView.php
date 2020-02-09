
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
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="<?php echo base_url() ?>js/main/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>js/main/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>js/plugins/loaders/blockui.min.js"></script>
    <script src="<?php echo base_url() ?>js/plugins/tables/datatables/datatables.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <link href="<?php echo base_url()?>css/daterangepicker.css" rel="stylesheet">
    <script src="<?php echo base_url()?>js/moment.min.js"></script>
    <script src="<?php echo base_url()?>js/daterangepicker.js"></script>

    <link href="<?php echo base_url()?>css/bootstrap-datetimepicker.css" rel="stylesheet">
    <script src="<?php echo base_url()?>js/bootstrap-datetimepicker.min.js"></script>
    

    <script src="<?php echo base_url() ?>js/app.js"></script>

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
        
        
                    </div>
                        


                    <table class="table table-hover text-center" id="complaintDetailstList">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Complaint id</th>
                                <th>Customer Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Birthdate</th>
                                <th>Anniversary Date</th>
                                <th>Quality</th>
                                <th>Cleanliness</th>
                                <th>Service</th>
                                <th>Freindliness</th>
                                <th>Appearance</th>
                                <th>Value</th>
                                <th>Design</th>
                                <th>Issue</th>
                                <th>Action</th>
                                <th>Stauts</th>
                                <th>Manager</th>
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
    <!-- /page content -->

</body>

</html>

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
 <!-- Edit modal -->

<script>
$(document).ready(function() {



        $('#complaintDetailstList thead th').each(function(){
            var i = 0;
            var title = $(this).text();
            if ( title == 'Birthdate' || title == 'Anniversary Date' ||  title == 'Sr. No.') {

            }else if(title == 'Created At'){
                              $(this).html(title + '<input type="text" class="col-search-input" id="created_at_picker">');
                          } else {
                $(this).html(title + '<input type="text" class="col-search-input" />');
            }
        });


         var table = $('#complaintDetailstList').DataTable({
        "scrollY": '50vh',
        "scrollX": true,
        "pagingType": "numbers",
        // Processing indicator
        "processing": true,
        // DataTables server-side processing mode
        "serverSide": true,
        "searching": true,
        // Initial no order.
        "order": [],
        // Load data from an Ajax source
        "ajax": {
            "url": "<?php echo base_url('Admin/getComplaintDetailsData/'); ?>",
            "type": "POST"
        },
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        "dom": 'Blfrtip',
        "buttons": [{
                "extend": 'excelHtml5',
                "title": 'complaint_id',
                "exportOptions": {
                    columns: [0, ':visible']
                }
            },
            {
                "extend": 'csv',
                "title": 'complaint_id',
                "exportOptions": {
                    columns: [0, ':visible']
                }
            },
            {
                "extend": 'pdfHtml5',
                "title": 'complaint_id',
                "exportOptions": {
                    columns: [0, ':visible']
                }
            },
            {
                "extend": 'print',
                "title": 'complaint_id',
                "exportOptions": {
                    columns: [0, ':visible']
                }
            },
            {
                "extend": 'colvis'
            }
        ],
        //Set column definition initialisation properties
        "columnDefs": [
            {
                "name": "sr_no",
                "targets": 0
            },
            {
                "name": "complaint_id",
                "targets": 1
            },
            {
                "name": "cu.name",
                "targets": 2
            },
            {
                "name": "mobile",
                "targets": 3
            },
            {
                "name": "email",
                "targets": 4
            },
            {
                "name": "birthday",
                "targets": 5
            },
            {
                "name": "anniversary",
                "targets": 6
            },
            {
                "name": "question_1",
                "targets": 7
            },
            {
                "name": "question_2",
                "targets": 8
            },
            {
                "name": "question_3",
                "targets": 9
            },
            {
                "name": "question_4",
                "targets": 10
            },
            {
                "name": "question_5",
                "targets": 11
            },
            {
                "name": "question_6",
                "targets": 12
            },
            {
                "name": "question_7",
                "targets": 13
            },
            {
                "name": "issue",
                "targets": 14
            },
            {
                "name": "action_taken",
                "targets": 15
            },
            {
                "name": "c.status",
                "targets": 16
            },
            {
                "name": "manager",
                "targets": 17
            },
            {
                "name": "c.created_at",
                "targets": 18
            }

        ]
    });

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

});

</script>

