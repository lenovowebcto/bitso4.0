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
                    <h1 class="page-header">LOIS CSR Task List</h1>
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
                                            <th >ID</th>
                                            <th >project_name</th>
                                            <th>Have Final</th>
                                            <th >AD</th>
						            	    <th >Type</th>
						            	    <th >Owner</th>
						            	    <th>Attachment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
	                            <?php
								if(count($list)==0):
									?>
							   <tr><td colspan='11'>NO Data</td></tr>
								<?php
								  endif;
					              for($i = 0;$i<count($list); $i++){
								?>
								<tr>
									<td> <a href="<?php echo site_url('element/ele_task/project_list')?>?pro_name=<?php echo isset($list[$i]['project_name']) ?$list[$i]['project_name']:'';?>&pr_id=<?php echo isset($pr_id)?$pr_id:0;?>&archive=0">
									<?php echo $i+1;?></a></td>
									<td><?php echo isset($list[$i]['project_name']) ?$list[$i]['project_name']:'';?></td>
									<td><?php if(isset($list[$i]['num']) && $list[$i]['num']==0){echo 'YES';}else{echo  $list[$i]['num'];}?></td>
									<td><?php echo isset($list[$i]['AD']) ?$list[$i]['AD']:'';?></td>
									<td><?php echo isset($list[$i]['Type']) ?$list[$i]['Type']:'';?></td>
									<td><?php echo isset($list[$i]['Owner']) ?$list[$i]['Owner']:'';?></td>
									
								    <td><?php foreach($attachment as $key=>$val){
								    	if($key == $list[$i]['project_name']){
								    		foreach($val as $v){  ?>
								    		<a  title='<?php echo $v["upload_time"];?>'
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
