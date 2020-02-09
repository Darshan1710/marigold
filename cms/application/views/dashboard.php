
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
    <link href="<?php echo base_url() ?>css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
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
    <script src="<?php echo base_url()?>js/charts/loader.js"></script>
    <!-- /core JS files -->

    <link href="<?php echo base_url()?>css/daterangepicker.css" rel="stylesheet">
    <script src="<?php echo base_url()?>js/moment.min.js"></script>
    <script src="<?php echo base_url()?>js/daterangepicker.js"></script>


    <!-- Theme JS files -->
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
                    <div class="content">
                 <!-- s -->
                <!-- Simple line chart -->
                <div class="card">
                    <div class="card-body">
            <div class="row mb-3">
                  

                 <div class="col-xl-3">
                    <div class="media flex-column flex-sm-row mt-0 mb-3 box2 birthday-box">
                          <h6 class="media-title"></h6><ul class="list-inline list-inline-dotted text-muted mb-2"><li></li></ul>
                          <div class="media-body">
                            <h6 class="media-title">Weekly Birthday</h6><ul class="list-inline list-inline-dotted text-muted mb-2"><li></li></ul>
                               <h3><?php echo $dashboard['weekly_birthday_count']?></h3>
                               <a href="<?php echo base_url('Admin/getWeeklySMSBirthdayList')?>" title="Send SMS"><i class="fab fa-rocketchat mr-2 fa-2x"></i></a>
                               <a href="<?php echo base_url('Admin/getWeeklyEmailBirthdayList')?>" title="Send Mail"><i class="fas fa-envelope mr-2 fa-2x"></i></a>
                          </div>
                    </div>
                  </div>

                  <div class="col-xl-3">
                    <div class="media flex-column flex-sm-row mt-0 mb-3 box2 birthday-box">
                          <h6 class="media-title"></h6><ul class="list-inline list-inline-dotted text-muted mb-2"><li></li></ul>
                          <div class="media-body">
                            <h6 class="media-title">Weekly Anniversary</h6><ul class="list-inline list-inline-dotted text-muted mb-2"><li></li></ul>
                               <h3><?php echo $dashboard['weekly_anniversary_count']?></h3>
                               <a href="<?php echo base_url('Admin/getWeeklySMSAnniversaryList')?>" title="Send SMS"><i class="fab fa-rocketchat mr-2 fa-2x"></i></a>
                               <a href="<?php echo base_url('Admin/getWeeklyEmailAnniversaryList')?>" title="Send mail"><i class="fas fa-envelope mr-2 fa-2x"></i></a>
                          </div>
                    </div>
                  </div>

                  <div class="col-xl-3">
                    <div class="media flex-column flex-sm-row mt-0 mb-3 box2 birthday-box">
                          <h6 class="media-title"></h6><ul class="list-inline list-inline-dotted text-muted mb-2"><li></li></ul>
                          <div class="media-body">
                            <h6 class="media-title">Todays Birthday</h6><ul class="list-inline list-inline-dotted text-muted mb-2"><li></li></ul>
                               <h3><?php echo $dashboard['birthday_count']?></h3>
                               <a href="<?php echo base_url('Admin/getSMSBirthdayList')?>" title="Send SMS"><i class="fab fa-rocketchat mr-2 fa-2x"></i></a>
                               <a href="<?php echo base_url('Admin/getEmailBirthdayList')?>" title="Send Mail"><i class="fas fa-envelope mr-2 fa-2x"></i></a>
                          </div>
                    </div>
                  </div>

                  <div class="col-xl-3">
                    <div class="media flex-column flex-sm-row mt-0 mb-3 box2 birthday-box">
                          <h6 class="media-title"></h6><ul class="list-inline list-inline-dotted text-muted mb-2"><li></li></ul>
                          <div class="media-body">
                            <h6 class="media-title">Todays Anniversary</h6><ul class="list-inline list-inline-dotted text-muted mb-2"><li></li></ul>
                               <h3><?php echo $dashboard['anniversary_count']?></h3>
                               <a href="<?php echo base_url('Admin/getSMSAnniversaryList')?>" title="Send SMS"><i class="fab fa-rocketchat mr-2 fa-2x"></i></a>
                               <a href="<?php echo base_url('Admin/getEmailAnniversaryList')?>" title="Send mail"><i class="fas fa-envelope mr-2 fa-2x"></i></a>
                          </div>
                    </div>
                  </div>

            </div>

            <div class="row mb-3">
                  

                  <div class="col-xl-3">
                    <div class="media flex-column flex-sm-row mt-0 mb-3 box1">
                          <h6 class="media-title"></h6><ul class="list-inline list-inline-dotted text-muted mb-2"><li></li></ul>
                          <div class="media-body">
                            <h6 class="media-title">Customer</h6><ul class="list-inline list-inline-dotted text-muted mb-2"><li></li></ul>
                               <h3><?php echo $dashboard['number_of_customer']?></h3>
                          </div>
                    </div>
                  </div>

                  <div class="col-xl-3">
                    <div class="media flex-column flex-sm-row mt-0 mb-3 box10">
                          <h6 class="media-title"></h6><ul class="list-inline list-inline-dotted text-muted mb-2"><li></li></ul>
                          <div class="media-body">
                            <h6 class="media-title">No. of Feedback</h6><ul class="list-inline list-inline-dotted text-muted mb-2"><li></li></ul>
                               <h3><?php echo $dashboard['number_of_feedback']?></h3>
                          </div>
                    </div>
                  </div>


            </div>

            <div class="row">
                  

                  <div class="col-xl-3">
                    <div class="media flex-column flex-sm-row mt-0 mb-3 box2">
                          <h6 class="media-title"></h6><ul class="list-inline list-inline-dotted text-muted mb-2"><li></li></ul>
                          <div class="media-body">
                            <h6 class="media-title">Food</h6><ul class="list-inline list-inline-dotted text-muted mb-2"><li></li></ul>
                               <h3><?php echo $dashboard['question_1']?></h3>
                          </div>
                    </div>
                  </div>

                  <div class="col-xl-3">
                    <div class="media flex-column flex-sm-row mt-0 mb-3 box3">
                          <h6 class="media-title"></h6><ul class="list-inline list-inline-dotted text-muted mb-2"><li></li></ul>
                          <div class="media-body">
                            <h6 class="media-title">Cleanliness</h6><ul class="list-inline list-inline-dotted text-muted mb-2"><li></li></ul>
                               <h3><?php echo $dashboard['question_2']?></h3>
                          </div>
                    </div>
                  </div>

                  <div class="col-xl-3">
                    <div class="media flex-column flex-sm-row mt-0 mb-3 box4">
                          <h6 class="media-title"></h6><ul class="list-inline list-inline-dotted text-muted mb-2"><li></li></ul>
                          <div class="media-body">
                            <h6 class="media-title">Service</h6><ul class="list-inline list-inline-dotted text-muted mb-2"><li></li></ul>
                               <h3><?php echo $dashboard['question_3']?></h3>
                          </div>
                    </div>
                  </div>

                  <div class="col-xl-3">
                    <div class="media flex-column flex-sm-row mt-0 mb-3 box5">
                          <h6 class="media-title"></h6><ul class="list-inline list-inline-dotted text-muted mb-2"><li></li></ul>
                          <div class="media-body">
                            <h6 class="media-title">Friendliness</h6><ul class="list-inline list-inline-dotted text-muted mb-2"><li></li></ul>
                               <h3><?php echo $dashboard['question_4']?></h3>
                          </div>
                    </div>
                  </div>

                  <div class="col-xl-3">
                    <div class="media flex-column flex-sm-row mt-0 mb-3 box6">
                          <h6 class="media-title"></h6><ul class="list-inline list-inline-dotted text-muted mb-2"><li></li></ul>
                          <div class="media-body">
                            <h6 class="media-title">Apperance</h6><ul class="list-inline list-inline-dotted text-muted mb-2"><li></li></ul>
                               <h3><?php echo $dashboard['question_5']?></h3>
                          </div>
                    </div>
                  </div>

                  <div class="col-xl-3">
                    <div class="media flex-column flex-sm-row mt-0 mb-3 box7">
                          <h6 class="media-title"></h6><ul class="list-inline list-inline-dotted text-muted mb-2"><li></li></ul>
                          <div class="media-body">
                            <h6 class="media-title">Money</h6><ul class="list-inline list-inline-dotted text-muted mb-2"><li></li></ul>
                               <h3><?php echo $dashboard['question_6']?></h3>
                          </div>
                    </div>
                  </div>

                  <div class="col-xl-3">
                    <div class="media flex-column flex-sm-row mt-0 mb-3 box8">
                          <h6 class="media-title"></h6><ul class="list-inline list-inline-dotted text-muted mb-2"><li></li></ul>
                          <div class="media-body">
                            <h6 class="media-title">Design</h6><ul class="list-inline list-inline-dotted text-muted mb-2"><li></li></ul>
                               <h3><?php echo $dashboard['question_7']?></h3>
                          </div>
                    </div>
                  </div>
                </div>
                  <hr>


                    </div>
             <div class="card-body">
              <div class="row">
              <div class="col-xs-12">
              <form method="post" action="<?php echo base_url('Admin/dashboard')?>" class="header-elements-inline">
                <div class="form-group" style="margin-right: 2%">
                  <label>Datepicker:</label>
                  <div class="input-group">
                      <input type="text" class="form-control" id="date_picker" name="date_picker" value="<?php echo set_value('date_picker')?>">
                  </div>
                </div>

                 <div class="form-group" style="margin-right: 2%">
                  <label>Type:</label>
                  <div class="input-group">
                      <select class="form-control select" name="type"> 
                          <option value="DATE" <?php echo set_select('type','DATE',isset($type) && $type == 'DATE' ? TRUE : FALSE)?>>DATE</option>
                          <option value="WEEK" <?php echo set_select('type','WEEK',isset($type) && $type == 'WEEK' ? TRUE : FALSE)?>>WEEK</option>
                          <option value="MONTH" <?php echo set_select('type','MONTH',isset($type) && $type == 'MONTH' ? TRUE : FALSE)?>>MONTH</option>
                      </select>
                  </div>
                </div>

                <div class="form-group">
                  <label>&nbsp;&nbsp;</label>
                  <div class="input-group">
                    <button type="submit" class="btn bg-blue ml-3">Submit</button>
                  </div>
                </div>
              </form>
              </div>
            </div>
                   <?php if($rating) {?>
                            <div class="card-header header-elements-inline">
                                <h5 class="card-title">Quality of food</h5>
                            </div>

                            <div class="card-body">
                                

                                <div class="chart-container">
                                    <div class="chart" id="google-line-question-1"></div>
                                </div>
                            </div>



                    <hr>
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Cleanliness of Restaurant / Rest Room</h5>
                    </div>

                    <div class="card-body">
                        

                        <div class="chart-container">
                            <div class="chart" id="google-line-question-2"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Quality of Service</h5>
                    </div>

                    <div class="card-body">
                        

                        <div class="chart-container">
                            <div class="chart" id="google-line-question-3"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Friendliness of Staff</h5>
                    </div>

                    <div class="card-body">
                        

                        <div class="chart-container">
                            <div class="chart" id="google-line-question-4"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Appearance of Staff</h5>
                    </div>

                    <div class="card-body">
                        

                        <div class="chart-container">
                            <div class="chart" id="google-line-question-5"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Value for Money</h5>
                    </div>

                    <div class="card-body">
                        

                        <div class="chart-container">
                            <div class="chart" id="google-line-question-6"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Restaurant Interior Design</h5>
                    </div>

                    <div class="card-body">
                        

                        <div class="chart-container">
                            <div class="chart" id="google-line-question-7"></div>
                        </div>
                    </div>
                  </div>
                  <?php }else{ ?>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-xs-12 text-center">
                          <h1>No Data Found</h1>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                </div>
                <!-- /simple line chart -->


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
<input type="hidden" name="base_url" value="<?php echo base_url()?>" id="base_url">
            <!-- /content area -->
<script type="text/javascript">
  /* ------------------------------------------------------------------------------
 *
 *  # Google Visualization - lines
 *
 *  Google Visualization line chart demonstration
 *
 * ---------------------------------------------------------------------------- */


// Setup module
// ------------------------------

var GoogleLineBasic = function() {


    //
    // Setup module components
    //

    // Line chart
    var _googleLineBasic = function() {
        if (typeof google == 'undefined') {
            console.warn('Warning - Google Charts library is not loaded.');
            return;
        }

        // Initialize chart
        google.charts.load('current', {
            callback: function () {

                // Draw chart
                drawLineChart();

                // Resize on sidebar width change
                $(document).on('click', '.sidebar-control', drawLineChart);

                // Resize on window resize
                var resizeLineBasic;
                $(window).on('resize', function() {
                    clearTimeout(resizeLineBasic);
                    resizeLineBasic = setTimeout(function () {
                        drawLineChart();
                    }, 200);
                });
            },
            packages: ['corechart']
        });

        // Chart settings
        function drawLineChart() {

            // Define charts element
            var line_chart_element_1 = document.getElementById('google-line-question-1');
            var line_chart_element_2 = document.getElementById('google-line-question-2');
            var line_chart_element_3 = document.getElementById('google-line-question-3');
            var line_chart_element_4 = document.getElementById('google-line-question-4');
            var line_chart_element_5 = document.getElementById('google-line-question-5');
            var line_chart_element_6 = document.getElementById('google-line-question-6');
            var line_chart_element_7 = document.getElementById('google-line-question-7');

            // Data
            // Data
            var data_1 = google.visualization.arrayToDataTable([
                ['Date', 'Quality of food'],

                <?php 
                $i = 0;
                foreach($rating as $row){

                   echo "['".$row['created_at']."',
                          ".$row['question_1']."],";
                }
                ?>
            ]);

            var data_2 = google.visualization.arrayToDataTable([
                ['Date', 'Cleanliness of Restaurant / Rest Room'],

                <?php 
                $i = 0;
                foreach($rating as $row){

                   echo "['".$row['created_at']."',
                          ".$row['question_1']."],";
                }
                ?>
            ]);

            var data_3 = google.visualization.arrayToDataTable([
                ['Date', 'Quality of Service'],

                <?php 
                $i = 0;
                foreach($rating as $row){

                   echo "['".$row['created_at']."',
                          ".$row['question_3']."],";
                }
                ?>
            ]);

            var data_4 = google.visualization.arrayToDataTable([
                ['Date', 'Friendliness of Staff'],

                <?php 
                $i = 0;
                foreach($rating as $row){

                   echo "['".$row['created_at']."',
                          ".$row['question_4']."],";
                }
                ?>
            ]);

            var data_5 = google.visualization.arrayToDataTable([
                ['Date', 'Appearance of Staff'],

                <?php 
                $i = 0;
                foreach($rating as $row){

                   echo "['".$row['created_at']."',
                          ".$row['question_5']."],";
                }
                ?>
            ]);

            var data_6 = google.visualization.arrayToDataTable([
                ['Date', 'Value for Money'],

                <?php 
                $i = 0;
                foreach($rating as $row){

                   echo "['".$row['created_at']."',
                          ".$row['question_6']."],";
                }
                ?>
            ]);

            var data_7 = google.visualization.arrayToDataTable([
                ['Date', 'Restaurant Interior Design'],

                <?php 
                $i = 0;
                foreach($rating as $row){

                   echo "['".$row['created_at']."',
                          ".$row['question_7']."],";
                }
                ?>
            ]);

            // Options
            var options = {
                fontName: 'Roboto',
                height: 400,
                curveType: 'function',
                fontSize: 12,
                chartArea: {
                    left: '5%',
                    width: '94%',
                    height: 350
                },
                pointSize: 4,
                tooltip: {
                    textStyle: {
                        fontName: 'Roboto',
                        fontSize: 13
                    }
                },
                vAxis: {
                    title: 'Rating',
                    titleTextStyle: {
                        fontSize: 13,
                        italic: false
                    },
                    gridlines:{
                        color: '#e5e5e5',
                        count: 10
                    },
                    minValue: 0
                },
                legend: {
                    position: 'top',
                    alignment: 'center',
                    textStyle: {
                        fontSize: 12
                    }
                },
                vAxis: { 
                        ticks: [0.5,1,1.5,2,2.5,3,3.5,4,4.5,5]
                    }
            };

            // Draw chart
            var line_chart = new google.visualization.LineChart(line_chart_element_1);
            line_chart.draw(data_1, options);

            var line_chart = new google.visualization.LineChart(line_chart_element_2);
            line_chart.draw(data_2, options);

            var line_chart = new google.visualization.LineChart(line_chart_element_3);
            line_chart.draw(data_3, options);

            var line_chart = new google.visualization.LineChart(line_chart_element_4);
            line_chart.draw(data_4, options);

            var line_chart = new google.visualization.LineChart(line_chart_element_5);
            line_chart.draw(data_5, options);


            var line_chart = new google.visualization.LineChart(line_chart_element_6);
            line_chart.draw(data_6, options);

            var line_chart = new google.visualization.LineChart(line_chart_element_7);
            line_chart.draw(data_7, options);
        }
    };


    //
    // Return objects assigned to module
    //

    return {
        init: function() {
            _googleLineBasic();
        }
    }
}();


// Initialize module
// ------------------------------

GoogleLineBasic.init();



    var start = moment().subtract(7, 'days');
    var end = moment();

    function cb(start, end) {
        $('#date_picker').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#date_picker').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')]
        }
    }, cb);

</script>