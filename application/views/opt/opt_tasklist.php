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
         <script
	src="<?php  echo base_url();?>util/bitso/bower_components/jquery/dist/jquery.min.js"></script>

</head>

<body>

	<div id="wrapper">
<?php
$this->load->view ( 'left2' );
?>

<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">OPT/SVC Task List</h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<div class="row">
				<div class="col-lg-12">
					<!-- 					<div class="panel panel-default"> -->

					<div class="tabbable">
						<ul class="nav nav-tabs" id="myTab">
							<li class="active"><a data-toggle="tab" href="#OPT"> <i
									class="green icon-home bigger-110"></i> OPT
							</a></li>
							<li><a data-toggle="tab" href="#SVC"> SVC </a></li>
							<li><a data-toggle="tab" href="#Comp"> Compatibility </a></li>
						</ul>

						<div class="tab-content">
							<div id="OPT" class="tab-pane in active">
								<div class="panel-body">
									<div class="dataTable_wrapper">
										<table class="table table-striped table-bordered table-hover"
											id="dataTables-opt">
											<thead>
												<tr>
													<th>ID</th>
													<th>Deadline</th>
													<th>EOW</th>
													<th>AD</th>
													<th>DRR Date</th>
													<th>IAL#</th>
													
													<th>Type</th>
													<th>Data Specialist</th>
												</tr>
											</thead>
											<tbody>
										 <?php
											if (count ( $opt ) == 0) :
												?>
						   <tr>
													<td colspan='13'>NO Data</td>
												</tr>

											<?php
							  endif;
											for($i = 0; $i < count ( $opt ); $i ++) {
												?>
							<tr>
													<td><a
														href="<?php echo site_url('opt/opt_create_task/task') ?>?optid=<?php echo isset($opt[$i]["OPTID"]) ?$opt[$i]["OPTID"]:""?>&pr_id=<?php echo isset($opt_pr_id)?$opt_pr_id:0;?>&archive=<?php echo $archive;?>"><?php echo $i+1;?></a></td>
													<!--  <td><?php echo isset($opt[$i]['Deadline']) ?$opt[$i]['Deadline']:'';?></td>
													      <td><?php echo isset($opt[$i]['OPT_EOW']) ?$opt[$i]['OPT_EOW']:'';?></td>
														  <td><?php echo isset($opt[$i]['OPT_AD']) ?$opt[$i]['OPT_AD']:'';?></td>
														  <td><?php echo isset($opt[$i]['DRR_DATE']) ?$opt[$i]['DRR_DATE']:'';?></td>
													-->
													<td><?php if(isset($opt[$i]['Deadline']) && $opt[$i]['Deadline']!='0000-00-00') { echo isset($opt[$i]['Deadline']) ?$opt[$i]['Deadline']:'';}?></td>
													<td><?php if(isset($opt[$i]['OPT_EOW']) && $opt[$i]['OPT_EOW']!='0000-00-00') { echo isset($opt[$i]['OPT_EOW']) ?$opt[$i]['OPT_EOW']:'';}?></td>
													<td><?php if(isset($opt[$i]['OPT_AD']) && $opt[$i]['OPT_AD']!='0000-00-00') { echo isset($opt[$i]['OPT_AD']) ?$opt[$i]['OPT_AD']:'';}?></td>
													<td><?php if(isset($opt[$i]['DRR_DATE']) && $opt[$i]['DRR_DATE']!='0000-00-00') { echo isset($opt[$i]['DRR_DATE']) ?$opt[$i]['DRR_DATE']:'';}?></td>
													
													<td><?php echo isset($opt[$i]['IAL_NO']) ?$opt[$i]['IAL_NO']:'';?></td>
													<td><?php echo isset($opt[$i]['TYPE']) ?$opt[$i]['TYPE']:'';?></td>
													<td><?php echo isset($opt[$i]['USER']) ?$opt[$i]['USER']:'';?></td>
												</tr>
								<?php } ?>

                                    </tbody>
										</table>
									</div>
									<!-- /.table-responsive -->

								</div>
								<!-- /.panel-body -->

							</div>

							<div id="SVC" class="tab-pane">
								<div class="panel-body">
									<div class="dataTable_wrapper">
										<table class="table table-striped table-bordered table-hover"
											id="dataTables-svc">
											<thead>
												<tr>
													<th>ID</th>
													<th>Deadline</th>
													<th>EOW</th>
													<th>AD</th>
													<th>Loadsheet</th>
													<th>Submitter</th>
													<th>Type</th>
													<th>Data Specialist</th>
												</tr>
											</thead>
											<tbody>
                            
										 <?php
											if (count ( $svc ) == 0) :
												?>
						   <tr>
													<td colspan='13'>NO Data</td>
												</tr>
											<?php
							  endif;
							  
											for($i = 0; $i < count ( $svc ); $i ++) {
												?>
							<tr>
													<td><a
														href="<?php echo site_url('opt/opt_create_task/task') ?>?svcid=<?php echo isset($svc[$i]["SVCID"]) ?$svc[$i]["SVCID"]:""?>&pr_id=<?php echo isset($svc_pr_id)?$svc_pr_id:0;?>&archive=<?php echo $archive;?>"><?php echo $i+1;?></a></td>
													<td><?php if(isset($svc[$i]['Deadline']) && $svc[$i]['Deadline']!='0000-00-00') { echo isset($svc[$i]['Deadline']) ?$svc[$i]['Deadline']:'';}?></td>
													<td><?php if(isset($svc[$i]['EOW']) && $svc[$i]['EOW']!='0000-00-00') { echo isset($svc[$i]['EOW']) ?$svc[$i]['EOW']:'';}?></td>
													<td><?php if(isset($svc[$i]['AD']) && $svc[$i]['AD']!='0000-00-00') { echo isset($svc[$i]['AD']) ?$svc[$i]['AD']:'';}?></td>
													
													<!--  <td><?php echo isset($svc[$i]['Deadline']) ?$svc[$i]['Deadline']:'';?></td>
													<td><?php echo isset($svc[$i]['EOW']) ?$svc[$i]['EOW']:'';?></td>
													<td><?php echo isset($svc[$i]['AD']) ?$svc[$i]['AD']:'';?></td>-->
													<td><?php echo isset($svc[$i]['Loadsheet']) ?$svc[$i]['Loadsheet']:'';?></td>
													<td><?php echo isset($svc[$i]['Submitter']) ?$svc[$i]['Submitter']:'';?></td>
													<td><?php echo isset($svc[$i]['Type']) ?$svc[$i]['Type']:'';?></td>
													<td><?php echo isset($svc[$i]['USER']) ?$svc[$i]['USER']:'';?></td>
												</tr>
								<?php } ?>
                                    </tbody>
										</table>
									</div>
									<!-- /.table-responsive -->

								</div>
								<!-- /.panel-body -->

							</div>
							<div id="Comp" class="tab-pane">
								<div class="panel-body">
									<div class="dataTable_wrapper">
										<table class="table table-striped table-bordered table-hover"
											id="dataTables-comp">
											<thead>
												<tr>
													<th>ID</th>
													<th>Deadline</th>
													<th>Task Received Date</th>
													<th>Complete Date</th>
													<th>Loadsheet</th>
													<th>Submitter</th>
													<th>BU</th>
													<th>Data Specialist</th>
												</tr>
											</thead>
											<tbody>
										 <?php
											if (count ( $comp ) == 0) :
												?>
						   <tr>
													<td colspan='13'>NO Data</td>
												</tr>
											<?php
							  endif;
											for($i = 0; $i < count ( $comp ); $i ++) {
												?>
							<tr>
													<td><a
														href="<?php echo site_url('opt/opt_create_task/task') ?>?comp_id=<?php echo isset($comp[$i]["ID"]) ?$comp[$i]["ID"]:""?>&pr_id=<?php echo isset($comp_pr_id)?$comp_pr_id:0;?>&archive=<?php echo $archive;?>"><?php echo $i+1;?></a></td>
													<td><?php if(isset($comp[$i]['Deadline']) && $comp[$i]['Deadline']!='0000-00-00') { echo isset($comp[$i]['Deadline']) ?$comp[$i]['Deadline']:'';}?></td>
													<td><?php if(isset($comp[$i]['TASKR_DATE']) && $comp[$i]['TASKR_DATE']!='0000-00-00') { echo isset($comp[$i]['TASKR_DATE']) ?$comp[$i]['TASKR_DATE']:'';}?></td>
													<td><?php if(isset($comp[$i]['COMPLETE_DATE']) && $comp[$i]['COMPLETE_DATE']!='0000-00-00') { echo isset($comp[$i]['COMPLETE_DATE']) ?$comp[$i]['COMPLETE_DATE']:'';}?></td>
													
												<!--  	<td><?php echo isset($comp[$i]['Deadline']) ?$comp[$i]['Deadline']:'';?></td>
													<td><?php echo isset($comp[$i]['TASKR_DATE']) ?$comp[$i]['TASKR_DATE']:'';?></td>
													<td><?php echo isset($comp[$i]['COMPLETE_DATE']) ?$comp[$i]['COMPLETE_DATE']:'';?></td>-->
													<td><?php echo isset($comp[$i]['LOADSHEET']) ?$comp[$i]['LOADSHEET']:'';?></td>
													<td><?php echo isset($comp[$i]['Submitter']) ?$comp[$i]['Submitter']:'';?></td>
													<td><?php echo isset($comp[$i]['BU']) ?$comp[$i]['BU']:'';?></td>
													<td><?php echo isset($comp[$i]['USER']) ?$comp[$i]['USER']:'';?></td>
												</tr>
								<?php } ?>
                                    </tbody>
										</table>
									</div>
									<!-- /.table-responsive -->
								</div>
								<!-- /.panel-body -->
							</div>
						</div>
					</div>
					<!-- /span -->
				</div>
			</div>
			<!-- 			</div> -->

		</div>
		<!-- /#page-wrapper -->

	</div>
	<!-- /#wrapper -->
	 <?php $this->load->view('foot');?>
	    <script>
    $(document).ready(function() {
    	$('#dataTables-opt').DataTable({
            responsive: true
    });
    	$('#dataTables-svc').DataTable({
            responsive: true
    });
    	$('#dataTables-comp').DataTable({
            responsive: true
    });
		
    });
    </script>
</body>
</html>
