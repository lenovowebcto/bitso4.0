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
 <script src="<?php  echo base_url();?>util/bitso/bower_components/jquery/dist/jquery.min.js"></script>
    
</head>

<body>
    <div id="wrapper">
 <?php
    $this->load->view('left2');  ?>
        <div id="page-wrapper">
            
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <h2>User List</h2>
                        </div>
                        <div class="panel-heading">
                           <a href="<?php echo site_url('admin/user/adduser');?>"><input type="button"  value="ADD USER"/></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th >username</th>
						            	    <th >email</th>
						            	    <th >title</th>
						            	    <th >group</th>
						            	    <th >project</th>
						            	    <th >local</th>
						            	    <th >active</th>
						            	    <th >operate</th>
                                        </tr>
                                    </thead>
			                       <tbody>
					        <?php
							if(count($list)==0):
								?>
						   <tr><td colspan='11'>No Data</td></tr>
							<?php
							  endif;
				              for($i = 0;$i<count($list); $i++){
							?>
							<tr>
								<td><?php echo isset($list[$i]['username']) ?$list[$i]['username']:'';?></td>
								<td><?php echo isset($list[$i]['email']) ?$list[$i]['email']:'';?></td>
								<td><?php echo isset($list[$i]['title']) ?$list[$i]['title']:'';?></td>
								<td><?php echo isset($list[$i]['group']) ?$list[$i]['group']:'';?></td>
								<td><?php echo isset($list[$i]['project']) ?$list[$i]['project']:'';?></td>
								<td><?php echo isset($list[$i]['local']) ?$list[$i]['local']:'';?></td>
								<td><?php if(isset($list[$i]['active']) && $list[$i]['active']==1){
									  echo 'active';
								}elseif(isset($list[$i]['active']) && $list[$i]['active']==0){
									  echo 'inactive';
								}?></td>
								<td><a href="<?php echo site_url('admin/user/adduser')?>?uid=<?php echo isset($list[$i]['uid'])?$list[$i]['uid']:'';?>">edit</a></td>
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
        </div>
        <!-- /#page-wrapper -->

    </div>
       <?php  $this->load->view('foot');  ?>
    <!-- /#wrapper -->
    </body>
</html>
