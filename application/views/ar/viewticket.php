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
                $this->load->view('left2');
          ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">view Ticket Task</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Detail info as below
                        </div>
                     <form action="#" method="post">
                        <div class="panel-body">

							<div class="col-lg-12">
								<label>Problem Summary:</label>
								<input class="form-control"  value="<?php echo isset($tic['ProblemSummary'])?$tic['ProblemSummary']:''; ?>" disabled="disabled" />
							</div>
							<div class="col-lg-3">
								<div class="input-prepend input-group">
								<label>Date Reported:</label>
								   <input type="text"  value="<?php echo isset($tic['DateReported'])?$tic['DateReported']:''; ?>"  disabled="disabled"   class="form-control"  /> 
								</div>
							</div>
							<div class="col-lg-3">
								<div class="input-prepend input-group">
								<label>Person Reported:</label>
								   <input type="text"   value="<?php echo isset($tic['PersonReported'])?$tic['PersonReported']:'';?>"  disabled="disabled"  class="form-control"  /> 
								</div>
							</div>
							<div class="col-lg-3">
								<div class="input-prepend input-group">
								<label>Source:</label>
								   <input type="text"    value="<?php echo isset($tic['Source'])?$tic['Source']:''; ?>"   class="form-control" disabled="disabled"  /> 
								</div>
							</div>
							<div class="col-lg-3">
								<div class="input-prepend input-group">
								<label>AssignTo:</label>
								   <input type="text" value="<?php echo isset($tic['AssignTo'])?$tic['AssignTo']:'';?>"   class="form-control" disabled="disabled" /> 
								</div>
							</div>
							<div class="col-lg-3">
								<div class="input-prepend input-group">
								<label>Production State:</label>
								   <input type="text" value="<?php echo isset($tic['ProdState'])?$tic['ProdState']:'';?>" class="form-control" disabled="disabled" /> 
								</div>
							</div>
							<div class="col-lg-3">
								<div class="input-prepend input-group">
								<label>Geos:</label>
								   <input type="text"  value="<?php echo isset($tic['Geos'])?$tic['Geos']:'';?>"   class="form-control"   disabled="disabled" /> 
								</div>
							</div>
							<div class="col-lg-3">
								<div class="input-prepend input-group">
								<label>Family:</label>
								   <input type="text"  value="<?php echo isset($tic['Family'])?$tic['Family']:''; ?>"  class="form-control" disabled="disabled"  /> 
								</div>
							</div>
							
							<div class="col-lg-12">
								<label>Data Area:</label>
								<input class="form-control"  value="<?php echo isset($tic['DataArea'])?$tic['DataArea']:''; ?>" disabled="disabled" />
							</div>
							<div class="col-lg-3">
								<label>Severity:</label>
								<input class="form-control"  value="<?php echo isset($tic['Severity'])?$tic['Severity']:'';?>" disabled="disabled" />
							</div>
							<div class="col-lg-3">
								<label>SIze of Impact:</label>
								<input class="form-control"  value="<?php echo isset($tic['ImpactSize'])?$tic['ImpactSize']:''; ?>" disabled="disabled" />
							</div>
							<div class="col-lg-12">
								<label>Problem Detail:</label>
								<textarea class="form-control" disabled="disabled" ><?php echo isset($tic['ProblemDetails'])?$tic['ProblemDetails']:'' ?></textarea>
							</div>
							<?php if(isset($tic['FileName']) && $tic['FileName']!=" "){
								?>
							<div class="col-lg-3">
								<label>Attachments:</label>
								<a href="<?php echo site_url('admin/admin_task/down_load');?>?fname=<?php echo isset($tic['FileName'])?$tic['FileName']:'';?>"><?php echo isset($tic['FileName'])?$tic['FileName']:'';?></a>
							</div>
								<?php }?>
							<div class="col-lg-3">
								<label>Problem State:</label>
								<input class="form-control"  value="<?php echo isset($tic['ProblemState'])?$tic['ProblemState']:''; ?>" disabled="disabled" >
							</div>
							<div class="col-lg-12">
								<label>Status:</label>
                               <textarea class="form-control" disabled="disabled" ><?php echo isset($tic['Status'])?$tic['Status']:'' ?></textarea>
							</div>
							<div class="col-lg-12">
								<label>RCValues:</label>
							   <textarea class="form-control" disabled="disabled" ><?php echo isset($tic['RCValues'])?$tic['RCValues']:'' ?></textarea>
							</div>
							<div class="col-lg-3">
								<label>Date Closed:</label>
								<input class="form-control"   value="<?php echo isset($tic['DateClosed'])?$tic['DateClosed']:''; ?>">
							</div>
							<div class="col-lg-3">
								<label>OverrideStatusColor:</label>
								<input class="form-control"  value="<?php echo isset($tic['OverrideStatusColor'])?$tic['OverrideStatusColor']:'';?>">
							</div>
						<hr/>
						</form>
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
			</div>
    </div>
  <?php  $this->load->view('foot'); ?>
</body>
</html>
