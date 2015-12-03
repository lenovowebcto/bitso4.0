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
<script src="<?php  echo base_url();?>util/bitso/bower_components/jquery/dist/jquery.min.js"></script>
  
</head>
<body>
    <div id="wrapper">
              <?php 
              $this->load->view('left2');?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php if(isset($sid) && $sid>0){echo 'Edit';}else{echo 'Add';} ?> Status</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			<div class="panel-body">
				<div class="row">
                    <div class="col-lg-6">
                      <form action="<?php echo site_url('admin/projectstatus/toaddstatus') ?>" method="post">
                       <table>
							 <input name="sid"  value="<?php echo isset($sid)?$sid:0; ?>" type="hidden"/>
							 <div  class="input-append date">
							   <label>status:</label>
							  <input type="text" name="stype"  value="<?php echo isset($status['stype'])?$status['stype']:'';?>"/>
							  </div><br>
							<div  class="input-append date">
							   <label></label>
							    <input type="SUBMIT" value="SUBMIT"/>
							  </div>
							  </table>
						</form>
					</div>
			</div>
			<!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <?php $this->load->view('foot');?>
</body>
</html>
