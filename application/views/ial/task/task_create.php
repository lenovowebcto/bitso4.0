<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<script type="text/javascript">
function brand(){
    var brand = $("select option:selected").val();
    var tt="";
    var url = "<?php echo site_url('ial/task_create/family');?>";
   var name = "<?php isset($task['Family_name'])?$task['Family_name']:'';?>";
   $.post(url,{brand:brand},function(result){
	   if(result==''){
		         $("#BU").empty('');
		   }else{
			   $.each(eval(result),function(key,val){
		            tt += "<option>"+val.Family_name+" </option>"
				   }); 
			    $("#BU").empty('');
	            $("#BU").html(tt);
			   } 
	         $('.selectpicker').selectpicker('refresh');
	      });
}
function fname(){
	var f =  $("#BU").val();
	 var html = '';
	   var url = "<?php echo site_url('ial/task_create/subser');?>";
	   $.post(url,{fname:f},function(result){
		   if(result==''){
			       $("#Sub_Series").empty(''); 
			   }else{
				   $.each(eval(result),function(key,val){
			            html+="<option  id="+val.id+" >"+val.sub_series+" </option>"
					   }); 
				   $("#Sub_Series").empty('');
				   $("#Sub_Series").html(html);
				   }    
		         $('.selectpicker').selectpicker('refresh');       
		      });
}

