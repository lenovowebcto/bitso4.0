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
    <?php $this->load->view('left2');?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Search </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="col-lg-6">
            <form action="<?php echo site_url('ial/pn_search/search') ?>" method="post">
                <label font-size: 36px; class=" bigger-110">Input:</label>
                <input  name="pn" id="pn" value=<?php if(isset($pn)){echo $pn;}else{echo '""';}?> type="text" placeholder="Search ..." class=" nav-search-input  " autocomplete="off">
                <button  class="btn btn-info " type="sumit">
                    <i class="icon-ok bigger-110"></i> Submit
                </button>
                <p>&nbsp</p>
            </form>
        </div>

        <div class="col-lg-12" <?php if(!(isset($count) && $count==0 )){echo 'style="display:none"';} ?> >
            <p>&nbsp</p>
            <?php echo "No result found."?>
        </div>
        
        <div <?php if(!isset($ial_pn) or count($ial_pn)==0 ){echo 'style="display:none"'; } ?> class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							IAL PN Maintenance List
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">

							<div class="dataTable_wrapper">
								<table class="table table-striped table-bordered table-hover"
									id="dataTables-example1">
									<thead>
										<tr>
											<th>#</th>
											<th>Request_Date</th>
											<th>Close_Date</th>
											<th>Requester/Owner</th>
											<th>Status</th>
											<th>Manual</th>
											<th>Summary</th>
											<th>Sales_Org</th>
											
										</tr>
									</thead>
									<tbody>

									<?php 
									      for($i = 0; $i < count ($ial_pn ); $i ++) {
									?>
					                  <tr>
											<td><a
												href="<?php echo site_url('ial/pn_maintenance/edit') ?>?id=<?php echo isset($ial_pn[$i]["id"]) ?$ial_pn[$i]["id"]:0?>"><?php echo $i+1;?></a></td>
											<td><?php if(isset($ial_pn[$i]['request_date']) && $ial_pn[$i]['request_date']!='0000-00-00') { echo isset($ial_pn[$i]['request_date']) ?$ial_pn[$i]['request_date']:'';}?></td>
										    <td><?php if(isset($ial_pn[$i]['close_date']) && $ial_pn[$i]['close_date']!='0000-00-00') { echo isset($ial_pn[$i]['close_date']) ?$ial_pn[$i]['close_date']:'';}?></td>
											<td><?php if(isset($ial_pn[$i]['Requester']) && $ial_pn[$i]['Requester']!='') { echo isset($ial_pn[$i]['Requester']) ?$ial_pn[$i]['Requester']:'';}?></td>
											<td><?php if(isset($ial_pn[$i]['status']) && $ial_pn[$i]['status']!='') { echo isset($ial_pn[$i]['status']) ?$ial_pn[$i]['status']:'';}?></td>
																
											<td><?php echo isset($ial_pn[$i]['Manual']) ?$ial_pn[$i]['Manual']:'';?></td>
											<td><?php echo isset($ial_pn[$i]['summary']) ?$ial_pn[$i]['summary']:'';?></td>
											<td><?php echo isset($ial_pn[$i]['sales_org']) ?$ial_pn[$i]['sales_org']:'';?></td>
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
			
			<div <?php if(!isset($ialtask) or count($ialtask)==0 ){echo 'style="display:none"'; } ?> class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
					<div class="panel-heading">
                        IAL Task 
                    </div>
						<!-- /.panel-heading -->
						<div id="opt" class="tab-pane in active">

							<div class="panel-body">
								<div class="dataTable_wrapper">
									<table class="table table-striped table-bordered table-hover"
										id="dataTables-example2">
										<thead>
											<tr>
												<th>ID</th>
												<th>Record_Date</th>
												<th>IAL_number</th>
												<th>Family_name</th>
												<th>Sub_Series</th>
												<th>Planner</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
                            
								<?php
								for($i = 0; $i < count ( $ialtask ); $i ++) {
									?>
						    	<tr>
									<td><a href="<?php echo site_url('ial/task_create/task') ?>?id=<?php echo isset($ialtask[$i]["id"]) ?$ialtask[$i]["id"]:""?>&pr_id=<?php echo isset($pr_id)?$pr_id:0;?>"><?php echo isset($ialtask[$i]["id"]) ?$ialtask[$i]["id"]:""?></a></td>
									
									<td><?php if(isset($ialtask[$i]['Record_Date']) && $ialtask[$i]['Record_Date']!='0000-00-00') { echo isset($ialtask[$i]['Record_Date']) ?$ialtask[$i]['Record_Date']:'';}?></td>
										
									<!--  <td><?php echo isset($ialtask[$i]['Deadline']) ?$ialtask[$i]['Deadline']:'';?></td>-->
									<td><?php echo isset($ialtask[$i]['IAL_number']) ?$ialtask[$i]['IAL_number']:'';?></td>
									<td><?php if(isset($ialtask[$i]['Family_name']) && $ialtask[$i]['Family_name']!='0000-00-00') { echo isset($ialtask[$i]['Family_name']) ?$ialtask[$i]['Family_name']:'';}?></td>
										
									<!--<td><?php echo isset($ialtask[$i]['RequestDate']) ?$ialtask[$i]['RequestDate']:'';?></td>-->
									<td><?php echo isset($ialtask[$i]['Sub_Series']) ?$ialtask[$i]['Sub_Series']:'';?></td>
									<td><?php echo isset($ialtask[$i]['Planner']) ?$ialtask[$i]['Planner']:'';?></td>
									<td><?php echo isset($ialtask[$i]['Status']) ?$ialtask[$i]['Status']:'';?></td>
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
			
			<div <?php if(!isset($ial_relayware) or count($ial_relayware)==0 ){echo 'style="display:none"'; } ?> class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
					<div class="panel-heading">
                        Relayware 
                    </div>
						<!-- /.panel-heading -->
						<div id="opt" class="tab-pane in active">

							<div class="panel-body">
								<div class="dataTable_wrapper">
									<table class="table table-striped table-bordered table-hover"
										id="dataTables-example3">
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
								for($i = 0; $i < count ( $ial_relayware ); $i ++) {
									?>
						    	<tr>
									<td><a href="<?php echo site_url('ial/create_relayware/task') ?>?id=<?php echo isset($ial_relayware[$i]["id"]) ?$ial_relayware[$i]["id"]:""?>&pr_id=<?php echo isset($pr_id)?$pr_id:0;?>"><?php echo isset($ial_relayware[$i]["id"]) ?$ial_relayware[$i]["id"]:""?></a></td>
									
									<td><?php echo isset($ial_relayware[$i]['BPL_PAL_Number']) ?$ial_relayware[$i]['BPL_PAL_Number']:'';?></td>
									<!--  <td><?php echo isset($ial_relayware[$i]['Deadline']) ?$ial_relayware[$i]['Deadline']:'';?></td>-->
									<td><?php echo isset($ial_relayware[$i]['Brand']) ?$ial_relayware[$i]['Brand']:'';?></td>
									<td><?php if(isset($ial_relayware[$i]['AD']) && $ial_relayware[$i]['AD']!='0000-00-00') { echo isset($ial_relayware[$i]['AD']) ?$ial_relayware[$i]['AD']:'';}?></td>
									<td><?php echo isset($ial_relayware[$i]['Requester']) ?$ial_relayware[$i]['Requester']:'';?></td>
									<td><?php echo isset($ial_relayware[$i]['Upload_Date']) ?$ial_relayware[$i]['Upload_Date']:'';?></td>
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
			
			<div <?php if(!isset($ial_bpl) or count($ial_bpl)==0 ){echo 'style="display:none"'; } ?>  class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							IAL&BPL List
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">

							<div class="dataTable_wrapper">
								<table class="table table-striped table-bordered table-hover"
									id="dataTables-example4">
									<thead>
										<tr>
											<th>#</th>
											<th>RTM</th>
											<th>AD</th>
											<th>EOW</th>
											<th>Review_Date</th>
											<th>Product_Name</th>
											<th>Status</th>
											<th>Warning</th>
											<!-- <th>Type_of_IAL</th> -->
											
										</tr>
									</thead>
									<tbody>
                              
									<?php
									      for($i = 0; $i < count ($ial_bpl ); $i ++) {
									?>
					                  <tr>
											<td><a
												href="<?php echo site_url('ial/ial_bpl/edit');?>?id=<?php echo isset($ial_bpl[$i]["id"]) ?$ial_bpl[$i]["id"]:0?>"><?php echo $i+1;?></a></td>
											<td><?php if(isset($ial_bpl[$i]['RTM']) && $ial_bpl[$i]['RTM']!='0000-00-00') { echo isset($ial_bpl[$i]['RTM']) ?$ial_bpl[$i]['RTM']:'';}?></td>
										    <td><?php if(isset($ial_bpl[$i]['AD']) && $ial_bpl[$i]['AD']!='0000-00-00') { echo isset($ial_bpl[$i]['AD']) ?$ial_bpl[$i]['AD']:'';}?></td>
											<td><?php if(isset($ial_bpl[$i]['EOW']) && $ial_bpl[$i]['EOW']!='0000-00-00') { echo isset($ial_bpl[$i]['EOW']) ?$ial_bpl[$i]['EOW']:'';}?></td>
											<td><?php if(isset($ial_bpl[$i]['review_date']) && $ial_bpl[$i]['review_date']!='0000-00-00') { echo isset($ial_bpl[$i]['review_date']) ?$ial_bpl[$i]['review_date']:'';}?></td>
											<td><?php if(isset($ial_bpl[$i]['Product_Name']) && $ial_bpl[$i]['Product_Name']!='') { echo isset($ial_bpl[$i]['Product_Name']) ?$ial_bpl[$i]['Product_Name']:'';}?></td>
											<td><?php if(isset($ial_bpl[$i]['status']) && $ial_bpl[$i]['status']!='') { echo isset($ial_bpl[$i]['status']) ?$ial_bpl[$i]['status']:'';}?></td>
											<!-- <td><?php echo isset($ial_bpl[$i]['type_of_IAL']) ?$ial_bpl[$i]['type_of_IAL']:'';?></td>
										    -->
										    
										    <td><?php 
										    $RTM = $ial_bpl[$i]['RTM'];
										    $now = date('Y-m-d',time());
										    
										    if($ial_bpl[$i]['US_part_NO']!='' && $ial_bpl[$i]['BPL_NO'] ==''
										    		 && ($now>$RTM  && date('Y-m-d',strtotime("-7 day"))<$RTM)){ ?>
										    <font color="red">to do BPL</font>
										    
										    <?php }elseif($now<$RTM  && date('Y-m-d',strtotime("+7 day"))>=$RTM){?>
										    <font color="red">Check RTM</font>
										    <?php }elseif(($now>$RTM  && date('Y-m-d',strtotime("-7 day"))<$RTM) && $ial_bpl[$i]['status']!='Final'){?>
										     <font color="red">Check AD</font>
										    <?php }?>
										    </td>
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
			
        <?php $this->load->view('foot');?>
        <script>
            $(document).ready(function() {
                $('#dataTables-example1').DataTable({
                    responsive: true
                });
                $('#dataTables-example2').DataTable({
                    responsive: true
                });
                $('#dataTables-example3').DataTable({
                    responsive: true
                });
                $('#dataTables-example4').DataTable({
                    responsive: true
                });
            });
        </script>
</body>
</html>