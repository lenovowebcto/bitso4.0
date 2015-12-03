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
                    <h1 class="page-header">LOIS EP/REQ Task List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Detail info as below
                        </div>
                    <form action="<?php echo site_url('ep_req/ep_req_create_task/toaddtask') ?>" method="post">
                      <input type="hidden" name="pr_id" value="<?php echo isset($pr_id)?$pr_id:0;?>"/>
                      <input type="hidden" id='id' name="id" value="<?php echo isset($id)?$id:0;?>"/>
                        <input name="archive"  value="<?php echo isset($archive)?$archive:0; ?>" type="hidden" />
                        <input type="hidden" id="url" value="<?php echo site_url('ep_req/ep_req_create_task/changearchive');?>"/>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
							      <div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>Deadline:</label>
											<input type="hidden" name="deadline" value="<?php echo isset($task['Deadline'])?$task['Deadline']:'0000-00-00';?>"/>
											 <input type="text"
												style="width: 200px" id="Deadline" class="form-control"
												 name="task[Deadline]"
												value="<?php echo isset($task['Deadline'])?$task['Deadline']:'0000-00-00';?>" <?php if($type==2){?> readonly="readonly" <?php }else{ echo 'data-beatpicker="true"';}?>/>
										</div>
									</div>

									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>Request Date</label> <input type="text"
												style="width: 200px" id="RequestDate" class="form-control"
												data-beatpicker="true" name="task[RequestDate]"
												value="<?php echo isset($task['RequestDate'])?$task['RequestDate']:'0000-00-00';?>" />
										</div>
									</div>
									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>Completion Date:</label> <input type="text"
												style="width: 200px" id="CompletionDate"
												class="form-control" data-beatpicker="true"
												name="task[CompletionDate]"
												value="<?php echo isset($task['CompletionDate'])?$task['CompletionDate']:'0000-00-00';?>" />
										</div>
									</div>

									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>Data Specialist:</label>
                                            <select style="width: 200px" id="BU" class="form-control" name="task[DataSpecialist]">
                                                <?php  foreach($session_name as $key){
                                                    ?>
                                                    <option <?php if(isset($task['DataSpecialist']) && $task['DataSpecialist']==$key['username']){echo 'selected';}?> >
                                                        <?php echo isset($key['username'])?$key['username']:$user_name; ?></option>
                                                <?php
                                                }?>
                                            </select>
										</div>
									</div>
                            <div class="col-lg-3">
                                <div class="input-prepend input-group">
                                    <label>Status:</label> <select style="width: 200px"
                                                                   id="Status" class="form-control" name="task[status]">
                                        <?php  foreach($projectstatus as $key){
                                            ?>
                                            <option value="<?php echo isset($key['stype'])?$key['stype']:''; ?>" 
											<?php if(isset($task['status']) && $task['status']==$key['stype']){echo 'selected';}?> ><?php echo isset($key['stype'])?$key['stype']:''; ?></option>
											
                                        <?php
                                        }?>
                                    </select>
                                </div>
                            </div>
							
							
									
									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>Requestor:</label> 
											<input type="text"class="form-control" name="task[Requestor]"
												value="<?php echo isset($task['Requestor'])?$task['Requestor']:'';?>" />
										</div>
									</div>
									<div class="col-lg-3">
										
											<label>BU:</label> 
											<select class="form-control" name="task[BU]">
												<?php  foreach($bu as $key){
										         	?>
										         	<option <?php if(isset($task['BU']) && $task['BU']==$key['bu_name']){echo 'selected';}?> ><?php echo isset($key['bu_name'])?$key['bu_name']:''; ?></option> 
										         	<?php 
										         }?>
											</select>
									</div>
									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>MODELCOUNT:</label> 
											<input type="text" class="form-control" name="task[ModelCount]"
												value="<?php echo isset($task['ModelCount'])?$task['ModelCount']:'';?>" onkeyup="value=value.replace(/[^\d]/g,'') " />
										</div>
									</div>

									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>Owner:</label> 
											<input type="text" class="form-control" name="task[Owner]"
												value="<?php echo isset($task['Owner'])?$task['Owner']:'';?>" />
										</div>
									</div>
									
									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>Subject/EPID:</label> 
											<input type="text"  class="form-control" name="task[Subject]" value="<?php echo isset($task['Subject'])?$task['Subject']:'';?>" />
										</div>
									</div>
									
									<div class="col-lg-12">
										<div >
											<label>Request:</label> 
											<textarea class="form-control" rows="3" name="task[Request]" ><?php echo isset($task['Request'])?$task['Request']:'';?></textarea>
											
										</div>
									</div>
									<div class="col-lg-12">
										<div >
											<label>PN:</label> 
											<textarea class="form-control" rows="3" name="task[PN]" ><?php  echo isset($task['PN'])?$task['PN']:'';?></textarea>
											
										</div>
									</div>
									</div>
						<hr/>
						<!--pending list-->						<?php $this->load->view('pending');?>
						<!-- end -->
                            <p>&nbsp;</p>
						<p style="text-align:center;">
                            <?php if(isset($id) && $id>0){?>
                            <input class="btn btn-primary" type="button" value="<?php if(isset($task['archive']) && $task['archive']==1){echo 'NoArchive';}else{echo 'Archive';}?>"  id="btn">
                            <?php }?>
                            <input class="btn btn-primary" type="button" value="Create Issue" id="save">
							<input type="submit"  class="btn btn-success" value="SUBMIT"/></p>
						<p>&nbsp;</p>

						</form>
						<!--add history --->
						<?php $this->load->view('history')?>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			</div>
        <!-- /#page-wrapper -->

    </div>
  <?php  $this->load->view('foot'); ?>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    <?php $this->load->view('his');?>
   </script>

</body>
</html>
