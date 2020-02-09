
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
                                                <h5 class="card-title">Manager</h5>
                                                <div class="header-elements">

                                                    <button class="btn btn-primary btn-sm mr-1" data-toggle="modal" data-target="#add_manager">Add Manager</button>
                
                                                </div>
                                            </div>


                                            <table class="table table-hover text-center" id="manager">
                                                <thead>
                                                    <tr>
                                                        <th>Sr. No.</th>
                                                        <th>Manager Id</th>
                                                        <th>Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                     <?php 
                                                     $i = 0;
                                                     if(isset($manager) && !empty($manager)){
                                                     foreach($manager as $row){
                                                     ?>
                                                        <tr>
                                                            <td><?php echo ++$i; ?></td>
                                                            <td><?php echo $row['manager_id']; ?></td>
                                                            <td><?php echo $row['name']; ?></td>
                                                            <td><div class="list-icons">
                                                                <div class="dropdown">
                                                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                                        <i class="icon-menu9"></i>
                                                                    </a>

                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a href="#" data-toggle="modal" data-target="#edit_manager" class="dropdown-item editManager" id="<?php echo $row['id']?>"><i class="icon-file-pencil"></i>Edit</a>
                                                                        
                                                                    
                                                                    </div>
                                                                </div>
                                                            </div></td>
                                                        </tr>
                                                     <?php } } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Footer -->
            <?php $this->load->view('common/footer'); ?>
            <!-- /footer -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</body>

</html>


<div id="add_manager" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Manager</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="#" method="post" id="manager_form">
                <div class="modal-body">
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold"></legend>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Manager Id</label>
                            <div class="col-lg-10">
                                <input type="text" name="manager_id" class="form-control" id="manager_id">                            
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Name</label>
                            <div class="col-lg-10">
                                <input type="text" name="name" class="form-control" id="name">
                            </div>
                        </div>

                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn bg-primary" id="add_manager">Submit</button>  
                </div>
            </form>
        </div>
    </div>
</div>

<div id="edit_manager" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Manager</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="#" method="post" id="updateManager">
                <input type="hidden" name="id" class="id">
                <div class="modal-body">
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold"></legend>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Manager Id</label>
                            <div class="col-lg-10">
                                <input type="text" name="manager_id" class="form-control manager_id" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Name</label>
                            <div class="col-lg-10">
                                <input class="form-control name" name="name">
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
<input type="hidden" name="base_url" value="<?php echo base_url()?>" id="base_url">


<!-- /Edit modal -->

<script type="text/javascript">
    $(document).ready(function() {
                    $('#manager').DataTable( {
                        responsive: true
                    });

                    //submit contact form
                    $('#manager_form').submit(function(e){
                        e.preventDefault();
                        var base_url = $('#base_url').val();
                        var formData = new FormData($(this)[0]);
                         $.ajax({
                                type:'post',
                                data:formData,
                                url: base_url+'Admin/addManager',
                                processData: false,
                                contentType: false,
                                success:function(data){
                                    var obj = $.parseJSON(data);
                                   
                                    if(obj.errCode == -1){
                                        alert('Added Successfully');
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

                    $(document).on('click', '.editManager', function() {
                        var base_url = $('#base_url').val();
                        var id = $(this).attr('id');
                        $.ajax({
                            type: 'post',
                            data: {
                                id: id
                            },
                            url: base_url + 'Admin/editManager',
                            success: function(data) {
                                var obj = $.parseJSON(data);
                                if (obj.errCode == -1) {
                                    $('.id').val(obj.data.id);
                                    $('.manager_id').val(obj.data.manager_id);
                                    $('.name').val(obj.data.name);
                                } else if(obj.errCode == 2){
                                    alert(obj.data);
                                }else if(obj.errCode == 3){
                                    alert('Inputs are not valid');
                                }

                            }

                        });
                        });

                        $('#updateManager').submit(function(e) {
                        e.preventDefault();
                        var form_data = new FormData($(this)[0]);
                        var base_url = $('#base_url').val();
                        $.ajax({
                            type: 'post',
                            data: form_data,
                            processData: false,
                            contentType: false,
                            url: base_url + 'Admin/updateManager',
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
