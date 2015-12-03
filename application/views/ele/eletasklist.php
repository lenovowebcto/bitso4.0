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
                     <ul class="nav nav-tabs" id="myTab">
							<div ><a  href="<?php echo site_url('element/ele_task/project_list');?>?pro_name=<?php echo $pro_name;?>&pr_id=<?php echo $pr_id;?>&archive=1">
							
							<?php if($archive==1){?><input type="button" class="btn btn-info"  value="Archive"/>
							 <?php }else{?> <input type="button" class="btn default"  value="Archive"><?php }?> </a>
							 <a href="<?php echo site_url('element/ele_task/project_list');?>?pro_name=<?php echo $pro_name;?>&pr_id=<?php echo $pr_id;?>&archive=0"> 
							 <?php if($archive==0){?><input class="btn btn-info" type="button" value="NoArchive"/>
							  <?php }else{?> <input class="btn default" type="button"  value="NoArchive" /><?php }?> </a></div>
					</ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                       
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th >ID</th>
                                            <th >project_name</th>
						            	    <th >CSR_Version</th>
						            	    <th >Receive_Date</th>
						            	    <th >Type</th>
						            	    
						            	    <th >AD</th>
						            	    <th >DRR_DeadLine</th>
						            	    <th >CTO</th>
						            	    <th >Status</th>
						            	    <th >Owner</th>
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
									<td><a href="<?php echo site_url('element/ele_task/addeletask')?>?pid=<?php echo isset($list[$i]['pid']) ?$list[$i]['pid']:'';?>&pr_id=<?php echo isset($pr_id)?$pr_id:0;?>"><?php echo $i+1;?></a></td>
									<td><?php echo isset($list[$i]['project_name']) ?$list[$i]['project_name']:'';?></td>
									<td><?php echo isset($list[$i]['CSR_Version']) ?$list[$i]['CSR_Version']:'';?></td>
									<!--  <td><?php echo isset($list[$i]['Receive_Date']) ?$list[$i]['Receive_Date']:'';?></td>-->
									<td><?php if(isset($list[$i]['Receive_Date']) && $list[$i]['Receive_Date']!='0000-00-00') { echo isset($list[$i]['Receive_Date']) ?$list[$i]['Receive_Date']:'';}?></td>
													
									<td><?php echo isset($list[$i]['Type']) ?$list[$i]['Type']:'';?></td>
									<td><?php if(isset($list[$i]['AD']) && $list[$i]['AD']!='0000-00-00') { echo isset($list[$i]['AD']) ?$list[$i]['AD']:'';}?></td>
									<td><?php if(isset($list[$i]['DeadLine']) && $list[$i]['DeadLine']!='0000-00-00') { echo isset($list[$i]['DeadLine']) ?$list[$i]['DeadLine']:'';}?></td>
																	
							   <!-- <td><?php echo isset($list[$i]['AD']) ?$list[$i]['AD']:'';?></td>
									<td><?php echo isset($list[$i]['DeadLine']) ?$list[$i]['DeadLine']:'';?></td> -->			
									
									<!-- <td><?php echo isset($list[$i]['Count']) ?$list[$i]['Count']:'';?></td> -->
									<td><?php echo isset($list[$i]['cto']) ?$list[$i]['cto']:'';?></td>
									<td><?php echo isset($list[$i]['Status']) ?$list[$i]['Status']:'';?></td>
									<td><?php echo isset($list[$i]['Owner']) ?$list[$i]['Owner']:'';?></td>
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
        }).fnDestroy();
		
    });
    </script>
</body>
</html>
