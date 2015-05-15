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
   <?php 
	   $this->load->view('left2');?>
    <div id="wrapper">
           
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php if(isset($rqid) && $rqid>0){echo 'Edit';}else{echo 'Add';} ?> Request_type</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			<div class="panel-body">
				<div class="row">
                    <div class="col-lg-6">
                      <form action="<?php echo site_url('admin/reqtype/toaddtype') ?>" method="post">
                       <table>
							 <input name="rqid"  value="<?php echo isset($rqid)?$rqid:0; ?>" type="hidden"/>
							 <div  class="input-append date">
							   <label>req_type</label>
							  <input type="text" name="request_type"  value="<?php echo isset($type['rqtype'])?$type['rqtype']:'';?>"/>
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
