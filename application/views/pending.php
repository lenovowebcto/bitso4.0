<div id="pending_issue" class="panel-body">
<input type="hidden" id="hid" value="<?php echo isset($w)?$w:"";?>"/>
				<?php if(isset($pen) && $pen!= array()){
					for($i=0;$i<count($pen);$i++){
					 ?>
						<div class='modal-body' id='<?php echo $i;?>'>
						<div class="col-lg-2">
							<label>category:</label>
								<select name='c1[<?php echo $i;?>]' class='form-control' onchange='aa($(this))'>
		                           <?php  foreach($category1 as $key){
							         	?>
							         	<option value=<?php echo isset($key['id'])?$key['id']:''; ?> <?php if(isset($key['id']) && $key['id']==$pen[$i]['ca1_id']){echo 'selected';}?> ><?php echo isset($key['cate_name'])?$key['cate_name']:''; ?></option> 
							         	<?php 
							         }?>
                                </select>
							</div>
							
							<div class="col-lg-2">
							<label>category2:</label>
								<select name='c2[<?php echo $i;?>]' class='form-control'>
		                           <?php  foreach($c[$i] as $key=>$v){ 
							         	?>
							         	<option value=<?php echo isset($v['id'])?$v['id']:''; ?> <?php if(isset($v['id']) && $v['id']==$pen[$i]['ca2_id']){echo 'selected';}?> ><?php echo isset($v['nc_name'])?$v['nc_name']:''; ?></option> 
							         	<?php 
		                           }?>
                                </select>
							</div>	
						 
							<div class="col-lg-2">
							<label>Pending Issue:</label>
							<input class="form-control" name='pending[<?php echo $i?>]' value="<?php echo  isset($pen[$i]['pending'])?$pen[$i]['pending']:''?>"> 
							</div>
							<div class="col-lg-3">
							<label>Status:</label>
								<select name='sta[<?php echo $i;?>]' class='form-control'>
		                           <?php  foreach($status as $key){
							         	?>
							         	<option id=<?php echo isset($key['sid'])?$key['sid']:''; ?> <?php if(isset($key['stype']) && $key['stype']==$pen[$i]['status']){echo 'selected';}?> ><?php echo isset($key['stype'])?$key['stype']:''; ?></option> 
							         	<?php 
							         }?>
                                </select>
							</div>
							
							 <div class='col-lg-3'><label></label>
							    <input type='button' class='btn btn-primary del' onclick='move(this)' value='delete' style='margin-top: 25px;' />
							 </div>
							</div> 
									<?php 
								}
							}?>
						</div>