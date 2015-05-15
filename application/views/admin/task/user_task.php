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
                    <h1 class="page-header">LOIS Admin Task List</h1>
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
                         <form action="<?php echo site_url('admin/admin_task/toupdate_taskstate') ?>"  enctype="multipart/form-data" method="post">
                        <!-- /.panel-heading -->
                         <input name="Ticket_id"  value="<?php echo isset($t_id)?$t_id:0; ?>" type="hidden"/>
                        <div class="panel-body">
							<div class="col-lg-3">
								 <div class="input-prepend input-group">
								 <label>DateReported:</label>
								   <input type="text" style="width: 200px" id="birthday" class="form-control" data-beatpicker="true" name="ad[DateReported]"  value="<?php echo isset($task['DateReported'])?$task['DateReported']:'';?>"/> 
								 </div>
							</div>
							
							<div class="col-lg-3">
								<label>Problem Summary:</label>
								<input class="form-control" name="ad[ProblemSummary]"  value="<?php echo isset($task['ProblemSummary'])?$task['ProblemSummary']:'';?>" disabled="disabled" />
							</div>  
							<div class="col-lg-3">
								<label>Person Reported:</label>
								<input class="form-control" name="ad[PersonReported]"  value="<?php echo isset($task['PersonReported'])?$task['PersonReported']:'';?>" disabled="disabled"/>
							</div>
							<div class="col-lg-3" >
								<label>Scource:</label>
								<select class="form-control" name="ad[Source]" disabled="disabled">
	                               <?php if(count($source)>0){
							         	foreach ($source as $key){
							         		?>
							         		 <option  <?php if(isset($task['Source']) && $task['Source']==$key){echo 'selected';} ?>  value=<?php echo isset($key)?$key:''; ?>><?php echo isset($key)?$key:''; ?></option>
							         		<?php 
							         	}
								     } ?>
                                </select>
							</div>
						
							<div class="col-lg-3" >
								<label>Assign to:</label>
								<select class="form-control" name="ad[AssignTo]" disabled="disabled">
                                    <?php if(count($users)>0){
							         	foreach ($users as $key){
							         		?>
							         		 <option  <?php if(isset($task['AssignTo']) && $task['AssignTo']==$key['username']){echo 'selected';} ?>  value=<?php echo isset($key['username'])?$key['username']:''; ?>><?php echo isset($key['username'])?$key['username']:''; ?></option>
							         		<?php 
								         	}
								         } ?>
                                </select>
							</div>
							
							<div class="col-lg-3" >
								<label>Family:</label>
								<select class="form-control"  name="ad[Family]" disabled="disabled">
                                       <?php if(count($family)>0){
								         	foreach ($family as $val){
								         		?>
								         		 <option  <?php if(isset($task['Family']) && $task['Family']==$val){echo 'selected';} ?>  value="<?php echo isset($val)?$val:''; ?>" ><?php echo isset($val)?$val:''; ?></option>
								         		<?php 
								         	}
								         } ?>
							 </select>
							 </div>
                                <div class="col-lg-3">
								<label>Production State:</label>
								<select class="form-control"  name="ad[ProdState]" disabled="disabled">
                                       <?php if(count($ProdState)>0){
								         	foreach ($ProdState as $key){
								         		?>
								         		 <option  <?php if(isset($task['ProdState']) && $task['ProdState']==$key){echo 'selected';} ?>  value=<?php echo isset($key)?$key:''; ?>><?php echo isset($key)?$key:''; ?></option>
								         		<?php 
								         	}
								         } ?>
                                </select>
							
							</div>
							<div>
                                <div class="col-lg-3" >
								<label>Geos:</label>
								<select class="form-control"  name="ad[Geos]" disabled="disabled">
                                       <?php if(count($geo)>0){
								         	foreach ($geo as $val){
								         		?>
								         		 <option  <?php if(isset($task['Geos']) && $task['Geos']==$val){echo 'selected';} ?>  value="<?php echo isset($val)?$val:''; ?>" ><?php echo isset($val)?$val:''; ?></option>
								         		<?php 
								         	}
								         } ?>
                                </select>
							</div>
							<div>
                                <div class="col-lg-3" >
								<label>Data Area:</label>
								<select class="form-control"  name="ad[DataArea]" disabled="disabled">
                                       <?php if(count($dataarea)>0){
								         	foreach ($dataarea as $val){
								         		?>
								         		 <option  <?php if(isset($task['DataArea']) && $task['DataArea']==$val){echo 'selected';} ?>  value="<?php echo isset($val)?$val:''; ?>" ><?php echo isset($val)?$val:''; ?></option>
								         		<?php 
								         	}
								         } ?>
                                </select>
							
							</div>
							<div>
                                <div class="col-lg-3" >
								<label>Severity:</label>
								<select class="form-control"  name="ad[Severity]" disabled="disabled">
                                       <?php if(count($severity)>0){
								         	foreach ($severity as $val){
								         		?>
								         		 <option  <?php if(isset($task['Severity']) && $task['Severity']==$val){echo 'selected';} ?>  value="<?php echo isset($val)?$val:''; ?>" ><?php echo isset($val)?$val:''; ?></option>
								         		<?php 
								         	}
								         } ?>
                                </select>
							</div>
							
							<div class="col-lg-3" >
								<label>Size of Impact:</label>
								<input class="form-control" name="ad[ImpactSize]"  value="<?php echo isset($task['ImpactSize'])?$task['ImpactSize']:'';?>" disabled="disabled">
							</div>
							<?php if(isset($t_id) && $t_id>0){?>
							<div>
                                <div class="col-lg-3">
								<label>prob_state:</label>
								<select class="form-control"  name="prob_state">
								     <option  <?php if(isset($task['prob_state']) && $task['prob_state']=="open"){echo 'selected';} ?>  value="open" >open</option>
                                     <option  <?php if(isset($task['prob_state']) && $task['prob_state']=="working"){echo 'selected';} ?>  value="working" >working</option>
                                     <option  <?php if(isset($task['prob_state']) && $task['prob_state']=="fixed"){echo 'selected';} ?>  value="fixed" >fixed</option>
                                     <option  <?php if(isset($task['prob_state']) && $task['prob_state']=="Duplicate"){echo 'selected';} ?>  value="Duplicate" >Duplicate</option>
                                     <option  <?php if(isset($task['prob_state']) && $task['prob_state']=="Closed"){echo 'selected';} ?>  value="Closed" >Closed</option>
                                </select>
							</div>
							<?php }?>
							<div class="col-lg-12" >
								<label>Problem Details:</label>
								<textarea  class="form-control" name="ad[ProblemDetails]" disabled="disabled"><?php echo isset($task['ProblemDetails'])?$task['ProblemDetails']:''?></textarea>
							</div>
							<div class="col-lg-12">
							   <label>Attachments:</label>
								<input type="file" name="file_path" size="20" disabled="disabled"/> 
							</div>
							<div class="col-lg-12">
							    <label>Files:</label><br>
							    <?php if(isset($fp) && $fp!=array()){
							    	for ($i=0;$i<count($fp);$i++){
							    		?>
							        <a href="<?php echo site_url('admin/admin_task/down_load');?>?fname=<?php echo isset($fp[$i])?$fp[$i]:'';?>"><?php echo isset($fp[$i])?$fp[$i]:'';?></a>
								 	<br><input type="hidden" name="fn[<?php echo isset($i)?$i:0;?>]" value="<?php echo isset($fp[$i])?$fp[$i]:0;?>"/>
								 	<?php 
								 	}
								    }?>
							</div>
						<hr/>
						<p>&nbsp;</p>
						<p style="text-align:center;">
					          <input type="SUBMIT" value="SUBMIT" class="btn btn-success"/>
					    </p>
						
                    </div>
                    </form>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			</div>
    </div>
    <?php $this->load->view('foot');?>
</body>
</html>
