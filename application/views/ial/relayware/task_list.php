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
					<h1 class="page-header">IAL Relayware List</h1>
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
												<th>BPL_PAL_Number</th>
												<th>Brand</th>
												<th>AD</th>
												<th>Requester</th>
												<th>Upload_Date</th>
												
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
									<td><a href="<?php echo site_url('ial/create_relayware/task') ?>?id=<?php echo isset($task[$i]["id"]) ?$task[$i]["id"]:""?>&pr_id=<?php echo isset($pr_id)?$pr_id:0;?>">
									<?php echo isset($task[$i]["id"]) ?$task[$i]["id"]:""?></a></td>
									<td><a href="<?php echo site_url('ial/create_relayware/task') ?>?id=<?php echo isset($task[$i]["id"]) ?$task[$i]["id"]:""?>&pr_id=<?php echo isset($pr_id)?$pr_id:0;?>">
									<?php echo isset($task[$i]['BPL_PAL_Number']) ?$task[$i]['BPL_PAL_Number']:'';?></a></td>
									<td><?php echo isset($task[$i]['Brand']) ?$task[$i]['Brand']:'';?></td>
									<td><?php if(isset($task[$i]['AD']) && $task[$i]['AD']!='0000-00-00') { echo isset($task[$i]['AD']) ?$task[$i]['AD']:'';}?></td>
									<td><?php echo isset($task[$i]['Requester']) ?$task[$i]['Requester']:'';?></td>
									<td><?php echo isset($task[$i]['Upload_Date']) ?$task[$i]['Upload_Date']:'';?></td>
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
        }).fnDestroy();
		
		$("#showhistory").click(function(){
		$("dhistory").hide();
		});
    });
    </script>
</body>
</html>
