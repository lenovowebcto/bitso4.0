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
          <?php $this->load->view('left2');
          ?>
           <!-- table  start-->
         <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">tickets List</h1>
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
                                             <th>Ticket_id</th>
											 <th>Problem_Summary</th>
											 <th>Author</th>
											 <th>Person_Reported</th>
											 <th>AssignTo</th>
											 <th>DataArea</th>
											 <th>Serverity</th>
											 <th>Date_Reported</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                           
                                          <?php
											if (count($tickets)== 0) :
										?>
				                           <tr>
												<td colspan='8'>No Data</td>
											</tr>
											<?php
			                              endif;
											for($i = 0; $i < count($tickets); $i ++) {
												?>
					                       <tr>
												<td><a href="<?php echo site_url('admin/archive/viewtickect') ?>?Ticket_id=<?php echo isset($tickets[$i]["Ticket_id"]) ?$tickets[$i]["Ticket_id"]:""?>&FileID=<?php echo isset($tickets[$i]['FileID'])? $tickets[$i]['FileID'] :0 ;?>"><?php echo isset($tickets[$i]['Ticket_id']) ?$tickets[$i]['Ticket_id']:'';?></a></td>
												<td><?php echo isset($tickets[$i]['ProblemSummary']) ?$tickets[$i]['ProblemSummary']:'';?></td>
												<td><?php echo isset($tickets[$i]['Author']) ?$tickets[$i]['Author']:'';?></td>
												<td><?php echo isset($tickets[$i]['PersonReported']) ?$tickets[$i]['PersonReported']:'';?></td>
												<td><?php echo isset($tickets[$i]['AssignTo']) ?$tickets[$i]['AssignTo']:'';?></td>
												<td><?php echo isset($tickets[$i]['DataArea']) ?$tickets[$i]['DataArea']:'';?></td>
										     	<td><?php echo isset($tickets[$i]['Severity']) ?$tickets[$i]['Severity']:'';?></td>
											
												<td><?php echo isset($tickets[$i]['DateReported']) ?$tickets[$i]['DateReported']:'';?></td>
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
	
    });
    </script>
</body>
</html>
