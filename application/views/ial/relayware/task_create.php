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
                    <h1 class="page-header">IAL Relayware Create</h1>
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
                    <form action="<?php echo site_url('ial/create_relayware/toaddtask') ?>" method="post">
                      <input type="hidden" name="pr_id" value="<?php echo isset($pr_id)?$pr_id:0;?>"/>
                      <input type="hidden" id='id' name="id" value="<?php echo isset($id)?$id:0;?>"/>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
							      <div class="col-lg-3">
											<label>AD:</label>
											<input type="hidden" name="deadline" value="<?php echo isset($task['AD'])?$task['AD']:'0000-00-00';?>"/>
											 <input type="text"
												style="width: 200px" id="AD" class="form-control"
												data-beatpicker="true" name="task[AD]"
												value="<?php echo isset($task['AD'])?$task['AD']:'0000-00-00';?>" />
										</div>
									<div class="col-lg-3">
											<label>Upload Date:</label>
											<input type="hidden" name="Upload_Date" value="<?php echo isset($task['Upload_Date'])?$task['Upload_Date']:'0000-00-00';?>"/>
											 <input type="text"
												style="width: 200px" id="Upload_Date" class="form-control"
												data-beatpicker="true" name="task[Upload_Date]"
												value="<?php echo isset($task['Upload_Date'])?$task['Upload_Date']:'0000-00-00';?>" />
										</div>
									<div class="col-lg-3">
											<label>BPL/PAL Number:</label>
											 <input type="text" class="form-control" name="task[BPL_PAL_Number]"
												value="<?php echo isset($task['BPL_PAL_Number'])?$task['BPL_PAL_Number']:'';?>" />
										</div>

									<div class="col-lg-3">
											<label>Brand:</label>
                                            <select style="width: 200px" id="BU" class="form-control" name="task[Brand]">
                                                <?php  foreach($Brand as $key){
                                                    ?>
                                                    <option <?php if(isset($task['Brand']) && $task['Brand']==$key['bname']){echo 'selected';}?> >
                                                        <?php echo isset($key['bname'])?$key['bname']:$Brand; ?></option>
                                                <?php
                                                }?>
                                            </select>
									</div>
									<div class="col-lg-3">
											<label>Requester:</label>
											 <input type="text" class="form-control" name="task[Requester]"
												value="<?php echo isset($task['Requester'])?$task['Requester']:'';?>" />
										</div>
									<div class="col-lg-3" style="z-index: 0">
								<label>Curr_User:</label>
								<select name="task[User]" class="form-control">
								<?php  foreach($user as $key){ ?>
								    <option value="<?php echo isset($key['username'])?$key['username']:''?>" <?php if(isset($key['username']) && $key['username']==$username){echo 'selected';}?> ><?php echo isset($key['username'])?$key['username']:''; ?></option> 
								<?php }?>
								</select>
							</div>
									<div class="col-lg-12">
										<div >
											<label>Description:</label> 
											<input type="text" class="form-control" name="task[Description]"
												value="<?php echo isset($task['Description'])?$task['Description']:'';?>" />
											</div>
									</div>
									
									<div class="col-lg-12">
										<div >
											<label>Comments:</label> 
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
    <?php $this->load->view('his');?>
   </script>

</body>
</html>