</script>
    <title>BITSO 4.0</title>
    <?php $this->load->view('common');?>
        <script src="<?php  echo base_url();?>util/bitso/bower_components/select/js/bootstrap-select.min.js"></script>
    <link href="<?php  echo base_url();?>util/bitso/bower_components/select/css/bootstrap-select.min.css" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
          <?php 
                $this->load->view('left2');
          ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">IAL Task Create</h1>
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
                    <form action="<?php echo site_url('ial/task_create/toaddtask') ?>" method="post">
                      <input type="hidden" name="pr_id" value="<?php echo isset($pr_id)?$pr_id:0;?>"/>
                      <input type="hidden" id='id' name="id" value="<?php echo isset($id)?$id:0;?>"/>
                         <!-- /.panel-heading -->
                        <div class="panel-body">
							      <div class="col-lg-3">
											<label>Record Date:</label>
											<input type="hidden" name="Record_Date" value="<?php echo isset($task['Record_Date'])?$task['Record_Date']:'0000-00-00';?>"/>
											 <input type="text"
												style="width: 200px" id="Record_Date" class="form-control"
												 name="task[Record_Date]"
                                                onfocus="WdatePicker({dateFmt:'yyyy-MM-dd',el:$dp.$('startTime')})"
												value="<?php echo isset($task['Record_Date'])?$task['Record_Date']:'0000-00-00';?>" <?php if($type==2){?> disabled='disabled'<?php }?>/>

									</div>
									<div class="col-lg-3">
											<label>AD:</label>
											<input type="hidden" name="AD" value="<?php echo isset($task['AD'])?$task['AD']:'0000-00-00';?>"/>
											 <input type="text"
												style="width: 200px" id="AD" class="form-control"
                                                onfocus="WdatePicker({dateFmt:'yyyy-MM-dd',el:$dp.$('startTime')})" name="task[AD]"
												value="<?php echo isset($task['AD'])?$task['AD']:'0000-00-00';?>" <?php if($type==2){?> disabled='disabled'<?php }?>/>
										
									</div>
									<div class="col-lg-3">
											<label>EOW:</label>
											<input type="hidden" name="EOW" value="<?php echo isset($task['EOW'])?$task['EOW']:'0000-00-00';?>"/>
											 <input type="text"
												style="width: 200px" id="EOW" class="form-control"
                                                onfocus="WdatePicker({dateFmt:'yyyy-MM-dd',el:$dp.$('startTime')})" name="task[EOW]"
												value="<?php echo isset($task['EOW'])?$task['EOW']:'0000-00-00';?>" <?php if($type==2){?> disabled='disabled'<?php }?>/>
										
									</div>
									<div class="col-lg-3">
											<label>RTM:</label>
											<input type="hidden" name="RTM" value="<?php echo isset($task['RTM'])?$task['RTM']:'0000-00-00';?>"/>
											 <input type="text"
												style="width: 200px" id="RTM" class="form-control"
                                                onfocus="WdatePicker({dateFmt:'yyyy-MM-dd',el:$dp.$('startTime')})" name="task[RTM]"
												value="<?php echo isset($task['RTM'])?$task['RTM']:'0000-00-00';?>" <?php if($type==2){?> disabled='disabled'<?php }?>/>
										
									</div>

									<div class="col-lg-3">
											<label>IAL number:</label>
											 <input type="text" class="form-control" name="task[IAL_number]"
												value="<?php echo isset($task['IAL_number'])?$task['IAL_number']:'';?>" />
										
									</div>
                            <div class="col-lg-3">
                                <label>Brand:</label>
                                <select onChange='brand()' style="width: 200px" id="Brand" class="form-control" name="task[Brand]">
                                    <?php  foreach($Brand as $key){ ?>
                                        <option    <?php if(isset($task['Brand']) && $task['Brand']==$key['bname']){echo 'selected';}?> >
                                            <?php echo isset($key['bname'])?$key['bname']:$brand; ?></option>
                                    <?php }?>
                                </select>
                            </div>
									<div class="col-lg-3" id="div">
										<label>Family name</label>
										<select onChange="fname()" style="width: 200px" id="BU"  class="form-control selectpicker" data-live-search="true" name="task[Family_name]">
										   <?php  foreach($Family_name as $key){
                                                    ?>
                                                    <option <?php if(isset($task['Family_name']) && $task['Family_name']==$key['Family_name']){echo 'selected';}?> >
                                                        <?php echo isset($key['Family_name'])?$key['Family_name']:$family_name; ?></option>
                                                <?php
                                                }?>	      
										</select>
									</div>
									
									<div class="col-lg-3">
											<label>Sub Series:</label>
                                            <select  id="Sub_Series" class="form-control selectpicker" data-live-search="true" name="task[Sub_Series]">
                                              <?php  foreach($Sub_Series as $key){
                                                    ?>
                                                    <option <?php if(isset($task['Sub_Series']) && $task['Sub_Series']==$key['sub_series']){echo 'selected';}?> >
                                                        <?php echo isset($key['sub_series'])?$key['sub_series']:$sub_Series; ?></option>
                                                <?php
                                                }?>
                                            </select>
									</div>
                            <div class="col-lg-3" style="z-index: 0">
                                <label>User:</label>
                                <select name="task[User]" class="form-control">
                                    <?php  foreach($user as $key){ ?>
                                        <option value="<?php echo isset($key['username'])?$key['username']:''?>" <?php if(isset($key['username']) && $key['username']==$username){echo 'selected';}?> ><?php echo isset($key['username'])?$key['username']:''; ?></option>
                                    <?php }?>
                                </select>
                            </div>
									<div class="col-lg-3">
											<label>Status:</label> 
											<select class="form-control" name="task[Status]">
												<?php  foreach($Status as $key){
										         	?>
										         	<option <?php if(isset($task['Status']) && $task['Status']==$key['stype']){echo 'selected';}?> ><?php echo isset($key['stype'])?$key['stype']:''; ?></option> 
										         	<?php 
										         }?>
											</select>
									</div>
									<?php if($dis=='Think'){?>
									<div class="col-lg-3">
											<label>BPL Number:</label> 
											<input type="text" class="form-control" name="task[BPL_Number]"
												value="<?php echo isset($task['BPL_Number'])?$task['BPL_Number']:'';?>"  />
									</div>
                                    <?php } ?>
                            <div class="col-lg-3">
                                <label>Planner:</label>
                                <input type="text" class="form-control" name="task[Planner]"
                                       value="<?php echo isset($task['Planner'])?$task['Planner']:'';?>" />
                            </div>
                              <input type="hidden" name="dis"  value="<?php echo $dis;?>"/>
									<div class="col-lg-12">
										<div >
											<label>Comment:</label> 
											<textarea class="form-control" rows="3" name="task[Comment]" ><?php  echo isset($task['Comment'])?$task['Comment']:'';?></textarea>
										</div>
									</div>
									</div>
						<hr/>
						<!--pending list-->						<?php $this->load->view('pending');?>
						<!-- end -->
                            <p>&nbsp;</p>
						<p style="text-align:center;">
                            
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
    $(document).ready(function(){
       $('.selectpicker').selectpicker('refresh');
    });
    <?php $this->load->view('his');?>
   </script>

</body>
</html>
