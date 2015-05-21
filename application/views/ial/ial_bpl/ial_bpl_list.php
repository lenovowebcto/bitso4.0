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
<?php
$this->load->view ( 'left2' );
?>
 <div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">IAL&BPL List</h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
       
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						
						<!-- /.panel-heading -->
						<div class="panel-body">

							<div class="dataTable_wrapper">
								<table class="table table-striped table-bordered table-hover"
									id="dataTables-example">
									<thead>
										<tr>
											<th>#</th>
											<th>RTM</th>
											<th>AD</th>
											<th>EOW</th>
											<th>Review_Date</th>
											<th>Product_Name</th>
											<th>Status</th>
											<th>Warning</th>
											<!-- <th>Type_of_IAL</th> -->
											
										</tr>
									</thead>
									<tbody>
                              
									<?php
									    if (count($list) == 0) :
									?>
							    	<tr>
										<td colspan='8'>NO Data</td>
								    </tr>

									<?php endif;
									      for($i = 0; $i < count ($list ); $i ++) {
									?>
					                  <tr>
											<td><a
												href="<?php echo site_url('ial/ial_bpl/edit');?>?id=<?php echo isset($list[$i]["id"]) ?$list[$i]["id"]:0?>"><?php echo $i+1;?></a></td>
											<td><?php if(isset($list[$i]['RTM']) && $list[$i]['RTM']!='0000-00-00') { echo isset($list[$i]['RTM']) ?$list[$i]['RTM']:'';}?></td>
										    <td><?php if(isset($list[$i]['AD']) && $list[$i]['AD']!='0000-00-00') { echo isset($list[$i]['AD']) ?$list[$i]['AD']:'';}?></td>
											<td><?php if(isset($list[$i]['EOW']) && $list[$i]['EOW']!='0000-00-00') { echo isset($list[$i]['EOW']) ?$list[$i]['EOW']:'';}?></td>
											<td><?php if(isset($list[$i]['review_date']) && $list[$i]['review_date']!='0000-00-00') { echo isset($list[$i]['review_date']) ?$list[$i]['review_date']:'';}?></td>
											<td><?php if(isset($list[$i]['Product_Name']) && $list[$i]['Product_Name']!='') { echo isset($list[$i]['Product_Name']) ?$list[$i]['Product_Name']:'';}?></td>
											<td><?php if(isset($list[$i]['status']) && $list[$i]['status']!='') { echo isset($list[$i]['status']) ?$list[$i]['status']:'';}?></td>
											<!-- <td><?php echo isset($list[$i]['type_of_IAL']) ?$list[$i]['type_of_IAL']:'';?></td>
										    -->
										    
										    <td><?php 
										    $RTM = $list[$i]['RTM'];
										    $now = date('Y-m-d',time());
										    
										    if($list[$i]['US_part_NO']!='' && $list[$i]['BPL_NO'] ==''
										    		 && ($now>$RTM  && date('Y-m-d',strtotime("-7 day"))<$RTM)){ ?>
										    <font color="red">to do BPL</font>
										    
										    <?php }elseif($now<$RTM  && date('Y-m-d',strtotime("+7 day"))>=$RTM){?>
										    <font color="red">Check RTM</font>
										    <?php }elseif(($now>$RTM  && date('Y-m-d',strtotime("-7 day"))<$RTM) && $list[$i]['status']!='Final'){?>
										     <font color="red">Check AD</font>
										    <?php }?>
										    </td>
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
	<!-- /#wrapper -->
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
