<?php
     $task = Auth::getTask();
     $user = Auth::getUser(); 
?>
<?php if(isset($user['group']) && $user['group'] == 'LOIS') {?>
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">PDM LOIS </a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <?php if($user['type'] == 2){?>
                    <ul class="dropdown-menu dropdown-messages">
                    <?php if(isset($task) && count($task)>0){foreach($task as $val){
                    	?>
                        <li>
                            <a href="<?php echo site_url('admin/admin_task/user_opentask')?>?Ticket_id=<?php echo isset($val['Ticket_id'])?$val['Ticket_id']:'';?>">
                                <div>
                                    <strong><?php echo isset($val['PersonReported'])?$val['PersonReported']:'';?></strong>
                                    <span class="pull-right text-muted">
                                        <em><?php echo isset($val['DateReported'])?$val['DateReported']:'';?></em>
                                    </span>
                                </div>
                                <div>
                                <?php echo isset($val['ProblemDetails'])?$val['ProblemDetails']:'';?></div>
                            </a>
                        </li>
                       <?php   }}?>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="<?php echo site_url('admin/admin_task/user_opentask')?>?Ticket_id=all&AssignTo=<?php echo isset($user['username'])?$user['username']:'';?>">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <?php }elseif($user['type']==1){?>
                     <ul class="dropdown-menu dropdown-messages">
                    <?php if(isset($task) && count($task)>0){foreach($task as $val){
                    	?>
                        <li>
                            <a href="<?php echo site_url('admin/admin_task/user_opentask')?>?Ticket_id=<?php echo isset($val['Ticket_id'])?$val['Ticket_id']:'';?>">
                                <div>
                                    <strong><?php echo isset($val['PersonReported'])?$val['PersonReported']:'';?></strong>
                                    <span class="pull-right text-muted">
                                        <em><?php echo isset($val['DateReported'])?$val['DateReported']:'';?></em>
                                    </span>
                                </div>
                                <div>
                                <!-- <?php  mb_substr($val['ProblemDetails'],0,4,'utf-8');?> -->
                                <?php echo isset($val['ProblemDetails'])?$val['ProblemDetails']:'';?></div>
                            </a>
                        </li>
                       <?php   }}?>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="<?php echo site_url('admin/admin_task/user_opentask')?>?Ticket_id=all&AssignTo=">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <?php }?>
                  
                   	
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('login/logout');?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                 <ul class="nav" id="side-menu">
                 <?php 
                  if($user['type']==1){ ?>
                        <li>
                            <a href="<?php echo site_url('dashboard/dashboard/admin_dashboard')?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Admin<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                              
                                <li><a href="<?php echo site_url('admin/user');?>">User Management</a></li>
                                <li><a href="<?php echo site_url('admin/group');?>">Group Management</a></li>
                                <li><a href="<?php echo site_url('admin/project');?>">Project Config</a></li>
                                <li><a href="<?php echo site_url('admin/brand');?>">Brand Config</a></li>
                                <li><a href="<?php echo site_url('admin/status');?>">Status Config</a></li>
                                <li><a href="<?php echo site_url('admin/bu');?>">BU Config</a></li>
                                <li><a href="<?php echo site_url('admin/reqtype');?>">Request type Config</a></li>
                                <li><a href="<?php echo site_url('admin/category');?>">Catrgory Config</a></li>
                               </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li> <!--TPG/IPG-->
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> TPG/IPG<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                              <!-- <li><a href="<?php echo site_url('task/addtask/index');?>?pr_id=1">Task List</a></li>-->
                                <li><a href="<?php echo site_url('task/addtask/name_task');?>?pr_id=1">Task List</a></li>
                                <li><a href="<?php echo site_url('task/addtask/task');?>?pr_id=1">Add Task</a></li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						
						<li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> OPT&SVC <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="<?php echo site_url('opt/opt_create_task/task');?>?pr_id=2">Create Task</a></li>
                                <li><a href="<?php echo site_url('opt/opt_create_task/');?>?pr_id=2&archive=0">View Task</a></li>
<!--                                <li><a href="--><?php //echo site_url('opt/opt_create_task/task');?><!--?pr_id=2">Create Task</a></li>-->
                                <li><a href="<?php echo site_url('opt/opt_create_task/');?>?pr_id=2&archive=1">View Achieve Task</a></li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li> <!--EP/ERQ-->
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> EP/REQ<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="<?php echo site_url('ep_req/ep_req_create_task/');?>?pr_id=5&archive=0">Task List</a></li>
                                <li><a href="<?php echo site_url('ep_req/ep_req_create_task/task');?>?pr_id=5">Add Task</a></li>
                                <li><a href="<?php echo site_url('ep_req/ep_req_create_task/');?>?pr_id=5&archive=1">View Achieve Task</a></li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li> <!--SPECIAL BID-->
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> SPECIAL BID<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="<?php echo site_url('spb/spb_create_task/index');?>?pr_id=4&archive=0">Task List</a></li>
                                <li><a href="<?php echo site_url('spb/spb_create_task/task');?>?pr_id=4">Add Task</a></li>
                                <li><a href="<?php echo site_url('spb/spb_create_task/index');?>?pr_id=4&archive=1">View Achieve Task</a></li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Elements<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="<?php echo site_url('element/ele_task/addeletask');?>?pr_id=3">Create Task</a></li>
                                <li><a href="<?php echo site_url('element/ele_task')?>?pr_id=3"> Ele Task List</a></li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    <?php    }else if($user['type']==2){ ?>
                        <li class="sidebar-search">
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="<?php echo site_url('dashboard/dashboard/admin_dashboard')?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                      
                          			<li> <!--TPG/IPG-->
                          			<a href="#"><i class="fa fa-wrench fa-fw"></i> TPG/IPG<span class="fa arrow"></span></a>
                          			<ul class="nav nav-second-level">
                          			<li><a href="<?php echo site_url('task/addtask/name_task');?>?pr_id=1">Task List</a></li>
                          			<li><a href="<?php echo site_url('task/addtask/task');?>?pr_id=1">Add Task</a></li>
                          			</ul>
                          			</li>
                          			 <li>
			                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Elements<span class="fa arrow"></span></a>
			                            <ul class="nav nav-second-level">
			                                <li><a href="<?php echo site_url('element/ele_task/addeletask');?>?pr_id=3">Create Task</a></li>
			                                <li><a href="<?php echo site_url('element/ele_task')?>?pr_id=3"> Ele Task List</a></li>
			                            </ul>
			                            <!-- /.nav-second-level -->
			                        </li>
                       
                          			<li>
	                          			<a href="#"><i class="fa fa-wrench fa-fw"></i> OPT&SVC <span class="fa arrow"></span></a>
	                          			<ul class="nav nav-second-level">
	                          			<li><a href="<?php echo site_url('opt/opt_create_task/task');?>?pr_id=2">Create Task</a></li>
	                          			<li><a href="<?php echo site_url('opt/opt_create_task/');?>?pr_id=2&archive=0">View Task</a></li>
                                        <li><a href="<?php echo site_url('opt/opt_create_task/');?>?pr_id=2&archive=1">View Achieve Task</a></li>
                                        </ul>
                          			</li>
                          			<li> <!--EP/ERQ-->
                          			<a href="#"><i class="fa fa-wrench fa-fw"></i> EP/REQ<span class="fa arrow"></span></a>
                          			<ul class="nav nav-second-level">
                          			<li><a href="<?php echo site_url('ep_req/ep_req_create_task/index');?>?pr_id=5&archive=0">Task List</a></li>
                          			<li><a href="<?php echo site_url('ep_req/ep_req_create_task/task');?>?pr_id=5">Add Task</a></li>
                                        <li><a href="<?php echo site_url('ep_req/ep_req_create_task/');?>?pr_id=5&archive=1">View Achieve Task</a></li>
                                    </ul>
                          			</li>
                         
			                        <li> <!--SPECIAL BID-->
			                            <a href="#"><i class="fa fa-wrench fa-fw"></i> SPECIAL BID<span class="fa arrow"></span></a>
			                            <ul class="nav nav-second-level">
			                                <li><a href="<?php echo site_url('spb/spb_create_task/index');?>?pr_id=4&archive=0">Task List</a></li>
			                                <li><a href="<?php echo site_url('spb/spb_create_task/task');?>?pr_id=4">Add Task</a></li>
                                            <li><a href="<?php echo site_url('spb/spb_create_task/index');?>?pr_id=4&archive=1">View Achieve Task</a></li>
                                        </ul>
			                            <!-- /.nav-second-level -->
			                        </li>
								<?php 
		                          }
		                       ?>
                         
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Common Function<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="<?php echo site_url('admin/admin_task/add_admintask') ?>">Create Task</a></li>
                                <li><a href="<?php echo site_url('admin/admin_task')?>">Task List</a></li>
                                <li><a href="<?php echo site_url('dashboard/dashboard/admin_dash_list');?>?di=list">Report</a></li>
                                <li><a href="<?php echo site_url('admin/archive/alltickets');?>">Archive</a></li>
                                <li><a href="<?php echo site_url('admin/admin_task/showtask');?>">My Task</a></li>
                                <li><a href="<?php echo site_url('pn_search/pn_search/pn_search');?>">Serach PN</a></li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <?php }elseif (isset($user['group']) && $user['group'] == 'IAL'){?>
        
                <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">PDM IAL </a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                   
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('login/logout');?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                 <ul class="nav" id="side-menu">
                  <li>
                     <a href="<?php echo site_url('dashboard/ial_dashboard/admin_dashboard')?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                  </li>
                 <?php 
                  if($user['type']==1){ ?>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Admin<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                              
                                <li><a href="<?php echo site_url('admin/user');?>">User Management</a></li>
                                <li><a href="<?php echo site_url('Ial_admin/IAL_family');?>">Family Management</a></li>
                                <li><a href="<?php echo site_url('Ial_admin/IAL_warranty');?>">Warranty Type Management</a></li>
                                <li><a href="<?php echo site_url('Ial_admin/IAL_type');?>">IAL Type Management</a></li>
                                <li><a href="<?php echo site_url('Ial_admin/IAL_team');?>">IAL Team Management</a></li>
                                <li><a href="<?php echo site_url('Ial_admin/IAL_status');?>">IAL Status Management</a></li>
                                <li><a href="<?php echo site_url('Ial_admin/IAL_brand');?>">IAL Brand Management</a></li>
                                <li><a href="<?php echo site_url('Ial_admin/IAL_sub_series');?>">IAL Sub Series Management</a></li>
                                <li><a href="<?php echo site_url('Ial_admin/UploadImage');?>">IAL Image Upload</a></li>
                                
                               </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php }?>
                        <li> <!--TPG/IPG-->
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>PN Maintenance<span class="fa arrow"></span></a>
                               <ul class="nav nav-second-level">
                          			<li><a href="<?php echo site_url('ial/pn_maintenance');?>">PN Maintenance List</a></li>
                          			<li><a href="<?php echo site_url('ial/pn_maintenance/edit');?>">Add PN Maintenance</a></li>
                               </ul>
                        </li>
						
						<li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>IAL Task<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                          			<li><a href="<?php echo site_url('ial/task_create/index');?>?pr_id=5">Task List</a></li>
                          			<li><a href="<?php echo site_url('ial/task_create/task');?>?pr_id=5">Add Task</a></li>
                            </ul>
                        </li>
                        
                        <li> <!--EP/ERQ-->
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>IAL Relayware<span class="fa arrow"></span></a>
                           <ul class="nav nav-second-level">
                          			<li><a href="<?php echo site_url('ial/create_relayware/index');?>?pr_id=relayware">Task List</a></li>
                          			<li><a href="<?php echo site_url('ial/create_relayware/task');?>?pr_id=relayware">Add Task</a></li>
                            </ul>
                        </li>
						<li> <!--SPECIAL BID-->
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>IAL&BPL LIST<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                          			<li><a href="<?php echo site_url('ial/ial_bpl/index');?>">IAL&BPL List</a></li>
                          			<li><a href="<?php echo site_url('ial/ial_bpl/edit');?>">Add IAL&BPL</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Common Function<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">   
                                <li><a href="<?php echo site_url('dashboard/ial_dashboard/ial_admin_dash_list');?>?di=list">Report</a></li>
                                <li><a href="<?php echo site_url('ial/pn_search/pn_search');?>">Serach</a></li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        
        <?php }?>