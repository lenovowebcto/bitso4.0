<?php if(isset($id) && $id>0){?>
						<div class="col-lg-12">
						<p class="fa fa-plus" id="cl" onclick="dis()">  Change History List</p>
						<div class="table-responsive" id="dhistory" style="display: none">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Time</th>
                                            <th>Action</th>
                                            <th>Content</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    if(isset($hist) && $hist!=array()){
                                       for($i = 0; $i < count($hist); $i ++) {
												?>
					                       <tr>
												<td><?php echo isset($hist[$i]['id']) ?$hist[$i]['id']:'';?></td>
										     	<td><?php echo isset($hist[$i]['change_user']) ?$hist[$i]['change_user']:'';?></td>
												<td><?php echo isset($hist[$i]['change_time']) ?$hist[$i]['change_time']:'';?></td>
												<td><?php echo isset($hist[$i]['oper']) ?$hist[$i]['oper']:'';?></td>
												<td><?php echo isset($hist[$i]['content']) ?$hist[$i]['content']:'';?></td>
											</tr>
                                       <?php }}?>
                                    </tbody>
                                </table>
                            </div>
                            
						</div>
						
						<?php }?>