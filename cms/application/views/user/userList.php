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
                              <div class="card-header">
                                 <div class="row">
                                    
                                      <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#add_modal" style="margin-right: 1%;"><i class="icon-user" aria-hidden="true"></i> Add User</a>

                                      <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#message_model"><i class="icon-user" aria-hidden="true"></i> Send Message</a>

                                    
                                 </div>
                                 
                              </div>
                              <table class="table datatable-basic table-hover text-center" id="userList">
                                 <thead>
                                    <tr>
                                      <th><input type="checkbox" class="all"></th>
                                       <th>Sr. No.</th>
                                       <th>Name</th>
                                       <th>Mobile</th>
                                       <th>Email</th>
                                        <th>User Name</th>
                                        <th>User Role</th>
                                        <th>Status</th>
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

<div id="add_modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Add User</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="#" id="add">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                              <div class="col-sm-6">

                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" type="text" name="name" id="name" placeholder="Enter name">
                                </div>
                              </div>

                              <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input class="form-control" type="number" name="mobile" id="mobile" placeholder="Enter mobile" minlength="10" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                              </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email" name="email" id="email" placeholder="Enter email">
                                </div>
                              </div>

                              <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control" type="text" name="username" id="username" placeholder="Enter username">
                                </div>
                              </div>
                        </div>
                    </div>
                              

                    <div class="form-group">
                        <div class="row">        
                              <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" type="password" name="password" id="password" placeholder="Enter password">
                                </div>
                              </div>

                              <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input class="form-control" type="password" name="confirm_password" id="confirm_password" placeholder="Enter confirm password">
                                </div>
                              </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                              <div class="col-sm-6">

                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="form-control" name="role_id" id="role_id">
                                        <option value="">Please Select Status</option>
                                        <?php foreach($role as $r){?>
                                          <option value="<?php echo $r['id'] ?>"><?php echo $r['role']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                              </div>

                              <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="">Please Select Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">In Active</option>
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

<div id="edit_modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Update User</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="#" id="update">
              <input type="hidden" name="id" class="id">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                              <div class="col-sm-6">

                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control name" name="name"  placeholder="Enter name">
                                </div>
                              </div>

                              <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input class="form-control mobile" name="mobile" placeholder="Enter mobile">
                                </div>
                              </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control email" name="email"  placeholder="Enter email">
                                </div>
                              </div>

                              <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control username" name="username"  placeholder="Enter username">
                                </div>
                              </div>
                        </div>
                    </div>
                              

<!--                     <div class="form-group">
                        <div class="row">        
                              <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control password" name="password"  placeholder="Enter password">
                                </div>
                              </div>

                              <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input class="form-control confirm_password" name="confirm_password"  placeholder="Enter confirm password">
                                </div>
                              </div>
                        </div>
                    </div> -->

                    <div class="form-group">
                        <div class="row">
                              <div class="col-sm-6">

                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="form-control role_id"  name="role_id">
                                        <option value="">Please Select Status</option>
                                        <?php foreach($role as $r){?>
                                          <option value="<?php echo $r['id'] ?>"><?php echo $r['role']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                              </div>

                              <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control status" name="status">
                                        <option value="">Please Select Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">In Active</option>
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

$('#userList thead th').each(function() {
        var i = 0;
        var title = $(this).text();
        if (title == 'Sr. No.' || title == 'Action' ) {

        }else {
            $(this).html(title + '<input type="text" class="col-search-input" />');
        }
    });

var table = $('#userList').DataTable({
    "autoWidth": true,
    "pagingType": "numbers",
    "processing": true,
    "serverSide": true,
    // Initial no order.
    "order": [],
    // Load data from an Ajax source
    "fixedHeader": {
        "header": true,
        "footer": true
    },
    "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
    ],
    "ajax": {
          "url": "<?php echo base_url('User/getUserList/'); ?>",
          "type": "POST"
      },
    "dom": 'Blfrtip',
    "buttons": [{
            "extend": 'excelHtml5',
            "title": 'UserList'
        },
        {
            "extend": 'csv',
            "title": 'UserList'
        },
        {
            "extend": 'pdfHtml5',
            "title": 'UserList'
        },
        {
            "extend": 'print',
            "title": 'UserList'
        },
        {
            "extend": 'colvis'
        }
    ],
    'columnDefs': [
         {
            'targets': 0,
            'checkboxes': {
               'selectRow': true
            }
         },
         {
                "name": "sr_no",
                "targets": 1
            },
            {
                "name": "name",
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
                "name": "username",
                "targets": 5
            },
            {
                "name": "role",
                "targets": 6
            },
            {
                "name": "status",
                "targets": 7
            },
            {
                "name": "action",
                "targets": 8
            }
      ],
      'select': {
         'style': 'multi'
      },
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

//add user
$('#add').submit(function(e) {
    e.preventDefault();
    var form_data = new FormData($(this)[0]);
    var base_url = $('#base_url').val();
    $.ajax({
        type: 'post',
        data: form_data,
        processData: false,
        contentType: false,
        url: base_url + 'User/addUser',
        success: function(data) {
            var obj = $.parseJSON(data);
            if (obj.errCode == -1) {
                alert(obj.message);
                location.reload();

            } else if (obj.errCode == 2) {
                alert(obj.message);
            } else if (obj.errCode == 3) {
                $('.error').remove();
                $.each(obj.message, function(key, value) {
                    var element = $('#' + key);
                    element.closest('.form-control').after(value);
                });
            }

        }

    });

});


$(document).on('click', '.editUser', function() {
    var base_url = $('#base_url').val();
    var id = $(this).attr('id');
    $.ajax({
        type: 'post',
        data: {
            id: id
        },
        url: base_url + 'User/editUser',
        success: function(data) {
            var obj = $.parseJSON(data);

            $('.id').val(obj.data.id);
            $('.name').val(obj.data.name);
            $('.mobile').val(obj.data.mobile);
            $('.email').val(obj.data.email);
            $('.username').val(obj.data.username);
            $('.role_id').val(obj.data.role_id);
            $('.status').val(obj.data.user_status);
        }

    });
});

$('#update').submit(function(e) {
e.preventDefault();
var form_data = new FormData($(this)[0]);
var base_url = $('#base_url').val();
$.ajax({
    type: 'post',
    data: form_data,
    processData: false,
    contentType: false,
    url: base_url + 'User/updateUser',
    success: function(data) {
        var obj = $.parseJSON(data);
        if (obj.errCode == -1) {
            //console.log(obj.message);
            alert(obj.message);
            if (obj.status == 2) {
                sendEmail(obj.id);
            } else {
                location.reload();
            }

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



});
</script>