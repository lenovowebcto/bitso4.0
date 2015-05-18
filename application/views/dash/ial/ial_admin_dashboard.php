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
          <?php $this->load->view('left2');
          ?>
           <!-- table  start-->
         <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">IAL Dashboard</h1>
                </div>
            </div>
             <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo isset($n1)?$n1:0;?></div>
                                    <div>Total Task</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('dashboard/ial_dashboard/ial_admin_dash_list')?>?di=list">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></a>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-plus-square-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo isset($n2)?$n2:0;?></div>
                                    <div>New Tasks</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('dashboard/ial_dashboard/ial_new_task_dashboard')?>?di=new">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                        <a href="<?php echo site_url('dashboard/ial_dashboard/ial_new_task_dashboard')?>?di=open">
                            <div class="panel-footer">
                                <span class="pull-left"> Daily tacker</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bell-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo isset($n3)?$n3:0;?></div>
                                    <div>Expired Tasks!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
               <!-- 
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo isset($n4)?$n4:0;?></div>
                                    <div>Overdue Tickets!</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('dashboard/dashboard/task_overdue_dashboard');?>?di=over">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
               
                -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          PN_Maintanence  DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
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
                                    	foreach ($pns as $key=>$val){
                                    	?>
                                    	 <tr class="odd gradeX">
                                    	  <td><a href="<?php echo site_url('ial/pn_maintenance/edit') ?>?id=<?php echo isset($val["id"]) ?$val["id"]:0?>"><?php echo $key+1;?></a></td>
										
                                            <td><?php if(isset($val['request_date']) && $val['request_date']!='0000-00-00'){echo $val['request_date'];}?></td>
                                            <td><?php if(isset($val['close_date']) && $val['close_date']!='0000-00-00'){echo $val['close_date'];}?></td>
                                            <td><?php echo isset($val['Requester'])?$val['Requester']:'';?></td>
                                            <td class="center"><?php echo isset($val['status'])?$val['status']:'';?></td>
                                            <td class="center"><?php echo isset($val['Manual'])?$val['Manual']:'';?></td> 
                                            <td class="center"><?php echo isset($val['summary'])?$val['summary']:'';?></td> 
                                            <td class="center"><?php echo isset($val['sales_org'])?$val['sales_org']:'';?></td> 
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
                         IAL_Task  DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example2">
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
             <!-- st -->
                      <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          IAL_BPL_list  DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example3">
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
                                    	foreach ($bpls as $key=>$val){
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
										    
										    if($val['US_part_NO']!='' && $val['BPL_NO'] ==''
										    		 && ($now>$RTM  && date('Y-m-d',strtotime("-7 day"))<$RTM)){ ?>
										    <font color="red">to do BPL</font>
										    
										    <?php }elseif($now<$RTM  && date('Y-m-d',strtotime("+7 day"))>=$RTM){?>
										    <font color="red">Check RTM</font>
										    <?php }elseif(($now>$RTM  && date('Y-m-d',strtotime("-7 day"))<$RTM) && $val['status']!='Final'){?>
										     <font color="red">Check AD</font>
										    <?php }?>
										    </td>
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
