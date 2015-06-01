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
	<div id="wrapper">
<?php
$this->load->view ( 'left2' );
?>
        <div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">IAL Task List</h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>

            <div id="accordion" class="accordion-style1 panel-group">
                <div class="panel panel-default">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false">
                    <div class="panel-heading" style="color: gray">
                        <h4 class="panel-title">
                            Search
                        </h4>
                    </div>
                    </a>

                    <div class="panel-collapse collapse" id="collapseOne" style="height: auto;">
                        <div class="panel-body">
                            <form action="<?php echo site_url('ial/task_create/task_create') ?>" method="post">
                                <!-- /.panel-heading -->
                                <div class="panel-body">

                                    <div class="col-lg-3">
                                        <label>Brand:</label>
                                        <select style="width: 200px" id="Brand" class="form-control" name="task[Brand]">
                                            <option value="" <?php if(isset($task['Brand']) && $task['Brand']==''){echo 'selected';}?> ></option>
                                            <?php  foreach($Brand as $key){
                                                ?>
                                                <option <?php if(isset($task['Brand']) && $task['Brand']==$key['bname']){echo 'selected';}?> >
                                                    <?php echo isset($key['bname'])?$key['bname']:$brand; ?></option>
                                            <?php
                                            }?>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Family name:</label>
                                        <select style="width: 200px" id="BU" class="form-control selectpicker" data-live-search="true" name="task[Family_name]">
                                            <option value="" <?php if(isset($task['Family_name']) && $task['Family_name']==''){echo 'selected';}?> >&nbsp;</option>
                                            <?php  foreach($Family_name as $key){
                                                ?>
                                                <option <?php if(isset($task['Family_name']) && $task['Family_name']==$key['Family_name']){echo 'selected';}?> >
                                                    <?php echo isset($key['Family_name'])?$key['Family_name']:$family_name; ?></option>
                                            <?php
                                            }?>
                                        </select>
                                    </div>

                                    <div class="col-lg-3">
                                        <label>Sub Series:</label>
                                        <select  id="Sub_Series" class="form-control selectpicker" data-live-search="true" name="task[Sub_Series]">
                                            <option value="" <?php if(isset($task['Sub_Series']) && $task['Sub_Series']==''){echo 'selected';}?> >&nbsp;</option>
                                            <?php  foreach($Sub_Series as $key){
                                                ?>
                                                <option <?php if(isset($task['Sub_Series']) && $task['Sub_Series']==$key['sub_series']){echo 'selected';}?> >
                                                    <?php echo isset($key['sub_series'])?$key['sub_series']:$sub_Series; ?></option>
                                            <?php
                                            }?>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Start AD:</label>
                                        <input type="text"
                                               style="width: 200px" id="AD" class="form-control"
                                               data-beatpicker="true" name="task[start_AD]"
                                               value="<?php echo isset($task['AD'])?$task['AD']:'0000-00-00';?>" />

                                    </div>
                                    <div class="col-lg-3">
                                        <label>End AD:</label>
                                        <input type="text"
                                               style="width: 200px" id="AD" class="form-control"
                                               data-beatpicker="true" name="task[end_AD]"
                                               value="<?php echo isset($task['AD'])?$task['AD']:'0000-00-00';?>"/>
                                    </div>
                                </div>
                                <p style="text-align:center;">
                                    <input type="submit"  class="btn btn-success" value="SUBMIT"/></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
			<div class="row">
				<div class="col-lg-12">

                    <div class="panel panel-default">

						<!-- /.panel-heading -->
						<div id="opt" class="tab-pane in active">

							<div class="panel-body">
								<div class="dataTable_wrapper">
									<table class="table table-striped table-bordered table-hover"
										id="dataTables-example">
										<thead>
											<tr>
												<th>ID</th>
                                                <th>IAL number</th>
                                                <th>BPL number</th>
                                                <th>record date</th>
                                                <th>Brand</th>
                                                <th>Family name</th>
                                                <th>sub series</th>
                                                <th>AD </th>
												<th>EOW date</th>
												<th>RTM date</th>
												<th>status </th>
											</tr>
										</thead>
										<tbody>
                            
						 <?php
							if (count ( $task ) == 0) :
						?>
						     <tr>
								<td colspan='7'>NO Data</td>
							</tr>
								<?php
				                endif;
								for($i = 0; $i < count ( $task ); $i ++) {
									?>
						    	<tr>
									<td><a href="<?php echo site_url('ial/task_create/task') ?>?id=<?php echo isset($task[$i]["id"]) ?$task[$i]["id"]:""?>&pr_id=<?php echo isset($pr_id)?$pr_id:0;?>"><?php echo isset($task[$i]["id"]) ?$task[$i]["id"]:""?></a></td>

									<td><a href="<?php echo site_url('ial/task_create/task') ?>?id=<?php echo isset($task[$i]["id"]) ?$task[$i]["id"]:""?>&pr_id=<?php echo isset($pr_id)?$pr_id:0;?>"><?php echo isset($task[$i]['IAL_number']) ?$task[$i]['IAL_number']:'';?></a></td>
                                    <td><?php echo isset($task[$i]['BPL_Number']) ?$task[$i]['BPL_Number']:'';?></td>
                                    <td><?php if(isset($task[$i]['Record_Date']) && $task[$i]['Record_Date']!='0000-00-00') { echo isset($task[$i]['Record_Date']) ?$task[$i]['Record_Date']:'';}?></td>
                                    <td><?php echo isset($task[$i]['Brand']) ?$task[$i]['Brand']:'';?></td>
                                    <td><?php if(isset($task[$i]['Family_name']) && $task[$i]['Family_name']!='0000-00-00') { echo isset($task[$i]['Family_name']) ?$task[$i]['Family_name']:'';}?></td>
                                    <td><?php echo isset($task[$i]['Sub_Series']) ?$task[$i]['Sub_Series']:'';?></td>
                                     <td><?php echo isset($task[$i]['AD']) ?$task[$i]['AD']:'';?></td>
                                    <td><?php echo isset($task[$i]['EOW']) ?$task[$i]['EOW']:'';?></td>
									<td><?php echo isset($task[$i]['RTM']) ?$task[$i]['RTM']:'';?></td>
									<td><?php echo isset($task[$i]['Status']) ?$task[$i]['Status']:'';?></td>

                                </tr>
								<?php } ?>

                                    </tbody>
									</table>
								</div>
								<!-- /.table-responsive -->
							</div>
							<!-- /.panel-body -->
						</div>
						<!-- /.panel-body -->
					</div>
					<!-- /.panel -->
				</div>
				<!-- /.col-lg-12 -->
			</div>
		</div>
		<!-- /#page-wrapper -->

	</div>
	<!-- /#wrapper -->
	<?php $this->load->view('foot');?>
	    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
		
		$("#showhistory").click(function(){
		$("dhistory").hide();
		});
    });
    </script>
</body>
</html>
