<!DOCTYPE html>
<html lang="en">
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
      <script src="<?php echo base_url() ?>js/plugins/tables/datatables/datatables.min.js"></script>
      <script src="<?php echo base_url() ?>js/plugins/extensions/jquery_ui/interactions.min.js"></script>
      <script src="<?php echo base_url() ?>js/app.js"></script>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap-datetimepicker.min.css">
      <script src="<?php echo base_url(); ?>js/datetime/moment.min.js"></script>
      <script src="<?php echo base_url(); ?>js/datetime/bootstrap-datetimepicker.min.js"></script>
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
                                <a href="<?php echo base_url().'index.php/Contest/questionForm/'.$this->uri->segment(3)?>" class="btn btn-primary btn-sm ml-1">Add Question</a>
                              </div>
                              <div class="card-body">

                                <div id="page-content-wrapper">
                                  <div class="container-fluid">
                                    <h6>Question List</h6>
                                    
                                    <table class="table datatable-basic table-hover text-center" id="question_list">
                                      <thead>
                                        <tr>
                                          <th scope="col">Sr No.</th>
                                          <th scope="col">Question</th>
                                            <th scope="col">Element Type</th>
                                            <th scope="col">Answer</th>
                                            <th scope="col">Action</th>
                                          </tr>
                                      </thead>
                                          <?php 
                                          if($contest_form_details){
                                            $i = 1;
                                            foreach($contest_form_details as $row){ ?>
                                              <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $row['question_text']; ?></td>
                                                <td><?php echo $row['element_type']; ?></td>
                                                <td><?php echo $row['element_text']; ?></td>
                                                <td><div class="list-icons">
                                                        <div class="dropdown">
                                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                                <i class="icon-menu9"></i>
                                                            </a>

                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="<?php echo base_url().'index.php/Contest/editQuestion/'.$row['contest_id'].'/'.$row['question_id']; ?>"  class="dropdown-item"><i class="icon-file-pencil"></i>Edit</a>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                              </tr>
                                          <?php 
                                            $i++;
                                            }
                                          }
                                          ?>
                                      <tfoot>
                                        <tr>
                                          <th scope="col">Sr No.</th>
                                          <th scope="col">Question</th>
                                            <th scope="col">Element Type</th>
                                            <th scope="col">Answer</th>
                                            <th scope="col">Action</th>
                                          
                                          </tr>
                                      </tfoot>
                                    </table>
                                    
                                  </div>
                                </div>
                              </div>
                           </div>
                           <!-- /hover rows -->
                        </div>
                        <!-- /content area -->
                     </div>
                     <!-- /main content -->
                  </div>
                  <!-- /page content -->

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
<div id="gift_form" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Gift</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="#" id="updateGift" method="post"  enctype='multipart/form-data'>
              <input type="hidden" name="gift_id" id="gift_id">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Contest</label>
                                <select class="form-control" name="contest_id" id="contest_id">
                                  <option value="">Please Select Contest</option>
                                  <?php foreach($contest as $row){?>
                                    <option value="<?php echo $row['id']?>"><?php echo $row['contest_name']?></option>
                                  <?php } ?>
                                </select>
                            </div>

                            <div class="col-sm-6">
                                <label>Winners</label>
                                <input type="number" placeholder="winner count" class="form-control" id="winners" name="winners">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Name</label>
                                <input type="text" placeholder="Name" class="form-control" id="name" name="name">
                            </div>

                            <div class="col-sm-6">
                                <label>Image</label>
                                <img src="" height="50px" width="50px" id="image">
                                <input type="file" name="new_image" class="new_image" style="display: none;">
                                <input type="hidden" name="image" class="image">
                                <button class="btn btn-primary change_image_button" type="button">Change Image</button>
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
           $('#question_list').DataTable( {
               responsive: true
           });

           $(document).on('click','.edit_gift',function(){
              var gift_id = $(this).attr('id');
              var base_url    = $('#base_url').val();
              $.ajax({
                type:'post',
                url:base_url+'Contest/editGift',
                data:{gift_id:gift_id},
                success:function(data){
                  var result = $.parseJSON(data);
                  if(result.errCode == -1){
                    
                    $('#gift_id').val(result.message.id);
                    $('#contest_id').val(result.message.contest_id);
                    $('#name').val(result.message.name);
                    $('#winners').val(result.message.winners);
                    $('#image').attr("src",result.message.image);
                    $('.image').val(result.message.image);
                  }else{
                    alert('No data Found');
                  } 
                }
              });
            });

            $(function(){
              $('#updateGift').submit(function(e){
                e.preventDefault();

                var url = $('#base_url').val();
                var formData  = new FormData($('#updateGift')[0]);
                var base_url = url+'Contest/updateGiftDetails';
                
                $.ajax({
                          url: base_url,
                          type: 'post',
                          data: formData,
                          contentType: false, 
                         processData: false,
                          success: function(data) {
                              var obj = $.parseJSON(data);
                              if(obj.errCode == -1 ){
                                alert(obj.message);
                                window.location.reload();
                              }else if(obj.errCode == 2 || obj.errCode == 3){
                                alert(obj.message);
                              }else{
                                $('.error').remove();
                                $.each(obj.messages,function(key,value){
                                  var element = $('#'+key);
                                  element.after(value);
                                });
                              }
                          }
                    }); 
              });
            });

            $('.change_image_button').click(function(){
              $('#image').css('display','none');
              $('.new_image').css('display','block');
              $('.change_image_button').css('display','none');
            });
  });
   
</script>