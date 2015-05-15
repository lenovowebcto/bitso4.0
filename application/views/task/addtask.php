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
                    <h1 class="page-header">LOIS TPG/IPG/EBG Task List</h1>
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
                 <form action="<?php echo site_url('task/addtask/toaddtask') ?>" method="post" enctype="multipart/form-data">
                                            
                      <input type="hidden" name="pr_id" value="<?php echo isset($pr_id)?$pr_id:0;?>"/>
                      <input type="hidden" name="id" value="<?php echo isset($id)?$id:0;?>" id="id"/>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="col-lg-3">
								 <div class="input-prepend input-group">
								 <label>DRR Deadline:</label>
								  <input type="hidden" name="Drr_deadline" value="<?php echo isset($task['Drr_deadline'])?$task['Drr_deadline']:'0000-00-00'; ?>"/>
								   <input type="text" name="task[Drr_deadline]" value="<?php echo isset($task['Drr_deadline'])?$task['Drr_deadline']:'0000-00-00'; ?>" style="width: 200px"   class="form-control" data-beatpicker="true" <?php if($type==2){?> disabled='disabled'<?php }?>/> 
								 </div>
							</div>
							<div class="col-lg-3">
								 <div class="input-prepend input-group">
								 <label>Final Deadline:</label>
								   <input type="hidden" name="deadline" value="<?php echo isset($task['deadline'])?$task['deadline']:'0000-00-00'; ?>"/>
								   <input type="text" name="task[deadline]" value="<?php echo isset($task['deadline'])?$task['deadline']:'0000-00-00'; ?>" style="width: 200px"   class="form-control" data-beatpicker="true" <?php if($type==2){?> disabled='disabled'<?php }?>/> 
								 </div>
							</div>
							<div class="col-lg-3">
								<div class="input-prepend input-group">
								<label>Announce Date:</label>
								   <input  type="text" name="task[ann_date]" value="<?php echo isset($task['ann_date'])?$task['ann_date']:'0000-00-00'; ?>" style="width: 200px;"   class="form-control" data-beatpicker="true" /> 
								</div>
							</div>
							<div class="col-lg-3">
								<div class="input-prepend input-group">
								<label>EOW:</label>
								   <input type="text"  name="task[EOW]" value="<?php echo isset($task['EOW'])?$task['EOW']:'0000-00-00';?>" style="width: 200px;"   class="form-control" data-beatpicker="true"  /> 
								</div>
							</div>
							<div class="col-lg-3">
								<div class="input-prepend input-group">
								<label>Start Processing Date:</label>
								   <input type="text"  name="task[start_date]"   value="<?php echo isset($task['start_date'])?$task['start_date']:'0000-00-00'; ?>" style="width: 200px;"   class="form-control" data-beatpicker="true"  /> 
								</div>
							</div>
							<div class="col-lg-3">
								<div class="input-prepend input-group">
								<label>DRR Date:</label>
								   <input type="text" name="task[Drr_date]"  value="<?php echo isset($task['Drr_date'])?$task['Drr_date']:'0000-00-00';?>" style="width: 200px;"   class="form-control" data-beatpicker="true"  /> 
								</div>
							</div>
							<div class="col-lg-3">
								<div class="input-prepend input-group">
								<label>Checked DRR Date:</label>
								   <input type="text" name="task[Drr_received]"  value="<?php echo isset($task['Drr_received'])?$task['Drr_received']:'0000-00-00';?>" style="width: 200px;"   class="form-control" data-beatpicker="true"  /> 
								</div>
							</div>
							<div class="col-lg-3">
								<div class="input-prepend input-group">
								<label>Complete Date:</label>
								   <input type="text"  name="task[complete_date]"  value="<?php echo isset($task['complete_date'])?$task['complete_date']:'0000-00-00';?>" style="width: 200px;"   class="form-control" data-beatpicker="true"  /> 
								</div>
							</div>
							<div class="col-lg-3">
								<div class="input-prepend input-group">
								<label>POR Received Date:</label>
								<input type="hidden" name="received_date" value="<?php echo isset($task['received_date'])?$task['received_date']:'0000-00-00'; ?>"/>
								   <input type="text" name="task[received_date]"  value="<?php echo isset($task['received_date'])?$task['received_date']:'0000-00-00'; ?>" style="width: 200px;"   class="form-control" data-beatpicker="true"  /> 
								</div>
							</div>
							
							<div class="col-lg-12">
								<label>POR Version:</label>
								<input class="form-control" name="task[POR_Version]"  value="<?php echo isset($task['POR_Version'])?$task['POR_Version']:''; ?>" placeholder="Enter PRO version">
							</div>
							<div class="col-lg-3">
								<label>Drr_Reply:</label>
								<input    class="form-control" name="task[Drr_Reply]"  value="<?php echo isset($task['Drr_Reply'])?$task['Drr_Reply']:'';?>">
							</div>
							<div class="col-lg-3">
								<label>WorkflowInstanceName:</label>
								<input class="form-control" name="task[Work_flow_Instance_Name]"  value="<?php echo isset($task['Work_flow_Instance_Name'])?$task['Work_flow_Instance_Name']:''; ?>">
							</div>
							<div class="col-lg-3">
								<label>Action:</label>
                            <select name="task[action]" class="form-control">
					         <?php  foreach($action as $key){
					         	?>
					         	<option value="<?php echo isset($key['ACTION'])?$key['ACTION']:''; ?>" <?php if(isset($task['Action']) && $task['Action']==$key['ACTION']){echo 'selected';}?> ><?php echo isset($key['ACTION'])?$key['ACTION']:''; ?></option> 
					         	<?php 
					         }?>
					         </select>
							</div>
							<div class="col-lg-3">
								<label>Brand:</label>
	                            <select name="task[brand]" class="form-control">
						         <?php 
						          foreach($brand as $key){
						         	?>
						         	<option value="<?php echo isset($key['bname'])?$key['bname']:''; ?>" <?php if(isset($task['brand']) && $task['brand']==$key['bname']){echo 'selected';}?> ><?php echo isset($key['bname'])?$key['bname']:''; ?></option> 
						         	<?php 
						         }?>
						      </select>     
							</div>
							<div class="col-lg-3">
								<label>request_type:</label>
	                            <select name="task[request_type]" class="form-control">
						         <?php 
						          foreach($req_type as $key){
						         	?>
						         	<option value="<?php echo isset($key['rqtype'])?$key['rqtype']:''; ?>" <?php if(isset($task['request_type']) && $task['request_type']==$key['rqtype']){echo 'selected';}?> ><?php echo isset($key['rqtype'])?$key['rqtype']:''; ?></option> 
						         	<?php 
						         }?>
						      </select>     
							</div>
							<div class="col-lg-3">
								<label>Family/Series:</label>
								 <select name="task[family]" class="form-control">
						         <?php 
						          foreach($pro as $key){
						         	?>
						         	<option id=<?php echo isset($key['projectid'])?$key['projectid']:''; ?>  value="<?php echo isset($key['pname'])?$key['pname']:'';?>" <?php if(isset($task['family']) && $task['family']==$key['pname']){echo 'selected';}?> ><?php echo isset($key['pname'])?$key['pname']:''; ?></option> 
						         	<?php 
						         }?>
						      </select>     
								<!-- <input class="form-control"  name="task[family]"  value="<?php echo isset($task['family'])?$task['family']:'' ?>" placeholder="Family / Series"> -->
							</div>
							<div class="col-lg-3">
								<label>IAL No:</label>
								<input class="form-control" placeholder="IAL" name="task[IAL_NO]"  value="<?php echo isset($task['IAL_NO'])?$task['IAL_NO']:'';?>">
							</div>
							<div class="col-lg-3">
								<label>MT_NO:</label>
								<input class="form-control" name="task[MT_NO]"  value="<?php echo isset($task['MT_NO'])?$task['MT_NO']:''; ?>">
							</div>
							<div class="col-lg-3">
								<label>Status:</label>
                           <select name="task[status]" class="form-control">
					         <?php  foreach($status as $key){
					         	?>
					         	<option value="<?php echo isset($key['stype'])?$key['stype']:''; ?>" <?php if(isset($task['status']) && $task['status']==$key['stype']){echo 'selected';}?> ><?php echo isset($key['stype'])?$key['stype']:''; ?></option> 
					         	<?php 
					         }?>
					         </select>
							</div>
							<div class="col-lg-3">
								<label>Model Count:</label>
								<input class="form-control" name="task[model_count]"  value="<?php echo isset($task['model_count'])?$task['model_count']:'';?>" onkeyup="value=value.replace(/[^\d]/g,'') " >
							</div>
							
							<div class="col-lg-3">
								<label>Data Specialist:</label>
                                <select style="width: 200px" id="BU" class="form-control" name="task[Data_Specialist]">
                                    <?php  foreach($session_name as $key){
                                        ?>
                                        <option <?php if(isset($task['Data_Specialist']) && $task['Data_Specialist']==$key['username']){echo 'selected';}?> >
                                            <?php echo isset($key['username'])?$key['username']:$user_name; ?></option>
                                    <?php
                                    }?>
                                </select>
                            </div>
							<div class="col-lg-3">
								<label>Planner:</label>
								<input class="form-control" name="task[Planner]"  value="<?php echo isset($task['Planner'])?$task['Planner']:'';?>">
							</div>
							<div class="col-lg-3">
								<label>Owner:</label>
								<input class="form-control" name="task[Owner]"  value="<?php echo isset($task['Owner'])?$task['Owner']:'';?>">
							</div>
							<div class="col-lg-3">
								<label>EntityID  (DRR NO.):</label>
								<input class="form-control" name="task[Drr_No]"  value="<?php echo isset($task['Drr_No'])?$task['Drr_No']:''; ?>">
							</div>
							
						<div class="col-lg-12">
							<label>PN List:</label>
							<textarea class="form-control" rows="3" name="task[PN]"><?php echo isset($task['PN'])?$task['PN']:''; ?></textarea>
						</div>
						<div class="col-lg-12">
							   <label>Attachments:</label>
								<input type="file" name="file_path" size="20" /> 
						</div>
						<div class="col-lg-12">
						    <label>Files:</label><br>
						    <?php if(isset($atta) && $atta!=array()){
						    	foreach ($atta as $key){
						    		?>
						        <a href="<?php echo site_url('admin/admin_task/down_load');?>?fname=<?php echo isset($key['attachment'])?$key['attachment']:'';?>"><?php echo isset($key['attachment'])?$key['attachment']:'';?></a><br>
							 	<?php 
							 	}
							    }?>
						</div>
						<hr/>
						<!--pending list-->
						<?php $this->load->view('pending');?>
						<!-- end -->
                            <p>&nbsp;</p>
						<p style="text-align:center;">
						<input type="hidden" id="url" value="<?php echo site_url('task/addtask/changearchive');?>"/>
						<?php if(isset($id) && $id>0){
							?>
							<input class="btn" style="background:red" type="button" value="<?php if(isset($task['archive']) && $task['archive']==1){echo 'NoArchive';}else{echo 'Archive';}?>"  id="btn">
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
