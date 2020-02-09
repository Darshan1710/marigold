
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
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <link href="<?php echo base_url()?>css/bootstrap-datetimepicker.css" rel="stylesheet">
<!--     <script src="<?php echo base_url()?>js/moment.min.js"></script> -->
    <script src="<?php echo base_url()?>js/bootstrap-datetimepicker.min.js"></script>
    
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
                                                <h6 class="card-title">Question Form</h6>
                                            </div>

                                            <div class="card-body">
                                            
                                                         
                                                                    
                                                            <form method = "post" action="<?php echo base_url().'index.php/contest/addQuestion'?>" enctype="multipart/form-data" class="form-inline">
                                                                <div class="row">
                                                                <div class="col-md-3">
                                                                    <label>Question</label>
                                                                    <div class="form-group">
                                                                        <input type = "text" name="question" class="form-control">
                                                                        <?php echo form_error('question') ?>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label>Answer Type</label>
                                                                    <div class="form-group">
                                                                        <select name="element_type" class="form-control contest_answer_type" data-number = "1" data-count="1">
                                                                            <option value="">Please Select</option>
                                                                            <option value="text" >Text</option>
                                                                            <option value="radio">Radio</option>
                                                                            <option value="checkbox">Checkbox</option>
                                                                            <option value="select">Select</option>
                                                                        </select>
                                                                        <?php echo form_error('element_type') ?>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                <label>Valid Answer</label>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" placeholder="Correct answer" id="answer" value="<?php echo set_value('valid_answer') ?>" name="valid_answer">
                                                                    <p class="error"><?php echo form_error('valid_answer'); ?></p>
                                                                </div>
                                                                </div>
                                                                </div>
                                                                
                                                                            
                                                            
                                                            <input type = "hidden" name='contest_id' value="<?php echo $contest_id; ?>">
                                                            <input type = "hidden" name='question_id' value="<?php echo $question_id; ?>">
                                                            </div>
                                                            <button type="submit" class="btn btn-primary float-right">Submit</button>
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


</html>
 <!-- Edit modal -->

<input type="hidden" name="base_url" value="<?php echo base_url()?>" id="base_url">

<script type="text/javascript">
     $(".contest_answer_type").on('change',function(){

        var count = $(this).data('number');
        var ans_type = $(this).data("count");

        if(count == 2){
            $(this).parent().parent().next().remove();
        }
        if($(this).val() == "radio" || $(this).val() == "checkbox" || $(this).val() == "select"){
            
                $('#ans_type_div_'+ans_type).remove();
                $('#option_div_'+ans_type).remove();
            
                $(this).parent().parent().after('<div class="col-md-2" data-type="button" id="ans_type_div_'+ans_type+'">'+
                                                '<label>Number of Buttons</label>'+
                                                '<div class="form-group">'+
                                                '<select name="button_count_'+ans_type+'" class="form-control">'+
                                                '<option value ="1">1</option>'+
                                                '<option value ="2">2</option>'+
                                                '<option value ="3">3</option>'+
                                                '<option value ="4">4</option>'+
                                                '</select>'+
                                                '</div>'+
                                                '</div>'+
                                                '<div class="col-md-3" id="option_div_'+ans_type+'">'+
                                                '<label>Button Options</label>'+
                                                '<div class="form-group">'+
                                                '<input type = "text" name="button_options_'+ans_type+'" class="form-control">'+
                                                '</div>'+
                                                '</div>'+
                                                '</div>');
                $(this).data('number',2);
            
            
        }
        else{
            if($(this).val() == 'text'){
                $(this).parent().parent().after('<div class="col-md-3" data-type="button" id="ans_type_div_'+ans_type+'">'+
                                                '<label>Answer</label>'+
                                                '<div class="form-group">'+
                                                '<input type="text" class="form-control" name="button_options_'+ans_type+'">'+
                                                '</div>'+
                                                '</div>');
                $(this).data('number',2);
            }   

        }
    });

</script>


