           <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard111</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Admin<span class="fa arrow dropdown-toggle"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="<?php echo site_url('admin/admin_task/add_admintask') ?>">Create Task</a></li>
                                <li><a href="<?php echo site_url('admin/admin_task')?>">Task List</a></li>
                                <li><a href="<?php echo site_url('admin/user');?>">User Management</a></li>
                                <li><a href="<?php echo site_url('admin/group');?>">Group Management</a></li>
                                <li><a href="<?php echo site_url('admin/project');?>">Project Config</a></li>
                                <li><a href="<?php echo site_url('admin/brand');?>">Brand Config</a></li>
                                <li><a href="<?php echo site_url('admin/status');?>">Status Config</a></li>
                                <li><a href="<?php echo site_url('admin/bu');?>">BU Config</a></li>
                                <li><a href="<?php echo site_url('task/changehistory');?>">History List</a></li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li> <!--TPG/IPG-->
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> TPG/IPG<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="<?php echo site_url('task/addtask/index');?>">Task List</a></li>
                                <li><a href="<?php echo site_url('task/addtask/task');?>">Add Task</a></li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li><!-- opt/svc -->
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> OPT&SVC <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="<?php echo site_url('opt/opt_create_task/task');?>">Create Task</a></li>
                                <li><a href="<?php echo site_url('opt/opt_create_task/');?>">View Task</a></li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
 						<li> <!--EP/ERQ-->
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> EP/REQ<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="<?php echo site_url('ep_req/ep_req_create_task/index');?>">Task List</a></li>
                                <li><a href="<?php echo site_url('ep_req/ep_req_create_task/task');?>">Add Task</a></li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li> <!--SPECIAL BID-->
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> SPECIAL BID<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="<?php echo site_url('spb/spb_create_task/index');?>">Task List</a></li>
                                <li><a href="<?php echo site_url('spb/spb_create_task/task');?>">Add Task</a></li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Elements<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="<?php echo site_url('element/ele_task/addeletask');?>">Create Task</a></li>
                                <li><a href="<?php echo site_url('element/ele_task')?>"> Ele_Task List</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Common Function<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="report.html">Report</a></li>
                                <li><a href="login.html">Login Page</a></li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>