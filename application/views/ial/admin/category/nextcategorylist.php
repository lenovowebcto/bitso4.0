<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<?php $this->load->view('common');?>
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
                           <h2>NextCategory List</h2>
                        </div>
                         <div class="panel-heading">
                           <a href="<?php echo site_url('Ial_admin/IAL_category/add_nextcategory?ic_id='.$ic_id);?>"><input type="button"  value="ADD NEXTCATEGORY"/></a>
                           &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('Ial_admin/IAL_category');?>">Back Category List</a>
                        </div>                           
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th >nextcate_name</th>
						            	    <th >operate</th>
                                        </tr>
                                    </thead>
                                    <tbody>
							        <?php
									if(count($list)==0):
										?>
										<tr><td colspan='11'>No data</td></tr>
									<?php
									  endif;
						              for($i = 0;$i<count($list); $i++){
									?>
									<tr>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
									    <td><?php echo isset($list[$i]['nc_name']) ?$list[$i]['nc_name']:'';?></td>
										<td><a href="<?php echo site_url('Ial_admin/IAL_category/add_nextcategory') ?>?id=<?php  echo isset($list[$i]['id']) ?$list[$i]['id']:'';?>&ic_id=<?php echo $ic_id;?>">edit</a></td>
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
