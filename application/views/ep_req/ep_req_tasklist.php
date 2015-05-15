<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>BITSO 4.0</title>
    <?php $this->load->view('common');?>
</head>

<body>
	<div id="wrapper">
<?php
$this->load->view ( 'left2' );
?>
        <div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">EP/Email Request Task List</h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">

						<!-- /.panel-heading -->
						<div id="opt" class="tab-pane in active">

							<div class="panel-body">
								<div class="dataTable_wrapper">
									<table class="table table-striped table-bordered table-hover"
										id="dataTables-example">
										<thead>
											<tr>
												<th>ID</th>
												<th>Deadline</th>
												<th>BU</th>
												<th>Request Date</th>
												<th>Data Specialist</th>
												<th>Requestor</th>
												<th>Subject</th>
											</tr>
										</thead>
										<tbody>
                            
						 <?php
							if (count ( $task ) == 0) :
						?>
						     <tr>
								<td colspan='7'>NO Data</td>
							</tr>
								<?php
				                endif;
								for($i = 0; $i < count ( $task ); $i ++) {
									?>
						    	<tr>
									<td><a href="<?php echo site_url('ep_req/ep_req_create_task/task') ?>?id=<?php echo isset($task[$i]["ID"]) ?$task[$i]["ID"]:""?>&pr_id=<?php echo isset($pr_id)?$pr_id:0;?>&archive=<?php echo $archive;?>"><?php echo isset($task[$i]["ID"]) ?$task[$i]["ID"]:""?></a></td>
									
									<td><?php if(isset($task[$i]['Deadline']) && $task[$i]['Deadline']!='0000-00-00') { echo isset($task[$i]['Deadline']) ?$task[$i]['Deadline']:'';}?></td>
										
									<!--  <td><?php echo isset($task[$i]['Deadline']) ?$task[$i]['Deadline']:'';?></td>-->
									<td><?php echo isset($task[$i]['BU']) ?$task[$i]['BU']:'';?></td>
									<td><?php if(isset($task[$i]['RequestDate']) && $task[$i]['RequestDate']!='0000-00-00') { echo isset($task[$i]['RequestDate']) ?$task[$i]['RequestDate']:'';}?></td>
										
									<!--<td><?php echo isset($task[$i]['RequestDate']) ?$task[$i]['RequestDate']:'';?></td>-->
									<td><?php echo isset($task[$i]['DataSpecialist']) ?$task[$i]['DataSpecialist']:'';?></td>
									<td><?php echo isset($task[$i]['Requestor']) ?$task[$i]['Requestor']:'';?></td>
									<td><?php echo isset($task[$i]['Subject']) ?$task[$i]['Subject']:'';?></td>
								</tr>
								<?php } ?>

                                    </tbody>
									</table>
								</div>
								<!-- /.table-responsive -->
							</div>
							<!-- /.panel-body -->
						</div>
						<!-- /.panel-body -->
					</div>
					<!-- /.panel -->
				</div>
				<!-- /.col-lg-12 -->
			</div>
		</div>
		<!-- /#page-wrapper -->

	</div>
	<!-- /#wrapper -->
	<?php $this->load->view('foot');?>
	    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
		
		$("#showhistory").click(function(){
		$("dhistory").hide();
		});
    });
    </script>
</body>
</html>
