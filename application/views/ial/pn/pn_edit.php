<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script type="text/javascript">

        function del(key,index){
            var id=$('#id').val();
            var url="<?php echo  site_url('ial/pn_maintenance/update');?>"
            $.post(url,{name:key,id:id},function(result){

                if(result == 'success'){
                    $("#"+index).remove();
                    alert("delete success");
                }else{
                    alert("delete false");
                }
            });
        }


    </script>
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
                <h1 class="page-header"><?php if(isset($id) && $id>0){echo 'Edit';}else{echo 'Add';} ?>   PN Maintenance</h1>
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
                    <form action="<?php echo site_url('ial/pn_maintenance/toedit') ?>" method="post"

                          enctype="multipart/form-data">

                        <input type="hidden" name="id" value="<?php echo isset($id)?$id:0;?>" id="id"/>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="col-lg-3" style="z-index: 0">
                                <label>Request_Date:</label>
                                <input type="text" name="pn[request_date]"
                                       onfocus="WdatePicker({dateFmt:'yyyy-MM-dd',el:$dp.$('startTime')})"
                                       value="<?php echo isset($pn['request_date'])?$pn['request_date']:'';?>" class="form-control"  />
                            </div>
                            <div class="col-lg-3" style="z-index: 0">
                                <label>Close_Date:</label>
                                <input type="text" name="pn[close_date]"
                                      onfocus="WdatePicker({dateFmt:'yyyy-MM-dd',el:$dp.$('startTime')})"
                                       value="<?php echo isset($pn['close_date'])?$pn['close_date']:'';?>" class="form-control" />
                            </div>


                            <div class="col-lg-3" style="z-index: 0">
                                <label>Requester</label>
                                <input type="text"  name="pn[Requester]"

                                       value="<?php echo isset($pn['Requester'])?$pn['Requester']:''; ?>" class="form-control" />
                            </div>
                            <div class="col-lg-3" style="z-index: 0">
                                <label>sales_org:</label>
								  <textarea  style="height: 34px;"

                                            name="pn[sales_org]" class="form-control"><?php echo isset($pn['sales_org'])?$pn['sales_org']:'';?></textarea>
                            </div>
                            <div class="col-lg-12" style="z-index: 0">

                                <label>Email_Subject:</label>
                                <input type="text" name="pn[email_subject]"

                                       class="form-control"  value="<?php echo isset($pn['email_subject'])?$pn['email_subject']:''?>"/>
                            </div>

                            <div class="col-lg-3" style="z-index: 0">
                                <label>status:</label>
                                <select name="pn[status]" class="form-control">
                                    <?php if(isset($id) && $id>0){ foreach($status as $key){ ?>
                                        <option value="<?php echo isset($key['stype'])?$key['stype']:''?>" 
                                        <?php if(isset($pn['status']) && $pn['status']==$key['stype']){echo 'selected';}?>
                                            ><?php echo isset($key['stype'])?$key['stype']:''; ?></option>
                                    <?php }}else{?>
                                    	<?php foreach($status as $key){?>
                                    	 <option value="<?php echo isset($key['stype'])?$key['stype']:''?>" 
                                        <?php if($key['stype']=='Close'){echo 'selected';}?>
                                            ><?php echo isset($key['stype'])?$key['stype']:''; ?></option>
                                  <?php  }}?>
                                </select>
                            </div>
                            <div class="col-lg-3" style="z-index: 0">
                                <label>Manual:</label>
                                <?php if(isset($id) && $id>0){ ?>
                                <select name="pn[Manual]" class="form-control">
                                    <option value=" " <?php if(isset($pn['Manual'])&& $pn['Manual']==''){echo 'selected';}?> ></option>
                                    <option value="YES" <?php if(isset($pn['Manual']) && $pn['Manual']=='YES'){echo 'selected';}?> >YES</option>
                                    <option value="NO" <?php if(isset($pn['Manual']) && $pn['Manual']=='NO'){echo 'selected';}?>>NO</option>
                                </select>
                                <?php }else{?>
                                <select name="pn[Manual]" class="form-control">
                                    <option value=" " ></option>
                                    <option value="YES" >YES</option>
                                    <option value="NO" selected>NO</option>
                                </select>
                                <?php }?>
                            </div>


                            <div class="col-lg-3" style="z-index: 0">
                                <label>summary:</label>
                                <select name="pn[summary]" class="form-control">
                                    <?php  foreach($summary as $key){ ?>
                                        <option value="<?php echo isset($key['summary'])?$key['summary']:''?>" <?php if(isset($pn['summary']) && $pn['summary']==$key['summary']){
                                            echo 'selected';}?> ><?php echo isset($key

                                                ['summary'])?$key['summary']:''; ?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="col-lg-3" style="z-index: 0">
                                <label>Owner:</label>
                                <select name="pn[team]" class="form-control">
                                    <?php  foreach($team as $key){ ?>
                                        <option value="<?php echo isset($key['team'])?$key['team']:''?>" <?php if

                                        (isset($pn['team']) && $pn['team']==$key['team']){echo 'selected';}?> ><?php echo isset($key['team'])?$key

                                            ['team']:''; ?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="col-lg-3" style="z-index: 0">
                                <label>PN_quantity:</label>
                                <input type="text" name="pn[PN_quantity]"

                                       value="<?php echo isset($pn['PN_quantity'])?$pn['PN_quantity']:'';?>"    class="form-control" />
                            </div>
                            <div class="col-lg-3" style="z-index: 0">
                                <label>User:</label>
                                <select name="pn[User]" class="form-control">
                                    <?php  foreach($user as $key){ ?>
                                        <option value="<?php echo isset($key

                                            ['username'])?$key['username']:''?>" <?php if(isset($key['username']) && $key['username']==$username){echo

                                        'selected';}?> ><?php echo isset($key['username'])?$key['username']:''; ?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="col-lg-12" >
                                <div >
                                    <label>PN:</label>
								  <textarea  name="pn[PN]" class="form-control"

                                      ><?php echo isset($pn['PN'])?$pn['PN']:''?></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12" >
                                <div >
                                    <label>Comments:</label>
								  <textarea  name="pn[Comments]" class="form-control"><?php echo isset($pn['Comments'])?$pn['Comments']:''?></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label>Attachments:</label>
                                <input type="file" name="file_path" size="20" />
                            </div>
                            <div class="col-lg-12">
                                <label>Files:</label><br>
                                <?php if(isset($atta) && $atta!=array()){?>
                                	<table class="table table-striped table-bordered table-hover" id="file_table">
                                	<thead>
                                	<tr>
                                	<th >filename</th>
                                	<th >operation</th>
                                	</tr>
                                	</thead>
                                	<tbody>
                                	
                                   <?php  foreach ($atta as $v=>$key){ ?>
                                   <tr>
										<td>
                                        <div id="<?php echo $v;?>"> <a href="<?php echo site_url

                                            ('ial/pn_maintenance/down_load');?>?fname=<?php echo isset($key)?$key:'';?>"><?php echo isset($key)?$key:'';?></a>
                                            </td>
										<td>
                                            <input type="button"   class="btn btn-primary"
                                                   value="del"  onclick="del('<?php echo $key?>',<?php echo $v;?>)"/><br></div>
                                    </td>
										</tr>
                                    <?php
                                    }
                                    ?></table><?php 
                                }?>
                            </div>
                            <hr/>
                            <!--pending list-->
                            <?php $this->load->view('pending');?>
                            <!-- end -->
                            <p>&nbsp;</p>
                            <p style="text-align:center;">
                                <input class="btn btn-primary" type="button" value="Create Issue"

                                       id="save">
                                <input type="submit"  class="btn btn-success"

                                       value="SUBMIT"/></p>
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
