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
					<h1 class="page-header">IAL Task List</h1>
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
												<th>IAL number</th>
                                                <th>Brand</th>
                                                <th>Family name</th>
                                                <th>sub series</th>
                                                <th>AD </th>
												<th>EOW date</th>
												<th>RTM date</th>
												<th>status </th>
												<th>record date</th>
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
									<td><a href="<?php echo site_url('ial/task_create/task') ?>?id=<?php echo isset($task[$i]["id"]) ?$task[$i]["id"]:""?>&pr_id=<?php echo isset($pr_id)?$pr_id:0;?>"><?php echo isset($task[$i]["id"]) ?$task[$i]["id"]:""?></a></td>

									<td><a href="<?php echo site_url('ial/task_create/task') ?>?id=<?php echo isset($task[$i]["id"]) ?$task[$i]["id"]:""?>&pr_id=<?php echo isset($pr_id)?$pr_id:0;?>"><?php echo isset($task[$i]['IAL_number']) ?$task[$i]['IAL_number']:'';?></a></td>
                                    <td><?php echo isset($task[$i]['Brand']) ?$task[$i]['Brand']:'';?></td>
                                    <td><?php if(isset($task[$i]['Family_name']) && $task[$i]['Family_name']!='0000-00-00') { echo isset($task[$i]['Family_name']) ?$task[$i]['Family_name']:'';}?></td>
                                    <td><?php echo isset($task[$i]['Sub_Series']) ?$task[$i]['Sub_Series']:'';?></td>
                                     <td><?php echo isset($task[$i]['AD']) ?$task[$i]['AD']:'';?></td>
                                    <td><?php echo isset($task[$i]['EOW']) ?$task[$i]['EOW']:'';?></td>
									<td><?php echo isset($task[$i]['RTM']) ?$task[$i]['RTM']:'';?></td>
									<td><?php echo isset($task[$i]['Status']) ?$task[$i]['Status']:'';?></td>
                                    <td><?php if(isset($task[$i]['Record_Date']) && $task[$i]['Record_Date']!='0000-00-00') { echo isset($task[$i]['Record_Date']) ?$task[$i]['Record_Date']:'';}?></td>

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
