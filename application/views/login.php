<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login Page - PDM BITOS</title>
    <?php $this->load->view('common');?>
</head>
<body>
   
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
				<img src="<?php  echo base_url();?>util/bitso/images/logo.png" style="padding-top:10%;padding-left:15%"/>
				</div>				<!--Logo div-->
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">

                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In BITSO System</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form"  action="<?php  echo site_url('login/dologin') ?>" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                               
                                <!-- Change this to a button or input when using this as a form -->
                              <!--   <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a>-->
                              
                                <input type="submit" class="btn btn-lg btn-success btn-block"  value="Login">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
