
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
    

   
    <!-- /theme JS files -->

</head>

<body>

    
    <!-- Main navbar -->
     <?php $this->load->view('common/navbar'); ?>
    <!-- /main navbar -->


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
              <a href="<?php echo base_url() ?>Admin/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
              <a href="#" class="breadcrumb-item">Feedback</a>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
          </div>

          
        </div>
      </div>
      <!-- /page header -->


      <!-- Content area -->
        <!-- Page content -->
          <div class="page-content">
              <!-- Main content -->
              <div class="content-wrapper">
                <!-- Content area -->
                <div class="content">
          <!-- Colors -->
                        <div class="card">
                    <div class="card-header">
                      <h5 class="card-title">Import Feedback</h5>
                      
                      
                      <div class="header-elements">
                        <a href="<?php echo base_url()?>document/feedback.csv" class="btn btn-primary btn-sm mr-1"><i class="icon-file-download" download></i>   Sample File</a>
                              </div>

                    </div>

                    <div class="card-body">
                      <?php if(isset($message)){?>
                      <div class="card-body">
                      <p style="color: green;"><?php echo $message; ?></p>
                      <p>Total rows = <?php echo $rowCount; ?></p>
                      <p>Inserted = <?php echo $insertCount; ?></p>
                      <p>Not Inserted = <?php echo $notAddCount; ?></p>
                      </div>
                      <?php } ?>

                      <form action="<?php echo base_url()?>Admin/importFeedbackData" method="post" enctype="multipart/form-data">
                        

                        <fieldset class="mb-3">
                          <legend class="text-uppercase font-size-sm font-weight-bold"></legend>

                          <div class="form-group row">
                            <label class="col-form-label col-lg-2">Feedback</label>
                            <div class="col-lg-10">
                              <input type="file" class="form-control h-auto" name="file">
                              <?php echo form_error('file')?>
                            </div>
                          </div>

                        </fieldset>


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
      <!-- /content area -->


      <!-- Footer -->
       <?php $this->load->view('common/footer'); ?>
      <!-- /footer -->

    </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</body>
    
</html>
<input type="hidden" name="base_url" value="<?php echo base_url()?>" id="base_url">
<script type="text/javascript">
  $(document).ready(function(){
  

    
    CKEDITOR.replace('body');

    $('#sendbulkemail').submit(function(e){
              for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
    
            e.preventDefault();
            var form_data = new FormData($(this)[0]);
            var base_url = $('#base_url').val();
            $.ajax({
                type:'post',
                data:form_data,
                processData: false,
                contentType: false,
                url: base_url+'Admin/sendBulkEmail',
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
