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
                           <h2>Category List</h2>
                        </div>
                         <div class="panel-heading">
                           <a href="<?php echo site_url('admin/category/addcategory');?>"><input type="button"  value="ADD CATEGORY"/></a>
                        </div>                           
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th >cate_name</th>
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
									    <td><a href="<?php echo site_url('admin/category/next_category') ?>?id=<?php  echo isset($list[$i]['id']) ?$list[$i]['id']:'';?>"><?php echo isset($list[$i]['cate_name']) ?$list[$i]['cate_name']:'';?></a></td>
										<td><a href="<?php echo site_url('admin/category/addcategory') ?>?id=<?php  echo isset($list[$i]['id']) ?$list[$i]['id']:'';?>">edit</a></td>
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
