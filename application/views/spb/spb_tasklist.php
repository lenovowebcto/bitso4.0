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
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2>Task List</h2>
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">

							<div class="dataTable_wrapper">
								<table class="table table-striped table-bordered table-hover"
									id="dataTables-example">
									<thead>
										<tr>
											<th>ID</th>
											<th>Deadline</th>
											<th>Task Received Date</th>
											<th>Start Processing Date</th>
											<th>Complete Date</th>
											<th>EntityID (Report NO.)</th>
											<th>Data Specialist</th>
											<th>Status</th>
											
										</tr>
									</thead>
									<tbody>
                              
			<?php
			if (count ( $task ) == 0) :
			?>
				<tr>
											<td colspan='12'>暂无数据</td>
										</tr>

										<?php endif;
									for($i = 0; $i < count ( $task ); $i ++) {
									?>
					<tr>
											<td><a
												href="<?php echo site_url('spb/spb_create_task/task') ?>?id=<?php echo isset($task[$i]["TID"]) ?$task[$i]["TID"]:""?>&pr_id=<?php echo isset($pr_id)?$pr_id:0;?>&archive=<?php echo $archive;?>"><?php echo $i+1;?></a></td>
											<!--  <td><?php echo isset($task[$i]['Deadline']) ?$task[$i]['Deadline']:'';?></td>
											<td><?php echo isset($task[$i]['TASKR_DATE']) ?$task[$i]['TASKR_DATE']:'';?></td>
											<td><?php echo isset($task[$i]['START_DATE']) ?$task[$i]['START_DATE']:'';?></td>
											<td><?php echo isset($task[$i]['COMPLETE_DATE']) ?$task[$i]['COMPLETE_DATE']:'';?></td>-->
											
											<td><?php if(isset($task[$i]['Deadline']) && $task[$i]['Deadline']!='0000-00-00') { echo isset($task[$i]['Deadline']) ?$task[$i]['Deadline']:'';}?></td>
										    <td><?php if(isset($task[$i]['TASKR_DATE']) && $task[$i]['TASKR_DATE']!='0000-00-00') { echo isset($task[$i]['TASKR_DATE']) ?$task[$i]['TASKR_DATE']:'';}?></td>
											<td><?php if(isset($task[$i]['START_DATE']) && $task[$i]['START_DATE']!='0000-00-00') { echo isset($task[$i]['START_DATE']) ?$task[$i]['START_DATE']:'';}?></td>
											<td><?php if(isset($task[$i]['COMPLETE_DATE']) && $task[$i]['COMPLETE_DATE']!='0000-00-00') { echo isset($task[$i]['COMPLETE_DATE']) ?$task[$i]['COMPLETE_DATE']:'';}?></td>
																
											<td><?php echo isset($task[$i]['EntityID']) ?$task[$i]['EntityID']:'';?></td>
											<td><?php echo isset($task[$i]['USER']) ?$task[$i]['USER']:'';?></td>
											<td><?php echo isset($task[$i]['STATUS']) ?$task[$i]['STATUS']:'';?></td>
										</tr>
						<?php } ?>
                                    </tbody>
								</table>
							</div>
							<!-- /.table-responsive -->
                         
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
