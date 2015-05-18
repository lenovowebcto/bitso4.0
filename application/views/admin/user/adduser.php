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
	var pemail = $('#email').val();
	if(!psw.test(pswval)){
		 alert('Password is invalid');
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
                    <h1 class="page-header">Add User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			<div class="panel-body">
				<div class="row">
                    <div class="col-lg-6">
                       <form action="<?php echo site_url('admin/user/toadduser') ?>" method="post" onSubmit="return check()">
                       <table>
							 <input name="uid"  value="0" type="hidden"/>
							 
							 <div  class="input-append date">
							   <label>Username</label>
							   <input type="text" name="user[Username]"  value=""/>
							</div><br>
							
							 <div  class="input-append date">
							   <label>Password</label>
							   <input type="password" name="user[UPWD]" id="password" value=""/>
							 </div><br>
						
     	                    <div  class="input-append date">
							   <label>email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
							   <input type="text" name="user[email]" id="email" value=""/>
							</div><br>
							
							<div  class="input-append date">
							   <label>title &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
							   <input type="text" name="user[title]"  value=""/>
							</div><br>
							 <div  class="input-append date">
							   <label>Role&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
							    <input   type="radio" name="user[type]" value="1"  checked />admin
				                <input   type="radio" name="user[type]" value="2" />user
				           </div><br>
						   <div  class="input-append date">
							   <label>active&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
							    <input   type="radio" name="user[active]" value="1"  checked />active
				                <input   type="radio" name="user[active]" value="0" />inactive
				           </div><br>
				           <input  type="hidden" name="group" value="<?php echo $group; ?>"/>
				           <?php if($group == "LOIS"){?>
				          <!--   <div  class="input-append date">
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
							  <div  class="input-append date">
							   <label>project&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
								 <select name="user[project]">
								         <option    value="" ></option>
								         <option    value="LOIS TBG/IPG" >LOIS TBG/IPG</option>
								         <option    value="LOIS OPT/SVC" >LOIS OPT/SVC</option>
								         <option    value="LOIS Element" >LOIS Element</option>
						         </select>
							</div><br>
							<?php }?>
							<div  class="input-append date">
							   <label>local&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
							   <input type="text" name="user[local]"  value=""/>
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
