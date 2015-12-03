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
                    <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Detail info as below
                        </div>
                       <form action="<?php echo site_url('admin/user/toadduser') ?>" method="post" onSubmit="return check()">
                       <div class="panel-body">
							 <input name="uid"  value="0" type="hidden"/>
							 
							 <div  class="col-lg-3">
							   <label>Username</label>
							   <input class="form-control" type="text" name="user[Username]"  value="" />
							</div>
							
							 <div  class="col-lg-3">
							   <label>Password</label>
							   <input class="form-control"  type="password" name="user[UPWD]" id="password" value=""/>
							 </div>
						
     	                    <div  class="col-lg-3">
							   <label>email </label>
							   <input class="form-control"  type="text" name="user[email]" id="email" value=""/>
							</div>
							
							<div  class="col-lg-3">
							   <label>title </label>
							   <input class="form-control"  type="text" name="user[title]"  value=""/>
							</div>
							<div  class="col-lg-3">
							   <label>local</label>
							   <input class="form-control"  type="text" name="user[local]"  value=""/>
							</div>
							 <div  class="col-lg-3">
							   <label>Role</label>
							   <select name="user[type]" class="form-control"> 
								    <option value="1" >admin</option> 
								    <option value="2" >user</option> 
								</select>
				           </div>
						   <div  class="col-lg-3">
							   <label>Active</label>
							   <select name="user[active]" class="form-control"> 
								    <option value="1" >active</option> 
								    <option value="0" >inactive</option> 
								</select>
				           </div>
				           
				           <input  type="hidden" name="group" value="<?php echo $group; ?>"/>
				           <?php if($group == "LOIS"){?>
				          
							  <div  class="col-lg-3">
							   <label>project</label>
								 <select name="user[project]" class="form-control">
								         <option    value="" ></option>
								         <option    value="LOIS TBG/IPG" >LOIS TBG/IPG</option>
								         <option    value="LOIS OPT/SVC" >LOIS OPT/SVC</option>
								         <option    value="LOIS Element" >LOIS Element</option>
						         </select>
							</div>
							<?php }?>
							
							</div>
							<div  style="text-align:center;" >
							    <input type="submit"  class="btn btn-success" value="SUBMIT"/></p>
							</div>
							  
						</form>
					</div>
			</div></div>
			<!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <?php $this->load->view('foot');?>

</body>
</html>
