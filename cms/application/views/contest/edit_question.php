
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
                                           
                                                               
                                                            <form method = "post" action="<?php echo base_url().'index.php/contest/updateQuestion'?>">
                                                                <div class="row">
                                                            <?php 
                                                            $i = 1;
                                                            foreach($question_details as $row){

                                                            $count = count(explode(',', $row['element_text']));


                                                             ?> 
                                                                <div class="col-md-3">
                                                                    <label>Question</label>
                                                                    <div class="form-group">
                                                                        <input type = "text" name = "question" value ="<?php echo set_value('question_<?php echo $row["question_text"] ?>',isset($row['question_text']) ? $row['question_text'] : ''); ?>" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label>Answer Type</label>
                                                                    <div class="form-group">
                                                                        <select name="answer_type" class="form-control contest_answer_type select" data-number = "2">
                                                                            <option value="">Please Select</option>
                                                                            <option value="text" <?php echo $row['element_type'] == 'text' ? 'selected' : '' ?>>Text</option>
                                                                            <option value="radio" <?php echo $row['element_type'] == 'radio' ? 'selected' : '' ?>>Radio</option>
                                                                            <option value="checkbox" <?php echo $row['element_type'] == 'checkbox' ? 'selected' : '' ?>>Checkbox</option>
                                                                            <option value="select" <?php echo $row['element_type'] == 'select' ? 'selected' : '' ?>>Select</option>
                                                                        </select>
                                                                        <br>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <?php if($row['element_type'] == 'text'){?>
                                                                            <div class="col-md-2" data-type="button">
                                                                            <label>Answer</label>
                                                                            <div class="form-group">
                                                                            <input type="text" class="form-control" name="button_options" value="<?php echo set_value('question_<?php echo $row["element_text"] ?>',isset($row['element_text']) ? $row['element_text'] : ''); ?>">
                                                                            </div>
                                                                            </div>
                                                                        <?php }else{ ?>
                                                                            <div class="col-md-2" data-type="button">
                                                                            <label>Number of Buttons</label>
                                                                            <div class="form-group">
                                                                            <select name="button_count" class="form-control">
                                                                            <option value ="1" <?php echo $count == 1 ? 'selected' : ''; ?>>1</option>
                                                                            <option value ="2" <?php echo $count == 2 ? 'selected' : ''; ?>>2</option>
                                                                            <option value ="3" <?php echo $count == 3 ? 'selected' : ''; ?>>3</option>
                                                                            <option value ="4" <?php echo $count == 4 ? 'selected' : ''; ?>>4</option>
                                                                            <option value ="5" <?php echo $count == 5 ? 'selected' : ''; ?>>5</option>
                                                                            </select>
                                                                            </div>
                                                                            <label>Button Options</label>
                                                                            <div class="form-group">
                                                                            <input type = "text" name="button_options" class="form-control" value="<?php echo set_value('question_<?php echo $row["element_text"] ?>',isset($row['element_text']) ? $row['element_text'] : ''); ?>">
                                                                            </div>
                                                                            </div>
                                                                        <?php } ?>
                                                                 <div class="col-md-2">
                                                                    <label>Valid Answer</label>
                                                                    <div class="form-group">
                                                                        <input type = "text" name = "valid_answer" value ="<?php echo set_value('valid_answer',isset($row['valid_answer']) ? $row['valid_answer'] : ''); ?>" class="form-control">
                                                                        <?php echo form_error('valid_answer'); ?>
                                                                    </div>
                                                                </div>
                                                            <input type = "hidden" name='contest_id' value="<?php echo $row['contest_id'] ?>">
                                                            <input type = "hidden" name='question_id' value="<?php echo $row['question_id'] ?>">
                                                            <input type = "hidden" name='element_id' value="<?php echo $row['element_id'] ?>">
                                                            <?php } ?>
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
                                                '<div class="col-md-2" id="option_div_'+ans_type+'">'+
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
                $(this).parent().parent().after('<div class="col-md-12" data-type="button" id="ans_type_div_'+ans_type+'">'+
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

