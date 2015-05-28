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
                           <h2>Brand List</h2>
                        </div>
                        <div class="panel-heading">
                           <a href="<?php echo site_url('Ial_admin/IAL_brand/addbrand');?>"><input type="button"  value="ADD BRAND"/></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th >bname</th>
						            	    <th >operate</th>
                                        </tr>
                                    </thead>
                                    <tbody>
							       <?php
									if(count($brand)==0):
										?>
											<tr><td colspan='11'>No Data</td></tr>
										<?php
										  endif;
							              for($i = 0;$i<count($brand); $i++){
										?>
									<tr>
										<td><?php echo isset($brand[$i]['bname']) ?$brand[$i]['bname']:'';?></td>
										<td>
										<a href="<?php echo site_url('Ial_admin/IAL_brand/addbrand') ?>?bid=<?php  echo isset($brand[$i]['bid']) ?$brand[$i]['bid']:'';?>">Edit</a>
								      ||<a href="<?php echo site_url('Ial_admin/IAL_brand/delbrand') ?>?bid=<?php  echo isset($brand[$i]['bid']) ?$brand[$i]['bid']:'';?>">Delete</a>
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
    <!-- /#wrapper -->
     <?php  $this->load->view('foot');?>
    </body>
</html>
