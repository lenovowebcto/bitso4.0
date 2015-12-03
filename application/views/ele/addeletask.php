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

    <script src="<?php  echo base_url();?>util/bitso/bower_components/select/js/bootstrap-select.min.js"></script>
    <link href="<?php  echo base_url();?>util/bitso/bower_components/select/css/bootstrap-select.min.css" rel="stylesheet">

</head>
<body>
    <div id="wrapper">
   <?php $this->load->view('left2'); ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">LOIS CSR Task List</h1>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12"  style="z-index: 0">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Detail info as below
                        </div>
                     <form action="<?php echo site_url('element/ele_task/toaddeletask') ?>"  method="post" enctype="multipart/form-data">                   
                      <input type="hidden" name="pr_id" value="<?php echo isset($pr_id)?$pr_id:0;?>"/>
                      <input name="pid"  value="<?php echo isset($pid)?$pid:0; ?>" type="hidden" id="id"/>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
							<div class="col-lg-3">
								 <div class="input-prepend input-group">
								 <label>Project_Name:</label>
                                     <select class="form-control selectpicker" ID="project_select" data-live-search="true" name="ele[project_name]">
                                         <?php  foreach($project_name as $key){
                                             ?>
                                             <option <?php if(isset($eletask['project_name']) && $eletask['project_name']==$key['pname']){echo 'selected';}?> >
                                                 <?php echo isset($key['pname'])?$key['pname']:''; ?></option>
                                         <?php
                                         }?>
                                     </select>
                                 </div>
							</div>

							<div class="col-lg-3" style="z-index: 0">
								<div class="input-prepend input-group">
								<label>CSR_Version:</label>
								<input type="text" name="ele[CSR_Version]"  value="<?php echo isset($eletask['CSR_Version'])?$eletask['CSR_Version']:'';?>" class="form-control"/></div>
							</div>
							<div class="col-lg-3" style="z-index: 0">
								<label>Type:</label>
								  <select name="ele[Type]" class="form-control">
								         <?php if(count($type)>0){
								         	foreach ($type as $key){
								         		?>
								         		 <option  <?php if(isset($eletask['Type']) && $eletask['Type']==$key['rqtype']){echo 'selected';} ?>  value="<?php echo isset($key['rqtype'])?$key['rqtype']:'';?>"><?php echo isset($key['rqtype'])?$key['rqtype']:''; ?></option>
								         		<?php 
								         	}
								         } ?>
						         </select>
							</div>
							
							<div class="col-lg-3" style="z-index: 0">
								<label>Status:</label>
								 <select name="ele[Status]" class="form-control">
								         <?php if(count($projectstatus)>0){
								         	foreach ($projectstatus as $key){
								         		?>
								         		 <option  <?php if(isset($eletask['Status']) && $eletask['Status']==$key['stype']){echo 'selected';} ?>  value="<?php echo isset($key['stype'])?$key['stype']:''; ?>"><?php echo isset($key['stype'])?$key['stype']:''; ?></option>
								         		<?php 
								         	}
								         } ?>
						         </select>
						     </div>
							<div class="col-lg-3" style="z-index: 0">
								<div class="input-prepend input-group">
								<label>SBB Receive_Date:</label>
								   <input type="text" name="ele[Receive_Date]"  value="<?php echo isset($eletask['Receive_Date'])?$eletask['Receive_Date']:'0000-00-00';?>" class="form-control" data-beatpicker="true" />
							    </div>
							</div>
							<div class="col-lg-3" style="z-index: 0">
								<div class="input-prepend input-group">
								<label>SBB Start Processing Date:</label>
								   <input type="text"  name="task[start_date]"   value="<?php echo isset($task['start_date'])?$task['start_date']:'0000-00-00'; ?>" class="form-control" data-beatpicker="true" /> 
								</div>
							</div>
							
							<div class="col-lg-3" style="z-index: 0">
								<div class="input-prepend input-group">
								<label>SBB AD:</label>
								   <input type="text" name="ele[AD]"  value="<?php echo isset($eletask['AD'])?$eletask['AD']:'0000-00-00';?>"    class="form-control" data-beatpicker="true" /> 
								</div>
							</div>
							<div class="col-lg-3" style="z-index: 0">
								<div class="input-prepend input-group">
								<label>SBB DRR_DeadLine:</label>
								<input type="hidden" name="DeadLine" value="<?php echo isset($eletask['DeadLine'])?$eletask['DeadLine']:'0000-00-00';?>"/>
								   <input type="text" name="ele[DeadLine]" value="<?php echo isset($eletask['DeadLine'])?$eletask['DeadLine']:'0000-00-00';?>"    class="form-control" data-beatpicker="true"  <?php if($t==2){?> disabled='disabled'<?php }?>/> 
								</div>
							</div>
							 <div class="col-lg-3" style="z-index: 0">
								<div class="input-prepend input-group">
								<label>SBB Drr_Complete Date:</label>
								   <input type="text" name="ele[Drr_Complete_Date]" value="<?php echo isset($eletask['Drr_Complete_Date'])?$eletask['Drr_Complete_Date']:'0000-00-00';?>"    class="form-control" data-beatpicker="true"  /> 
								</div>
							</div>
							<div class="col-lg-3" style="z-index: 0">
								<div class="input-prepend input-group">
								<label>SBB Drr Date:</label>
								   <input type="text" name="ele[drr_date]" value="<?php echo isset($eletask['drr_date'])?$eletask['drr_date']:'0000-00-00';?>"    class="form-control" data-beatpicker="true"  /> 
								</div>
							</div>
							<div class="col-lg-3" style="z-index: 0">
								<div class="input-prepend input-group">
								<label>SBB DRR feedback date:</label>
								   <input type="text" name="ele[drr_fb_date]" value="<?php echo isset($eletask['drr_fb_date'])?$eletask['drr_fb_date']:'0000-00-00';?>"    class="form-control" data-beatpicker="true"  /> 
								</div>
							</div>
							<div class="col-lg-3" style="z-index: 0">
							<div class="input-prepend input-group">
								<label>SBB Account:</label>
								   <input type="text" name="ele[Count]" value="<?php echo isset($eletask['Count'])?$eletask['Count']:'';?>"  class="form-control" onkeyup="value=value.replace(/[^\d]/g,'') " /> 
							</div></div>
							<div class="col-lg-3" style="z-index: 0">
							<div class="input-prepend input-group">
								<label>CV Account:</label>
								   <input type="text" name="ele[CV_account]" value="<?php echo isset($eletask['CV_account'])?$eletask['CV_account']:0;?>"  class="form-control" onkeyup="value=value.replace(/[^\d]/g,'') " /> 
							</div></div>
							<div class="col-lg-3" style="z-index: 0">
							<div class="input-prepend input-group">
								<label>Owner:</label>
								  <input type="text" name="ele[Owner]"  value="<?php echo isset($eletask['Owner'])?$eletask['Owner']:'';?>" class="form-control"/>
						    </div>
						    </div>
						    <div class="col-lg-3">
								<label>Brand:</label>
	                            <select name="ele[brand]" class="form-control">
						         <?php 
						          foreach($brand as $key){
						         	?>
						         	<option value="<?php echo isset($key['bname'])?$key['bname']:''; ?>" <?php if(isset($eletask['brand']) && $eletask['brand']==$key['bname']){echo 'selected';}?> ><?php echo isset($key['bname'])?$key['bname']:''; ?></option> 
						         	<?php 
						         }?>
						      </select>     
							</div>
						  <div class="col-lg-12">
							<label>CTO:</label>
							<textarea class="form-control" rows="3" name="ele[cto]"><?php echo isset($eletask['cto'])?$eletask['cto']:''; ?></textarea>
						</div>
                           <div class="col-lg-12" style="z-index: 0">
							   <label>Attachments:</label>
								<input type="file" name="file_path" size="20" /> 
						</div>
						<div class="col-lg-12" style="z-index: 0">
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
                            <p>&nbsp;</p>
						<p style="text-align:center;">
						<input type="hidden" id="url" value="<?php echo site_url('element/ele_task/changearchive');?>"/>
						
						<?php if(isset($pid) && $pid>0){
							?>
							<input class="btn" background="#" type="button" value="<?php if(isset($eletask['archive']) && $eletask['archive']==1){echo 'NoArchive';}else{echo 'Archive';}?>"  id="btn" style="background:red">
							<?php }?>
							<input class="btn btn-primary" type="button" value="Create Issue" id="save">
							<input type="submit"  class="btn btn-success" value="SUBMIT"/></p>
						<p>&nbsp;</p>
						</form>
						<!--add issue-->
						<!--add issue end--->
					<?php $this->load->view('history');?>
                    </div>
                </div>
            </div>
			</div>
    </div>
  <?php  $this->load->view('foot'); ?>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        $(document).ready(function() {
            $('.selectpicker').selectpicker();
        }
    </script>
    <script>
    <?php $this->load->view('his');?>
   </script>

</body>

</html>
