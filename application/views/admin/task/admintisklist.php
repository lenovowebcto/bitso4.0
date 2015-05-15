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
          <?php $this->load->view('left2');
          ?>
           <!-- table  start-->
         <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">LOIS Admin Task List</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Detail info as below
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th >Ticket_id</th>
						            	    <th >ProblemSummary</th>
						            	    <th >DateReported</th>
						            	    <th >PersonReported</th>
						            	    <th >Source</th>
						            	    <th >ProdState</th>
						            	    
						            	    <th >AssignTo</th>
						            	    <th >Family</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            
										 <?php
							if(count($list)==0):
								?>
						   <tr><td colspan='13'>NO Data</td></tr>
							<?php
							  endif;
				              for($i = 0;$i<count($list); $i++){
							?>
							<tr>
								<td><a href="<?php echo site_url('admin/admin_task/add_admintask')?>?t_id=<?php echo isset($list[$i]['Ticket_id'])?$list[$i]['Ticket_id']:'';?>"><?php echo $i+1;?></a></td>
								<td><?php echo isset($list[$i]['ProblemSummary']) ?$list[$i]['ProblemSummary']:'';?></td>
								<td><?php echo isset($list[$i]['DateReported']) ?$list[$i]['DateReported']:'';?></td>
								<td><?php echo isset($list[$i]['PersonReported']) ?$list[$i]['PersonReported']:'';?></td>
								<td><?php echo isset($list[$i]['Source']) ?$list[$i]['Source']:'';?></td>
								<td><?php echo isset($list[$i]['ProdState']) ?$list[$i]['ProdState']:'';?></td>
								
								<td><?php echo isset($list[$i]['AssignTo']) ?$list[$i]['AssignTo']:'';?></td>
								<!-- <td><?php echo isset($list[$i]['Geos']) ?$list[$i]['Geos']:'';?></td>-->
								<td><?php echo isset($list[$i]['Family']) ?$list[$i]['Family']:'';?></td>
								<!--  <td><?php echo isset($list[$i]['DataArea']) ?$list[$i]['DataArea']:'';?></td>
								<td><?php echo isset($list[$i]['Severity']) ?$list[$i]['Severity']:'';?></td>
								<td><?php echo isset($list[$i]['ImpactSize']) ?$list[$i]['ImpactSize']:'';?></td>
								
								<td><?php echo isset($list[$i]['ProblemDetails']) ?$list[$i]['ProblemDetails']:'';?></td>-->
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
        });
		
		$("#showhistory").click(function(){
		$("dhistory").hide();
		});
    });
    </script>
</body>
</html>
