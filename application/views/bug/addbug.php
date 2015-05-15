<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>CV Mtk Description Easy Tracker</title>
    <?php $this->load->view('common');?>
   
</head>
<body>

    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php if(isset($id) && $id>0){echo 'Update  ';}else{echo 'Add  ';}?>Bug</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Detail info as below - <a href="<?php echo site_url('bug/')?>">Goback to List view</a>
                        </div>
						
						
                     <form action="<?php echo site_url('bug/toaddbug') ?>" method="get">
                      <input type="hidden" name="id" value="<?php echo isset($id)?$id:0;?>"/>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
						
							<div class="col-lg-4">
								<div class="input-prepend input-group">
								<label>AD:</label>
								   <input type="text"  name="bug[AD]"  value="<?php echo isset($bug['AD'])?$bug['AD']:'';?>" style="width: 200px;"   class="form-control" data-beatpicker="true"  /> 
								</div>
							</div>
							<div class="col-lg-4">
							  <div class="input-prepend input-group">
								<label>Submitter:</label>
								<input type="text"  class="form-control"  name="bug[submitter]"  value="<?php echo isset($bug['submitter'])?$bug['submitter']:'' ?>">
						     </div>
							</div>
							<div class="col-lg-4">
							   <div class="input-prepend input-group">
								<label>Modifier:</label>
								<input class="form-control"  name="bug[modifier]"  value="<?php echo isset($bug['modifier'])?$bug['modifier']:'James Hu';?>">
							   </div>
							</div>
								<div class="col-lg-4">
								 <div class="input-prepend input-group">
								 <label>Char:</label>
								   <input type="text" name="bug[char]" value="<?php echo isset($bug['char'])?$bug['char']:''; ?>"   class="form-control"/> 
								 </div>
							</div>
						<?php if(isset($id) && $id>0){?>
								<div class="col-lg-4">
								 <div class="input-prepend input-group">
								 <label>Create_time:</label>
								   <input type="text" style="width: 240px" value="<?php echo isset($bug['create_time'])?$bug['create_time']:''; ?>"   class="form-control" disabled="disabled"/> 
								 </div>
							</div>
							<?php }?>
							<div class="col-lg-4">
								<label>Status:</label>
	                             <select name="bug[status]" class="form-control" style="width: 235px">
							         <option  <?php if(isset($bug['status']) && $bug['status']=='New'){echo 'selected';}?> value="New" >New</option> 
							         <option  <?php if(isset($bug['status']) && $bug['status']=='In Progress'){echo 'selected';}?> value="In Progress" >In Progress</option> 
							         <option  <?php if(isset($bug['status']) && $bug['status']=='Done'){echo 'selected';}?> value="Done" >Done</option> 
						         </select>
							</div>
							<div class="col-lg-12">
								<label >Value:</label>
								  <textarea class="form-control" name="bug[value]" style="width: 260px; height: 161px;" ><?php  echo isset($value)?$value:'';?></textarea>
							</div>
						<hr/>
						 <p>&nbsp;</p>
						<p style="text-align:center;">
							<input type="submit"  class="btn btn-success" value="SUBMIT"/></p>
						<p>&nbsp;</p>
						</form>
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			</div>
    </div>
  <?php  $this->load->view('foot'); ?>
</body>
</html>
