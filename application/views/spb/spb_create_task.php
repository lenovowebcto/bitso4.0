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
    <script
	src="<?php  echo base_url();?>util/bitso/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php  echo base_url();?>util/bitso/js/BeatPicker.min.js"></script>
<link href="<?php  echo base_url();?>util/bitso/css/BeatPicker.min.css"
	rel="stylesheet">
</head>

<body>

	<div id="wrapper">
<?php
$this->load->view ( 'left2' );
?>
        <div id="page-wrapper">

			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2>Create Task</h2>
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">
							<form id="compatibility" name="compatibility"
								action="<?php echo site_url('spb/spb_create_task/toaddtask') ?>"
								method="post">
								<input type="hidden" name="pr_id" value="<?php echo isset($pr_id)?$pr_id:0;?>"/>
								<input name="id" id="id" value="<?php echo isset($id)?$id:0; ?>"
									type="hidden" />
								<input name="archive"  value="<?php echo isset($archive)?$archive:0; ?>" type="hidden" />
                                <input type="hidden" id="url" value="<?php echo site_url('spb/spb_create_task/changearchive');?>"/>
                                <div class="panel-body">
									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>Deadline:</label> <input type="text"
												style="width: 200px" id="Deadline" class="form-control"
												data-beatpicker="true" name="task[Deadline]"
												value="<?php echo isset($task['Deadline'])?$task['Deadline']:'0000-00-00';?>" <?php if($type==2){?> disabled='disabled'<?php }?>/>
												<input type="hidden" name="Deadline" value="<?php echo isset($task['Deadline'])?$task['Deadline']:'0000-00-00';?>"/>
										</div>
									</div>

									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>Task Received Date:</label> <input type="text"
												style="width: 200px" id="TASKR_DATE" class="form-control"
												data-beatpicker="true" name="task[TASKR_DATE]"
												value="<?php echo isset($task['TASKR_DATE'])?$task['TASKR_DATE']:'0000-00-00';?>" />
										</div>
									</div>
									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>Start Processing Date:</label> <input type="text"
												style="width: 200px" id="START_DATE" class="form-control"
												data-beatpicker="true" name="task[START_DATE]"
												value="<?php echo isset($task['START_DATE'])?$task['START_DATE']:'0000-00-00';?>" />
										</div>
									</div>

									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>Complete Date:</label> <input type="text"
												style="width: 200px" id="COMPLETE_DATE" class="form-control"
												data-beatpicker="true" name="task[COMPLETE_DATE]"
												value="<?php echo isset($task['COMPLETE_DATE'])?$task['COMPLETE_DATE']:'0000-00-00';?>" />
										</div>
									</div>
									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>EntityID (Report NO.):</label> <input type="text"
												style="width: 200px" id="EntityID" class="form-control"
												name="task[EntityID]"
												value="<?php echo isset($task['EntityID'])?$task['EntityID']:'';?>" />
										</div>
									</div>

									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>MODELCOUNT:</label> <input type="text"
												style="width: 200px" id="MODELCOUNT" class="form-control"
												name="task[MODELCOUNT]"
												value="<?php echo isset($task['MODELCOUNT'])?$task['MODELCOUNT']:'';?>" 
												onkeyup="value=value.replace(/[^\d]/g,'') "/>
										</div>
									</div>
									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>Data Specialist:</label>
                                            <select style="width: 200px" id="BU" class="form-control" name="task[USER]">
                                                <?php  foreach($session_name as $key){
                                                    ?>
                                                    <option <?php if(isset($task['USER']) && $task['USER']==$key['username']){echo 'selected';}?> >
                                                        <?php echo isset($key['username'])?$key['username']:$user_name; ?></option>
                                                <?php
                                                }?>
                                            </select>

										</div>
									</div>
									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>Status:</label> <select style="width: 200px"
												id="Status" class="form-control" name="task[STATUS]">
									<?php  foreach($status as $key){
					         	?>
					         	<option id=<?php echo isset($key['sid'])?$key['sid']:''; ?> <?php if(isset($task['status']) && $task['status']==$key['stype']){echo 'selected';}?> ><?php echo isset($key['stype'])?$key['stype']:''; ?></option> 
					         	<?php 
					         }?>
											</select>
										</div>
									</div>
									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>Owner:</label> <input type="text" style="width: 200px"
												id="Owner" class="form-control" name="task[Owner]"
												value="<?php echo isset($task['OWNER'])?$task['OWNER']:'';?>" />
										</div>
									</div>
									</div>
									<hr/>
									<!--pending list-->
						<?php $this->load->view('pending');?>
						<!-- end -->
									<div class="space-4"></div>
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
                                            <?php if(isset($id) && $id>0){?>
                                            <input class="btn btn-primary" type="button" value="<?php if(isset($task['archive']) && $task['archive']==1){echo 'NoArchive';}else{echo 'Archive';}?>"  id="btn">
                                            <?php }?><input class="btn btn-primary" type="button" value="Create Issue" id="save">
											<button class="btn btn-info" type="sumit">
												<i class="icon-ok bigger-110"></i> Submit
											</button>
										</div>
									</div>
							
							</form>
							<!--add history --->
						<?php $this->load->view('history')?>
                        <!-- /.panel-body -->
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
    <?php $this->load->view('his');?>
   </script>
</body>
</html>
