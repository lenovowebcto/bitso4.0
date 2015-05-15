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
                           <h2>Bu List</h2>
                        </div>
                         <div class="panel-heading">
                           <a href="<?php echo site_url('admin/bu/addbu');?>"><input type="button"  value="ADD BU"/></a>
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
									if(count($bu)==0):
										?>
										<tr><td colspan='11'>No data</td></tr>
									<?php
									  endif;
						              for($i = 0;$i<count($bu); $i++){
									?>
									<tr>
									    <td><?php echo isset($bu[$i]['bu_name']) ?$bu[$i]['bu_name']:'';?></td>
										<td><a href="<?php echo site_url('admin/bu/addbu') ?>?bu_id=<?php  echo isset($bu[$i]['bu_id']) ?$bu[$i]['bu_id']:'';?>">edit</a>
									<!--  || <a href="<?php echo site_url('admin/bu/deletebu') ?>?bu_id=<?php  echo isset($bu[$i]['bu_id']) ?$bu[$i]['bu_id']:'';?>">delete</a>-->
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
