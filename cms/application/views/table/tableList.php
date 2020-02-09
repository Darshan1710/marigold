
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
                        <h5 class="card-title">Table</h5>
                        
                        <div class="header-elements">
                            <button class="btn btn-primary btn-sm mr-1" data-toggle="modal" data-target="#add_table">Add Table</button>
                        </div>
                    </div>


                    <table class="table datatable-basic table-hover text-center" id="table">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Table Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php if(isset($table) && !empty($table)){?>
                                
                                    <?php 
                                        $i = 1;
                                        foreach($table as $row){?>
                                        <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" data-toggle="modal" data-target="#edit_modal" class="dropdown-item edit_modal" id="<?php echo $row['id']?>"><i class="icon-file-pencil"></i>Edit</a>
                                                    
                                                
                                                </div>
                                            </div>
                                        </div></td>
                                        </tr>
                                    <?php $i++; } ?>
                                
                             <?php }else{ ?>
                                    <tr><td></td>
                                        <td>No data available</td>
                                        <td></td></tr>
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
<div id="add_table" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Table</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="#" method="post" id="add_form">
                <div class="modal-body">
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold"></legend>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Name</label>
                            <div class="col-lg-10">
                                <input type="text" name="name" class="form-control" id="name">
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
                <h5 class="modal-title">Table</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="#" method="post" id="update_form">
                <input type="hidden" name="id" class="id">
                <div class="modal-body">
                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold"></legend>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Name</label>
                            <div class="col-lg-10">
                                <input type="text" name="name" class="form-control name">
                            
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


            <?php $this->load->view('common/footer'); ?>

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</body>

<!-- Mirrored from demo.interface.club/limitless/demo/bs4/Template/layout_1/LTR/default/full/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 May 2019 06:58:13 GMT -->
</html>
 <!-- Edit modal -->
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
                                    <label>Issue</label>
                                    <textarea class="form-control" name="issue" id="issue" placeholder="Enter Issue"></textarea>
                                </div>
                            
                                <div class="form-group">
                                    <label>Action Taken</label>
                                    <textarea class="form-control" name="action_taken" id="action_taken" placeholder="Enter action taken"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Manager </label>
                                    <select class="form-control" name="manager_id" id="manager_id">
                                            <option value="AZ">Arizona</option>
                                            <option value="CO">Colorado</option>
                                            <option value="ID">Idaho</option>
                                            <option value="WY">Wyoming</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Action Time</label>
                                    <input type="datetime" name="action_time" class="form-control" id="action_time">
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
<input type="hidden" name="base_url" value="<?php echo base_url()?>" id="base_url">
<script type="text/javascript">
    $(document).ready(function() {

        $('#table').DataTable( {
                responsive: true
        });

        //submit contact form
        $('#add_form').submit(function(e){
            e.preventDefault();
            var base_url = $('#base_url').val();
            var formData = new FormData($(this)[0]);
             $.ajax({
                    type:'post',
                    data:formData,
                    url: base_url+'Admin/addTable',
                    processData: false,
                    contentType: false,
                    success:function(data){
                        var obj = $.parseJSON(data);
                        if(obj.errCode == -1){
                            alert('Table Added Successfully');
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

        //edit table
        $(document).on('click','.edit_modal',function(){
            var base_url = $('#base_url').val();
            var id       = $(this).attr('id');
            $.ajax({
                type:'post',
                data:{id:id},
                url: base_url+'Admin/editTable',
                success:function(data){
                    var obj = $.parseJSON(data);
                    if(obj.errCode == -1){
                        $('.id').val(obj.data.id);
                        $('.name').val(obj.data.name);
                    }else{
                        alert('Error occur');
                    }
                    
                }

            });
        });

        $('#update_form').submit(function(e){
            e.preventDefault();
            var form_data = new FormData($(this)[0]);
            var base_url = $('#base_url').val();
            $.ajax({
                type:'post',
                data:form_data,
                processData: false,
                contentType: false,
                url: base_url+'Admin/updateTable',
                success:function(data){
                    var obj = $.parseJSON(data);
                    if(obj.errCode == -1){
                        alert('Update successfully');
                        location.reload();
                    }else if(obj.errCode == 2){
                        alert('Error Occur');
                    }else if(obj.errCode == 3){
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
