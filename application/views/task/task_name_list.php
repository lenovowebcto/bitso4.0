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
                    <h1 class="page-header">LOIS TPG/IPG Task List</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Detail info as below
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                                <th>ID</th>
												<th>Family</th>
												<th>Request Type</th>
												<th>Ann Date</th>
												<th>POR Version</th>

												<th>Action</th>
												<th>Brand</th>
												<th>Data Specialist</th>
												<th>Have Final</th>
												<th>Attachment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                          <?php
											if (count ( $task ) == 0) :
										?>
				                           <tr>
												<td colspan='9'>No Data</td>
											</tr>
											<?php
			                              endif;
											for($i = 0; $i < count ( $task ); $i ++) {
												?>
					                       <tr>
												<td><a href="<?php echo site_url('task/addtask') ?>?f=<?php echo isset($task[$i]["family"]) ?$task[$i]["family"]:""?>&pr_id=<?php echo isset($pr_id)?$pr_id:0;?>&archive=0"><?php echo $i+1;?></a></td>
												<td><?php echo isset($task[$i]['family']) ?$task[$i]['family']:'';?></td>
												<td><?php echo isset($task[$i]['request_type']) ?$task[$i]['request_type']:'';?></td>
												<td><?php if(isset($task[$i]['ann_date']) && $task[$i]['ann_date']!='0000-00-00') { echo isset($task[$i]['ann_date']) ?$task[$i]['ann_date']:'';}?></td>
									
												<td><?php echo isset($task[$i]['POR_Version']) ?$task[$i]['POR_Version']:'';?></td>
												<td><?php echo isset($task[$i]['Action']) ?$task[$i]['Action']:'';?></td>
										     	<td><?php echo isset($task[$i]['brand']) ?$task[$i]['brand']:'';?></td>
											
												<td><?php echo isset($task[$i]['Data_Specialist']) ?$task[$i]['Data_Specialist']:'';?></td>
												<td><?php if(isset($task[$i]['num']) && $task[$i]['num']==0){echo 'YES';}else{echo $task[$i]['num'];}?></td>
												<td><?php foreach($attachment as $key=>$val){
											    	if($key == $task[$i]['family']){
											    		foreach($val as $v){  ?>
											    		<a title='<?php echo $v["upload_time"];?>'
											    		 href="<?php echo site_url('admin/admin_task/down_load');?>?fname=<?php echo isset($v['attachment'])?$v['attachment']:'';?>"><?php echo isset($v['attachment'])?$v['attachment']:'';?></a><br>
											    		<?php 
											    		}
											    	}
											    }?></td>
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
           <!-- table   end-->
    
   <?php $this->load->view('foot');?>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
		
    });
    </script>
</body>
</html>
