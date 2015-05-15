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
       
           <!-- table  start-->
         <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Bug List</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Detail bug info as below
                        </div>
                         <div class="panel-heading">
                           <a href="<?php echo site_url('bug/addbug')?>">Add Bug</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                                <th>ID</th>
												<th>Char</th>
												<th>Value</th>
												<th>AD</th>
												
												<th>Submitter</th>
												<th>Modifier</th>
												<th>status</th>
												<th>create_time</th>
												<th>last_change</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                          <?php
											if (count($bug) == 0) :
										?>
				                           <tr>
												<td colspan='9'>No Data</td>
										   </tr>
											<?php
			                                endif;
											for($i = 0; $i < count($bug); $i ++) {
												//echo  '<pre>';  var_dump($bug);exit;
												?>
					                       <tr>
												<td><a href="<?php echo site_url('bug/addbug') ?>?id=<?php echo isset($bug[$i]["id"]) ?$bug[$i]["id"]:""?>"><?php echo isset($bug[$i]['id']) ?$bug[$i]['id']:'';?></a></td>
												<td><?php echo isset($bug[$i]['char']) ?$bug[$i]['char']:'';?></td>
												<td><?php
												$val = $bug[$i]['value'];
												 if(isset($val) && isset($val)!=''){
													$value= json_decode($val);
													if($value !=''){echo  implode('<br/>', $value);}
												}?></td>
												<td><?php echo isset($bug[$i]['AD']) ?$bug[$i]['AD']:'';?></td>
												<td><?php echo isset($bug[$i]['submitter']) ?$bug[$i]['submitter']:'';?></td>
												<td><?php echo isset($bug[$i]['modifier']) ?$bug[$i]['modifier']:'';?></td>
										     	<td>
										     	 <select name="bug[status]" class="form-control" style="width: 120px" id="sta<?php echo $bug[$i]['id'];?>" onchange="changestatus(<?php echo $bug[$i]['id'];?>)">
											         <option  <?php if(isset($bug[$i]['status']) && $bug[$i]['status']=='New'){echo 'selected';}?> value="New" >New</option> 
											         <option  <?php if(isset($bug[$i]['status']) && $bug[$i]['status']=='In Progress'){echo 'selected';}?> value="In Progress" >In Progress</option> 
											         <option  <?php if(isset($bug[$i]['status']) && $bug[$i]['status']=='Done'){echo 'selected';}?> value="Done" >Done</option> 
										         </select>
										        </td>
										        <td><?php echo isset($bug[$i]['create_time']) ?$bug[$i]['create_time']:'';?></td>
												<td id=<?php echo isset($bug[$i]['id'])?$bug[$i]['id']:'';?>><?php echo isset($bug[$i]['last_change']) ?$bug[$i]['last_change']:'';?></td>
											</tr>
						           <?php } ?>
                                      </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
           <!-- table   end-->
   <?php $this->load->view('foot');?>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    function changestatus(id){
    	var url = "<?php echo site_url('bug/editstatus');?>";
    	var sta = $("#sta"+id).val();
		var dt = "<?php $a =  date('y-m-d h:i:s',time());echo date('Y-m-d H:i:s',strtotime($a));?>";
    	$.ajax({
           type:'POST',
           url:url,
           data:{id:id,sta:sta},
           async:true,
           success:function(result){
             if(result=='success'){
                $('#'+id).html(dt);
                }
            }
           });
        }
   
    </script>
</body>
</html>
