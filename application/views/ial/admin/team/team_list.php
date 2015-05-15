<!DOCteam html>
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
                           <h2>IAL Team List</h2>
                        </div>
                        <div class="panel-heading">
                           <a href="<?php echo site_url('Ial_admin/IAL_team/edit');?>"><input type="button"  value="ADD team"/></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th >IAL_team</th>
						            	    <th >operate</th>
                                        </tr>
                                    </thead>
                                    <tbody>
							       <?php
									if(count($list)==0):
										?>
											<tr><td colspan='2'>No Data</td></tr>
										<?php
										  endif;
							              for($i = 0;$i<count($list); $i++){
										?>
									<tr>
										<td><?php echo isset($list[$i]['team']) ?$list[$i]['team']:'';?></td>
										<td>
										<a href="<?php echo site_url('Ial_admin/IAL_team/edit') ?>?id=<?php  echo isset($list[$i]['id']) ?$list[$i]['id']:'';?>">edit</a>
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
