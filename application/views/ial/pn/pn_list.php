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
     <script>
    function changestatus(id){
    	var url = "<?php echo site_url('ial/pn_maintenance/editstatus');?>";
    	var sta = $("#sta"+id).val();
	
    	$.ajax({
           type:'POST',
           url:url,
           data:{id:id,sta:sta},
           async:true,
           success:function(result){
             if(result=='success'){
                 alert("Change Success");
                }
            }
           });
        }
   
    </script>
</head>

<body>

	<div id="wrapper">
<?php
$this->load->view ( 'left2' );
?>
 <div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">IAL PN Maintenance List</h1>
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
										<th>Request_Date</th>
										<th>Email Subject</th>
										<th>Requester</th>
										<th>PN</th>
										<th>Sales_Org</th>
										<th>Status</th>
											
										</tr>
									</thead>
									<tbody>
                              
									<?php if (count($list) == 0) : ?>
							    	<tr>
										<td colspan='8'>NO Data</td>
								    </tr>

									<?php endif;
									      for($i = 0; $i < count ($list ); $i ++) {
									?>
					                  <tr>
											<td><a
												href="<?php echo site_url('ial/pn_maintenance/edit') ?>?id=<?php echo isset($list[$i]["id"]) ?$list[$i]["id"]:0?>"><?php echo $i+1;?></a></td>
											<td><?php if(isset($list[$i]['request_date']) && $list[$i]['request_date']!='0000-00-00') { echo isset($list[$i]['request_date']) ?$list[$i]['request_date']:'';}?></td>
										    <td><?php echo isset($list[$i]['email_subject']) ?$list[$i]['email_subject']:''; ?></td>
											<td><?php echo isset($list[$i]['Requester']) ?$list[$i]['Requester']:''; ?></td>
																
											<td><?php echo isset($list[$i]['PN']) ?$list[$i]['PN']:'';?></td>
											<td><?php echo isset($list[$i]['sales_org']) ? str_replace("\n","<br>",$list[$i]['sales_org']):'';?></td>
											<!--  <td><?php echo isset($list[$i]['status']) ?$list[$i]['status']:'';?></td>
										    -->
										    
										    <td>
										     	 <select name="pn[status]" class="form-control" style="width: 120px" id="sta<?php echo $list[$i]["id"];?>" onchange="changestatus(<?php echo $list[$i]["id"];?>)">
											         <option  <?php if(isset($list[$i]['status']) && $list[$i]['status']=='Open'){echo 'selected';}?> value="Open" >OPEN</option> 
											         <option  <?php if(isset($list[$i]['status']) && $list[$i]['status']=='Close'){echo 'selected';}?> value="Close" >CLOSE</option> 
											         <option  <?php if(isset($list[$i]['status']) && $list[$i]['status']=='Cancel'){echo 'selected';}?> value="Cancel" >CANCEL</option> 
										         </select>
										        </td>
										</tr>s
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
        }).fnDestroy();
		
    });
    </script>
</body>
</html>
