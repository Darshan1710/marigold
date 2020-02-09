	<!-- Page content -->
	<div class="page-content">
		<!-- Main content -->
		<div class="content-wrapper">
			<!-- Content area -->
			<div class="content">
				<!-- Hover rows -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Message Logs</h5>
						
						<div class="header-elements">
						
	                	</div>
					</div>


					<table class="table datatable-basic table-hover text-center" id="message_logs">
						<thead>
							<tr>
								<th>Sr. No.</th>
                                <th>Mobile</th>
                                <th>Message</th>
                                <th>Recieved Status</th>
                                <th>Created At</th>
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
	<!-- /page content -->

</body>

</html>
<script type="text/javascript">
	$(document).ready(function() {
    	$('#message_logs thead th').each(function () {
					    	var i = 0;
			                var title = $(this).text();
			                if(title == 'Sr. No.'){

			                }else if(title == 'Created At'){
			                	$(this).html(title+'<input type="text" class="col-search-input" id="created_at"/>');
			                }else{
			                	$(this).html(title+'<input type="text" class="col-search-input" />');
			                }
			            });


				    var table = $('#message_logs').DataTable({
				    	"scrollX": true,
            			"pagingType": "numbers",
				        // Processing indicator
				        "processing": true,
				        // DataTables server-side processing mode
				        "serverSide": true,
				        // Initial no order.
				        "order": [],
				        // Load data from an Ajax source
				        "ajax": {
				            "url": "<?php echo base_url('Admin/getMessageLogList/'); ?>",
				            "type": "POST"
				        },
				        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				        "dom" : 'Blfrtip',
				         "buttons": [
					           {
					               "extend": 'excelHtml5',
					               "title" : 'Message Log'
					           },
					           {
					               "extend": 'csv',
					               "title" : 'Message Log'
					           },
					           {
					               "extend": 'pdfHtml5',
					               "title" : 'Message Log'
					           },
					           {
					             "extend"  : 'print',
					             "title"   : 'Message Log'
					           },
					     ],
				        //Set column definition initialisation properties
				        "columnDefs": [{ "name": "sr_no",   "targets": 0 },
									    { "name": "mobile",  "targets": 1 },
									    { "name": "message",  "targets": 2 },
									    { "name": "recieved_status",  "targets": 3 },
									    { "name": "ml.created_at",  "targets": 4 },
									    

									   ]
				    	});

				    	//draw table
					    table.columns().every(function () {
			                var table = this;
			                $('input', this.header()).on('keyup change', function () {
			                    if (table.search() !== this.value) {
			                    	   table.search(this.value).draw();
			                    }
			                });
			            });
			


			//tooltip
	

			$(function() {

				 var start = moment().subtract(29, 'days');
			    var end = moment();

			    function cb(start, end) {
			        $('#created_at').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
			    }

			    $('#created_at').daterangepicker({
			        startDate: start,
			        endDate: end,
			        ranges: {
			           'Today': [moment(), moment()],
			           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
			           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
			           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
			           'This Month': [moment().startOf('month'), moment().endOf('month')],
			           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			        }
			    }, cb);

			    cb(start, end);
			});
			
		});

</script>
