
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
    <script src="<?php echo base_url() ?>js/main/jquery-ui.min.js"></script>
    <script src="<?php echo base_url() ?>js/main/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>js/plugins/loaders/blockui.min.js"></script>

    <script src="<?php echo base_url() ?>js/plugins/ui/moment/moment.min.js"></script>
    <script src="<?php echo base_url() ?>js/plugins/pickers/pickadate/picker.js"></script>
    <script src="<?php echo base_url() ?>js/plugins/pickers/pickadate/picker.date.js"></script>

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
                                                <h5 class="card-title">Coupon</h5>
                                                <div class="header-elements">

                                                    <button class="btn btn-primary btn-sm mr-1" data-toggle="modal" data-target="#add_coupen">Add coupon</button>

                                                    <button class="btn btn-primary btn-sm mr-1" data-toggle="modal" data-target="#coupen_usage">Add Coupon Usage</button>
                
                                                </div>
                                            </div>


                                            <table class="table table-hover text-center" id="coupen">
                                                <thead>
                                                    <tr>
                                                        <th>Sr. No.</th>
                                                        <th>Coupon Code</th>
                                                        <th>Expiry Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                     <?php 
                                                     $i = 0;
                                                     if(isset($coupen) && !empty($coupen)){
                                                     foreach($coupen as $row){
                                                     ?>
                                                        <tr>
                                                            <td><?php echo ++$i; ?></td>
                                                            <td><?php echo $row['coupen']; ?></td>
                                                            <td><?php echo $row['end_date']; ?></td>
                                                            <td><div class="list-icons">
                                                                <div class="dropdown">
                                                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                                        <i class="icon-menu9"></i>
                                                                    </a>

                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a href="#" data-toggle="modal" data-target="#edit_coupen" class="dropdown-item editcoupen" id="<?php echo $row['id']?>"><i class="icon-file-pencil"></i>Edit</a>
                                                                        
                                                                    
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


<div id="add_coupen" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Coupon</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="#" method="post" id="coupen_form">
                <div class="modal-body">
  
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Coupen</label>
                                <input type="text" placeholder="Coupen" class="form-control" id="coupen" name="coupen">
                            </div>

                            <div class="col-sm-6">
                                <label>Type</label>
                                <select class="form-control" name="type" id="type">
                                    <option value="">Please Select type</option>
                                    <option value="1">Percentage</option>
                                    <option value="2">Rupees</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Discount</label>
                                <input type="number" placeholder="Discount" class="form-control" id="discount" name="discount">
                            </div>

                            <div class="col-sm-6">
                                <label>Max Discount</label>
                                <input type="number" placeholder="Max Discount" class="form-control" id="max_discount" name="max_discount">
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
                                  <input type="text" class="form-control" placeholder="Start Date&hellip;" name="start_date" id="start_date">
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
                            <div class="col-sm-12">
                                <label>Description</label>
                                <textarea class="form-control" id="description" placeholder="Enter Description" name="description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn bg-primary" id="add_coupen">Submit</button>  
                </div>
            </form>
        </div>
    </div>
</div>

<div id="edit_coupen" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Coupon</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="#" id="updateCoupen">
                <div class="modal-body">
                    <input type="hidden" name="id" class="id">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Coupen</label>
                                <input type="text" placeholder="coupen" class="form-control coupen" name="coupen">
                            </div>

                            <div class="col-sm-6">
                                <label>Type</label>
                                <select class="form-control type" name="type">
                                    <option value="">Please Select type</option>
                                    <option value="1">Percentage</option>
                                    <option value="2">Rupees</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Discount</label>
                                <input type="number" placeholder="discount" class="form-control discount"  name="discount">
                            </div>

                            <div class="col-sm-6">
                                <label>Max Discount</label>
                                <input type="number" placeholder="max_discount" class="form-control max_discount"  name="max_discount">
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
                                  <input type="text" class="form-control start_date" placeholder="Start Date&hellip;" name="start_date" >
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label>End Date</label>
                                <div class="input-group">
                                  <span class="input-group-prepend">
                                      <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                  </span>
                                  <input type="text" class="form-control end_date" placeholder="End Date&hellip;" name="end_date">
                              </div> 
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Description</label>
                                <textarea class="form-control description" placeholder="Enter Description" name="description"></textarea>
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

<div id="coupen_usage" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Coupon Usage</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="#" id="add_coupen_usage">
                <div class="modal-body">
                    <input type="hidden" name="id" class="id">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Mobile</label>
                                <input type="number" placeholder="Enter mobile number" class="form-control mobile" name="mobile" id="customer_id" minlength="10" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>

                            <div class="col-sm-6">
                                <label>Coupen</label>
                                <select class="form-control coupen_id" name="coupen_id" id="coupen_id">
                                    <option value="">Please Select Coupen</option>
                                    <?php foreach($coupen as $row){ ?>
                                        <option value="<?php echo $row['id']?>"><?php echo $row['coupen']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Bill No.</label>
                                <input type="text" placeholder="Bill No" class="form-control bill_number"  name="bill_number" id="bill_number">
                            </div>

                            <div class="col-sm-6">
                                <label>Bill Amount</label>
                                <input type="number" placeholder="Bill Amount" class="form-control bill_amount check_discount"  name="bill_amount" id="check_discount">
                            </div>
                        </div>
                    </div>
                     <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Discount</label>
                                <input type="number" placeholder="Discount" class="form-control show_discount"  name="discount" readonly>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn bg-primary submit_button" disabled="">Submit</button>
                    
                </div>
            </form>
        </div>
    </div>
</div>
<input type="hidden" name="base_url" value="<?php echo base_url()?>" id="base_url">


<!-- /Edit modal -->

<script type="text/javascript">
    $(document).ready(function() {

                    $('#start_date').pickadate({
                        formatSubmit: 'yyyy/mm/dd'
                    });

                  $('#end_date').pickadate({
                        formatSubmit: 'yyyy/mm/dd'
                    });

                  $('.start_date').pickadate({
                        formatSubmit: 'yyyy/mm/dd'
                    });

                  $('.end_date').pickadate({
                        formatSubmit: 'yyyy/mm/dd'
                    });


                    $('#coupen').DataTable( {
                        responsive: true
                    });

                    //submit contact form
                    $('#coupen_form').submit(function(e){
                        e.preventDefault();
                        var base_url = $('#base_url').val();
                        var formData = new FormData($(this)[0]);
                         $.ajax({
                                type:'post',
                                data:formData,
                                url: base_url+'Admin/addCoupen',
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

                    $(document).on('click', '.editcoupen', function() {
                        var base_url = $('#base_url').val();
                        var id = $(this).attr('id');
                        $.ajax({
                            type: 'post',
                            data: {
                                id: id
                            },
                            url: base_url + 'Admin/editcoupen',
                            success: function(data) {
                                var obj = $.parseJSON(data);
                                if (obj.errCode == -1) {
                                    $('.id').val(obj.data.id);
                                    $('.coupen').val(obj.data.coupen);
                                    $('.start_date').val(obj.data.start_date);
                                    $('.end_date').val(obj.data.end_date);
                                    $('.type').val(obj.data.type);
                                    $('.discount').val(obj.data.discount);
                                    $('.max_discount').val(obj.data.max_discount);
                                    $('.description').val(obj.data.description);
                                } else if(obj.errCode == 2){
                                    alert(obj.data);
                                }else if(obj.errCode == 3){
                                    alert('Inputs are not valid');
                                }

                            }

                        });
                        });

                        $('#updateCoupen').submit(function(e) {
                        e.preventDefault();
                        var form_data = new FormData($(this)[0]);
                        var base_url = $('#base_url').val();
                        $.ajax({
                            type: 'post',
                            data: form_data,
                            processData: false,
                            contentType: false,
                            url: base_url + 'Admin/updateCoupen',
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


                        //get mobile number list
                        var base_url = $('#base_url').val();

                        // $( "#customer_id" ).autocomplete({
                        //     source: function(request, response) {
                        //          $.ajax({  
                        //          url : base_url+'Admin/getCustomerId?',
                        //          data: { mobile : request.term},
                        //          dataType: "json",
                        //          type: "POST",
                        //          beforeSend: function(){
                        //                     $('.loader').show()
                        //             },
                        //             complete: function(){
                        //                     $('.loader').hide();
                        //             },
                        //          success: function(data){
                        //             response(data.items);
                        //          } 

                        //          });
                        //      },
                        //      minLength: 3
                        //   });

                         $('#check_discount').on('blur', function() {

                            var customer_id = $('#customer_id').val();
                            var bill_number = $('#bill_number').val();
                            var coupen_id = $('#coupen_id').val();
                            var max_discount = $('.check_discount').val();
                            var base_url = $('#base_url').val();
                            $.ajax({
                                type: 'post',
                                data: {coupen_id:coupen_id,customer_id:customer_id,bill_number:bill_number,check_discount:max_discount},
                                url: base_url + 'Admin/checkDiscount',
                                success: function(data) {
                                    var obj = $.parseJSON(data);
                                    if (obj.errCode == -1) {
                                        $('.show_discount').val(obj.message);
                                        $('.submit_button').removeAttr('disabled');
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


                         //add coupen usage
                         $('#add_coupen_usage').submit(function(e) {
                            e.preventDefault();
                            var form_data = new FormData($(this)[0]);
                            var base_url = $('#base_url').val();
                            $.ajax({
                                type: 'post',
                                data: form_data,
                                processData: false,
                                contentType: false,
                                url: base_url + 'Admin/addCoupenUsage',
                                success: function(data) {
                                    var obj = $.parseJSON(data);
                                    if (obj.errCode == -1) {
                                        alert(obj.message);
                                        window.location.href = base_url+"Admin/couponUsage";
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
