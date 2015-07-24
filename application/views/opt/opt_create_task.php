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
// $this->load->view ( 'top' );
$this->load->view ( 'left2' );
?>
        <div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">OPT/SVC Task List</h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<div class="row">
				<div class="col-lg-12">

					<div class="tabbable">
						<ul class="nav nav-tabs" id="myTab">
							<li <?php echo isset($opt_hidden)?$opt_hidden:0;?> class="active"><a data-toggle="tab" href="#OPT"> <i
									class="green icon-home bigger-110"></i> OPT
							</a></li>
							<li <?php echo isset($svc_hidden)?$svc_hidden:0;?>><a  data-toggle="tab" href="#SVC"> SVC </a></li>
							<li <?php echo isset($comp_hidden)?$comp_hidden:0;?>><a data-toggle="tab" href="#Comp"> Compatibility </a></li>
						</ul>

						<div class="tab-content">
							<div <?php echo isset($opt_hidden)?$opt_hidden:0;?> id="OPT" class="tab-pane in active">
								<form id="opt" name="opt"
									action="<?php echo site_url('opt/opt_create_task/opt_addtask') ?>"
									method="post">
									<input type="hidden" name="opt_pr_id"
										value="<?php echo isset($opt_pr_id)?$opt_pr_id:0;?>" /> <input
										type="hidden" name="opt_id" id="opt_id"
										value="<?php echo isset($opt_id)?$opt_id:0;?>" />
                                    <input type="hidden" id="opt_url" value="<?php echo site_url('opt/opt_create_task/opt_changearchive');?>"/>
                                    <input name="archive"  value="<?php echo isset($archive)?$archive:0; ?>" type="hidden" />
                                    <input type="hidden" name="opt_Deadline" value="<?php echo isset($opt['Deadline'])?$opt['Deadline']:'0000-00-00';?>"/>
                                    <input type="hidden" name="opt_DRR_DATE" value="<?php echo isset($opt['DRR_DATE'])?$opt['DRR_DATE']:'0000-00-00';?>"/>
                                    <div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>Deadline:</label> <input type="text"
												style="width: 200px" id="Deadline" class="form-control"
												data-beatpicker="true" name="opt[Deadline]"
												value="<?php echo isset($opt['Deadline'])?$opt['Deadline']:'0000-00-00';?>" <?php if($type==2){?> disabled='disabled'<?php }?>/>
										</div>
									</div>
									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>EOW:</label> <input type="text" style="width: 200px"
												id="OPT_EOW" class="form-control" data-beatpicker="true"
												name="opt[OPT_EOW]"
												value="<?php echo isset($opt['OPT_EOW'])?$opt['OPT_EOW']:'0000-00-00';?>" />
										</div>
									</div>
									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>AD:</label> <input type="text" style="width: 200px"
												id="OPT_AD" class="form-control" data-beatpicker="true"
												name="opt[OPT_AD]"
												value="<?php echo isset($opt['OPT_AD'])?$opt['OPT_AD']:'0000-00-00';?>" />
										</div>
									</div>
									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>Task Received Date:</label> <input type="text"
												style="width: 200px" id="TASKR_DATE" class="form-control"
												data-beatpicker="true" name="opt[TASKR_DATE]"
												value="<?php echo isset($opt['TASKR_DATE'])?$opt['TASKR_DATE']:'0000-00-00';?>" />
										</div>
									</div>
									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>Start Processing Date:</label> <input type="text"
												style="width: 200px" id="START_DATE" class="form-control"
												data-beatpicker="true" name="opt[START_DATE]"
												value="<?php echo isset($opt['START_DATE'])?$opt['START_DATE']:'0000-00-00';?>" />
										</div>
									</div>	
									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>DRR Date:</label> <input type="text"
												style="width: 200px" id="DRR_DATE" class="form-control"
												data-beatpicker="true" name="opt[DRR_DATE]"
												value="<?php echo isset($opt['DRR_DATE'])?$opt['DRR_DATE']:'0000-00-00';?>" <?php if($type==2){?> disabled='disabled'<?php }?>/>
										</div>
									</div>
									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label> DRR Feedback Date:</label> <input type="text"
												style="width: 200px" id="CK_DRR_DATE" class="form-control"
												data-beatpicker="true" name="opt[CK_DRR_DATE]"
												value="<?php echo isset($opt['CK_DRR_DATE'])?$opt['CK_DRR_DATE']:'0000-00-00';?>" />
										</div>
									</div>
									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>Complete Date:</label> <input type="text"
												style="width: 200px" id="COMPLETE_DATE" class="form-control"
												data-beatpicker="true" name="opt[COMPLETE_DATE]"
												value="<?php echo isset($opt['COMPLETE_DATE'])?$opt['COMPLETE_DATE']:'0000-00-00';?>" />
										</div>
									</div>
									<div class="col-lg-3">
										<div >
											<label>BU:</label> <select style="width: 200px" id="BU"
												class="form-control" name="opt[BU]">
											<?php  foreach($bu as $key){
										         	?>
										         	<option <?php if(isset($opt['BU']) && $opt['BU']==$key['bu_name']){echo 'selected';}?> ><?php echo isset($key['bu_name'])?$key['bu_name']:''; ?></option> 
										         	<?php 
										         }?>
										         </select>
										</div>
									</div>
									<div class="col-lg-3">
										<div >
											<label>IAL:</label> <input type="text" style="width: 200px"
												id="IAL_NO" class="form-control" name="opt[IAL_NO]"
												value="<?php echo isset($opt['IAL_NO'])?$opt['IAL_NO']:'';?>" />
										</div>
									</div>
									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>VERSION:</label> <input type="text"
												style="width: 200px" id="VERSION" class="form-control"
												name="opt[VERSION]"
												value="<?php echo isset($opt['VERSION'])?$opt['VERSION']:'';?>" />
										</div>
									</div>
									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>TYPE:</label><select style="width: 200px" id="type"
												class="form-control" name="opt[TYPE]">
												<?php 
										          foreach($req_type as $key){
										         	?>
										         	<option id=<?php echo isset($key['rqtype'])?$key['rqtype']:''; ?> <?php if(isset($opt['TYPE']) && $opt['TYPE']==$key['rqtype']){echo 'selected';}?> ><?php echo isset($key['rqtype'])?$key['rqtype']:''; ?></option> 
										         	<?php 
										         }?>
												</select>
										</div>
									</div>
									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>MODELCOUNT:</label> <input type="text"
												style="width: 200px" id="MODELCOUNT" class="form-control"
												name="opt[MODELCOUNT]"
												value="<?php echo isset($opt['MODELCOUNT'])?$opt['MODELCOUNT']:'';?>" 
												onkeyup="value=value.replace(/[^\d]/g,'') "/>
										</div>
									</div>
									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>Data Specialist:</label>
                                            <select style="width: 200px" id="BU" class="form-control" name="opt[USER]">
                                                <?php  foreach($session_name as $key){
                                                    ?>
                                                    <option <?php if(isset($opt['USER']) && $opt['USER']==$key['username']){echo 'selected';}?> >
                                                        <?php echo isset($key['username'])?$key['username']:$user_name; ?></option>
                                                <?php
                                                }?>
                                            </select>
										</div>
									</div>
									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>Status:</label> <select style="width: 200px"
												id="Status" class="form-control" name="opt[STATUS]">
												<?php  foreach($status as $key){
					         	?>
					         	<option id=<?php echo isset($key['sid'])?$key['sid']:''; ?> <?php if(isset($opt['STATUS']) && $opt['STATUS']==$key['stype']){echo 'selected';}?> ><?php echo isset($key['stype'])?$key['stype']:''; ?></option> 
					         	<?php 
					         }?>
											</select>
										</div>
									</div>

									<div class="col-lg-3">
										<div >
											<label>IMG:</label> <select style="width: 200px" id="IMG"
												class="form-control" name="opt[IMG]">
												<?php if(count($img)>0){
							         	foreach ($img as $key){
							         		?>
							         		 <option  <?php if(isset($opt['IMG']) && $opt['IMG']==$key){echo 'selected';} ?>  value=<?php echo isset($key)?$key:''; ?>><?php echo isset($key)?$key:''; ?></option>
							         		<?php 
							         	}
								     } ?>
								     </select>
										</div>
									</div>
									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>Owner:</label> <input type="text" style="width: 200px"
												id="Owner" class="form-control" name="opt[OWNER]"
												value="<?php echo isset($opt['OWNER'])?$opt['OWNER']:'';?>" />
										</div>
									</div>
									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>new_element_name:</label> <input type="text"
												style="width: 200px" id="new_element_name"
												class="form-control" name="opt[new_element_name]"
												value="<?php echo isset($opt['new_element_name'])?$opt['new_element_name']:'';?>" />
										</div>
									</div>
									
									<div class="col-lg-12">
										<div >
											<label>PN:</label> 
											 <textarea class="form-control" rows="3" name="opt[PN]"  ><?php  echo isset($opt['PN'])?$opt['PN']:'';?></textarea>
							
											<!--  <input type="text" style="width: 200px"
												id="PN" class="form-control" name="opt[PN]"
												value="<?php echo isset($opt['PN'])?$opt['PN']:'';?>" />-->
										</div>
									</div>

									<!--pending list-->
						<?php $this->load->view('pending');?>
						<!-- end -->
						<div id="pending_opt" class="panel-body"></div>
									<p>&nbsp;</p>
									<div class="space-4"></div>
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
                                            <?php if(isset($opt_id) && $opt_id>0){?>
                                            <input class="btn btn-primary" type="button" value="<?php if(isset($opt['archive']) && $opt['archive']==1){echo 'NoArchive';}else{echo 'Archive';}?>"  id="opt_btn">
                                            <?php }?>
                                            <input class="btn btn-primary" type="button"
												value="Create Issue" id="save_opt">
											<button class="btn btn-info" type="sumit">
												<i class="icon-ok bigger-110"></i> Submit
											</button>
										</div>
									</div>

								</form>
								<br>
								<!--add history --->
						
						<?php if(isset($opt_id) && $opt_id>0){?>
						<div class="col-lg-12">
						<p class="fa fa-plus" id="cl" onclick="dis()">  Change History List</p>
						<div class="table-responsive" id="dhistory" style="display: none">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Time</th>
                                            <th>Action</th>
                                            <th>Content</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    if(isset($hist) && $hist!=array()){
                                       for($i = 0; $i < count($hist); $i ++) {
												?>
					                       <tr>
												<td><?php echo isset($hist[$i]['id']) ?$hist[$i]['id']:'';?></td>
										     	<td><?php echo isset($hist[$i]['change_user']) ?$hist[$i]['change_user']:'';?></td>
												<td><?php echo isset($hist[$i]['change_time']) ?$hist[$i]['change_time']:'';?></td>
												<td><?php echo isset($hist[$i]['oper']) ?$hist[$i]['oper']:'';?></td>
												<td><?php echo isset($hist[$i]['content']) ?$hist[$i]['content']:'';?></td>
											</tr>
                                       <?php }}?>
                                    </tbody>
                                </table>
                            </div>
                            
						</div>
						
						<?php }?>
						
                        <!-- /.panel-body -->

							</div>

							<div <?php echo isset($svc_hidden)?$svc_hidden:0;?> id="SVC" class="tab-pane">
								<form id="svc" name="svc"
									action="<?php echo site_url('opt/opt_create_task/svc_addtask') ?>"
									method="post">
									<input type="hidden" name="svc_pr_id"
										value="<?php echo isset($svc_pr_id)?$svc_pr_id:0;?>" /> <input
										name="svc_id" id="svc_id" value="<?php echo isset($svcid)?$svcid:0; ?>"
										type="hidden" />
                                    <input type="hidden" id="svc_url" value="<?php echo site_url('opt/opt_create_task/svc_changearchive');?>"/>
                                    <input name="archive"  value="<?php echo isset($archive)?$archive:0; ?>" type="hidden" />
                                    <input type="hidden" name="svc_Deadline" value="<?php echo isset($svc['Deadline'])?$svc['Deadline']:'0000-00-00';?>"/>
                                    <div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>Deadline:</label> <input type="text"
												style="width: 200px" id="Deadline" class="form-control"
												data-beatpicker="true" name="svc[Deadline]"
												value="<?php echo isset($svc['Deadline'])?$svc['Deadline']:'0000-00-00';?>" <?php if($type==2){?> disabled='disabled'<?php }?>/>
										</div>
									</div>
									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>EOW:</label> <input type="text" style="width: 200px"
												id="svc[EOW]" class="form-control" data-beatpicker="true"
												name="svc[EOW]"
												value="<?php echo isset($svc['EOW'])?$svc['EOW']:'0000-00-00';?>" />
										</div>
									</div>
									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>AD:</label> <input type="text" style="width: 200px"
												id="OPT_AD" class="form-control" data-beatpicker="true"
												name="svc[AD]"
												value="<?php echo isset($svc['AD'])?$svc['AD']:'0000-00-00';?>" />
										</div>
									</div>
									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>Task Received Date:</label> <input type="text"
												style="width: 200px" id="TASKR_DATE" class="form-control"
												data-beatpicker="true" name="svc[TASKR_DATE]"
												value="<?php echo isset($svc['TASKR_DATE'])?$svc['TASKR_DATE']:'0000-00-00';?>" />
										</div>
									</div>
									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>Start Processing Date:</label> <input type="text"
												style="width: 200px" id="START_DATE" class="form-control"
												data-beatpicker="true" name="svc[START_DATE]"
												value="<?php echo isset($svc['START_DATE'])?$svc['START_DATE']:'0000-00-00';?>" />
										</div>
									</div>

									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>Complete Date:</label> <input type="text"
												style="width: 200px" id="COMPLETE_DATE" class="form-control"
												data-beatpicker="true" name="svc[COMPLETE_DATE]"
												value="<?php echo isset($svc['COMPLETE_DATE'])?$svc['COMPLETE_DATE']:'0000-00-00';?>" />
										</div>
									</div>
									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>Loadsheet:</label> <input type="text"
												style="width: 200px" id="Loadsheet" class="form-control"
												name="svc[Loadsheet]"
												value="<?php echo isset($svc['Loadsheet'])?$svc['Loadsheet']:'';?>" />
										</div>
									</div>
									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>Submitter:</label> <input type="text"
												style="width: 200px" id="Submitter" class="form-control"
												name="svc[Submitter]"
												value="<?php echo isset($svc['Submitter'])?$svc['Submitter']:'';?>" />
										</div>
									</div>

									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>TYPE:</label><select style="width: 200px" id="type"
												class="form-control" name="svc[Type]">
												<?php 
						          foreach($req_type as $key){
						         	?>
						         	<option id=<?php echo isset($key['rqtype'])?$key['rqtype']:''; ?> <?php if(isset($svc['TYPE']) && $svc['TYPE']==$key['rqtype']){echo 'selected';}?> ><?php echo isset($key['rqtype'])?$key['rqtype']:''; ?></option> 
						         	<?php 
						         }?>
												</select>
										</div>
									</div>
									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>MODELCOUNT:</label> <input type="text"
												style="width: 200px" id="MODELCOUNT" class="form-control"
												name="svc[MODEL_COUNT]"
												value="<?php echo isset($svc['MODEL_COUNT'])?$svc['MODEL_COUNT']:'';?>" 
												onkeyup="value=value.replace(/[^\d]/g,'') "/>
										</div>
									</div>
                                    <div class="col-lg-3">
                                        <div class="input-prepend input-group">
                                            <label>Data Specialist:</label>
                                            <select style="width: 200px" id="BU" class="form-control" name="svc[USER]">
                                                <?php  foreach($session_name as $key){
                                                    ?>
                                                    <option <?php if(isset($svc['USER']) && $svc['USER']==$key['username']){echo 'selected';}?> >
                                                        <?php echo isset($key['username'])?$key['username']:'$user_name'; ?></option>
                                                <?php
                                                }?>
                                            </select>
                                        </div>
                                    </div>

									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>Status:</label> <select style="width: 200px"
												id="Status" class="form-control" name="svc[STATUS]">
												<?php  foreach($status as $key){
					         	?>
					         	<option id=<?php echo isset($key['sid'])?$key['sid']:''; ?> <?php if(isset($svc['STATUS']) && $svc['STATUS']==$key['stype']){echo 'selected';}?> ><?php echo isset($key['stype'])?$key['stype']:''; ?></option> 
					         	<?php 
					         }?>
					         </select>
										</div>
									</div>

									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>Owner:</label> <input type="text" style="width: 200px"
												id="Owner" class="form-control" name="svc[OWNER]"
												value="<?php echo isset($svc['OWNER'])?$svc['OWNER']:'';?>" />
										</div>
									</div>
									
									<div class="col-lg-3">
										<div class="input-prepend input-group">
											<label>new_element_name:</label> <input type="text"
												style="width: 200px" id="new_element_name"
												class="form-control" name="svc[new_element_name]"
												value="<?php echo isset($svc['new_element_name'])?$svc['new_element_name']:'';?>" />
										</div>
									</div>
									<div class="col-lg-12">
										<div >
											<label>PN:</label> 
											<textarea class="form-control" rows="3" name="svc[PN]"  ><?php  echo isset($svc['PN'])?$svc['PN']:'';?></textarea>
										</div>
									</div>
									<br>
									<!--pending list-->
									<div class="col-lg-12">
						<?php $this->load->view('pending');?>
						</div>
						<!-- end -->
						<div id="pending_svc" class="panel-body"></div>
									<p>&nbsp;</p>
									<div class="space-4"></div>
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
                                            <?php if(isset($svcid) && $svcid>0){?>
                                            <input class="btn btn-primary" type="button" value="<?php if(isset($svc['archive']) && $svc['archive']==1){echo 'NoArchive';}else{echo 'Archive';}?>"  id="svc_btn">
                                            <?php }?>
                                            <input class="btn btn-primary" type="button"
												value="Create Issue" id="save_svc">
											<button class="btn btn-info" type="sumit">
												<i class="icon-ok bigger-110"></i> Submit
											</button>
										</div>
									</div>
								</form>
								<!--add history --->
						
						<?php if(isset($svcid) && $svcid>0){?>
						<div class="col-lg-12">
						<p class="fa fa-plus" id="cl" onclick="dis()">  Change History List</p>
						<div class="table-responsive" id="dhistory" style="display: none">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Time</th>
                                            <th>Action</th>
                                            <th>Content</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    if(isset($hist) && $hist!=array()){
                                       for($i = 0; $i < count($hist); $i ++) {
												?>
					                       <tr>
												<td><?php echo isset($hist[$i]['id']) ?$hist[$i]['id']:'';?></td>
										     	<td><?php echo isset($hist[$i]['change_user']) ?$hist[$i]['change_user']:'';?></td>
												<td><?php echo isset($hist[$i]['change_time']) ?$hist[$i]['change_time']:'';?></td>
												<td><?php echo isset($hist[$i]['oper']) ?$hist[$i]['oper']:'';?></td>
												<td><?php echo isset($hist[$i]['content']) ?$hist[$i]['content']:'';?></td>
											</tr>
                                       <?php }}?>
                                    </tbody>
                                </table>
                            </div>
                            
						</div>
						
						<?php }?>
                        <!-- /.panel-body -->
							</div>

							<div <?php echo isset($comp_hidden)?$comp_hidden:0;?> id="Comp" class="tab-pane">
								<form id="compatibility" name="compatibility" enctype="multipart/form-data"
									action="<?php echo site_url('opt/opt_create_task/comp_addtask') ?>"
									method="post">
                                    <input type="hidden" id="comp_url" value="<?php echo site_url('opt/opt_create_task/comp_changearchive');?>"/>
                                    <input type="hidden" name="comp_pr_id"
										value="<?php echo isset($comp_pr_id)?$comp_pr_id:0;?>" /> <input
										name="comp_id" id="comp_id"
										value="<?php echo isset($comp_id)?$comp_id:0; ?>"
										type="hidden" />
                                    <input name="archive"  value="<?php echo isset($archive)?$archive:0; ?>" type="hidden" />
                                    <input type="hidden" name="comp_Deadline" value="<?php echo isset($comp['Deadline'])?$comp['Deadline']:'0000-00-00';?>"/>
                                    <div class="panel-body">
										<div class="col-lg-3">
											<div class="input-prepend input-group">
												<label>Deadline:</label> <input type="text"
													style="width: 200px" id="Deadline" class="form-control"
													data-beatpicker="true" name="comp[Deadline]"
													value="<?php echo isset($comp['Deadline'])?$comp['Deadline']:'0000-00-00';?>" <?php if($type==2){?> disabled='disabled'<?php }?> />
											</div>
										</div>

										<div class="col-lg-3">
											<div class="input-prepend input-group">
												<label>Task Received Date:</label> <input type="text"
													style="width: 200px" id="TASKR_DATE" class="form-control"
													data-beatpicker="true" name="comp[TASKR_DATE]"
													value="<?php echo isset($comp['TASKR_DATE'])?$comp['TASKR_DATE']:'0000-00-00';?>" />
											</div>
										</div>
										<div class="col-lg-3">
											<div class="input-prepend input-group">
												<label>Start Processing Date:</label> <input type="text"
													style="width: 200px" id="START_DATE" class="form-control"
													data-beatpicker="true" name="comp[START_DATE]"
													value="<?php echo isset($comp['START_DATE'])?$comp['START_DATE']:'0000-00-00';?>" />
											</div>
										</div>

										<div class="col-lg-3">
											<div class="input-prepend input-group">
												<label>Complete Date:</label> <input type="text"
													style="width: 200px" id="COMPLETE_DATE"
													class="form-control" data-beatpicker="true"
													name="comp[COMPLETE_DATE]"
													value="<?php echo isset($comp['COMPLETE_DATE'])?$comp['COMPLETE_DATE']:'0000-00-00';?>" />
											</div>
										</div>
										<div class="col-lg-3">
											<div class="input-prepend input-group">
												<label>Loadsheet:</label> <input type="text"
													style="width: 200px" id="Loadsheet" class="form-control"
													name="comp[LOADSHEET]"
													value="<?php echo isset($comp['LOADSHEET'])?$comp['LOADSHEET']:'';?>" />
											</div>
										</div>
										<div class="col-lg-3">
											<div class="input-prepend input-group">
												<label>Submitter:</label> <input type="text"
													style="width: 200px" id="Submitter" class="form-control"
													name="comp[Submitter]"
													value="<?php echo isset($comp['Submitter'])?$comp['Submitter']:'';?>" />

											</div>
										</div>
										<div class="col-lg-3">
											<div >
												<label>BU:</label> <select style="width: 200px" id="BU"
													class="form-control" name="comp[BU]">
													<?php  foreach($bu as $key){
										         	?>
										         	<option <?php if(isset($comp['BU']) && $comp['BU']==$key['bu_name']){echo 'selected';}?> ><?php echo isset($key['bu_name'])?$key['bu_name']:''; ?></option> 
										         	<?php 
										         }?>
												</select>
											</div>
										</div>
										<div class="col-lg-3">
											<div class="input-prepend input-group">
												<label>MODELCOUNT:</label> <input type="text"
													style="width: 200px" id="MODELCOUNT" class="form-control"
													name="comp[MODELCOUNT]"
													value="<?php echo isset($comp['MODELCOUNT'])?$comp['MODELCOUNT']:'';?>" 
													onkeyup="value=value.replace(/[^\d]/g,'') "/>
											</div>
										</div>
                                        <div class="col-lg-3">
                                            <div class="input-prepend input-group">
                                                <label>Data Specialist:</label>
                                                <select style="width: 200px" id="BU"
                                                        class="form-control" name="comp[USER]">
                                                    <?php  foreach($session_name as $key){
                                                        ?>
                                                        <option <?php if(isset($comp['USER']) && $comp['USER']==$key['username']){echo 'selected';}?> >
                                                            <?php echo isset($key['username'])?$key['username']:'$user_name'; ?></option>
                                                    <?php
                                                    }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-prepend input-group">
                                                <label>Status:</label> <select style="width: 200px"
                                                                               id="Status" class="form-control" name="comp[STATUS]">
                                                    <?php  foreach($status as $key){
                                                        ?>
                                                        <option id=<?php echo isset($key['sid'])?$key['sid']:''; ?> <?php if(isset($comp['STATUS']) && $comp['STATUS']==$key['stype']){echo 'selected';}?> ><?php echo isset($key['stype'])?$key['stype']:''; ?></option>
                                                    <?php
                                                    }?>
                                                </select>
                                            </div>
                                        </div>

										<div class="col-lg-3">
											<div class="input-prepend input-group">
												<label>Owner:</label> <input type="text"
													style="width: 200px" id="Owner" class="form-control"
													name="comp[OWNER]"
													value="<?php echo isset($comp['OWNER'])?$comp['OWNER']:'';?>" />
											</div>
										</div>
										<div class="col-lg-12">
											<div >
												<label>PN:</label> 
												<textarea class="form-control" rows="3" name="comp[PN]" ><?php  echo isset($comp['PN'])?$comp['PN']:'';?></textarea>
												
											</div>
										</div>

                                        <div class="col-lg-12">
                                            <label>Attachments:</label>
                                            <input type="file" name="file_path" size="20" />
                                        </div>
                                        <div class="col-lg-12">
                                            <label>Files:</label><br>
                                            <?php if(isset($fp) && $fp!=array()){

                                                for ($i=0;$i<count($fp);$i++){
                                                    ?>
                                                    <a href="<?php echo site_url('opt/opt_create_task/down_load');?>?fname=<?php echo isset($fp[$i])?$fp[$i]:'';?>"><?php echo isset($fp[$i])?$fp[$i]:'';?></a>
                                                    <br><input type="hidden" name="fn[<?php echo isset($i)?$i:0;?>]" value="<?php echo isset($fp[$i])?$fp[$i]:0;?>"/>
                                                <?php
                                                }
                                            }?>
                                        </div>


										<!--pending list-->
										<div class="col-lg-12">
						<?php $this->load->view('pending');?>
						</div>
						<!-- end -->
						<div id="pending_comp" class="panel-body"></div>
										<p>&nbsp;</p>
										<div class="space-4"></div>
										<div class="clearfix form-actions">
											<div class="col-md-offset-3 col-md-9">
                                                <?php if(isset($comp_id) && $comp_id>0){?>
                                                    <input class="btn btn-primary"  type="button" value="<?php if(isset($comp['archive']) && $comp['archive']==1){echo 'NoArchive';}else{echo 'Archive';}?>"  id="comp_btn">
                                                <?php }?>
												<input class="btn btn-primary" type="button"
													value="Create Issue" id="save_comp">
												<button class="btn btn-info" type="sumit">
													<i class="icon-ok bigger-110"></i> Submit
												</button>
											</div>
										</div>
								</form>
								<br>
								<!--add history --->
						<?php if(isset($comp_id) && $comp_id>0){?>
						<div class="col-lg-12">
						<p class="fa fa-plus" id="cl" onclick="dis()">  Change History List</p>
						<div class="table-responsive" id="dhistory" style="display: none">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Time</th>
                                            <th>Action</th>
                                            <th>Content</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    if(isset($hist) && $hist!=array()){
                                       for($i = 0; $i < count($hist); $i ++) {
												?>
					                       <tr>
												<td><?php echo isset($hist[$i]['id']) ?$hist[$i]['id']:'';?></td>
										     	<td><?php echo isset($hist[$i]['change_user']) ?$hist[$i]['change_user']:'';?></td>
												<td><?php echo isset($hist[$i]['change_time']) ?$hist[$i]['change_time']:'';?></td>
												<td><?php echo isset($hist[$i]['oper']) ?$hist[$i]['oper']:'';?></td>
												<td><?php echo isset($hist[$i]['content']) ?$hist[$i]['content']:'';?></td>
											</tr>
                                       <?php }}?>
                                    </tbody>
                                </table>
                            </div>
                            
						</div>
						
						<?php }?>
                        <!-- /.panel-body -->

							</div>
						</div>

					</div>

				</div>
				<!-- /span -->

			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
	</div>
	<!-- /#page-wrapper -->

	</div>
	<?php $this->load->view('foot');?>
	<!-- /#wrapper -->
		<script>
    <?php $this->load->view('his');?>
   </script>
</body>
</html>
