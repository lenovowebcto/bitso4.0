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
                    <div class="col-lg-6">
                       <form action="<?php echo site_url('admin/user/toadduser') ?>" method="post" onSubmit="return check()">
                       <table>
							 <input name="uid"  value="<?php echo isset($uid)?$uid:0; ?>" type="hidden"/>
							 
							 <div  class="input-append date">
							   <label>Username</label>
							   <input type="text" name="user[Username]"  value="<?php echo isset($user['username'])?$user['username']:'';?>"/>
							</div><br>
							
							 <div  class="input-append date">
							   <label>Password</label>
							   <input type="password" name="user[UPWD]" id="password" value=""/>
							  </div><br>
						<?php 
							     if(isset($uid) && $uid>0){
							    ?>   
							   <div  class="input-append date">
							     <label>RePassword</label>
							     <input type="password" name="repsw" id="repsw" value=""/>
							   </div><br>
     	                <?php } ?>
     	                <div  class="input-append date">
							   <label>email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
							   <input type="text" name="user[email]" id="email" value="<?php echo isset($user['email'])?$user['email']:'';?>"/>
							</div><br>
							
							<div  class="input-append date">
							   <label>title &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
							   <input type="text" name="user[title]"  value="<?php echo isset($user['title'])?$user['title']:'';?>"/>
							</div><br>
							 <div  class="input-append date">
							   <label>Role&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
							    <input   type="radio" name="user[type]" value="1"  <?php if(isset($user['type']) && $user['type'] == 1){ ?>checked='checked' <?php }?> checked />admin
				                <input   type="radio" name="user[type]" value="2"  <?php if(isset($user['type']) && $user['type'] == 2){ ?>checked='checked' <?php }?>/>user
				           </div><br>
						   <div  class="input-append date">
							   <label>active&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
							    <input   type="radio" name="user[active]" value="1" <?php if(isset($user['active']) && $user['active'] == 1){ ?>checked='checked' <?php }?> checked />active
				                <input   type="radio" name="user[active]" value="0" <?php if(isset($user['active']) && $user['active'] == 0){ ?>checked='checked' <?php }?> />inactive
				           </div><br>
				           <!--  
				           <div  class="input-append date">
							   <label>group&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
								 <select name="user[group]">
								         <?php if(count($gro)>0){
								         	foreach ($gro as $key){
								         		?>
								         		 <option  <?php if(isset($user['group']) && $user['group']==$key['gname']){echo 'selected';} ?>  value=<?php echo isset($key['gname'])?$key['gname']:''; ?>><?php echo isset($key['gname'])?$key['gname']:''; ?></option>
								         		<?php 
								         	}
								         } ?>
						         </select>
							</div><br>
							-->
							<input  type="hidden" name="group" value="<?php echo $group; ?>"/>
							 <?php if($group == "LOIS"){?>
							  <div  class="input-append date">
							   <label>project&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
								 <select name="user[project]">
								         <option  <?php if(isset($user['project']) && $user['project']==""){echo 'selected';} ?>  value="" ></option>
								         <option  <?php if(isset($user['project']) && $user['project']=="LOIS TBG/IPG"){echo 'selected';} ?>  value="LOIS TBG/IPG" >LOIS TBG/IPG</option>
								         <option  <?php if(isset($user['project']) && $user['project']=="LOIS OPT/SVC"){echo 'selected';} ?>  value="LOIS OPT/SVC" >LOIS OPT/SVC</option>
								         <option  <?php if(isset($user['project']) && $user['project']=="LOIS Element"){echo 'selected';} ?>  value="LOIS Element" >LOIS Element</option>
						         </select>
							</div><br>
							<?php }?>
							<div  class="input-append date">
							   <label>local&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
							   <input type="text" name="user[local]"  value="<?php echo isset($user['local'])?$user['local']:'';?>"/>
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