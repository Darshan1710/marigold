
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
    <script src="<?php echo base_url() ?>js/plugins/editors/ckeditor/ckeditor.js"></script> 

     <script src="<?php echo base_url() ?>js/plugins/ui/moment/moment.min.js"></script>
    <script src="<?php echo base_url() ?>js/plugins/pickers/pickadate/picker.js"></script>
    <script src="<?php echo base_url() ?>js/plugins/pickers/pickadate/picker.date.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    
    <script src="<?php echo base_url() ?>js/plugins/forms/selects/select2.min.js"></script>

    <script src="<?php echo base_url() ?>js/plugins/extensions/jquery_ui/interactions.min.js"></script>
    <script src="<?php echo base_url() ?>js/plugins/forms/selects/select2.full.min.js"></script>

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
                                    <!-- Colors -->
                                        <div class="card">
                                            <div class="card-header header-elements-inline">
                                                <h6 class="card-title">Contest Form</h6>
                                            </div>

                                            <div class="card-body">
                                                <form action="<?php echo base_url()?>contest/create_form" enctype="multipart/form-data" method="post">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>Contest Name</label>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Contest Name" id="contest_name" value="<?php echo set_value('contest_name') ?>" name="contest_name">
                                                                <p class="error"><?php echo form_error('contest_name'); ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>No. of Questions</label>
                                                            <div class="form-group">
                                                               <select name="num_fields" class="form-control select" id="num_fields">  
                                                                    <option value="">Please Select No.of Question</option>
                                                                    <?php for($i = 1;$i < 10;$i++){?>
                                                                    <option value="<?php echo $i ?>" <?php set_select("num_fields",$i,set_value('num_fields') == $i ? true : false )?>><?php echo $i ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <p class="error"><?php echo form_error('num_fields'); ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Points</label>
                                                            <div class="form-group">
                                                                <input type="type" class="form-control" placeholder="Points" name="points" value="<?php echo set_value('points');?>">
                                                                <p class="error"><?php echo form_error('points'); ?></p>
                                                            </div>
                                                        </div>
                                                            
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>Start</label>
                                                            <div class="form-group">
                                                                 <div class="input-group">
                                                                      <span class="input-group-prepend">
                                                                          <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                                                      </span>
                                                                      <input type="text" class="form-control" placeholder="Start Date&hellip;" name="start" id="start" value="<?php echo set_value('start')?>">
                                                                  </div>
                                                                <p class="error"><?php echo form_error('start'); ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>End</label>
                                                            <div class="form-group">
                                                                 <div class="input-group">
                                                                      <span class="input-group-prepend">
                                                                          <span class="input-group-text"><i class="icon-calendar5"></i></span>
                                                                      </span>
                                                                      <input type="text" class="form-control" placeholder="End Date&hellip;" name="end" id="end" value="<?php echo set_value('end')?>">
                                                                  </div>
                                                                <p class="error"><?php echo form_error('end'); ?></p>
                                                               
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Type</label>
                                                            <div class="form-group">
                                                                <select class="form-control select" name="type">
                                                                    <option value="">Please Select Type</option>
                                                                    <option value="1" <?php echo set_select('type','1',set_value('type') == '1' ? true : false)?>>Weekly</option>
                                                                    <option value="2" <?php echo set_select('type','2',set_value('type') == '1' ? true : false)?>>Monthly</option>
                                                                </select>
                                                                <?php echo form_error('type')?>
                                                            </div>
                                                        </div>
                                                            
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>Banner Image</label>
                                                            <div class="form-group">
                                                                <input type="file" class="form-control h-auto" placeholder="image" id="image" name="image">
                                                                <p class="error"><?php echo form_error('image'); ?></p>
                                                            </div>
                                                        </div>
                                                        
                                                            
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label>Terms and Condition</label>
                                                            <div class="form-group">
                                                                <textarea class="form-control" name="terms_and_condition" rows="5" id="terms_and_condition"><?php echo set_value('terms_and_condition') ?></textarea>
                                                                <?php echo form_error('terms_and_condition'); ?>                
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label>How to Participate</label>
                                                            <div class="form-group">
                                                               <textarea class="form-control" name="how_to_participate" rows="5" id="how_to_participate"><?php echo set_value('how_to_participate') ?></textarea>
                                                                <?php echo form_error('how_to_participate'); ?>     
                                                            </div>
                                                        </div>
        
                                                            
                                                    </div>

                                                    <div class="text-right">
                                                        <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /colors -->
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
                                    <label>Action Time</label>
                                    <!-- <div class="form-group">
                                        <div class='input-group action_time' id='action_time'>
                                          <input type='text' class="form-control" name="action_time"/>
                                          <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                          </span>
                                        </div>
                                    </div> -->
                                    <input type="datetime-local" class="form-control" id="action_time" name="action_time"> 
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
<script>
$(document).ready(function() {

         $("#start").pickadate({
        });

      $("#end").pickadate({
        });

      CKEDITOR.replace('terms_and_condition');
      CKEDITOR.replace('how_to_participate');

        $(document).on('click','.editFamily',function(){
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
                    $("#action_time").val(obj.data.action_taken_time);
                    
                    
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
                        location.reload();
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


        

});

</script>

