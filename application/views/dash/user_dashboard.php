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
                    <h1 class="page-header">Dashboard</h1>
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
                        <a href="<?php echo site_url('dashboard/dashboard/admin_dash_list')?>?di=list&archive=1">
                            <div class="panel-footer">
                                <span class="pull-left">Archive</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></a>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                         <a href="<?php echo site_url('dashboard/dashboard/admin_dash_list')?>?di=list&archive=0">
                            <div class="panel-footer">
                                <span class="pull-left">NoArchive</span>
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
                        <a href="<?php echo site_url('dashboard/dashboard/new_task_dashboard')?>?di=new">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
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
                                    <i class="fa fa-bell-o  fa-5x"></i>
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
                                <span class="pull-right"><i class="fa fa-arrow-circle-right "></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-frown-o fa-5x"></i>
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
            </div>
            <?php if(isset($project) && ($project=="LOIS TBG/IPG" || $project=="LOIS Element") ){?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          TPG/IPG  DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Drr_received</th>
											<th>Deadline</th>
                                            <th>POR_Version</th>
                                            <th>Request type</th>
                                            <th>Complete Date</th>
                                            <th>Family/series</th>
                                            <th>Data Specialist</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                  <?php if(isset($tpg) && count($tpg)>0){
                                    	foreach ($tpg as $key=>$val){
                                    	?>
                                    	 <tr class="odd gradeX">
                                            <td><a href="<?php echo site_url('task/addtask/task')?>?pr_id=1&id=<?php echo isset($val['id'])?$val['id']:0;?>"><?php echo $key+1;?></a></td>
                                            <td><?php if(isset($val['Drr_received']) && $val['Drr_received']!='0000-00-00'){echo $val['Drr_received'];}?></td>
                                           
                                            <td><?php if(isset($val['deadline']) && $val['deadline']!='0000-00-00'){echo $val['deadline'];}?></td>
                                            <td><?php echo isset($val['POR_Version'])?$val['POR_Version']:'';?></td>
                                            <td class="center"><?php echo isset($val['request_type'])?$val['request_type']:'';?></td>
                                            <td><?php if(isset($val['complete_date']) && $val['complete_date']!='0000-00-00'){echo $val['complete_date'];}?></td>
                                           <!--  <td class="center"><?php echo isset($val['complete_date'])?$val['complete_date']:'';?></td> -->
                                            <td class="center"><?php echo isset($val['family'])?$val['family']:'';?></td> 
                                            <td class="center"><?php echo isset($val['Data_Specialist'])?$val['Data_Specialist']:'';?></td> 
                                            <td class="center"><?php echo isset($val['status'])?$val['status']:'';?></td> 
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
            
             <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Element  DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example7">
                                     <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>project_name</th>
                                            <th>AD</th>
											<th>DeadLine</th>
                                            <th>CSR_Version</th>
                                            <th>Receive_Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(isset($elelist) && count($elelist)>0){
                                    	foreach ($elelist as $key=>$val){
                                    	?>
                                    	
                                    	 <tr class="odd gradeX">
                                    	    <td><a href="<?php echo site_url('element/ele_task/addeletask')?>?pr_id=3&pid=<?php echo isset($val['pid'])?$val['pid']:0;?>"><?php echo $key+1;?></a></td>
                                           
                                            <td><?php echo isset($val['project_name'])?$val['project_name']:'';?></td>
                                            <td><?php if(isset($val['AD']) && $val['AD']!='0000-00-00'){echo $val['AD'];}?></td>
                                            <td><?php if(isset($val['DeadLine']) && $val['DeadLine']!='0000-00-00'){echo $val['DeadLine'];}?></td>
                                            
                                            <td class="center"><?php echo isset($val['CSR_Version'])?$val['CSR_Version']:'';?></td>
                                            <td><?php if(isset($val['Receive_Date']) && $val['Receive_Date']!='0000-00-00'){echo $val['Receive_Date'];}?></td>
                                            
                                          <!--    <td class="center"><?php echo isset($val['Receive_Date'])?$val['Receive_Date']:'';?></td>-->
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
            <?php }?>
          <?php if(isset($project) && $project=="LOIS OPT/SVC"){?>
           <!-- table   end-->
           <!-- st -->
             <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          OPT  DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                 <!-- չʾ���ǿ�Ҫ���ڵ�task��Ϣ -->
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example2">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>AD</th>
											<th>Deadline</th>
											
											 <th>EOW</th>
											 <th>DRR Date</th>
											  
                                            <th>TYPE</th>
                                            
                                            <th>Data Specialist</th>
                                            <th>New_Ele_Name</th>
                                            <th>IAL_NO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(isset($optlist) && count($optlist)>0){
                                    	foreach ($optlist as $key=>$val){
                                    	?>
                                    	
                                    	 <tr class="odd gradeX">
                                    	   <td><a href="<?php echo site_url('opt/opt_create_task/task')?>?pr_id=2&optid=<?php echo isset($val['OPTID'])?$val['OPTID']:0;?>"><?php echo $key+1;?></a></td>
                                           
                                            <td><?php if(isset($val['OPT_AD']) && $val['OPT_AD']!='0000-00-00'){echo $val['OPT_AD'];}?></td>
                                            <td><?php if(isset($val['Deadline']) && $val['Deadline']!='0000-00-00'){echo $val['Deadline'];}?></td>
                                            <td><?php if(isset($val['OPT_EOW']) && $val['OPT_EOW']!='0000-00-00'){echo $val['OPT_EOW'];}?></td>
                                            <td><?php if(isset($val['DRR_DATE']) && $val['DRR_DATE']!='0000-00-00'){echo $val['DRR_DATE'];}?></td>
                                           
                                            <!--  <td><?php echo isset($val['Deadline'])?$val['Deadline']:'';?></td>
                                            <td><?php echo isset($val['OPT_EOW'])?$val['OPT_EOW']:'';?></td>
                                            <td class="center"><?php echo isset($val['DRR_DATE'])?$val['DRR_DATE']:'';?></td>-->
                                            <td class="center"><?php echo isset($val['TYPE'])?$val['TYPE']:'';?></td>
                                            <td class="center"><?php echo isset($val['USER'])?$val['USER']:'';?></td>
                                            <td class="center"><?php echo isset($val['new_element_name'])?$val['new_element_name']:'';?></td>
                                            <td class="center"><?php echo isset($val['IAL_NO'])?$val['IAL_NO']:'';?></td> 
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
                          SVC  DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example3">
                                   <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>AD</th>
											<th>Deadline</th>
                                            <th>EOW</th>
                                            <th>Loadsheet</th>
                                            <th>Submitter</th>
                                            
                                            <th>Type</th>
                                            <th>Data Specialist</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php if(isset($svclist) && count($svclist)>0){
                                    	foreach ($svclist as $key=>$val){
                                    	?>
                                    	
                                    	 <tr class="odd gradeX">
                                    	   <td><a href="<?php echo site_url('opt/opt_create_task/task')?>?pr_id=2&svcid=<?php echo isset($val['SVCID'])?$val['SVCID']:0;?>"><?php echo $key+1;?></a></td>
                                           <td><?php  if(isset($val['AD']) && $val['AD']!='0000-00-00'){echo $val['AD'];}?></td>
                                           <td><?php if(isset($val['Deadline']) && $val['Deadline']!='0000-00-00'){echo $val['Deadline'];}?></td>
                                           <td><?php if(isset($val['EOW']) && $val['EOW']!='0000-00-00'){echo $val['EOW'];}?></td>
   
                                            <td class="center"><?php echo isset($val['Loadsheet'])?$val['Loadsheet']:'';?></td>
                                            <td class="center"><?php echo isset($val['Submitter'])?$val['Submitter']:'';?></td>
                                            <td><?php echo isset($val['Type'])?$val['Type']:'';?></td>
                                            <td><?php echo isset($val['USER'])?$val['USER']:'';?></td>
                                            <td><?php echo isset($val['STATUS'])?$val['STATUS']:'';?></td>
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
                          Compatibility  DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example4">
                                   <thead>
                                        <tr>
                                            <th>ID</th>
											<th>Deadline</th>
											<th>Loadsheet</th>
                                            <th>Submitter</th>
                                            <th>BU</th>
                                            <th>Data Specialist</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php if(isset($comlist) && count($comlist)>0){
                                    	foreach ($comlist as $key=>$val){
                                    	?>
                                    	
                                    	 <tr class="odd gradeX">
                                    	    <td><a href="<?php echo site_url('opt/opt_create_task/task')?>?pr_id=2&comp_id=<?php echo isset($val['ID'])?$val['ID']:'';?>"><?php echo $key+1;?></a></td>
                                            <td><?php if(isset($val['Deadline']) && $val['Deadline']!='0000-00-00'){echo $val['Deadline'];}?></td>
                                            <td><?php echo isset($val['LOADSHEET'])?$val['LOADSHEET']:'';?></td>
                                            <td><?php echo isset($val['Submitter'])?$val['Submitter']:'';?></td>
                                            <td class="center"><?php echo isset($val['BU'])?$val['BU']:'';?></td>
                                            <td class="center"><?php echo isset($val['USER'])?$val['USER']:'';?></td> 
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
                          EP  DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example5">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
											<th>Deadline</th>
                                            <th>RequestDate</th>
                                            <th>Requestor</th>
                                            <th>DataSpecialist</th>
                                            <th>BU</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   
                                    <?php if(isset($eplist) && count($eplist)>0){
                                    	foreach ($eplist as $key=>$val){
                                    	?>
                                    	
                                    	 <tr class="odd gradeX">
                                            <td><a href="<?php echo site_url('ep_req/ep_req_create_task/task')?>?pr_id=5&id=<?php echo isset($val['ID'])?$val['ID']:0;?>"><?php echo $key+1;?></a></td>
                                            <td><?php if(isset($val['Deadline']) && $val['Deadline']!='0000-00-00'){echo $val['Deadline'];}?></td>
                                             <td><?php if(isset($val['RequestDate']) && $val['RequestDate']!='0000-00-00'){echo $val['RequestDate'];}?></td>
                                            
                                            <td><?php echo isset($val['Requestor'])?$val['Requestor']:'';?></td>
                                            <td class="center"><?php echo isset($val['DataSpecialist'])?$val['DataSpecialist']:'';?></td>
                                            <td class="center"><?php echo isset($val['BU'])?$val['BU']:'';?></td> 
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
                          Special Bid  DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example6">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>EntityID</th>
											<th>Data Specialist</th>
                                            <th>Status</th>
                                            <th>Deadline</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(isset($spblist) && count($spblist)>0){
                                    	foreach ($spblist as $key=>$val){
                                    	?>
                                    	 <tr class="odd gradeX">
                                    	    <td><a href="<?php echo site_url('spb/spb_create_task/task')?>?pr_id=4&id=<?php echo isset($val['TID'])?$val['TID']:0;?>"><?php echo $key+1;?></a></td>
                                            
                                            <td><?php echo isset($val['EntityID'])?$val['EntityID']:'';?></td>
                                            <td><?php echo isset($val['USER'])?$val['USER']:'';?></td>
                                            <td><?php echo isset($val['STATUS'])?$val['STATUS']:'';?></td>
                                            <td><?php if(isset($val['Deadline']) && $val['Deadline']!='0000-00-00'){echo $val['Deadline'];}?></td>
                                            
                                            <!-- <td class="center"><?php echo isset($val['Deadline'])?$val['Deadline']:'';?></td> -->
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
            <?php }?>
             
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
	    $('#dataTables-example4').DataTable({
	        responsive: true
	    });
	    $('#dataTables-example5').DataTable({
	        responsive: true
	   });
		$('#dataTables-example6').DataTable({
		    responsive: true
		});
		$('#dataTables-example7').DataTable({
		    responsive: true
		});
	
	
    });
    </script>
</body>
</html>
