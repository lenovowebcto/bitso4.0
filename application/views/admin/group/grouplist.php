<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<?php $this->load->view('common');?>
<script src="<?php  echo base_url();?>util/bitso/bower_components/jquery/dist/jquery.min.js"></script>
  
    <title>BITSO 4.0</title>
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
                           <h2>Group List</h2>
                        </div>
                         <div class="panel-heading">
                           <a href="<?php echo site_url('admin/group/addgroup');?>"><input type="button"  value="ADD GROUP"/></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th >gname</th>
						            	    <th >operate</th>
                                        </tr>
                                    </thead>
                                    <tbody>
							        <?php
									if(count($groups)==0):
										?>
										<tr><td colspan='11'>No data</td></tr>
									<?php
									  endif;
						              for($i = 0;$i<count($groups); $i++){
									?>
									<tr>
									    <td><?php echo isset($groups[$i]['gname']) ?$groups[$i]['gname']:'';?></td>
										<td><a href="<?php echo site_url('admin/group/addgroup') ?>?gid=<?php  echo isset($groups[$i]['gid']) ?$groups[$i]['gid']:'';?>">edit</a>
										<!--||<a href="<?php echo site_url('admin/group/deletegroup') ?>?gid=<?php  echo isset($groups[$i]['gid']) ?$groups[$i]['gid']:'';?>">delete</a>-->
										</td>
								    </tr>	
								    <?php }?>
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
    <?php $this->load->view('foot');?>
    <!-- /#wrapper -->
    </body>
</html>
