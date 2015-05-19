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
     <script type="text/javascript">
function check(){
	
	var psw = /^[0-9A-z-_~!@#$%^&*()_+`\[\]\;\:\"\<\>]{6,20}$/;
	var email = /^[a-zA-Z0-9_\\.]+@[a-zA-Z0-9-]+[\\.a-zA-Z]*((\.com)|(\.cn)|(\.net))$/;
	var pswval = $('#password').val();
	var repsw = $('#repsw').val();
	var pemail = $('#email').val();
	if(!psw.test(pswval)){
		 alert('Password is invalid');
		 return false ;
	}else if(psw.test(pswval) && pswval !=repsw){
		 alert('RePassword and password is not the same one');
		 return false ;
	}
	if(!email.test(pemail)){
		alert('Email  is invalid');
		 return false ;
	}
	 return true ;
}

 </script>
</head>
<body>
    <div id="wrapper">
              <?php 
              $this->load->view('left2');?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php if(isset($uid) && $uid>0){echo 'Edit';}else{echo 'Add';} ?> User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			<div class="panel-body">
				<div class="row">
                    <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Detail info as below
                        </div>
                       <form action="<?php echo site_url('admin/user/toadduser') ?>" method="post" onSubmit="return check()">
                       <div class="panel-body">
							 <input name="uid"  value="<?php echo isset($uid)?$uid:0; ?>" type="hidden"/>
							 
							 <div  class="col-lg-3">
							   <label>Username</label>
							   <input type="text" class="form-control" name="user[Username]"  value="<?php echo isset($user['username'])?$user['username']:'';?>"/>
							</div>
							
							 <div  class="col-lg-3">
							   <label>Password</label>
							   <input type="password" class="form-control" name="user[UPWD]" id="password" value=""/>
							  </div>
						<?php 
							     if(isset($uid) && $uid>0){
							    ?>   
							   <div  class="col-lg-3">
							     <label>RePassword</label>
							     <input type="password" class="form-control" name="repsw" id="repsw" value=""/>
							   </div>
     	                <?php } ?>
     	                <div  class="col-lg-3">
							   <label>email </label>
							   <input type="text" class="form-control" name="user[email]" id="email" value="<?php echo isset($user['email'])?$user['email']:'';?>"/>
							</div>
							
							<div  class="col-lg-3">
							   <label>title </label>
							   <input type="text" class="form-control"  name="user[title]"  value="<?php echo isset($user['title'])?$user['title']:'';?>"/>
							</div>
							 
				          
							<input  type="hidden" name="group" value="<?php echo $group; ?>"/>
							 <?php if($group == "LOIS"){?>
							  <div  class="col-lg-3">
							   <label>project</label>
								 <select class="form-control" name="user[project]">
								         <option  <?php if(isset($user['project']) && $user['project']==""){echo 'selected';} ?>  value="" ></option>
								         <option  <?php if(isset($user['project']) && $user['project']=="LOIS TBG/IPG"){echo 'selected';} ?>  value="LOIS TBG/IPG" >LOIS TBG/IPG</option>
								         <option  <?php if(isset($user['project']) && $user['project']=="LOIS OPT/SVC"){echo 'selected';} ?>  value="LOIS OPT/SVC" >LOIS OPT/SVC</option>
								         <option  <?php if(isset($user['project']) && $user['project']=="LOIS Element"){echo 'selected';} ?>  value="LOIS Element" >LOIS Element</option>
						         </select>
							</div>
							<?php }?>
							<div  class="col-lg-3">
							   <label>local</label>
							   <input  class="form-control"  type="text" name="user[local]"  value="<?php echo isset($user['local'])?$user['local']:'';?>"/>
							</div><br>
							<div  class="col-lg-3">
							   <label>Role</label>
							   <select name="user[type]" class="form-control"> 
								    <option value="1" <?php if(isset($user['type']) && $user['type'] == 1){echo 'selected';}?> >admin</option> 
								    <option value="2" <?php if(isset($user['type']) && $user['type'] == 1){echo 'selected';}?>>user</option> 
								</select>
							</div>
						   <div  class="col-lg-3">
							   <label >active</label>
							   <select name="user[type]" class="form-control"> 
								    <option value="1" <?php if(isset($user['active']) && $user['active'] == 1){echo 'selected';}?> >active</option> 
								    <option value="0" <?php if(isset($user['active']) && $user['active'] == 0){echo 'selected';}?>>inactive</option> 
								</select>
							   </div>
							</div>
							<div  style="text-align:center;" >
							    <input type="submit"  class="btn btn-success" value="SUBMIT"/></p>
							</div>
						</form>
					</div></div>
			</div>
			<!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <?php $this->load->view('foot');?>

</body>
</html>