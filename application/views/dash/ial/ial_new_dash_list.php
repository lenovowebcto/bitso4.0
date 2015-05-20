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
                    <h1 class="page-header"><?php if($dif=='list'){echo 'All ';}elseif($dif=='new'){echo 'New Create ';}elseif($dif=='over'){echo 'Overdue ' ;}?>Task List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
             <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          PN_maintenance  DataTables Advanced Tables
                        </div>
                       <input type="button" value="report" onclick='location.href="<?php echo site_url('taskreport/report')?>?t=tpg"' />
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
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
                                  <?php if(isset($pns) && count($pns)>0){
                                    	foreach ($pns as $key=> $val){
                                    	?>
                                    	 <tr class="odd gradeX">
                                          <td><a href="<?php echo site_url('ial/pn_maintenance/edit') ?>?id=<?php echo isset($val["id"]) ?$val["id"]:0?>"><?php echo $key+1;?></a></td>
											<td><?php if(isset($val['request_date']) && $val['request_date']!='0000-00-00') { echo isset($val['request_date']) ?$val['request_date']:'';}?></td>
										    <td><?php if(isset($val['close_date']) && $val['close_date']!='0000-00-00') { echo isset($val['close_date']) ?$val['close_date']:'';}?></td>
											<td><?php if(isset($val['Requester']) && $val['Requester']!='') { echo isset($val['Requester']) ?$val['Requester']:'';}?></td>
											<td><?php if(isset($val['status']) && $val['status']!='') { echo isset($val['status']) ?$val['status']:'';}?></td>
																
											<td><?php echo isset($val['Manual']) ?$val['Manual']:'';?></td>
											<td><?php echo isset($val['summary']) ?$val['summary']:'';?></td>
											<td><?php echo isset($val['sales_org']) ?$val['sales_org']:'';?></td>
										</tr>
                                    	<?php }
                                    }?>
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
           <!-- table   end-->
           <!-- st -->
             <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          IAL&BPL  DataTables Advanced Tables
                        </div>
                         <input type="button" value="report" onclick='location.href="<?php echo site_url('taskreport/report')?>?t=opt"' />
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example2">
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(isset($bpls) && count($bpls)>0){
                                    	foreach ($bpls as $key=> $val){
                                    	?>
                                    	
                                    	 <tr class="odd gradeX">
                                          <td><a
												href="<?php echo site_url('ial/ial_bpl/edit');?>?id=<?php echo isset($val["id"]) ?$val["id"]:0?>"><?php echo $key+1;?></a></td>
											<td><?php if(isset($val['RTM']) && $val['RTM']!='0000-00-00') { echo isset($val['RTM']) ?$val['RTM']:'';}?></td>
										    <td><?php if(isset($val['AD']) && $val['AD']!='0000-00-00') { echo isset($val['AD']) ?$val['AD']:'';}?></td>
											<td><?php if(isset($val['EOW']) && $val['EOW']!='0000-00-00') { echo isset($val['EOW']) ?$val['EOW']:'';}?></td>
											<td><?php if(isset($val['review_date']) && $val['review_date']!='0000-00-00') { echo isset($val['review_date']) ?$val['review_date']:'';}?></td>
											<td><?php if(isset($val['Product_Name']) && $val['Product_Name']!='') { echo isset($val['Product_Name']) ?$val['Product_Name']:'';}?></td>
											<td><?php if(isset($val['status']) && $val['status']!='') { echo isset($val['status']) ?$val['status']:'';}?></td>
											
										    <td><?php 
										    $RTM = $val['RTM'];
										    $now = date('Y-m-d',time());
										    if($val['US_part_NO']!='' && $val['BPL_NO'] =='' && ($now>$RTM  && date('Y-m-d',strtotime("-7 day"))<$RTM)){ ?>
										    <font color="red">to do BPL and Check AD</font>
										    <?php }elseif($val['US_part_NO']!='' && $val['BPL_NO'] =='' && ($now<$RTM  && date('Y-m-d',strtotime("+7 day"))>$RTM)){?>
										    <font color="red">Check RTM</font>
										    <?php }?>
										    </td> </tr>
                                    	<?php }
                                    }?>
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
           <!-- end -->
             <!-- st -->
                      <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          IAL_Task  DataTables Advanced Tables
                        </div>
                         <input type="button" value="report" onclick='location.href="<?php echo site_url('taskreport/report')?>?t=svc"' />
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example3">
                                   <thead>
                                        <tr>
                                             <th>ID</th>
											<th>Record_Date</th>
											<th>AD</th>
											<th>IAL_number</th>
											<th>Family_name</th>
											<th>Sub_Series</th>
											<th>Planner</th>
											<th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php if(isset($ts) && count($ts)>0){
                                    	foreach ($ts as $key=>$val){
                                    	?>
                                    	
                                    	 <tr class="odd gradeX">
                                            <td><a href="<?php echo site_url('ial/task_create/task')?>?pr_id=5&id=<?php echo isset($val['id'])?$val['id']:0;?>">
                                            <?php echo $key+1;?></a></td>
                                            
                                            <td><?php if(isset($val['Record_Date']) && $val['Record_Date']!='0000-00-00'){echo $val['Record_Date'];}?></td>
                                            <td><?php if(isset($val['AD']) && $val['AD']!='0000-00-00'){echo $val['AD'];}?></td>
                                            <td class="center"><?php echo isset($val['IAL_number'])?$val['IAL_number']:'';?></td>
                                            <td class="center"><?php echo isset($val['Family_name'])?$val['Family_name']:'';?></td>
                                            <td class="center"><?php echo isset($val['Sub_Series'])?$val['Sub_Series']:'';?></td>
                                            <td class="center"><?php echo isset($val['Planner'])?$val['Planner']:'';?></td>
                                            <td class="center"><?php echo isset($val['Status'])?$val['Status']:'';?></td> 
                                        </tr>
                                    	<?php }
                                    }?>
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
           <!-- end -->
             
   <?php $this->load->view('foot');?>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
        $('#dataTables-example2').DataTable({
            responsive: true
        });
        $('#dataTables-example3').DataTable({
            responsive: true
        });
	    
    });
    </script>
</body>
</html>
           
</html>
