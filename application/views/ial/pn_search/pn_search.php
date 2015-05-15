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
    <?php $this->load->view('left2');?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Search PN</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="col-lg-6">
            <form action="<?php echo site_url('ial/pn_search/search') ?>" method="post">
                <label font-size: 36px; class=" bigger-110">PN:</label>
                <input  name="pn" id="pn" value=<?php if(isset($pn)){echo $pn;}else{echo '""';}?> type="text" placeholder="Search PN..." class=" nav-search-input  " autocomplete="off">
                <button  class="btn btn-info " type="sumit">
                    <i class="icon-ok bigger-110"></i> Submit
                </button>
                <p>&nbsp</p>
            </form>
        </div>

        <div class="col-lg-12" <?php if(!(isset($count) && $count==0 )){echo 'style="display:none"';} ?> >
            <p>&nbsp</p>
            <?php echo "No result found."?>
        </div>
        <div <?php if(!isset($tic) or count($tic)==0 ){echo 'style="display:none"'; } ?>  class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        TPG/IPG  DataTables Advanced Tables
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>Drr_received</th>
                                    <th>Deadline</th>
                                    <th>POR_Version</th>
                                    <th>Request type</th>
                                    <th>Complete Date</th>
                                    <th>Family/series</th>
                                    <th>Data Specialist</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(isset($tic) && count($tic)>0){
                                    foreach ($tic as $val){
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><a href="<?php echo site_url('task/addtask/task')?>?pr_id=1&id=<?php echo isset($val['id'])?$val['id']:0;?>"><?php if(isset($val['Drr_received']) && $val['Drr_received']!='0000-00-00'){ echo isset($val['Drr_received'])?$val['Drr_received']:'';}?></a></td>
                                            <td><?php  if(isset($val['deadline']) && $val['deadline']!='0000-00-00'){echo isset($val['deadline'])?$val['deadline']:'';} ?></td>
                                            <td><?php echo isset($val['POR_Version'])?$val['POR_Version']:'';?></td>
                                            <td class="center"><?php echo isset($val['request_type'])?$val['request_type']:'';?></td>
                                            <td class="center"><?php if(isset($val['complete_date']) && $val['complete_date']!='0000-00-00'){echo isset($val['complete_date'])?$val['complete_date']:'';} ?></td>
                                            <td class="center"><?php echo isset($val['family'])?$val['family']:'';?></td>
                                            <td class="center"><?php echo isset($val['Data_Specialist'])?$val['Data_Specialist']:'';?></td>
                                            <td class="center"><?php echo isset($val['status'])?$val['status']:'';?></td>
                                        </tr>
                                    <?php }
                                }?>
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

        <!-- st -->
        <div <?php if(!isset($svc) or count($svc)==0 ){echo 'style="display:none"'; } ?>class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        SVC  DataTables Advanced Tables
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example2">
                                <thead>
                                <tr>
                                    <th>AD</th>
                                    <th>Deadline</th>
                                    <th>EOW</th>
                                    <th>Loadsheet</th>
                                    <th>Submitter</th>
                                    <th>Type</th>
                                    <th>Data Specialist</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php if(isset($svc) && count($svc)>0){
                                    foreach ($svc as $val){
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><a href="<?php echo site_url('opt/opt_create_task/task')?>?pr_id=<?php echo isset($svc_pr_id)?$svc_pr_id:0;?>&svcid=<?php echo isset($val['SVCID'])?$val['SVCID']:0;?>"><?php if(isset($val['AD']) && $val['AD']!='0000-00-00'){ echo isset($val['AD'])?$val['AD']:'';}?></a></td>
                                            <td><?php if(isset($val['Deadline']) && $val['Deadline']!='0000-00-00'){echo isset($val['Deadline'])?$val['Deadline']:'';}?></td>
                                            <td><?php if(isset($val['EOW']) && $val['EOW']!='0000-00-00'){echo isset($val['EOW'])?$val['EOW']:'';}?></td>
                                            <td class="center"><?php echo isset($val['Loadsheet'])?$val['Loadsheet']:'';?></td>
                                            <td class="center"><?php echo isset($val['Submitter'])?$val['Submitter']:'';?></td>
                                            <td><?php echo isset($val['Type'])?$val['Type']:'';?></td>
                                            <td><?php echo isset($val['USER'])?$val['USER']:'';?></td>
                                            <td><?php echo isset($val['STATUS'])?$val['STATUS']:'';?></td>
                                        </tr>
                                    <?php }
                                }?>
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
        <!-- end -->

        <?php $this->load->view('foot');?>
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                    responsive: true
                });
                $('#dataTables-example2').DataTable({
                    responsive: true
                });
            });
        </script>
</body>
</html>

</html>
